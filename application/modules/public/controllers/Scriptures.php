<?php defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Scriptures extends My_Controller
    {
        
        function __construct()
        {
            parent::__construct();
	        
	        $this->load->library('form_validation');
            $this->load->model('sample');
	        $this->load->library('recaptcha');
         
        }
        /*function xmlout(){
        $username='gur';
        $uri='http://www.searchgurbani.com/';
        $tweets['xml'] = $this->rest->get($uri,'/guru_granth_sahib/ang_by_ang/',xml );
        $this->load->view("forms/xmlout",$tweets);
        }*/
        
        
        /**
         * Method to show the Search form
         */
        
        function search()
        {
            
            // load the page
            
            $page['theme'] = 'theme_7';

            $this->load->view("forms/mega-search-form", $page);

        }
        
        function index()
        
        {
	        
            
            $this->load->view("forms/main-mob");
            
        }
        
        function contactUs()
        {
            if ($this->form_validation->run("contact-us") == FALSE)
            {
	            $page['theme'] = 'theme_7';
	
	            $page['meta_title'] = 'Feedback Form : SearchGurbani.com';
	
	            $page['meta_description'] = 'Contact Us -SearchGurbani.com';
	            
	            $this->load->view("forms/contact-us", $page);
            }else
            {
	            $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
	
	            $response = $this->recaptcha->verifyResponse($recaptchaResponse);

	            if (isset($response['success']) and $response['success'] === TRUE)
	            {
		
		            $a       = "";
		            $name    = htmlspecialchars($_POST['name']);
		            $email   = htmlspecialchars($_POST['emailid']);
		            $website = htmlspecialchars($_POST['website']);
		            $message = htmlspecialchars($_POST['message']);
		            $to      = $this->config->item('contact_us');
		
		            $error_name    = empty($name) ? TRUE : FALSE;
		            $error_email   = empty($email) ? TRUE : FALSE;
		            $error_message = empty($message) ? TRUE : FALSE;
		
		            if (!$error_name && !$error_email && !$error_message)
		            {
			
			            // Send the email
			            $subject = "Message from mobile site";
			            $message = "Website: " . $website . "\n\n" . $message;
			            $from    = $email;
			            $headers = "From: " . $email;
			            mail($to, $subject, $message, $headers);
			            $a        = 1;
			            $sess_arr = array(
				            'checkmail' => 'true'
			            );
			
			            $this->session->set_userdata($sess_arr);
			
		            }
		            else
		            {
			            $sess_arr = array(
				            'checkmail' => 'false'
			            );
			            $this->session->set_userdata($sess_arr);

		            }
		
		            
	            }
	            else{
		            $this->session->set_flashdata('captchaFailed', 'Sorry Google Recaptcha Unsuccessful!!');
	            }
	            redirect('contact-us');
	            
            }
	
	        
        }
        
        function search_Form()
        
        {
            
            
            global $SG_ScriptureTypes;
            
            $this->load->model('logics/search_logic');
            
            
            log_message('info', 'SG: ******* New Search *******');
            
            $search_text = $this->input->post('SearchData');
            
            $search_type = $this->input->post('Searchtype');
            
            $search_case_sensitive = $this->input->post('case');
            
            $search_language = $this->input->post('language');
            
            $search_author = $this->input->post('author');
            
            $search_raag = $this->input->post('raag');
            
            $search_page_from = $this->input->post('page_from');
            
            $search_page_to = $this->input->post('page_to');
            
            $individual_search = $this->input->post('individual_search');
            
            
            $search_scriptures = array();
            
            if ($this->input->post('ggs') == 1)
                
                $search_scriptures[] = "ggs";
            
            if ($this->input->post('ak') == 1)
                
                $search_scriptures[] = "ak";
            
            if ($this->input->post('bgv') == 1)
                
                $search_scriptures[] = "bgv";
            
            if ($this->input->post('dg') == 1)
                
                $search_scriptures[] = "dg";
            
            if ($this->input->post('ks') == 1)
                
                $search_scriptures[] = "ks";
            
            if ($this->input->post('bnl') == 1)
                
                $search_scriptures[] = "bnl";
            
            $this->search_logic->get_results_count($search_text, $search_type, $search_case_sensitive,
                
                $search_language, $search_scriptures, $search_author,
                
                $search_raag, $search_page_from, $search_page_to, $individual_search);
            
            $result_counts = $this->session->userdata('search_results');
            
            
            if ($individual_search == 1) {
                
                foreach ($result_counts as $scripture => $result) {
                    
                    if ($result['result_count'] > 0) {
                        
                        redirect($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/search-results/');
                        
                    } else {
                        
                        $this->session->set_flashdata("response", "<div class='info'>No results found</div>");
                        
                        redirect($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/search/');
                        
                    }
                    
                }
                
            } else {
                
                $this->load->view("forms/search-page", array("result_counts" => $result_counts));
                
            }
            
            
        }
        
        function search_results_preview()
        {
            global $SG_ScriptureTypes;
            
            log_message('info', 'SG: ******* New Search *******');
            
            $search_text = $this->input->post('SearchData');
            
            $search_tableID = $this->input->post('tableID');
            
            $search_type = $this->input->post('Searchtype');
            
            $search_case_sensitive = $this->input->post('case');
            
            $search_language = $this->input->post('language');
            
            $search_author = $this->input->post('author');
            
            $search_raag = $this->input->post('raag');
            
            $search_page_from = $this->input->post('page_from');
            
            $search_page_to = $this->input->post('page_to');
            
            $search_from = $this->input->post('bnlSelect');
            
            $individual_search = $this->input->post('individual_search');
            
            
            $search_scriptures = array();
            
            if ($this->input->post('ggs') == 1) {
                $search_scriptures[] = "ggs";
            }
            if ($this->input->post('ak') == 1) {
                
                $search_scriptures[] = "ak";
            }
            if ($this->input->post('bgv') == 1) {
                
                $search_scriptures[] = "bgv";
            }
            if ($this->input->post('dg') == 1) {
                
                $search_scriptures[] = "dg";
            }
            if ($this->input->post('ks') == 1) {
                
                $search_scriptures[] = "ks";
            }
            if ($this->input->post('bnl') == 1) {
                
                $search_scriptures[] = "bnl";
            }
            
            $this->load->model('search/Mdl_search');

            
            $this->Mdl_search->search_logic_count($search_text, $search_type, $search_tableID, $search_case_sensitive,
                $search_language, $search_scriptures, $search_author, $search_raag, $search_page_from, $search_page_to,
                $individual_search, $search_from);
            
            $result_counts = $this->session->userdata('search_results');
            
            
            if ($individual_search == 1) {
                
                
                if ($result_counts[$search_scriptures[0]]['result_count'] > 0) {
                    
                    redirect($SG_ScriptureTypes[$search_scriptures[0]]['controller_name_dash'] . '/search-results');
                    
                } else {
                    
                    $this->session->set_flashdata("response", "<div class='info'>No results found</div>");
                    
                    redirect($SG_ScriptureTypes[$search_scriptures[0]]['controller_name_dash'] . '/search/');
                    
                }
                
                
            } else {
                
                $this->load->view("forms/search-results-preview", array("result_counts" => $result_counts));
                
            }
            
        }
        
        function portfolio()
        
        {
            
            
            global $SG_ScriptureTypes;
            
            $this->load->model('logics/search_logic');
            
            $this->load->model('dao/sri_guru_granth_sahib_dao');
            
            log_message('info', 'SG: ******* New Search *******');
            
            $search_text = $this->input->post('SearchData');
            
            $search_type = $this->input->post('Searchtype');
            
            $search_case_sensitive = $this->input->post('case');
            
            $search_language = $this->input->post('language');
            
            $search_author = $this->input->post('author');
            
            $search_raag = $this->input->post('raag');
            
            $search_page_from = $this->input->post('page_from');
            
            $search_page_to = $this->input->post('page_to');
            
            $individual_search = $this->input->post('individual_search');
            
            
            $search_scriptures = array();
            
            if ($this->input->post('ggs') == 1)
                
                $search_scriptures[] = "ggs";
            
            if ($this->input->post('ak') == 1)
                
                $search_scriptures[] = "ak";
            
            if ($this->input->post('bgv') == 1)
                
                $search_scriptures[] = "bgv";
            
            if ($this->input->post('dg') == 1)
                
                $search_scriptures[] = "dg";
            
            if ($this->input->post('ks') == 1)
                
                $search_scriptures[] = "ks";

            $this->search_logic->get_results_count($search_text, $search_type, $search_case_sensitive,
                
                $search_language, $search_scriptures, $search_author,
                
                $search_raag, $search_page_from, $search_page_to, $individual_search);
            
            $result_counts = $this->session->userdata('search_results');
            
            
            $data = array(
                
                'result_counts' => $result_counts,
                
                'scripture' => 'ggs',
                
                'authors' => $this->sri_guru_granth_sahib_dao->get_authors_list(),
                
                'raags' => $this->sri_guru_granth_sahib_dao->get_raags_list()
            
            
            );
            
            
            //echo $individual_search;
            if ($individual_search == 1) {
                
                foreach ($result_counts as $scripture => $result) {
                    
                    if ($result['result_count'] > 0) {
                        redirect('scriptures/search_results/');
                        
                    } else {
                        $this->session->set_flashdata("response", "<div class='info'>No results found</div>");
                        
                        redirect('scriptures/portfolio/');
                        
                    }
                    
                }
                
            } else {
                
                $this->load->view("forms/portfolio", $data);
                
            }
            
        }
        
        
        function search_results($index = 0)
        
        {
            
            $this->load->model('logics/search_logic');
            
            $search_results = $this->session->userdata('search_results');
            
            $this->load->library('pagination');
            
            $config = array('base_url' => site_url('scriptures/search_results/'),
            
                            'total_rows' => $search_results['ggs']['result_count'],
            
                            'per_page' => '25'
            
            );
            
            $this->pagination->initialize($config);
            
            $results['search_results'] = $this->search_logic->get_results($search_results['ggs']['result_query'], $index, ' order by pageno,pagelineno ');
            
            $results['search_results_info'] = array("showing_from" => $index + 1,
            
                                                    "showing_to" => ($index + 25 > $search_results['ggs']['result_count'] ? $search_results['ggs']['result_count'] : $index + 25),
            
                                                    "total_results" => $search_results['ggs']['result_count']
            
            );
            
            $results['pagination_links'] = $this->pagination->create_links();
            
            
            $this->load->view('forms/portfolio-search-results', $results);
            
            
        }
        
        function amrit_keertan($alpha = '')
        
        {
            
            $this->load->model('dao/amrit_keertan_dao');
            
            
            if ($alpha == '') {
                
                $alpha = 'A';
                
            }
            
            
            $form['current_alphabet'] = $alpha;
            
            $form['alphabets'] = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
            
                                       'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
            
            $form['current_index'] = "english";
            
            $form['shabad_field'] = "shabad_name";
            
            $form['shabads'] = $this->amrit_keertan_dao->get_shabads_by_alphabet($alpha, 'shabad_name');
            
            
            // load the page
            
            
            $page['meta_title'] = 'Amrit Keertan Gutka Alphabetical Shabad Index in English  :- SearchGurbani.com';
            
            $page['meta_description'] = 'Explore Amrit Keertan Gutka Alphabetical Shabad Index in English at SearchGurbani.com';
            
            
            $this->load->view('templates/mob-header');
            $this->load->view("forms/amrit-keertan", $form);
            
        }
        
        function shabad($shabad_id = 0, $shabad_name = '', $d = 'line', $line_no = 'NA')
        {
            
            global $SG_ScriptureTypes, $SG_Preferences;
            
            $keywords = array();
            
            $this->load->model('dao/amrit_keertan_dao');
            
            $this->load->model('dao/common_dao');
            
            
            if ($shabad_id == 0) {
                
                redirect('amrit-keertan/index/chapter');
                
            }
            
            $lines = $this->amrit_keertan_dao->get_lines_in_shabad($shabad_id);
            
            if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
                
                $keywords = $this->common_dao->get_dictionary_words($lines);
                
            }
            
            
            $form['shabad_name'] = $shabad_name;
            
            $form['shabad_id'] = $shabad_id;
            
            //$form['language']   = $language;
            
            $form['shabad_info'] = $this->amrit_keertan_dao->get_shabad_info($shabad_id);
            

            $form['lines'] = $lines;
            
            $form['keywords'] = $keywords;
            
            $form['highlight_line'] = $line_no;
            
            
            $this->load->view('templates/mob-header');
            $this->load->view('forms/page-by-page/m-shabad-by-mobile', $form);
            
            
        }
        
        function ggs_search_results($index = 0)
        {
            
            $this->load->model('logics/search_logic');
            
            $search_results = $this->session->userdata('search_results');

            
            $this->load->library('pagination');
            $config = array('base_url' => site_url('scriptures/ggs_search_results/'),
                            'total_rows' => $search_results['ggs']['result_count'],
                            'per_page' => '25'
            );
            $this->pagination->initialize($config);
            $results['search_results'] = $this->search_logic->get_results($search_results['ggs']['result_query'], $index, ' order by pageno,pagelineno ');
            $results['search_results_info'] = array("showing_from" => $index + 1,
                                                    "showing_to" => ($index + 25 > $search_results['ggs']['result_count'] ? $search_results['ggs']['result_count'] : $index + 25),
                                                    "total_results" => $search_results['ggs']['result_count']
            );
            $results['pagination_links'] = $this->pagination->create_links();
            
            // load the page
            $page['theme'] = 'theme_2';
            $page['meta_title'] = 'Advanced Search Sri Guru Granth Sahib :- Search Gurbani.com';
            //$page['meta_description'] = '';
            //$page['meta_keywords'] = '';
            $this->load->view('templates/mob-header');
            $this->load->view('forms/ggsm-search-results', $results);
            //$this->load->view('templates/footer');
        }
        
        function ak_search_results($index = 0)
        {
            
            $this->load->model('logics/search_logic');
            
            $search_results = $this->session->userdata('search_results');
            
            $this->load->library('pagination');
            
            $config = array('base_url' => site_url('scriptures/ak_search_results/'),
            
                            'total_rows' => $search_results['ak']['result_count'],
            
                            'per_page' => '25'
            
            );
            
            $this->pagination->initialize($config);
            
            $results['search_results'] = $this->search_logic->get_results($search_results['ak']['result_query'], $index, ' order by pageno,pagelineno ');
            
            $results['search_results_info'] = array("showing_from" => $index + 1,
            
                                                    "showing_to" => ($index + 25 > $search_results['ak']['result_count'] ? $search_results['ak']['result_count'] : $index + 25),
            
                                                    "total_results" => $search_results['ak']['result_count']
            
            );
            
            $results['pagination_links'] = $this->pagination->create_links();
            

            
            $this->load->view('forms/akm-search-results', $results);
            

            
        }
        
        function bgv_search_results($index = 0)
        {
            $this->load->model('logics/search_logic');
            $search_results = $this->session->userdata('search_results');
            $this->load->library('pagination');
            $config = array('base_url' => site_url('scriptures/bgv_search_results/'),
                            'total_rows' => $search_results['bgv']['result_count'],
                            'per_page' => '25'
            );
            $this->pagination->initialize($config);
            $results['search_results'] = $this->search_logic->get_results($search_results['bgv']['result_query'], $index, ' order by vaarno,paurino,pauri_lineno ');
            $results['search_results_info'] = array("showing_from" => $index + 1,
                                                    "showing_to" => ($index + 25 > $search_results['bgv']['result_count'] ? $search_results['bgv']['result_count'] : $index + 25),
                                                    "total_results" => $search_results['bgv']['result_count']
            );
            $results['pagination_links'] = $this->pagination->create_links();

            $this->load->view('templates/mob-header');
            $this->load->view('forms/bgvm-search-results', $results);

        }
        
        function dg_search_results($index = 0)
        {
            
            $this->load->model('logics/search_logic');
            
            $search_results = $this->session->userdata('search_results');

            $this->load->library('pagination');
            $config = array('base_url' => site_url('scriptures/dg_search_results/'),
                            'total_rows' => $search_results['dg']['result_count'],
                            'per_page' => '25'
            );
            $this->pagination->initialize($config);
            $results['search_results'] = $this->search_logic->get_results($search_results['dg']['result_query'], $index, ' order by pageno,pagelineno ');
            $results['search_results_info'] = array("showing_from" => $index + 1,
                                                    "showing_to" => ($index + 25 > $search_results['dg']['result_count'] ? $search_results['dg']['result_count'] : $index + 25),
                                                    "total_results" => $search_results['dg']['result_count']
            );
            $results['pagination_links'] = $this->pagination->create_links();
            

            $this->load->view('templates/mob-header');
            $this->load->view('forms/dgm-search-results', $results);

        }
        
        function ks_search_results($index = 0)
        {
            
            $this->load->model('logics/search_logic');
            
            $search_results = $this->session->userdata('search_results');
            
            
            $this->load->library('pagination');
            $config = array('base_url' => site_url('scriptures/ks_search_results/'),
                            'total_rows' => $search_results['ks']['result_count'],
                            'per_page' => '25'
            );
            $this->pagination->initialize($config);
            $results['search_results'] = $this->search_logic->get_results($search_results['ks']['result_query'], $index, ' order by kabit,k_line ');
            $results['search_results_info'] = array("showing_from" => $index + 1,
                                                    "showing_to" => ($index + 25 > $search_results['ks']['result_count'] ? $search_results['ks']['result_count'] : $index + 25),
                                                    "total_results" => $search_results['ks']['result_count']
            );
            $results['pagination_links'] = $this->pagination->create_links();
            

            $this->load->view('templates/mob-header');
            $this->load->view('forms/ksm-search-results', $results);
        }
        
        function ang($page_no = 1, $d = 'line', $line_no = 'NA')
        {
            global $SG_ScriptureTypes, $SG_Preferences;
            $keywords = array();

            $this->load->model('dao/sri_guru_granth_sahib_dao');
            if ($page_no >= $SG_ScriptureTypes['ggs']['page_from'] and $page_no <= $SG_ScriptureTypes['ggs']['page_to']) {
                $lines = $this->sri_guru_granth_sahib_dao->get_lines($page_no);
            } else {
                $page_no = $SG_ScriptureTypes['ggs']['page_from'];
                $lines = $this->sri_guru_granth_sahib_dao->get_lines($page_no);
            }
            if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
                $keywords = $this->sri_guru_granth_sahib_dao->get_dictionary_words($lines);
            }

            
            $form['scripture'] = 'ggs';
            $form['current_page'] = $page_no;
            $form['lines'] = $lines;
            $form['keywords'] = $keywords;
            $form['highlight_line'] = $line_no;

//            $this->load->view('templates/mob-header');
            $this->load->view('forms/page-by-page/m-guru-granth-sahib-php', $form);

        }
        
        function page($page_no = 65, $d = 'line', $line_no = 'NA')
        {
            
            global $SG_ScriptureTypes, $SG_Preferences;
            
            $keywords = array();
            
            $this->load->model('dao/amrit_keertan_dao');
            
            $this->load->model('dao/common_dao');
            
            if ($page_no >= $SG_ScriptureTypes['ak']['page_from'] and $page_no <= $SG_ScriptureTypes['ak']['page_to']) {
                
                $lines = $this->amrit_keertan_dao->get_lines($page_no);
                
            } else {
                
                $page_no = $SG_ScriptureTypes['ak']['page_from'];
                
                $lines = $this->amrit_keertan_dao->get_lines($page_no);
                
            }
            
            if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
                
                $keywords = $this->common_dao->get_dictionary_words($lines);
                
            }
            
            
            $form['scripture'] = 'ak';
            
            $form['current_page'] = $page_no;
            
            $form['lines'] = $lines;
            
            $form['keywords'] = $keywords;
            
            $form['highlight_line'] = $line_no;
            

//            $this->load->view('templates/mob-header');
            
            $this->load->view('forms/page-by-page/m-amrit-keertan-php', $form);
            

            
        }
        
        function m_shabad($shabad_id = 0, $shabad_name = '', $d = 'line', $line_no = 'NA')
        
        {
            
            global $SG_ScriptureTypes, $SG_Preferences;
            
            $keywords = array();
            
            $this->load->model('dao/amrit_keertan_dao');
            
            $this->load->model('dao/common_dao');
            
            
            if ($shabad_id == 0) {
                
                redirect('scriptures/chapter-index');
                
            }
            
            $lines = $this->amrit_keertan_dao->get_lines_in_shabad($shabad_id);
            
            if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
                
                $keywords = $this->common_dao->get_dictionary_words($lines);
                
            }
            
            
            $form['shabad_name'] = $shabad_name;
            
            $form['shabad_id'] = $shabad_id;
            

            
            $form['shabad_info'] = $this->amrit_keertan_dao->get_shabad_info($shabad_id);
            

            
            $form['lines'] = $lines;
            
            $form['keywords'] = $keywords;
            
            $form['highlight_line'] = $line_no;
            
            
