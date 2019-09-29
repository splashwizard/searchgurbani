<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('dao/resources_dao');
        $this->load->library('pagination');
    }

    function page($page_no = 1, $label1 = 'volume', $volume_id = 0)
    {
    
        $page['lines_count'] = $this->resources_dao->get_lines_count(6, $volume_id, $page_no, 'B-MUSIC');
    
        if ($page_no >= 1 and $page_no <= $page['lines_count']) {
            $lines = $this->resources_dao->get_lines(6, $volume_id, $page_no, 'B-MUSIC');
        } else {
            $page_no = 1;
            $lines = $this->resources_dao->get_lines(6, $volume_id, $page_no, 'B-MUSIC');
        }
        $page['highlight'] = (get_last_segment() == 'highlight' ? true : false);
        $page['page_no'] = $page_no;
        $page['volume_id'] = $volume_id;
        $page['lines'] = $lines;
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Indian Classical Music and Sikh Kirtan -: Page ' . $page_no . ' :- SearchGurbani.com';
        
        $this->load->view('forms/page-by-page/music', $page);
    }
}