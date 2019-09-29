<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends My_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth/Mdl_admins');
    }
    
    public function Index()
    {
        $data = [];
        $this->load->view('dashboard', $data);
    }
    
    public function change_password()
    {
        $admin_id = $this->session->userdata('admin_user_auth')['id'];
        $params = ['id' => $admin_id];
        $admins_det = $this->Mdl_admins->get_admin_det($params);
        $new_password = $this->input->post('new_psw');
        $old_password = $this->input->post('old_psw');
        $this->form_validation->set_rules('old_psw', 'Old Password', 'required|max_length[255]');
        $this->form_validation->set_rules('new_psw', 'New Password', 'required|max_length[255]');
        $this->form_validation->set_rules('re_enter_password', 'Re-enter Password', "required|max_length[255]|check_password[{$new_password}]");
        $this->form_validation->set_message('check_password', 'New Password and Re-Enter Password Not equal');
        if ($this->form_validation->run()) {
            if ($admins_det['password'] == password_decrypt($old_password, $admins_det['password'])) {
                $param = [
                    'password' => password_encrypt($new_password),
                    'updated_at' => date("Y-m-d H:i:s"),
                ];
                $response = $this->Mdl_admins->update_password($admin_id, $param);
                if ($response == true) {
                    redirect(base_url('admin'));
                }
            }
            $data['old_password_check'] = 'Old Password Incorrect';
            $this->load->view('change-password', $data);
        } else {
            $validation_errors = validation_errors();
            if (!empty($validation_errors)) {
                $data['validation_errors'] = $validation_errors;
            }
            $this->load->view('change-password');
        }
    }
}