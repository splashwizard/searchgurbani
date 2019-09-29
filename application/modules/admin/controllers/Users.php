<?php defined('BASEPATH') OR exit('No direct script access allowed');

use DrewM\MailChimp\MailChimp;

class Users extends My_Controller
{
    private   $MailChimp;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_users');
        $this->load->library('Reportlibrary');
        $this->load->helper('language');
        $this->load->library('form_validation');

        $this->MailChimp = new MailChimp($this->config->item('MailChimp'));
        $this->MailChimp_list = $this->config->item('MailChimp_list');
    }

    function index()
    {

        $data['source'] = site_url('admin/users/listUsers_Json');
        $data['listing_headers'] = 'users_listing_headers';
        $data['template_title'] = 'Admins';

        $dataArray = $this->_table_listing($data);

        $this->load->view('users/index', $dataArray);
    }

    function news_letter_subscribe_view()
    {

        $this->load->view('users/user-news-letter-subscribe');

    }

    function news_letter_subscribe()
    {

        $this->load->view('users/user-news-letter-subscribe');

        $user_data = $this->Mdl_users->get_all_users();

        if (!empty($user_data)) {

            foreach ($user_data as $data) {

                $email = $data['email'];

                if (!empty($data['email'])) {
                    $newsLetterSubStatus = $this->MailChimp->post("lists/{$this->MailChimp_list}/members", [
                        'email_address' => $data['email'],
                        'status' => 'subscribed',
                    ]);


                    if (isset($newsLetterSubStatus['status'])) {
                        if ($newsLetterSubStatus['status'] == '400' ||
                            $newsLetterSubStatus['status'] == 'subscribed'
                        ) {
                            $db_data['newsletterSubscribed'] = 1;
                        }
                    }
                    $user_response = $this->Mdl_users->update_user($db_data, $email);

                }
            }

            if ($user_response==true){
                $this->session->set_flashdata('flash_msg', 'All Users subscribed to our newsletter service.');
            }

        }

        $data['flash_message'] = $this->session->flashdata('flash_msg');

        $this->load->view('users/user-news-letter-subscribe',$data);

    }

    public function listUsers_Json()
    {
        $cols = array_keys(lang('users_listing_headers'));
        $pagingParams = $this->reportlibrary->getPagingParams($cols);

        $this->Mdl_users->tbl_name = 'USERS';
        $this->Mdl_users->select_db_cols = 'id, identifier, email, photoURL, displayName, firstName, lastName, gender, email, emailVerified ,newsletterSubscribed ,created, modified';
        $this->Mdl_users->list_search_key = 'name';
        $resultdata = $this->Mdl_users->get_all_users_datatable($pagingParams);

        $tableResponse = $this->reportlibrary->makeReportColumns($resultdata, 'users_listing_headers');

        $this->load->setTemplate('json');
        $this->load->view('json', $tableResponse);
    }
}