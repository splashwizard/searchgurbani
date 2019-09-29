<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faridkot_wala_teeka extends My_Controller
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
        $page['inner_view'] = array('book_name' => 'Faridkot Wala Teeka', 'book_controller' => 'faridkot-wala-teeka');
        // load the page
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Faridkot Wala Teeka:ਫਰੀਦਕੋਟ ਵਾਲਾ ਟੀਕਾ :- SearchGurbani.com';
        $page['meta_description'] = 'Faridkot Wala Teeka is classical exegesis of Sri Guru Granth Sahib in Braj Bhasha by a team of scholars of Nirmala Sect.';
        $page['meta_keywords'] = 'Faridkot Wala, Teeka , Granth, Sahib, Nirmala, Guru Granth, Sikh, Gurbani ';
        $page['book_name'] = 'Faridkot Wala Teeka';
        $page['book_controller'] = 'faridkot-wala-teeka';
        
        $this->load->view('pages/faridkot-wala-teeka', $page);
    }

    function volumes()
    {
        $page['volumes'] = $this->resources_dao->get_volumes(3);
        // load the page
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Faridkot Wala Teeka Volume Index:ਫਰੀਦਕੋਟ ਵਾਲਾ ਟੀਕਾ :- SearchGurbani.com';
        $page['meta_description'] = 'Faridkot Wala Teeka is classical exegesis of Sri Guru Granth Sahib in Braj Bhasha by a team of scholars of Nirmala Sect.';
        $page['meta_keywords'] = 'Faridkot Wala, Teeka , Granth, Sahib, Nirmala, Guru Granth, Sikh, Gurbani ';
        
        $this->load->view('forms/index-pages/faridkot-wala-teeka-volume-index', $page);
    }

    function chapters($volume_id = 0, $volume_name = '')
    {
        $page['chapters'] = $this->resources_dao->get_chapters(3, $volume_id);
        $page['volume_id'] = $volume_id;
        // load the page
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Faridkot Wala Teeka Chapter Index:ਫਰੀਦਕੋਟ ਵਾਲਾ ਟੀਕਾ :- SearchGurbani.com';
        $page['meta_description'] = 'Faridkot Wala Teeka is classical exegesis of Sri Guru Granth Sahib in Braj Bhasha by a team of scholars of Nirmala Sect.';
        $page['meta_keywords'] = 'Faridkot Wala, Teeka , Granth, Sahib, Nirmala, Guru Granth, Sikh, Gurbani ';
        
        $this->load->view('forms/index-pages/faridkot-wala-teeka-chapter-index', $page);
    }

    function page($page_no = 1, $label1 = 'volume', $volume_id = 0)
    {
        $page['lines_count'] = $this->resources_dao->get_lines_count(3, $volume_id, $page_no, 'B-FWT');
    
        if ($page_no >= 1 and $page_no <= $page['lines_count']) {
            $lines = $this->resources_dao->get_lines(3, $volume_id, $page_no, 'B-FWT');
        } else {
            $page_no = 1;
            $lines = $this->resources_dao->get_lines(3, $volume_id, $page_no, 'B-FWT');
        }
        $page['highlight'] = (get_last_segment() == 'highlight' ? true : false);
        $page['page_no'] = $page_no;
        $page['volume_id'] = $volume_id;
        $page['lines'] = $lines;
        $page['base_url'] = 'faridkot-wala-teeka/page';
        
        // load the page
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Faridkot Wala Teeka: Page ' . $page_no . ':ਫਰੀਦਕੋਟ ਵਾਲਾ ਟੀਕਾ - SearchGurbani.com';
        $page['meta_description'] = 'Faridkot Wala Teeka is classical exegesis of Sri Guru Granth Sahib in Braj Bhasha by a team of scholars of Nirmala Sect.';
        $page['meta_keywords'] = 'Faridkot Wala, Teeka , Granth, Sahib, Nirmala, Guru Granth, Sikh, Gurbani ';
        if($label1 == 'ajax'){
	
            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/faridkot-wala-teeka', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);

        }else{
	        $this->load->view('forms/page-by-page/faridkot-wala-teeka', $page);
	
        }
    }


    function do_search()
    {
        $keyword = $this->input->post('keyword');
        $data = array('book_3_keyword' => $keyword);
        $this->session->set_userdata($data);
        redirect('faridkot-wala-teeka/search-preview');
    }

    function search_preview($index = 0, $d = 'NA')
    {
        $data = $this->session->userdata('book_3_keyword');
        
        $page['occurrences_count'] = $this->book_search->get_occurrences_count($this->session->userdata('book_3_keyword'), 3);
        $page['occurrences'] = $this->book_search->get_occurrences($this->session->userdata('book_3_keyword'), 3, $index);

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
        $page['base_url'] = 'faridkot-wala-teeka/search-preview';
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Faridkot Wala Teeka Search Results -:ਫਰੀਦਕੋਟ ਵਾਲਾ ਟੀਕਾ - SearchGurbani.com';
        $page['meta_description'] = 'Faridkot Wala Teeka is classical exegesis of Sri Guru Granth Sahib in Braj Bhasha by a team of scholars of Nirmala Sect.';
        $page['meta_keywords'] = 'Faridkot Wala, Teeka , Granth, Sahib, Nirmala, Guru Granth, Sikh, Gurbani ';
        if($d == 'ajax'){

            echo json_encode([
                'content' => $this->load->viewPartial('forms/search-results/faridkot-wala-teeka', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);
        }else{
	        $this->load->view('forms/search-results/faridkot-wala-teeka', $page);
	
        }
    }
}