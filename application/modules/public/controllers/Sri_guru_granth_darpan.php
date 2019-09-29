<?php

class Sri_guru_granth_darpan extends My_Controller
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
        $page['inner_view'] = array('book_name' => 'Sri Guru Granth Darpan', 'book_controller' => 'sri-guru-granth-darpan');
        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Sri Guru Granth Darpan : ਸ੍ਰੀ ਗੁਰੂ ਗਰੰਥ ਦਰ੍ਪਣ:Prof Sahib Singh:- SearchGurbani.com';
        $page['meta_description'] = 'Siri Guru Granth Darpan by Professor Sahib Singh Gurmukhi text to Punjabi (Gurmukhi) translation of all of Siri Guru Granth Sahib. ';
        $page['meta_keywords'] = 'Guru Granth Darpan,Guru Granth, sahib, Singh, exegesis';
        $page['book_name'] = 'Sri Guru Granth Darpan';
        $page['book_controller'] = 'sri-guru-granth-darpan';
        
        $this->load->view('pages/sri-guru-granth-darpan', $page);
    }

    function volumes()
    {
        $page['volumes'] = $this->resources_dao->get_volumes(4);
        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Sri Guru Granth Darpan : Prof Sahib Singh:- SearchGurbani.com';
        $page['meta_description'] = 'Siri Guru Granth Darpan by Professor Sahib Singh Gurmukhi text to Punjabi (Gurmukhi) translation of all of Siri Guru Granth Sahib. ';
        $page['meta_keywords'] = 'Guru Granth Darpan,Guru Granth, sahib, Singh, exegesis';
        
        $this->load->view('forms/index-pages/sri-guru-granth-darpan-volume-index', $page);
    }

    function chapters($volume_id = 0, $volume_name = '')
    {
        $page['chapters'] = $this->resources_dao->get_chapters(4, $volume_id);
        $page['volume_id'] = $volume_id;
        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Sri Guru Granth Darpan : ਸ੍ਰੀ ਗੁਰੂ ਗਰੰਥ ਦਰ੍ਪਣ:Prof Sahib Singh:- SearchGurbani.com';
        $page['meta_description'] = 'Siri Guru Granth Darpan by Professor Sahib Singh Gurmukhi text to Punjabi (Gurmukhi) translation of all of Siri Guru Granth Sahib. ';
        $page['meta_keywords'] = 'Guru Granth Darpan,Guru Granth, sahib, Singh, exegesis';
        
        $this->load->view('forms/index-pages/sri-guru-granth-darpan-chapter-index', $page);
    }

    function page($page_no = 1, $label1 = 'volume', $volume_id = 0)
    {
        $page['lines_count'] = $this->resources_dao->get_lines_count(4, $volume_id, $page_no, 'B-GGD');
    
        if ($page_no >= 1 and $page_no <= $page['lines_count']) {
            $lines = $this->resources_dao->get_lines(4, $volume_id, $page_no, 'B-GGD');
        } else {
            $page_no = 1;
            $lines = $this->resources_dao->get_lines(4, $volume_id, $page_no, 'B-GGD');
        }
        $page['highlight'] = (get_last_segment() == 'highlight' ? true : false);
        $page['page_no'] = $page_no;
        $page['volume_id'] = $volume_id;
        $page['lines'] = $lines;
	    $page['base_url'] = 'sri-guru-granth-darpan/page';
        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Sri Guru Granth Darpan Page : ' . $page_no . ' : ਸ੍ਰੀ ਗੁਰੂ ਗਰੰਥ ਦਰ੍ਪਣ:- SearchGurbani.com';
        $page['meta_description'] = 'Sri Guru Granth Darpan by Professor Sahib Singh Gurmukhi text to Punjabi (Gurmukhi) translation of all of Siri Guru Granth Sahib. ';
        $page['meta_keywords'] = 'Guru Granth Darpan,Guru Granth, sahib, Singh, exegesis';

        if($label1 == 'ajax'){
	
            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/sri-guru-granth-darpan', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);
        }else{
	
	        $this->load->view('forms/page-by-page/sri-guru-granth-darpan', $page);
        }
	
    }


    function do_search()
    {
        $keyword = $this->input->post('keyword');
        $data = array('book_4_keyword' => $keyword);
        $this->session->set_userdata($data);
        redirect('sri-guru-granth-darpan/search-preview');
    }

    function search_preview($index = 0 , $d ='NA')
    {
        $data = $this->session->userdata('book_4_keyword');
        
        $page['occurrences_count'] = $this->book_search->get_occurrences_count($this->session->userdata('book_4_keyword'), 4);
        $page['occurrences'] = $this->book_search->get_occurrences($this->session->userdata('book_4_keyword'), 4, $index);

        $config = array('base_url' => '',
            'total_rows' => $page['occurrences_count'],
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
                                             "showing_to" => ($index + 25 > $page['occurrences_count'] ?
                                                 $page['occurrences_count'] : $index + 25),
                                             "total_results" => $page['occurrences_count']
        );
        $page['pagination_links'] = $this->pagination->create_links();

        // load the page
        $page['theme'] = 'theme_6';
        $page['base_url'] = 'sri-guru-granth-darpan/search-preview';
        $page['meta_title'] = 'Sri Guru Granth Darpan Search results: Prof Sahib Singh:- SearchGurbani.com';
        $page['meta_description'] = 'Siri Guru Granth Darpan by Professor Sahib Singh Gurmukhi text to Punjabi (Gurmukhi) translation of all of Siri Guru Granth Sahib. ';
        $page['meta_keywords'] = 'Guru Granth Darpan,Guru Granth, sahib, Singh, exegesis';
        if($d == 'ajax'){
	
            echo json_encode([
                'content' => $this->load->viewPartial('forms/search-results/sri-guru-granth-darpan', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);
        }else{
	        $this->load->view('forms/search-results/sri-guru-granth-darpan', $page);
	
        }
    }

}