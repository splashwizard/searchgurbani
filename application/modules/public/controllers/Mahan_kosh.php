<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mahan_kosh extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('logics/book_search');
        $this->load->model('dao/resources_dao');
        $this->load->library('pagination');
    }

    function index()
    {
        $page['inner_view'] = array('book_name' => 'GurShabad Ratanakar Mahankosh', 'book_controller' => 'mahan-kosh', 'ac_source' => 'MK01');
        // load the page
        $page['theme'] = 'theme_1';
        $page['meta_title'] = 'Gur Shabad Ratanakar Mahankosh by Kahan Singh Nabha:
:- SearchGurbani.com';
        $page['meta_description'] = 'Gur Shabad Ratanakar Mahankosh by Kahan Singh Nabha, popularly known as Mahankosh is a not only the first dictionary of Sikh Scripture and books on Sikh Religion ';
        $page['meta_keywords'] = 'Sri Guru ,Granth ,Kosh , Mahan Kosh, Kahan Singh, Nabha';
        $page['book_name']='GurShabad Ratanakar Mahankosh';
        $page['book_controller']='mahan-kosh';
        $page['ac_source']='MK01';
        
        $this->load->view('pages/mahan-kosh', $page);
    }

    function do_search($keyword = '', $alpha = '')
    {
        if ($keyword != '') {
            $keyword = $keyword;
        } elseif ($this->input->post('keyword') != '') {
            $keyword = $this->input->post('keyword');
        } else {
            redirect('mahan-kosh');
            exit;
        }
        $keyword = urldecode($keyword);

        $this->session->set_userdata('mahan_kosh_keyword', $keyword);
        $this->session->set_userdata('mahan_kosh_alpha', $alpha);

        redirect('mahan-kosh/view');
    }

    function view($index = 0 , $d = 'NA')
    {
        $keyword = $this->session->userdata('mahan_kosh_keyword');
        $alpha = $this->session->userdata('mahan_kosh_alpha');

        $this->load->library('pagination');

        $page['lines_count'] = $this->resources_dao->get_kosh_lines_count($keyword, 'MK01', $alpha);

        $config = array('base_url' => '',
            'total_rows' => $page['lines_count'],
            'full_tag_open' =>'<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'first_tag_open' => '<li>',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a href="javascript:void(0);">',
            'cur_tag_close' => '</a></li>',
            'per_page' => '25',
            'anchor_open'	=> '<a href="javascript:loadPage(',
            'anchor_close'	=> ');">'
        );
        $this->pagination->initialize($config);
    
        $page['search_results_info'] = array("showing_from" => $index + 1,
                                             "showing_to" => ($index + 25 > $page['lines_count'] ? $page['lines_count'] : $index + 25),
                                             "total_results" => $page['lines_count']
        );
        $page['pagination_links'] = $this->pagination->create_links();
    
        $page['lines'] = $this->resources_dao->get_kosh_lines($keyword, 'MK01', $index, $alpha);
        $page['keyword'] = $this->session->userdata('mahan_kosh_keyword');
        
        // load the page
        $page['theme'] = 'theme_1';
        $page['meta_title'] = 'GurShabad Ratanakar Mahankosh Index: ' . $keyword . '
:- SearchGurbani.com';
        $page['meta_description'] = 'Gur Shabad Ratanakar Mahankosh by Kahan Singh Nabha, popularly known as Mahankosh is a not only the first dictionary of Sikh Scripture and books on Sikh Religion ';
        $page['meta_keywords'] = 'Sri Guru ,Granth ,Kosh , Mahan Kosh, Kahan Singh, Nabha';
        $page['base_url'] = 'mahan-kosh/view';
        if (get_last_segment() == "pdf_view") {

            
            $html = $this->load->view('forms/search-results/mahan-kosh', $page, true);
            
            $this->load->plugin('to_pdf');

            pdf_create($html, 'SearchGurbani');

            exit;
        }
        if($d == 'ajax'){
            echo json_encode([
                'content' => $this->load->viewPartial('forms/search-results/mahan-kosh', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);
        }else{
	        $this->load->view('forms/search-results/mahan-kosh', $page);
        }
    }


}