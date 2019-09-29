<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: surajgupta
 * Date: 23/2/16
 * Time: 1:21 PM
 */
class Index extends My_Controller
{

    public $autoload = array(
        'model' => array('auth/Mdl_admins', 'auth/Mdl_employees'),
        'libraries' => array('form_validation', 'email'),
    );

    public function admin_login()
    {
        $this->form_validation->set_rules('uemail', 'Username', 'required|max_length[255]');
        $this->form_validation->set_rules('upass', 'Password', 'required');

        if ($this->form_validation->run()) {

            $data = array(
                'uemail' => $this->input->post('uemail'),
                'upass' => $this->input->post('upass'),
            );

            $login_det = $this->Mdl_admins->get_user_by_username($data['uemail']);

            if (($data['uemail'] == $login_det['username']) && ($login_det['password'] == password_decrypt($data['upass'], $login_det['password']))) {

                $this->session->set_userdata('admin_user_auth', array(
                    'connected' => true,
                    'id' => $login_det['id'],
                    'role' => 'administrator'
                ));

                redirect(base_url('admin'));

            } else {

                $this->session->set_flashdata('flash_err', 'Error, Please provide valid login credential.');
                redirect(base_url('admin/login'));

            }
        } else {

            $validation_errors = validation_errors();
            if (!empty($validation_errors)) {
                $this->session->set_flashdata('flash_err', $validation_errors);
            }

            $data['flash_msg'] = $this->session->flashdata('flash_err');
            $data['login_header'] = 'Admin Login';
            $this->load->setTemplate('login');
            $this->load->view('login/login', $data);
        }
    }

    /*public function employee_login()
    {
        $this->form_validation->set_rules('uemail', 'Username', 'required|max_length[255]');
        $this->form_validation->set_rules('upass', 'Password', 'required');

        if ($this->form_validation->run()) {

            $data = array(
                'uemail' => $this->input->post('uemail'),
                'upass' => $this->input->post('upass'),
            );

            $check_admin_db = $this->Mdl_employees->get_employee_by(array('name' => $data['uemail']));

            if ((in_array($check_admin_db['role'], array('manager', 'retailer'))) && ($data['uemail'] == $check_admin_db['email']) && ($check_admin_db['password'] == password_decrypt($data['upass'], $check_admin_db['password']))) {

                $this->session->set_userdata('admin_user_auth', array(
                    'connected' => true,
                    'id' => $check_admin_db['employee_id'],
                    'name' => $check_admin_db['name'],
                    'email' => $check_admin_db['email'],
                    'role' => $check_admin_db['role'],
                    'image' => $check_admin_db['image'],
                ));

                if ($this->input->get('redirect_to')) {
                    redirect($this->input->get('redirect_to'));
                } else {
                    redirect(base_url('employee'));
                }

            } else {

                $this->session->set_flashdata('flash_err', 'Error, Please provide valid login credential.');
                redirect(base_url('employee/login'));

            }
        } else {

            $validation_errors = validation_errors();
            if (!empty($validation_errors)) {
                $this->session->set_flashdata('flash_err', $validation_errors);
            }

            $data['flash_msg'] = $this->session->flashdata('flash_err');
            $data['login_header'] = 'Employee Login';
            $this->load->setTemplate('login');
            $this->load->view('blank', $data);
        }
    }*/

    public function forgot_password()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|max_length[255]|valid_email');
        if ($this->form_validation->run()) {

            $email = $this->input->post('email');
            $token = password_encrypt($email);

            $params = ['email' => $email];

            $admin_detail = $this->Mdl_admins->get_admin_det($params);

            if (!empty($admin_detail)) {

                $url = base_url('admin/forgot-password-email') . "?token=" . $token . "&email=" . $email;

                $message = '
                        <p>Dear ' . $admin_detail['name'] . ',</p>
                        <table border="0" cellspacing="0" cellpadding="3">
                          <tr>
                            <td align="left" valign="top">
                                We have received a password reset request from you. You may click on the link below and reset the password on your own.
                            </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Your password reset link is : <a href="' . $url . '">Reset Password</a></td>
                          </tr>
                        </table>
                        <p>Regards,<br>Searchgurbani.com <br><br>This Is An Auto Generated Notification Email. Please Do Not Respond To This.
                        </p>
			        ';
                $config = Array(
                    'mailtype' => 'html', // html/text
                    'newline' => '\r\n',
                    'wordwrap' => TRUE
                );

                $to = $admin_detail['email'];

                $this->email->initialize($config);
                $this->email->from($to);
                $this->email->to($email);
                $this->email->subject('Forgot Password');
                $this->email->message($message);
                $this->email->send();

                $data['login_header'] = 'Email sent successfully';
                $this->load->setTemplate('login');
                $this->load->view('login/success', $data);

            } else {
                $this->session->set_flashdata('flash_err', 'Error, Your email is incorrect.');
                redirect(base_url('admin/forgot-password'));
            }


        } else {

            $validation_errors = validation_errors();
            if (!empty($validation_errors)) {
                $data['validation_errors'] = $validation_errors;
            }

            $data['login_header'] = 'Forgot Password';
            $data['flash_msg'] = $this->session->flashdata('flash_err');
            $this->load->setTemplate('login');
            $this->load->view('login/forgot-password', $data);
        }


    }

    public function forgot_password_email()
    {

        $new_password = $this->input->post('new_psw');

        $this->form_validation->set_rules('new_psw', 'New Password', 'required|max_length[255]');
        $this->form_validation->set_rules('re_enter_psw', 'Re-enter Password', "required|max_length[255]|check_password[{$new_password}]");
        $this->form_validation->set_message('check_password', 'New Password and Re-Enter Password Not equal');

        $token = $this->input->get('token');

        $email = $this->input->get('email');

        if ($this->form_validation->run()) {



            if(!empty($token)){
                $params = ['email' => $email];
                $admin_detail = $this->Mdl_admins->get_admin_det($params);

                if($token == password_decrypt($email,$token)){
                    $param = [
                        'password' => password_encrypt($new_password),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ];

                    $response = $this->Mdl_admins->update_password($admin_detail['id'], $param);

                    if($response == true ){
                        redirect(base_url('admin/login'));
                    }

                }else{
                    $this->session->set_flashdata('flash_err', 'Error, Your Email is not registered in our database.');
                    redirect(base_url('admin/login'));
                }
            }
        } else {
            $validation_errors = validation_errors();

            if($token == password_decrypt($email,$token)){

                if (!empty($validation_errors)) {
                    $data['validation_errors'] = $validation_errors;
                }
                $data['flash_msg'] = $this->session->flashdata('flash_err');
                $data['login_header'] = 'Forgot Password';
                $this->load->setTemplate('login');
                $this->load->view('login/forgot-password-email', $data);
            }else{
                $this->session->set_flashdata('flash_err', 'Error, Your Email is not registered in our database.');
                redirect(base_url('admin/login'));
            }

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/login'));
    }
}