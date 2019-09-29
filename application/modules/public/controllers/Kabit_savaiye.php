<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kabit_savaiye extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function ajax_rememberme($page_no = 1)
    {
        global $SG_ScriptureTypes, $SG_Preferences;
        if ($page_no >= $SG_ScriptureTypes['ks']['page_from'] and
            $page_no <= $SG_ScriptureTypes['ks']['page_to']
        ) {
            set_cookie('ks_page_no', $page_no, 365 * 24 * 60 * 60);
        }
    }

    function ajax_remember_me()
    {
        global $SG_ScriptureTypes, $SG_Preferences;

        $page_no = !empty($this->input->get('current_page')) ? $this->input->get('current_page') :  1;

        if ($page_no >= $SG_ScriptureTypes['ks']['page_from'] and
            $page_no <= $SG_ScriptureTypes['ks']['page_to']
        ) {
            set_cookie('ks_page_no', $page_no, 365 * 24 * 60 * 60);
        }
    }

    function kabit_by_kabit()
    {
        global $SG_ScriptureTypes, $SG_Preferences;
        $keywords = array();

        $this->load->model('dao/kabit_savaiye_dao');
        $this->load->model('dao/common_dao');

        $page_no = (get_cookie('ks_page_no') != false ? get_cookie('ks_page_no') : $SG_ScriptureTypes['ks']['page_from']);

        $lines = $this->kabit_savaiye_dao->get_lines($page_no);
        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }
        $page['base_url']       = $SG_ScriptureTypes['ks']['controller_name_dash'] . '/kabit';
        $page['remember_me_url'] = $SG_ScriptureTypes['ks']['controller_name_dash'];
        $page['scripture'] = 'ks';
        $page['current_page'] = $page_no;
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = 'NA';

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Kabit Bhai Gurdas : Kabit ' . $page_no . ' : &#2581;&#2604;&#2623;&#2596; &#2605;&#2622;&#2568;  &#2583;&#2625;&#2608;&#2598;&#2622;&#2616;  :- SearchGurbani.com';

        $this->load->view('forms/page-by-page/kabit-savaiye', $page);
    }

    function kabit($page_no = 1, $d = 'line', $line_no = 'NA')
    {
        global $SG_ScriptureTypes, $SG_Preferences;
        $keywords = array();

        $this->load->model('dao/kabit_savaiye_dao');
        $this->load->model('dao/common_dao');
	
	    if ($page_no >= $SG_ScriptureTypes['ks']['page_from'] and $page_no <= $SG_ScriptureTypes['ks']['page_to']) {
		    $lines = $this->kabit_savaiye_dao->get_lines($page_no);
	    } else {
		    $page_no = $SG_ScriptureTypes['ks']['page_from'];
		    $lines = $this->kabit_savaiye_dao->get_lines($page_no);
	    }
	    if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
		    $keywords = $this->common_dao->get_dictionary_words($lines);
	    }

	    $page['base_url']       = $SG_ScriptureTypes['ks']['controller_name_dash'] . '/kabit';
        $page['remember_me_url'] = $SG_ScriptureTypes['ks']['controller_name_dash'];
        $page['scripture'] = 'ks';
        $page['current_page'] = $page_no;
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = $line_no;
        
        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Kabit Bhai Gurdas : Kabit ' . $page_no . ' : &#2581;&#2604;&#2623;&#2596; &#2605;&#2622;&#2568;  &#2583;&#2625;&#2608;&#2598;&#2622;&#2616;  :- SearchGurbani.com';
	    if($d == 'ajax'){
            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/kabit-savaiye', $page),
                'title' => $page['meta_title'],
            ]);
	    }else{
		    $this->load->view('forms/page-by-page/kabit-savaiye', $page);
	    }
    }

    /**
     * Individual Search
     */
    function search()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Advance Search  Kabit Bhai Gurdas : &#2581;&#2604;&#2623;&#2596; &#2605;&#2622;&#2568;  &#2583;&#2625;&#2608;&#2598;&#2622;&#2616;';
    
        $page['scripture'] = 'ks';
        $page['authors'] = array();
        $page['raags'] = array();

        $this->load->view('forms/individual-search-form', $page);
    }

    /**
     * Search Results
     */
    function search_results($index = 0 , $d = 'NA')
    {

        $this->load->model('search/Mdl_search');

        $search_results = $this->session->userdata('search_results');

        $this->load->library('pagination');
        if(empty($search_results['ks'])){
            redirect('kabit-savaiye/search');
        }
        $config = array('base_url' => '',
            'total_rows' => $search_results['ks']['result_count'],
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

        $page['search_results'] = $this->Mdl_search->get_results($search_results['ks']['result_query'], $index);
        $page['search_results_info'] = array("showing_from" => $index + 1,
                                                "showing_to" => ($index + 25 > $search_results['ks']['result_count'] ? $search_results['ks']['result_count'] : $index + 25),
                                                "total_results" => $search_results['ks']['result_count']
        );
        $page['pagination_links'] = $this->pagination->create_links();

        // load the page
        
        $page['theme'] = 'theme_6';
        $page['base_url'] = 'kabit-savaiye/search-results';

        if($d == 'ajax'){
            echo json_encode([
                'content' => $this->load->viewPartial('forms/kabit-savaiye-search-results', $page),
                'title' => null,
                'description' => null,
                'keywords' => null,
            ]);
        }else{
	
	        $this->load->view('forms/kabit-savaiye-search-results', $page);
        }
    }

}