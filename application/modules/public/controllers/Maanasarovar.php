<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maanasarovar extends My_Controller
{
    function __construct()
    {
        parent::Controller();
        $this->load->model('dao/resources_dao');
        $this->load->library('pagination');
    }

    function index()
    {
        $page['inner_view'] = array('book_name' => 'Maanasarovar', 'book_controller' => 'Maanasarovar');
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Maanasarovar :- SearchGurbani.com';
        $page['meta_description'] = 'Maanasarovar';
        $page['meta_keywords'] = 'Maanasarovar';
        
        $this->load->view('pages/maanasarovar', $page);
    }

    function do_search($keyword = '', $alpha = '')
    {
        if ($keyword != '') {
            $keyword = $keyword;
        } elseif ($this->input->post('keyword') != '') {
            $keyword = $this->input->post('keyword');
        } else {
            redirect('Maanasarovar');
            exit;
        }

        $this->session->set_userdata('maan_keyword', $keyword);
        $this->session->set_userdata('maan_alpha', $alpha);

        redirect('Maanasarovar/words');
    }

    function words($index = 0)
    {
        $keyword = $this->session->userdata('maan_keyword');
        $alpha = $this->session->userdata('maan_alpha');

        $page['keyword'] = $keyword;
        $page['words'] = $this->resources_dao->get_maan_words($keyword, $index, $alpha);
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Maanasarovar :- SearchGurbani.com';
        $page['meta_description'] = 'Maanasarovar';
        $page['meta_keywords'] = 'Maanasarovar';
        
        $this->load->view('forms/index-pages/maanasarovar-words', $page);
    }


    function quotations($word = '', $index = '')
    {
        $page['word'] = $word;
        $page['quotations'] = $this->resources_dao->get_maan_quotations($word);

        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Maanasarovar :- SearchGurbani.com';
        $page['meta_description'] = 'Maanasarovar';
        $page['meta_keywords'] = 'Maanasarovar';
        $this->load->view('forms/index-pages/maanasarovar-quotations', $page);
    }

}