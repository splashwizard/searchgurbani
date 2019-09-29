<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sri_gur_pratap_suraj_granth extends My_Controller
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
        $page['inner_view'] = array('book_name' => 'Sri Gur Pratap Suraj Granth', 'book_controller' => 'sri-gur-pratap-suraj-granth');
        // load the page
        $page['theme'] = 'theme_4';
        $page['meta_title'] = 'Sri Gur Pratap Suraj Granth -:-ਸ੍ਰੀ ਗੁਰ ਪ੍ਰਤਾਪ ਸੂਰਜ ਗਰੰਥ   :- SearchGurbani.com';
        $page['meta_description'] = 'Sri Gur Pratap Suraj Granth by Kavi Bhai Santokh Singh';
        $page['meta_keywords'] = 'Sri ,Nanak ,Prakash. Granth, Gur, Pratap , Suraj, Santokh, ';
        $page['book_name'] ='Sri Gur Pratap Suraj Granth';
        $page['book_controller'] ='sri-gur-pratap-suraj-granth';
        
        $this->load->view('pages/sri-gur-pratap-suraj-granth', $page);
    }

    function volumes()
    {
        $page['volumes'] = $this->resources_dao->get_volumes(2);
        // load the page
        $page['theme'] = 'theme_4';
        $page['meta_title'] = 'Sri Gur Pratap Suraj Granth Volume Index-:-ਸ੍ਰੀ ਗੁਰ ਪ੍ਰਤਾਪ ਸੂਰਜ ਗਰੰਥ   :- SearchGurbani.com';
        $page['meta_description'] = 'Sri Gur Pratap Suraj Granth Volume Index';
        $page['meta_keywords'] = 'Sri ,Nanak ,Prakash. Granth, Gur, Pratap , Suraj, Santokh, ';
        
        $this->load->view('forms/index-pages/sri-gur-pratap-suraj-granth-volume-index', $page);
    }

    function chapters($volume_id = 1, $volume_name = '')
    {
        $page['chapters'] = $this->resources_dao->get_chapters(2, $volume_id);
        $page['volume_id'] = $volume_id;
        // load the page
        $page['theme'] = 'theme_4';
        $page['meta_title'] = 'Sri Gur Pratap Suraj Granth Chapter Index-:-ਸ੍ਰੀ ਗੁਰ ਪ੍ਰਤਾਪ ਸੂਰਜ ਗਰੰਥ   :- SearchGurbani.com';
        $page['meta_description'] = 'Sri Gur Pratap Suraj Granth Chapter Index';
        $page['meta_keywords'] = 'Sri ,Nanak ,Prakash. Granth, Gur, Pratap , Suraj, Santokh, ';
        
        $this->load->view('forms/index-pages/sri-gur-pratap-suraj-granth-chapter-index', $page);
    }

    function page($page_no = 1, $label1 = 'volume', $volume_id = 1)
    {
        $page['lines_count'] = $this->resources_dao->get_lines_count(2, $volume_id, $page_no, 'B-SGPS');
    
        if ($page_no >= 1 and $page_no <= $page['lines_count']) {
            $lines = $this->resources_dao->get_lines(2, $volume_id, $page_no, 'B-SGPS');
        } else {
            $page_no = 1;
            $lines = $this->resources_dao->get_lines(2, $volume_id, $page_no, 'B-SGPS');
        }
        $page['highlight'] = (get_last_segment() == 'highlight' ? true : false);
        $page['page_no'] = $page_no;
        $page['volume_id'] = $volume_id;
        $page['lines'] = $lines;
        // load the page
        $page['theme'] = 'theme_4';
        $page['base_url'] = 'sri-gur-pratap-suraj-granth/page';
        $page['meta_title'] = 'Sri Gur Pratap Suraj Granth page-' . $page_no . '--Volume ' . $volume_id . '-:-ਸ੍ਰੀ ਗੁਰ ਪ੍ਰਤਾਪ ਸੂਰਜ ਗਰੰਥ   :- SearchGurbani.com';
        $page['meta_description'] = 'Explore Sri Gur Pratap Suraj Granth page ' . $page_no . '';
        $page['meta_keywords'] = 'Sri ,Nanak ,Prakash. Granth, Gur, Pratap , Suraj, Santokh, ';
        if($label1 == 'ajax'){

            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/sri-gur-pratap-suraj-granth', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);

        }else{
	        $this->load->view('forms/page-by-page/sri-gur-pratap-suraj-granth', $page);
	
        }
    }


    function do_search()
    {
        $keyword = $this->input->post('keyword');
        $data = array('book_2_keyword' => $keyword);
        $this->session->set_userdata($data);
        redirect('sri-gur-pratap-suraj-granth/search-preview');
    }

    function search_preview($index = 0 ,$d = 'NA')
    {
        $data = $this->session->userdata('book_2_keyword');
        
        $page['occurrences_count'] = $this->book_search->get_occurrences_count($this->session->userdata('book_2_keyword'), 2);
        $page['occurrences'] = $this->book_search->get_occurrences($this->session->userdata('book_2_keyword'), 2, $index);

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
        $page['base_url'] = 'sri-gur-pratap-suraj-granth/search-preview';
        $page['theme'] = 'theme_4';
        $page['meta_title'] = 'Sri Gur Pratap Suraj Granth Search results-:-ਸ੍ਰੀ ਗੁਰ ਪ੍ਰਤਾਪ ਸੂਰਜ ਗਰੰਥ   :- SearchGurbani.com';
        $page['meta_description'] = 'Sri Gur Pratap Suraj Granth Search Results ';
        $page['meta_keywords'] = 'Sri ,Nanak ,Prakash. Granth, Gur, Pratap , Suraj, Santokh, ';
        if($d == 'ajax'){
	

            echo json_encode([
                'content' => $this->load->viewPartial('forms/search-results/sri-gur-pratap-suraj-granth', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);
        }else{
	        $this->load->view('forms/search-results/sri-gur-pratap-suraj-granth', $page);
	
        }
    }

}