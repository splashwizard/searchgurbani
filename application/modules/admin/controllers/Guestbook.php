<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guestbook extends My_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_gb');
        $this->load->library('Reportlibrary');
        $this->load->helper('language');
        $this->load->library('form_validation');
    }

      function index(){

          $this->load->model('Mdl_gb');
          $data['source'] = site_url('admin/guestbook/listGuestbook_Json');
          $data['listing_headers'] = 'guestbook_listing_headers';
          $data['template_title'] = 'guestbook';

          $dataArray = $this->_table_listing($data);

          $this->load->view('guestbook/index', $dataArray);
      }

    public function listGuestbook_Json()
    {
        $this->load->model('Mdl_gb');
        $cols = array_keys(lang('guestbook_listing_headers'));
        $pagingParams = $this->reportlibrary->getPagingParams($cols);

        $this->Mdl_gb->tbl_name = 'GB';
        $this->Mdl_gb->select_db_cols = 'id, name, email, message, status, created, updated';
        $this->Mdl_gb->list_search_key = 'name';
        $resultdata = $this->Mdl_gb->get_all_gb_datatable($pagingParams);

        $tableResponse = $this->reportlibrary->makeReportColumns($resultdata, 'guestbook_listing_headers');

        $this->load->setTemplate('json');
        $this->load->view('json', $tableResponse);
    }

    function edit($id = 0)
    {
        if ($this->form_validation->run("guestbook_admin") == FALSE){
            $comment = $this->Mdl_gb->get_guestbook_comments(array("id" => $id));
            $data['gb'] = $comment[0];

            $this->load->view('guestbook/edit', $data);
        }else{
            $where = array("id" => $id);
            $data = array("name" => $this->input->post('name'),
                "message" => $this->input->post('message'),
            );
            $this->Mdl_gb->comments_update($data, $where);
            redirect('admin/guestbook');
        }

    }

    function update()
    {
        $where = array("id" => $this->input->post('id'));
        $data = array("name" => $this->input->post('name'),
            "emailid" => $this->input->post('emailid'),
            "message" => $this->input->post('message'),
            "status" => $this->input->post('status')
        );
        $this->common_dao->comments_update($data, $where);

        $this->session->set_flashdata('response', '<div class="success">Comment updated</div>');

        redirect('admin/guestbook');
    }

    function disable()
    {
        $this->load->model('Mdl_gb');

        $id= $this->input->get('id');
        $where = array("id" => $id);
        $data = array("status" => 1);
        $rs = $this->Mdl_gb->comments_update($data, $where);

        echo true;
    }

    function enable()
    {
        $id= $this->input->get('id');
        $where = array("id" => $id);
        $data = array("status" => 0);
        $rs = $this->Mdl_gb->comments_update($data, $where);

        echo true;
    }

}