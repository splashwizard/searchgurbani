<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maansarovar extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('dao/resources_dao');
        $this->load->library('pagination');
    }

    function index()
    {
        $page['inner_view'] = array('book_name' => 'Maansarovar', 'book_controller' => 'maansarovar', 'ac_source' => 'B-MAAN');
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Maansarovar :- SearchGurbani.com';
        $page['meta_description'] = 'Maansarovar';
        $page['meta_keywords'] = 'Maansarovar';
        $page['book_name'] = 'Maansarovar';
        $page['book_controller'] = 'maansarovar';
        $page['ac_source'] = 'B-MAAN';
        
        $this->load->view('pages/maansarovar', $page);
    }

    function do_search($keyword = '', $alpha = '')
    {
        if ($keyword != '') {
            $keyword = $keyword;
        } elseif ($this->input->post('keyword') != '') {
            $keyword = $this->input->post('keyword');
        } else {
            redirect('maansarovar');
            exit;
        }
        $keyword = str_replace("_", " ", $keyword);
        $keyword = urldecode($keyword);
        $this->session->set_userdata('maan_keyword', $keyword);
        $this->session->set_userdata('maan_alpha', $alpha);

        redirect('maansarovar/words');
    }

    function words($index = 0)
    {
        $keyword = $this->session->userdata('maan_keyword');
        $alpha = $this->session->userdata('maan_alpha');

        $page['keyword'] = $keyword;
        $page['words'] = $this->resources_dao->get_maan_words($keyword, $index, $alpha);
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Maansarovar :- SearchGurbani.com';
        $page['meta_description'] = 'Maansarovar';
        $page['meta_keywords'] = 'Maansarovar';

        $this->load->view('forms/index-pages/maansarovar-words', $page);

    }


    function quotations($word = '', $index = '')
    {
        $word = str_replace("_", " ", $word);
        $word = urldecode($word);

        $page['word'] = $word;
        $page['quotations'] = $this->resources_dao->get_maan_quotations($word);
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Maansarovar :- SearchGurbani.com';
        $page['meta_description'] = 'Maansarovar';
        $page['meta_keywords'] = 'Maansarovar';

        $this->load->view('forms/index-pages/maansarovar-quotations', $page);

    }

}