<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Bhai_gurdas_vaaran extends My_Controller
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function index()
		{
			// load the page
			
			$page['theme'] = 'theme_4';
			
			$this->load->view('pages/life-bhai-gurdas-ji', $page);
		}
		
		function introduction()
		{
			// load the page
			$page['theme']      = 'theme_4';
			$page['meta_title'] = 'Bhai Gurdas Vaaran -: &#2613;&#2622;&#2608;&#2622;&#2562; &#2605;&#2622;&#2568; &#2583;&#2625;&#2608;&#2598;&#2622;&#2616;  :- SearchGurbani.com';
			
			$this->load->view('pages/life-bhai-gurdas-ji', $page);
		}

        function ajax_remember_me()
        {
            global $SG_ScriptureTypes, $SG_Preferences;

            $vaar_no = !empty($this->input->get('vaar_no')) ? $this->input->get('vaar_no') :  1;
            $pauri_no = !empty($this->input->get('current_page')) ? $this->input->get('current_page') :  1;

            set_cookie('bgv_vaar_no', $vaar_no, 365 * 24 * 60 * 60);
            set_cookie('bgv_pauri_no', $pauri_no, 365 * 24 * 60 * 60);
        }

		function pauri_by_pauri()
		{
			global $SG_ScriptureTypes, $SG_Preferences;
			$keywords = array();
			
			$this->load->model('dao/bhai_gurdas_vaaran_dao');
			$this->load->model('dao/common_dao');
			
			$vaar_no  = (get_cookie('bgv_vaar_no') != FALSE ? get_cookie('bgv_vaar_no') : 1);
			$pauri_no = (get_cookie('bgv_pauri_no') != FALSE ? get_cookie('bgv_pauri_no') : 1);
			$lines    = $this->bhai_gurdas_vaaran_dao->get_pauri_lines($vaar_no, $pauri_no);
			
			if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes')
			{
				$keywords = $this->common_dao->get_dictionary_words($lines);
			}
			$page['scripture']      = 'bgv';
			$page['current_vaar']   = $vaar_no;
			$page['current_pauri']  = $pauri_no;
			$page['pauri_info']     = $this->bhai_gurdas_vaaran_dao->get_pauri_name($vaar_no, $pauri_no);
			$page['pauri_count']    = $this->bhai_gurdas_vaaran_dao->get_pauri_count($vaar_no);
			$page['lines']          = $lines;
			$page['keywords']       = $keywords;
			$page['highlight_line'] = 'NA';
			$page['base_url']       = $SG_ScriptureTypes['bgv']['controller_name_dash'] . '/vaar';
            $page['remember_me_url'] = $SG_ScriptureTypes['bgv']['controller_name_dash'];
			$page['theme']            = 'theme_4';
			$page['meta_title']       = 'Vaaran Bhai Gurdas:- Vaar' . $vaar_no . '-Pauri' . $page['pauri_info']->paurino . '-' . $page['pauri_info']->pauri_name_punjabi . '-' . $page['pauri_info']->pauri_name_roman . '&#2613;&#2622;&#2608;&#2622;&#2562; &#2605;&#2622;&#2568; &#2583;&#2625;&#2608;&#2598;&#2622;&#2616; :-SearchGurbani.com';
			$page['meta_description'] = 'Vaaran Bhai Gurdas:- Vaar' . $vaar_no . '-Pauri' . $page['pauri_info']->paurino . '-' . $page['pauri_info']->pauri_name_punjabi . '-' . $page['pauri_info']->pauri_name_roman . '&#2613;&#2622;&#2608;&#2622;&#2562; &#2605;&#2622;&#2568; &#2583;&#2625;&#2608;&#2598;&#2622;&#2616; :-SearchGurbani.com';
			
			$this->load->view('forms/page-by-page/bhai-gurdas-vaaran', $page);
		}
		
		function vaar_index($vaar_no = 1)
		{
			$this->load->model('dao/bhai_gurdas_vaaran_dao');
			if ($vaar_no < 1 or $vaar_no > 40)
			{
				
				$vaar_no = 1;
			}
			
			$page['vaar_no'] = $vaar_no;
			$page['pauries'] = $this->bhai_gurdas_vaaran_dao->get_pauries($vaar_no);
			
			// load the page
			$page['theme']            = 'theme_4';
			$page['meta_title']       = 'Bhai Gurdas Vaaran - Vaar Index -&#2613;&#2622;&#2608;&#2622;&#2562; &#2605;&#2622;&#2568; &#2583;&#2625;&#2608;&#2598;&#2622;&#2616; :- SearchGurbani.com';
			$page['meta_description'] = 'Bhai Gurdas Vaaran - Vaar Index  :- SearchGurbani.com';
			
			$this->load->view('forms/index-pages/bgv-vaar-index', $page);
			
		}
		
		function vaar($vaar_no = 0, $pauri = 'pauri', $pauri_no = 0, $d = 'line', $line_no = 'NA')
		{
			global $SG_ScriptureTypes, $SG_Preferences;
			
			$keywords = array();
			
			$this->load->model('dao/bhai_gurdas_vaaran_dao');
			
			$this->load->model('dao/common_dao');
			
			$pauri_count = $this->bhai_gurdas_vaaran_dao->get_pauri_count($vaar_no);
			
			if ($pauri_no > $pauri_count)
			{
				$pauri_no = 1;
			}
			
			if ($vaar_no <= 0 or $pauri_no <= 0)
			{
				$vaar_no  = 1;
				$pauri_no = 1;
			}
			
			$lines = $this->bhai_gurdas_vaaran_dao->get_pauri_lines($vaar_no, $pauri_no);
			
			if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes')
			{
				
				$keywords = $this->common_dao->get_dictionary_words($lines);
				
			}
			
			$page['scripture']      = 'bgv';
			$page['current_vaar']   = $vaar_no;
			$page['current_pauri']  = $pauri_no;
			$page['pauri_info']     = $this->bhai_gurdas_vaaran_dao->get_pauri_name($vaar_no, $pauri_no);
			$page['pauri_count']    = $pauri_count;
			$page['lines']          = $lines;
			$page['keywords']       = $keywords;
			$page['highlight_line'] = $line_no;
            $page['remember_me_url'] = $SG_ScriptureTypes['bgv']['controller_name_dash'];
			
			$page['base_url']       = $SG_ScriptureTypes['bgv']['controller_name_dash'] . '/vaar';
			
			// load the page
			$page['theme']            = 'theme_4';
			$page['meta_title']       = 'Vaaran Bhai Gurdas:- Vaar' . $vaar_no . '-Pauri' . $page['pauri_info']->paurino . '-' . $page['pauri_info']->pauri_name_punjabi . '-' . $page['pauri_info']->pauri_name_roman . '&#2613;&#2622;&#2608;&#2622;&#2562; &#2605;&#2622;&#2568; &#2583;&#2625;&#2608;&#2598;&#2622;&#2616; :-SearchGurbani.com';
			$page['meta_description'] = 'Vaaran Bhai Gurdas:- Vaar' . $vaar_no . '-Pauri' . $page['pauri_info']->paurino . '-' . $page['pauri_info']->pauri_name_punjabi . '-' . $page['pauri_info']->pauri_name_roman . '&#2613;&#2622;&#2608;&#2622;&#2562; &#2605;&#2622;&#2568; &#2583;&#2625;&#2608;&#2598;&#2622;&#2616; :-SearchGurbani.com';
			
			if ($d == 'ajax')
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('forms/page-by-page/bhai-gurdas-vaaran', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => null,
                ]);
			}
			else{
				$this->load->view('forms/page-by-page/bhai-gurdas-vaaran', $page);
			}
			
			
		}
		
		function pauri($pauri_id = '')
		{
			
			// load the page
			
			$page['theme'] = 'theme_4';
			
			$this->load->view('pages/pauri-by-pauri', $page);
		}
		
		function friend($pauri_id = '')
		{
			// load the page
			
			$page['theme'] = 'theme_4';
			
			$this->load->view('pages/life-bhai-gurdas-ji', $page);
		}
		
		function remember($pauri_id = '')
		{
			// load the page
			
			$page['theme'] = 'theme_4';
			
			$this->load->view('pages/life-bhai-gurdas-ji', $page);
		}
		
		/**
		 * Individual Search
		 */
		function search()
		{
			// load the page
			
			$page['theme']            = 'theme_4';
			$page['meta_title']       = 'Advance Search Bhai Gurdas Vaaran -&#2613;&#2622;&#2608;&#2622;&#2562; &#2605;&#2622;&#2568; &#2583;&#2625;&#2608;&#2598;&#2622;&#2616; :- SearchGurbani.com';
			$page['meta_description'] = 'Advance Search Bhai Gurdas Vaaran  :- SearchGurbani.com';
			
			$page['scripture'] = 'bgv';
			$page['authors']   = array();
			$page['raags']     = array();
			
			$this->load->view('forms/individual-search-form', $page);
			
			
		}
		
		/**
		 * Search Results
		 */
		function search_results($index = 0, $d = 'NA')
		{
			$this->load->model('search/Mdl_search');
			$search_results = $this->session->userdata('search_results');
			$this->load->library('pagination');
			if (empty($search_results['bgv']))
			{
				redirect('bhai-gurdas-vaaran/search');
			}
            $config = array('base_url' => '',
                'total_rows' => $search_results['bgv']['result_count'],
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
			
			
			$page['search_results']      = $this->Mdl_search->get_results($search_results['bgv']['result_query'], $index);
			$page['search_results_info'] = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + 25 > $search_results['bgv']['result_count'] ? $search_results['bgv']['result_count'] : $index + 25),
				"total_results" => $search_results['bgv']['result_count']
			);
			$page['pagination_links']    = $this->pagination->create_links();
			
			$page['theme'] = 'theme_4';
			$page['base_url'] = 'bhai-gurdas-vaaran/search-results';

			if($d == 'ajax'){
                echo json_encode([
                    'content' => $this->load->viewPartial('forms/bhai-gurdas-vaaran-search-results', $page),
                    'title' => null,
                    'description' => null,
                    'keywords' => null,
                ]);
			}else{
				
				$this->load->view('forms/bhai-gurdas-vaaran-search-results', $page);
			}
		}
	}