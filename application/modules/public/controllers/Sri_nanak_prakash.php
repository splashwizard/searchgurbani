<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sri_nanak_prakash extends My_Controller
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
        $page['inner_view'] = array('book_name' => 'Sri Nanak Prakash', 'book_controller' => 'sri-nanak-prakash');
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Sri Nanak Prakash -:-ਸ੍ਰੀ ਨਾਨਕ ਪ੍ਰਕਾਸ਼  :- SearchGurbani.com';
        $page['meta_description'] = 'Sri Gur Partap Suraj Granth authored by Kavi Churamani Bhai Santokh Singh ji, Doyen of Nirmala Sect, popularly known as Suraj Parkash is a voluminous classical medieval source of Sikh History and Philosophy.';
        $page['meta_keywords'] = 'Sri ,Nanak ,Prakash. Granth, Gur, Pratap , Suraj, Santokh, ';
        $page['book_name'] = 'Sri Nanak Prakash';
        $page['book_controller'] = 'sri-nanak-prakash';
        
        $this->load->view('pages/sri-nanak-prakash', $page);
    }

    function volumes()
    {
        $page['volumes'] = $this->resources_dao->get_volumes(1);
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Sri Nanak Prakash -:-ਸ੍ਰੀ ਨਾਨਕ ਪ੍ਰਕਾਸ਼  :- SearchGurbani.com';
        $page['meta_description'] = 'Sri Gur Partap Suraj Granth authored by Kavi Churamani Bhai Santokh Singh ji, Doyen of Nirmala Sect, popularly known as Suraj Parkash is a voluminous classical medieval source of Sikh History and Philosophy.';
        $page['meta_keywords'] = 'Sri ,Nanak ,Prakash. Granth, Gur, Pratap , Suraj, Santokh, ';
        
        $this->load->view('forms/index-pages/sri-nanak-prakash-volume-index', $page);
    }

    function chapters($volume_id = 1, $volume_name = '')
    {
        $page['chapters'] = $this->resources_dao->get_chapters(1, $volume_id);
        $page['volume_id'] = $volume_id;
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Sri Nanak Prakash Chapter Index-:-ਸ੍ਰੀ ਨਾਨਕ ਪ੍ਰਕਾਸ਼   :- SearchGurbani.com';
        $page['meta_description'] = 'Sri Nanak Prakash Chapter Index';
        $page['meta_keywords'] = 'Sri ,Nanak ,Prakash. Granth, Gur, Pratap , Suraj, Santokh, ';
        
        $this->load->view('forms/index-pages/sri-nanak-prakash-chapter-index', $page);
    }

    function page($page_no = 1, $label1 = 'volume', $volume_id = 1)
    {
        $page['lines_count'] = $this->resources_dao->get_lines_count(1, $volume_id, $page_no, 'B-SNP');
    
        if ($page_no >= 1 and $page_no <= $page['lines_count']) {
            $lines = $this->resources_dao->get_lines(1, $volume_id, $page_no, 'B-SNP');
        } else {
            $page_no = 1;
            $lines = $this->resources_dao->get_lines(1, $volume_id, $page_no, 'B-SNP');
        }
        $page['highlight'] = (get_last_segment() == 'highlight' ? true : false);
        $page['page_no'] = $page_no;
        $page['volume_id'] = $volume_id;
        $page['lines'] = $lines;
        // load the page
        $page['theme'] = 'theme_3';
	    $page['base_url'] = 'sri-nanak-prakash/page';
        $page['meta_title'] = 'Sri Nanak Prakash -:-ਸ੍ਰੀ ਨਾਨਕ ਪ੍ਰਕਾਸ਼  page ' . $page_no . ' :- SearchGurbani.com';
        if($label1 == 'ajax'){

            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/sri-nanak-prakash', $page),
                'title' => $page['meta_title'],
                'description' => null,
                'keywords' => null,
            ]);
	        
        }else{
	        
	        $this->load->view('forms/page-by-page/sri-nanak-prakash', $page);
	
        }
    }

    function do_search()
    {
        $keyword = $this->input->post('keyword');
        $data = array('book_1_keyword' => $keyword);
        $this->session->set_userdata($data);
        redirect('sri-nanak-prakash/search-preview');
    }

    function search_preview($index = 0 , $d = 'NA')
    {
        $data = $this->session->userdata('book_1_keyword');
    
        $page['occurrences_count'] = $this->book_search->get_occurrences_count($this->session->userdata('book_1_keyword'), 1);
        $page['occurrences'] = $this->book_search->get_occurrences($this->session->userdata('book_1_keyword'), 1, $index);

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
        $page['base_url'] = 'sri-nanak-prakash/search-preview';
	    
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Sri Nanak Prakash Search Results -:-ਸ੍ਰੀ ਨਾਨਕ ਪ੍ਰਕਾਸ਼   :- SearchGurbani.com';
        if($d == 'ajax'){

            echo json_encode([
                'content' => $this->load->viewPartial('forms/search-results/sri-nanak-prakash', $page),
                'title' => $page['meta_title'],
                'description' => null,
                'keywords' => null,
            ]);
        }else{
	        $this->load->view('forms/search-results/sri-nanak-prakash', $page);
	
        }
    }
}