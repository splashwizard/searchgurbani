<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Quatrains extends My_Controller
{
    function Quatrains()
    {
        parent::__construct();
        $this->load->model('dao/common_dao');
    }

    function index()
    {
        global $SG_BNL, $SG_Preferences;
        $keywords = array();
        $this->load->model('dao/bhai_nand_lal_dao');

        $page_no = (get_cookie('quatrains_page_no') != false ? get_cookie('quatrains_page_no') : $SG_BNL['quatrains']['page_from']);
        $lines = $this->bhai_nand_lal_dao->get_quatrains_lines($page_no);
        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }
	    
        $page['scripture'] = 'quatrains';
        $page['current_page'] = $page_no;
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = 'NA';
	    $page['base_url'] = $SG_BNL['quatrains']['controller_name_dash'] . '/page';
        $page['remember_me_url'] = $SG_BNL['quatrains']['controller_name_dash'];
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Bhai Nand Lal - Quatrains - SearchGurbani.com';
        $page['meta_description'] = 'Bhai Nand Lal - Quatrains - SearchGurbani.com';
        $page['meta_keywords'] = 'Bhai Nand Lal - Quatrains';

        if (get_last_segment() == "pdf_view") {
            $html = $this->load->view('forms/page-by-page/quatrains', $page, true);
            $this->load->plugin('to_pdf');
            pdf_create($html, 'SearchGurbani');
            exit;
        }

        $this->load->view('forms/page-by-page/quatrains', $page);
    }

    function page($page_no = 1, $d = 'line', $line_no = 'NA')
    {
        global $SG_BNL, $SG_Preferences;
        $keywords = array();
        $this->load->model('dao/bhai_nand_lal_dao');

        if ($page_no >= $SG_BNL['quatrains']['page_from'] and $page_no <= $SG_BNL['quatrains']['page_to']) {
            $lines = $this->bhai_nand_lal_dao->get_quatrains_lines($page_no);
        } else {
            $page_no = $SG_BNL['quatrains']['page_from'];
            $lines = $this->bhai_nand_lal_dao->get_quatrains_lines($page_no);
        }
        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }
	  
        $page['scripture'] = 'quatrains';
        $page['current_page'] = $page_no;
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = $line_no;
	    $page['base_url'] = $SG_BNL['quatrains']['controller_name_dash'] . '/page';
        $page['remember_me_url'] = $SG_BNL['quatrains']['controller_name_dash'];

        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Bhai Nand Lal - Quatrains - SearchGurbani.com';
        $page['meta_description'] = 'Bhai Nand Lal - Quatrains - SearchGurbani.com';
        $page['meta_keywords'] = 'Bhai Nand Lal - Quatrains';

        if($d == 'ajax' ){
            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/quatrains', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);
        }else{
	        $this->load->view('forms/page-by-page/quatrains', $page);
        }
    }

    function shabad($shabad_id = 0, $line = 0, $lineno = 0){

        global $SG_BNL, $SG_Preferences;

        $keywords = array();
        $this->load->model('dao/bhai_nand_lal_dao');
        $this->load->model('dao/common_dao');


        $lines = $this->bhai_nand_lal_dao->get_lines_in_shabad($shabad_id);

        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes')
        {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }

        $page['meta_keywords']    = 'Bhai Nand Lal - quatrains shabad , bnl-shabad,';
        $page['meta_title'] = 'Bhai Nand Lal - quatrains - SearchGurbani.com';
        $page['meta_description'] = 'Bhai Nand Lal - quatrains - SearchGurbani.com';

        $page['theme'] = 'theme_7';
        $page['lines']          = $lines;
        $page['shabad_info']    = $lines->result();
        $page['lines']          = $lines;
        $page['keywords']       = $keywords;
        $page['highlight_line'] = $lineno;

        $this->load->view('forms/page-by-page/bhai-nand-lal-quatrains-shabad', $page);

    }

    function verse($verse_id,$d = null)
    {
        global $SG_BNL;
        $this->load->model('dao/common_dao');

        $data = array(
            'table' => 'N01',
            'where' => array(
                "verseID" => $verse_id,
            )
        );
        $page['base_url'] = $SG_BNL['quatrains']['controller_name_dash'] . '/verse';
        $page['lines'] = $this->common_dao->get_line_verse($data);
        $page['data'] = $page['lines']->result_array();
        $page['start_page'] = 361;
        $page['end_page'] = 386;
        $page['current_page'] = $verse_id;
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Bhai Nand Lal - Rubaayee Verse';
        $page['meta_description'] = 'This Verse '. $page['data'][0]['punjabi'] . $page['data'][0]['english'] . $page['data'][0]['hindi'];
        $page['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';
        if($d == 'ajax'){

            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/bhai-nand-lal-rubaayee-verse', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);

        }else{
            $this->load->view('forms/page-by-page/bhai-nand-lal-rubaayee-verse', $page);
        }
    }

    function search($text = null, $pageNo = 0)
    {
        global $SG_BNL, $SG_Preferences;
        $this->load->model('dao/bhai_nand_lal_dao');

        $searchcount['total'] = $this->bhai_nand_lal_dao->searchCountQua($text);

        $totalRows = count($searchcount['total']);
        //echo $totalRows;exit;

        $this->load->library('pagination');
        $config = array('base_url' => site_url('bhai_nand_lal/quatrains/search/' . $text),
            'total_rows' => $totalRows,
            'per_page' => '10'
        );
        $this->pagination->initialize($config);
	    
        $page['lines'] = $this->bhai_nand_lal_dao->searchTextQua($text, $config['per_page'], $pageNo);
        $page['pagination_links'] = $this->pagination->create_links();

        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Bhai Nand Lal - Quatrains - SearchGurbani.com';
        $page['meta_description'] = 'Bhai Nand Lal - Quatrains - SearchGurbani.com';
        $page['meta_keywords'] = 'Bhai Nand Lal - Quatrains';
	    
        $this->load->view('forms/page-by-page/search-quatrains', $page);
    }

    function ajax_remember_me()
    {
        global $SG_ScriptureTypes, $SG_Preferences;

        $page_no = !empty($this->input->get('current_page')) ? $this->input->get('current_page') :  1;

        set_cookie('quatrains_page_no', $page_no, 365 * 24 * 60 * 60);
    }

}