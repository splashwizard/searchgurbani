<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hukumnama extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('dao/hukumnama_dao');
    }

    function index()
    {
        $page['hukumnama_titles'] = $this->hukumnama_dao->get_hukumnama_titles();
        
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Hukumnama :- SearchGurbani.com';

        $this->load->view('forms/index-pages/hukumnama-chapter-index', $page);
    }

    function ang($ang = 0, $type = 'pageno')
    {

        $page['hukumnama_info'] = $this->hukumnama_dao->get_hukumnama_titles($ang, $type);
        $page['lines'] = $this->hukumnama_dao->get_lines($ang, $type);

        if ($page['hukumnama_info'] != false) {
            $page['hukumnama_info'] = $page['hukumnama_info']->result();
            $page['hukumnama_info'] = $page['hukumnama_info'][0];
        }

        if ($type == 'pageno') {
            $pageno = str_replace(".", "_", $ang);
            $pageno = explode("_", $ang);
            $page['pageno'] = $pageno[0];
        } else {
            $pageno = str_replace(".", "_", $page['hukumnama_info']->pageno);
            $pageno = explode("_", $page['hukumnama_info']->pageno);
            $page['pageno'] = $pageno[0];
        }

        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Hukumnama -: Ang ' . $page['pageno'] . ' :- SearchGurbani.com';

        $this->load->view('forms/page-by-page/hukumnama-paras', $page);
    }

    function cyber()
    {
        $this->ang(rand(1, 468), 'id');
    }
}