<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search_bhai_nand_lal extends My_Controller
{
    function search_bhai_nand_lal()
    {
        parent::__construct();
    }

    function search()
    {
        global $SG_ScriptureTypes;
        $this->load->model('dao/bhai_nand_lal_dao');

        $page['theme'] = 'theme_4';
        $page['meta_title'] = 'Advance Search Bhai Nand Lal:- SearchGurbani.com';
        $page['meta_description'] = 'Advance Search Bhai Nand Lal  :- SearchGurbani.com';
    
        $page['scripture'] = 'bnl';
        $page['authors'] = array();
        $page['raags'] = array();
        $page['bnlSelect'] = $this->bhai_nand_lal_dao->bnlSelect_name();

        $this->load->view('forms/individual-search-form', $page);
    }

    function search_results($index = 0 , $d = 'NA')
    {
        global $SG_BNL, $SG_Preferences;
        $this->load->model('search/Mdl_search');
        $search_results = $this->session->userdata('search_results');
        $this->load->library('pagination');
        if (empty($search_results['bnl'])) {
            redirect('bhai-nand-lal/search');
        }
        $config = array('base_url' => '',
            'total_rows' => $search_results['bnl']['result_count'],
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
        $page['base_url']= 'bhai-nand-lal/search-results';
        $page['search_results'] = $this->Mdl_search->get_results($search_results['bnl']['result_query'], $index);
        $page['search_results_info'] = array("showing_from" => $index + 1,
                                                "showing_to" => ($index + 25 > $search_results['bnl']['result_count'] ? $search_results['bnl']['result_count'] : $index + 25),
                                                "total_results" => $search_results['bnl']['result_count']
        );
        $page['pagination_links'] = $this->pagination->create_links();
        $page['bnl_constant'] = $SG_BNL;
        
        $page['theme'] = 'theme_4';

        if($d == 'ajax'){
            echo json_encode([
                'content' => $this->load->viewPartial('forms/bhai-nand-lal-search-results', $page),
                'title' => null,
                'description' => null,
                'keywords' => null,
            ]);
        }else{
	        $this->load->view('forms/bhai-nand-lal-search-results', $page);
	
        }
    }

}