<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends My_Controller
{

    function  __construct()
    {
        parent::__construct();
    }

    /**
     * Get the list of matching words for the given keyword
     * for Megasearch / Individual search
     */
    function get_words()
    {

       // $this->load->model('dao/common_dao');

        $search = array();
        $q = $this->input->get('q');
        $search['keyword'] = trim($q, "'");
        if(empty($search['keyword'])) {
            die();
        }
        //$search['source'] = $this->input->get('source');
        $search['searchtype'] = $this->input->get('searchtype');
        $search['language'] = $this->input->get('language');
        $search['author'] = $this->input->get('author');
        $search['raag'] = $this->input->get('raag');
        $search['page_from'] = $this->input->get('page_from');
        $search['page_to'] = $this->input->get('page_to');
        $search['scripture'] = $this->input->get('scripture');
        $search['individual_search'] = $this->input->get('individual_search');
        $bnlSelect = $this->input->get('bnlSelect');
        $search['bnlSelect'] = str_replace("_"," ",$bnlSelect);

        $this->load->model('search/Mdl_search');

        $results = $this->Mdl_search->get_words($search);

        if ($results != false) {
            echo json_encode($results->result());
        } else {
        }
        die();
    }

    function get_allwords(){


        $search = array();
        $q = $this->input->get('q');
        $search['keyword'] = trim($q, "'");
        if(empty($search['keyword'])) {
            die();
        }
        //$search['source'] = $this->input->get('source');
        $search['searchtype'] = $this->input->get('searchtype');
        $search['language'] = $this->input->get('language');
        $search['ggs'] = $this->input->get('ggs');
        $search['ak'] = $this->input->get('ak');
        $search['bgv'] = $this->input->get('bgv');
        $search['dg'] = $this->input->get('dg');
        $search['ks'] = $this->input->get('ks');
        $search['bnl'] = $this->input->get('bnl');
        $search['individual_search'] = $this->input->get('individual_search');


        $this->load->model('search/Mdl_search');
        $results = $this->Mdl_search->get_allwords($search);

        if ($results != false) {
            echo json_encode($results->result());
        } else {
        }
        die();
    }

    function get_resources_words(){
        $search = array();
        $q = $this->input->get('q');
        $search['keyword'] = trim($q, "'");
        if(empty($search['keyword'])) {
            die();
        }
        $search['table_name'] = $this->input->get('table_name');
        $this->load->model('search/Mdl_search');
        $results = $this->Mdl_search->get_resources_allwords($search);

        if ($results != false) {
            echo json_encode($results->result());
        } else {
        }
        die();
    }
}