//            $this->load->view('templates/mob-header');
            
            $this->load->view('forms/page-by-page/m-amrit-keertan-by-shabad', $form);
            
            
        }
        
        function ggs_shabad($shabad_id = 0, $line = 0, $lineno = 0)
        {
            global $SG_ScriptureTypes, $SG_Preferences;
            $keywords = array();
            $this->load->model('dao/sri_guru_granth_sahib_dao');
            $this->load->model('dao/common_dao');
            if ($shabad_id == 0 && $lineno == 0) {
                redirect('scriptures/ggs_search_results');
            }
            $lines = $this->sri_guru_granth_sahib_dao->get_lines_in_shabad($shabad_id);
            if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
                $keywords = $this->common_dao->get_dictionary_words($lines);
            }
            $form['lines'] = $lines;
            $form['shabad_info'] = $lines->result();
            $form['lines'] = $lines;
            $form['keywords'] = $keywords;
            $form['highlight_line'] = $lineno;
//            $this->load->view('templates/mob-header');
            $this->load->view('forms/page-by-page/ggsm-shabad', $form);
            
        }
        
        function vaar($vaar_no = 0, $pauri = 'pauri', $pauri_no = 0, $d = 'line', $line_no = 'NA')
        {
            global $SG_ScriptureTypes, $SG_Preferences;
            $keywords = array();
            $this->load->model('dao/bhai_gurdas_vaaran_dao');
            $this->load->model('dao/common_dao');
            $pauri_count = $this->bhai_gurdas_vaaran_dao->get_pauri_count($vaar_no);
            if ($pauri_no > $pauri_count) {
                $pauri_no = 1;
            }
            if ($vaar_no <= 0 or $pauri_no <= 0) {
                $vaar_no = 1;
                $pauri_no = 1;
            }
            $lines = $this->bhai_gurdas_vaaran_dao->get_pauri_lines($vaar_no, $pauri_no);
            if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
                $keywords = $this->common_dao->get_dictionary_words($lines);
            }
            $form['scripture'] = 'bgv';
            $form['current_vaar'] = $vaar_no;
            $form['current_pauri'] = $pauri_no;
            $form['pauri_info'] = $this->bhai_gurdas_vaaran_dao->get_pauri_name($vaar_no, $pauri_no);
            $form['pauri_count'] = $pauri_count;
            $form['lines'] = $lines;
            $form['keywords'] = $keywords;
            $form['highlight_line'] = $line_no;
            
            $this->load->view('forms/page-by-page/m-bhai-gurdas-vaaran-php', $form);
        }
        
        function vaar_index($vaar_no = 1)
        {
            $this->load->model('dao/bhai_gurdas_vaaran_dao');
            if ($vaar_no < 1 or $vaar_no > 40) {
                $vaar_no = 1;
            }
            $form['vaar_no'] = $vaar_no;
            $form['pauries'] = $this->bhai_gurdas_vaaran_dao->get_pauries($vaar_no);
//            $this->load->view('templates/mob-header');
            $this->load->view('forms/index-pages/m-bgv-vaar-index', $form);
        }
        
        function ds_page($page_no = 1, $d = 'line', $line_no = 'NA')
        {
            global $SG_ScriptureTypes, $SG_Preferences;
            $keywords = array();
            
            $this->load->model('dao/dasam_granth_dao');
            $this->load->model('dao/common_dao');
            
            if ($page_no >= $SG_ScriptureTypes['dg']['page_from'] and $page_no <= $SG_ScriptureTypes['dg']['page_to']) {
                $lines = $this->dasam_granth_dao->get_lines($page_no);
            } else {
                $page_no = $SG_ScriptureTypes['dg']['page_from'];
                $lines = $this->dasam_granth_dao->get_lines($page_no);
            }
            if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
                $keywords = $this->common_dao->get_dictionary_words($lines);
            }
            
            $form['scripture'] = 'dg';
            $form['current_page'] = $page_no;
            $form['lines'] = $lines;
            $form['keywords'] = $keywords;
            $form['highlight_line'] = $line_no;
            
