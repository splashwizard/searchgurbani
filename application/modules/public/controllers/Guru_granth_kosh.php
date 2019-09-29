<?php

class Guru_granth_kosh extends My_Controller
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
        $page['inner_view'] = array('book_name' => 'Sri Guru Granth Kosh', 'book_controller' => 'guru-granth-kosh', 'ac_source' => 'GK01');
        // load the page
        $page['theme'] = 'theme_2';
        $page['meta_title'] = 'Guru Granth Kosh-Dr Gurcharan Singh-:-ਗੁਰੂ ਗਰੰਥ ਕੋਸ਼
-:- SearchGurbani.com';
        $page['meta_description'] = 'Sri Guru Granth Kosh by Dr Gurcharan Singh is a dictionary of Sikh Scriptures and books on Sikh Religion. ';
        $page['meta_keywords'] = 'Sri Guru ,Granth ,Kosh ';
        $page['book_name'] = 'Sri Guru Granth Kosh';
        $page['book_controller'] = 'guru-granth-kosh';
        $page['ac_source'] = 'GK01';
        
        $this->load->view('pages/guru-granth-kosh', $page);
    }

    function do_search($keyword = '', $alpha = '')
    {
        if ($keyword != '') {
            $keyword = $keyword;
        } elseif ($this->input->post('keyword') != '') {
            $keyword = $this->input->post('keyword');
        } else {
            redirect('guru-granth-kosh');
            exit;
        }
        $keyword = urldecode($keyword);
        $this->session->set_userdata('guru_granth_kosh_keyword', $keyword);
        $this->session->set_userdata('guru_granth_kosh_alpha', $alpha);

        redirect('guru-granth-kosh/view');
    }

    function view($index = 0 , $d = 'NA')
    {
        $keyword = $this->session->userdata('guru_granth_kosh_keyword');
        $alpha = $this->session->userdata('guru_granth_kosh_alpha');

        $this->load->library('pagination');
        
        $page['lines_count'] = $this->resources_dao->get_kosh_lines_count($keyword, 'GK01', $alpha);
    
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
    
        $page['lines'] = $this->resources_dao->get_kosh_lines($keyword, 'GK01', $index, $alpha);
        $page['keyword'] = $this->session->userdata('guru_granth_kosh_keyword');
    
    
        // load the page
        $page['theme'] = 'theme_2';
        $page['base_url'] = 'guru-granth-kosh/view';
        $page['meta_title'] = 'Guru Granth Kosh-Index ' . $keyword . '-:ਗੁਰੂ ਗਰੰਥ ਕੋਸ਼
:- SearchGurbani.com';
        $page['meta_description'] = 'Sri Guru Granth Kosh by Dr Gurcharan Singh is a dictionary of Sikh Scriptures and books on Sikh Religion. ';
        $page['meta_keywords'] = 'Sri Guru ,Granth ,Kosh ';
	    
        if($d == 'ajax'){


            echo json_encode([
                'content' => $this->load->viewPartial('forms/search-results/guru-granth-kosh', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => null,
            ]);

        }else{
	        $this->load->view('forms/search-results/guru-granth-kosh', $page);
	
        }
    }


}