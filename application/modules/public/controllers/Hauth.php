<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
    
    use DrewM\MailChimp\MailChimp;
    
    class HAuth extends My_Controller
    {
        
        public $autoload
            = array(
                'model' => array('Mdl_users'),
            );
        
        protected $hauth_config;
        private   $authdata;
        private   $MailChimp;
        
        public function __construct()
        {
            parent::__construct();
            
            $this->authdata = $this->session->userdata('searchgurbani');
            
            $method = $this->router->fetch_method();
            
            if (isset($this->authdata['auth']) ||
                !empty($this->authdata['auth']['id'])
            ) {
                if (($method != 'logout')) {
                    redirect(base_url());
                }
            }
            
            $this->hauth_config = $this->config->item('hybridauth');
            $this->MailChimp = new MailChimp($this->config->item('MailChimp'));
            $this->MailChimp_list = $this->config->item('MailChimp_list');
        }
        
        public function login($provider)
        {
            log_message('debug', "controllers.HAuth.login($provider) called");
            
            try {
                log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
                $this->load->library('HybridAuthLib', $this->hauth_config);

                if ($this->hybridauthlib->providerEnabled($provider)) {

                    log_message('debug',
                        "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
                    $service = $this->hybridauthlib->authenticate($provider);
                    
                    if ($service->isUserConnected()) {
                        log_message('debug', 'controller.HAuth.login: user authenticated.');

                        $user_profile = $service->getUserProfile();
                        
                        $db_data = [];
                        if ($provider == 'Facebook') {
                            $db_data = $this->fb_db_add_user($user_profile);
                        } else if ($provider == 'Twitter') {
                            $db_data = $this->tw_db_add_user($user_profile);
                        } else if ($provider == 'Google') {
                            $db_data = $this->gplus_db_add_user($user_profile);
                        } else if ($provider == 'LinkedIn') {
                            $db_data = $this->linkedin_db_add_user($user_profile);
                        }
                        
                        if (!empty($db_data['email'])) {
                            $newsLetterSubStatus
                                = $this->MailChimp->post("lists/{$this->MailChimp_list}/members", [
                                'email_address' => $db_data['email'],
                                'status'        => 'subscribed',
                            ]);
                            
                            if (isset($newsLetterSubStatus['status'])) {
                                if ($newsLetterSubStatus['status'] == '400' ||
                                    $newsLetterSubStatus['status'] == 'subscribed'
                                ) {
                                    $db_data['newsletterSubscribed'] = 1;
                                }
                            }
                        }
                        
                        $user_response = $this->insert_user($db_data);

                        log_message('info', 'controllers.HAuth.login: user profile:' . PHP_EOL .
                                            print_r($user_profile, true));
                        
                        if ($user_response['status'] == 'success') {
                            
                            if (isset($user_response['created']) && $user_response['created']) {
                                
                                if (!empty($db_data['newsletterSubscribed'])) {
                                    
                                    $this->session->set_flashdata('social_login_msg',
                                        'Your account has been successfully created, and you have been ' .
                                        'subscribed to our newsletter service also.');
                                    
                                } else {
                                    
                                    $this->session->set_flashdata('social_login_msg',
                                        'Your account has been successfully created.');
                                }
                                
                            }

                            $user_response['data']['provider'] = $provider;

                            $this->save_userdata_session($user_response);
                        } else {
                            
                            $this->session->set_flashdata('social_login_msg',
                                'Something went wrong with the login, you can try again later or ' .
                                'report to administrator.');
                            
                        }
                        
                        redirect(base_url());
                    } else // Cannot authenticate user
                    {
                        $this->session->set_flashdata('social_login_msg',
                            'Cannot authenticate user');
                    }
                } else // This service is not enabled.
                {
                    log_message('error',
                        'controllers.HAuth.login: This provider is not enabled (' . $provider .
                        ')');
                    show_404($_SERVER['REQUEST_URI']);
                }
            } catch (Exception $e) {
                $error = 'Unexpected error';
                switch ($e->getCode()) {
                    case 0 :
                        $error = 'Unspecified error.';
                        break;
                    case 1 :
                        $error = 'Hybriauth configuration error.';
                        break;
                    case 2 :
                        $error = 'Provider not properly configured.';
                        break;
                    case 3 :
                        $error = 'Unknown or disabled provider.';
                        break;
                    case 4 :
                        $error = 'Missing provider application credentials.';
                        break;
                    case 5 :
                        log_message('debug',
                            'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
                        //redirect();
                        if (isset($service)) {
                            log_message('debug',
                                'controllers.HAuth.login: logging out from service.');
                            $service->logout();
                        }
                        $this->session->set_flashdata('social_login_msg',
                            'User has cancelled the authentication or the provider refused the connection.');
                        break;
                    case 6 :
                        $error
                            = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
                        break;
                    case 7 :
                        $error = 'User not connected to the provider.';
                        break;
                }
                
                if (isset($service)) {
                    $service->logout();
                }
                
                log_message('error', 'controllers.HAuth.login: ' . $error);
                $this->session->set_flashdata('social_login_msg', 'Error authenticating user.');
            }
        }
        
        private function fb_db_add_user($userData)
        {
            $userData = (array)$userData;
            
            $dbData = [
                'identifier'    => $userData['identifier'],
                'photoURL'      => isset($userData['photoURL']) ? $userData['photoURL'] : '',
                'displayName'   => !empty($userData['displayName']) ? $userData['displayName'] : trim("{$userData['firstName']} {$userData['lastName']}"),
                'firstName'     => $userData['firstName'],
                'lastName'      => $userData['lastName'],
                'gender'        => isset($userData['gender']) ? $userData['gender'] : '',
                'email'         => $userData['email'],
                'emailVerified' => $userData['emailVerified'],
            ];
            
            return $dbData;
        }
        
        private function tw_db_add_user($userData)
        {
            
            $userData = (array)$userData;
            
            $dbData = [
                'identifier'    => $userData['identifier'],
                'photoURL'      => isset($userData['photoURL']) ? $userData['photoURL'] : '',
                'displayName'   => !empty($userData['displayName']) ? $userData['displayName'] : trim("{$userData['firstName']} {$userData['lastName']}"),
                'firstName'     => $userData['firstName'],
                'lastName'      => $userData['lastName'],
                'gender'        => isset($userData['gender']) ? $userData['gender'] : '',
                'email'         => $userData['email'],
                'emailVerified' => $userData['emailVerified'],
            ];
            
            return $dbData;
        }

        private function gplus_db_add_user($userData)
        {

            $userData = (array)$userData;

            $dbData = [
                'identifier'    => $userData['identifier'],
                'photoURL'      => isset($userData['photoURL']) ? $userData['photoURL'] : '',
                'displayName'   => !empty($userData['displayName']) ? $userData['displayName'] : trim("{$userData['firstName']} {$userData['lastName']}"),
                'firstName'     => $userData['firstName'],
                'lastName'      => $userData['lastName'],
                'gender'        => isset($userData['gender']) ? $userData['gender'] : '',
                'email'         => $userData['email'],
                'emailVerified' => $userData['emailVerified'],
            ];

            return $dbData;
        }

        private function linkedin_db_add_user($userData)
        {

            $userData = (array)$userData;

            $dbData = [
                'identifier'    => $userData['identifier'],
                'photoURL'      => isset($userData['photoURL']) ? $userData['photoURL'] : '',
                'displayName'   => !empty($userData['displayName']) ? $userData['displayName'] : trim("{$userData['firstName']} {$userData['lastName']}"),
                'firstName'     => $userData['firstName'],
                'lastName'      => $userData['lastName'],
                'gender'        => isset($userData['gender']) ? $userData['gender'] : '',
                'email'         => $userData['email'],
                'emailVerified' => $userData['emailVerified'],
            ];

            return $dbData;
        }
        
        private function insert_user($dbData)
        {
            $userExist = $this->Mdl_users->get_user_by(['email' => $dbData['email']]);
            
            if (empty($userExist)) {
                $userExist = $this->Mdl_users->get_user_by(['identifier' => $dbData['identifier']]);
            }
            
            if (empty($userExist)) {
                $id = $this->Mdl_users->add_user($dbData);
                $userExist = $this->Mdl_users->get_user_by(['identifier' => $dbData['identifier']]);
                
                $resp = [
                    'status'  => 'success',
                    'created' => 1,
                    'id'      => $id,
                    'data'    => $userExist,
                ];
            } else {
                $resp = [
                    'status'  => 'success',
                    'fetched' => 1,
                    'data'    => $userExist,
                ];
            }
            
            return $resp;
        }
        
        private function save_userdata_session($userData)
        {
            if ($userData['status'] == 'success') {
                $this->session->set_userdata('searchgurbani', ['auth' => $userData['data']]);
            }
        }
        
        public function endpoint()
        {
            
            log_message('debug', 'controllers.HAuth.endpoint called.');
            log_message('info',
                'controllers.HAuth.endpoint: $_REQUEST: ' . print_r($_REQUEST, true));
            
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                log_message('debug',
                    'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
                $_GET = $_REQUEST;
            }
            
            log_message('debug',
                'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
            require_once APPPATH . '/vendor/hybridauth/hybridauth/hybridauth/index.php';
            
        }
        
        public function logout()
        {
            $this->load->library('HybridAuthLib', $this->hauth_config);
    
            if (!empty($this->hybridauthlib->getConnectedProviders())) {
                
                $this->hybridauthlib->logoutAllProviders();
                
                if (!empty($this->authdata)) {
                    if (!empty($this->authdata['auth'])) {
                        unset($this->authdata['auth']);
                        $this->session->set_userdata('searchgurbani', $this->authdata);
                    }
                }
            } else {
                
                if (!empty($this->authdata)) {
                    if (!empty($this->authdata['auth'])) {
                        unset($this->authdata['auth']);
                        $this->session->set_userdata('searchgurbani', $this->authdata);
                    }
                }
            }
            redirect(base_url());
        }
        
        public function register() {
    
            $this->load->library('form_validation');
        
            $this->form_validation->set_rules('Ufname', 'First Name', 'required|max_length[100]');
            $this->form_validation->set_rules('Ulname', 'Last Name', 'required|max_length[100]');
            $this->form_validation->set_rules('Uemail', 'Email', 'required|valid_email|max_length[255]|is_unique[USERS.email]');
            $this->form_validation->set_rules('Upass', 'Password', 'required');
            $this->form_validation->set_rules('Uconfpass', 'Confirm Password', 'required|matches[Upass]');
            
            if ($this->form_validation->run()) {
                
                $insert_id = $this->Mdl_users->add_user([
                    'firstName' => $this->input->post('Ufname'),
                    'lastName' => $this->input->post('Ulname'),
                    'displayName' => $this->input->post('Ufname') . ' ' . $this->input->post('Ulname'),
                    'email' => $this->input->post('Uemail'),
                    'password' => password_encrypt($this->input->post('Upass')),
                ]);
                
                if(!empty($insert_id)) {
                    $userExist = $this->Mdl_users->get_user_by(['id' => $insert_id]);
    
                    $resp = [
                        'status'  => 'success',
                        'created' => 1,
                        'id'      => $insert_id,
                        'data'    => $userExist,
                    ];
    
                    $resp['data']['provider'] = 'manual';
    
                    $this->save_userdata_session($resp);
                }
    
                echo json_encode([
                    'status' => !empty($insert_id) ? 1 : 0,
                    'statusMsg' => !empty($insert_id) ? 'User registration complete.' : 'User registration error.'
                ]);
            } else {
                echo json_encode([
                    'status' => 0,
                    'statusMsg' => strip_tags(str_replace('</p>', '', validation_errors()))
                ]);
            }
        }
        
        public function email_login() {
            $this->load->library('form_validation');
    
            $this->form_validation->set_rules('Uemail', 'Username', 'required|valid_email|max_length[255]');
            $this->form_validation->set_rules('Upass', 'Password', 'required');
    
            if ($this->form_validation->run()) {
        
                $data = array(
                    'uemail' => $this->input->post('Uemail'),
                    'upass' => $this->input->post('Upass'),
                );
    
                $login_det = $this->Mdl_users->get_user_by(['email' => $data['uemail']]);
        
                if (($data['uemail'] == $login_det['email']) && ($login_det['password'] == password_decrypt($data['upass'], $login_det['password']))) {
    
                    $resp = [
                        'status'  => 'success',
                        'created' => 1,
                        'id'      => $login_det['id'],
                        'data'    => $login_det,
                    ];
    
                    $resp['data']['provider'] = 'manual';
    
                    $this->save_userdata_session($resp);
    
                    echo json_encode([
                        'status' => 1,
                        'statusMsg' => 'Successfullt logged in.'
                    ]);
            
                } else {
    
                    echo json_encode([
                        'status' => 0,
                        'statusMsg' => 'Invalid credential provided.'
                    ]);
            
                }
            } else {
                echo json_encode([
                    'status' => 0,
                    'statusMsg' => strip_tags(str_replace('</p>', '', validation_errors()))
                ]);
            }
        }
    }
    
    /* End of file hauth.php */
    /* Location: ./application/controllers/hauth.php */