//            $this->load->view('templates/mob-header');
            $this->load->view('forms/page-by-page/m-dasam-granth', $form);
            //	$this->load->view('templates/footer');
        }
        
        function kabit($page_no = 1, $d = 'line', $line_no = 'NA')
        {
            global $SG_ScriptureTypes, $SG_Preferences;
            $keywords = array();
            
            $this->load->model('dao/kabit_savaiye_dao');
            $this->load->model('dao/common_dao');
            
            if ($page_no >= $SG_ScriptureTypes['ks']['page_from'] and $page_no <= $SG_ScriptureTypes['ks']['page_to']) {
                $lines = $this->kabit_savaiye_dao->get_lines($page_no);
            } else {
                $page_no = $SG_ScriptureTypes['ks']['page_from'];
                $lines = $this->kabit_savaiye_dao->get_lines($page_no);
            }
            if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
                $keywords = $this->common_dao->get_dictionary_words($lines);
            }
            
            $form['scripture'] = 'ks';
            $form['current_page'] = $page_no;
            $form['lines'] = $lines;
            $form['keywords'] = $keywords;
            $form['highlight_line'] = $line_no;
            
//            $this->load->view('templates/mob-header');
            $this->load->view('forms/page-by-page/m-kabit-savaiye', $form);
            //	$this->load->view('templates/footer');
        }
        
        function sggs($page_no = 1, $d = 'line', $line_no = 'NA')
        {
            global $SG_ScriptureTypes, $SG_Preferences;
            $keywords = array();
            //$this->output->cache(10080);
            $this->load->model('dao/sri_guru_granth_sahib_dao');
            if ($page_no >= $SG_ScriptureTypes['ggs']['page_from'] and $page_no <= $SG_ScriptureTypes['ggs']['page_to']) {
                $lines = $this->sri_guru_granth_sahib_dao->get_lines($page_no);
            } else {
                $page_no = $SG_ScriptureTypes['ggs']['page_from'];
                $lines = $this->sri_guru_granth_sahib_dao->get_lines($page_no);
            }
            if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
                $keywords = $this->sri_guru_granth_sahib_dao->get_dictionary_words($lines);
            }
            //print_r($lines);
            //print_r($keywords);exit;
            
            $form['scripture'] = 'ggs';
            $form['current_page'] = $page_no;
            $form['lines'] = $lines;
            $form['keywords'] = $keywords;
            $form['highlight_line'] = $line_no;
            
//            $this->load->view('templates/mob-header');
            $this->load->view('forms/page-by-page/sggs-ang', $form);
        }
        
        function setting()
        {
            $this->load->view('forms/setting-form');
        }
        
        function reset_defaults()
        {
            global $SG_Preferences;
            
            $warning = '';
            
            delete_cookie("csstypeG");
            delete_cookie("PhonEnglish");
            delete_cookie("HinTrans");
            delete_cookie("EngTrans");
            delete_cookie("allow_share_lines");
            delete_cookie("show_attributes");
            
            /*language*/
            setcookie("lang_1", 'yes', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            setcookie("lang_2", 'yes', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            setcookie("lang_3", 'yes', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            
            
            /*Fonts*/
            setcookie("csstypeG", 'RaajaaMediumMedium', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            setcookie("PhonEnglish", 'arial', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            setcookie("HinTrans", 'JaipurRegular', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            setcookie("EngTrans", 'arial', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            
            /*Share Icon N attr*/
            setcookie("allow_share_lines", 'no', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            setcookie("show_attributes", 'no', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            
            $this->session->set_flashdata('referer', $this->input->post('referer'));
            $this->session->set_flashdata('response', '<div class="success">Preferences are reset. ' . $warning . '</div>');
            
            redirect('scriptures/setting/');
            
            exit();
            
        }
        
        function save()
        {
            global $SG_Preferences;
         
            $warning = "";
            if ($this->input->post('allow_share_lines')) {
                delete_cookie("allow_share_lines");
                setcookie("allow_share_lines", $this->input->post('allow_share_lines'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            }
            if ($this->input->post('show_attributes')) {
                delete_cookie("show_attributes");
                setcookie("show_attributes", $this->input->post('show_attributes'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            }
            if ($this->input->post('lang_1') != "yes") {
                setcookie("lang_1", 'yes', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
                $warning = "Atleast Gurmuki should be selected";
                
            }
            if ($this->input->post('lang_1') == "yes") {
                delete_cookie("lang_1");
                setcookie("lang_1", 'yes', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            }
            if ($this->input->post('lang_2') == "yes") {
                delete_cookie("lang_2");
                setcookie("lang_2", 'yes', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            } else {
                delete_cookie("lang_2");
                setcookie("lang_2", 'no', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            }
            if ($this->input->post('lang_3') == "yes") {
                delete_cookie("lang_3");
                setcookie("lang_3", 'yes', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            } else {
                delete_cookie("lang_3");
                setcookie("lang_3", 'no', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            }
            if ($this->input->post('lang_4') == "yes") {
                delete_cookie("lang_4");
                setcookie("lang_4", 'yes', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            } else {
                delete_cookie("lang_4");
                setcookie("lang_4", 'no', time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
            }
            
            
            //print_r($_POST);die;
            
            if ($this->input->post('language')) {
                delete_cookie("csstypeG");
                //set_cookie('csstypeG',$this->input->post('language'),7*24*60*60,"/");
                setcookie("csstypeG", $this->input->post('language'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
                //setcookie("csstypeG",$this->input->post('language'),time()+(7*24*60*60),"/",".ci2.searchgurbani.com", 0, true);
            }
            
            if ($this->input->post('PhonEnglish')) {
                delete_cookie("PhonEnglish");
                setcookie("PhonEnglish", $this->input->post('PhonEnglish'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
                
            }
            if ($this->input->post('HinTrans')) {
                delete_cookie("HinTrans");
                setcookie("HinTrans", $this->input->post('HinTrans'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
                
            }
            
            if ($this->input->post('EngTrans')) {
                delete_cookie("EngTrans");
                setcookie("EngTrans", $this->input->post('EngTrans'), time() + (7 * 24 * 60 * 60), "/", $_SERVER['SERVER_NAME'], 0, true);
                
            }
            
            
            $this->session->set_flashdata('referer', $this->input->post('referer'));
            $this->session->set_flashdata('response', '<div class="success">Preferences are updated. ' . $warning . '</div>');
            
            redirect('scriptures/setting/');
            
            exit();
            
        }
        
        
    }