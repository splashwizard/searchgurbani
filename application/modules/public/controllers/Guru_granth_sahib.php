<?php

	class Guru_granth_sahib extends My_Controller
	{
		function __construct()
		{
			parent::__construct();
		}

		function index()
		{

			// load the page
			$page['theme']      = 'theme_2';
			$page['meta_title'] = 'Sri Guru Granth Sahib Ji - : &#2616;&#2620;&#2637;&#2608;&#2624; &#2583;&#2625;&#2608;&#2626; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; &#2588;&#2624;  :- SearchGurbani.com';

			$this->load->view('pages/guru-granth-sahib', $page);
		}

		function introduction()
		{
			// load the page
			$page['theme']      = 'theme_2';
			$page['meta_title'] = 'Sri Guru Granth Sahib Ji - : &#2616;&#2620;&#2637;&#2608;&#2624; &#2583;&#2625;&#2608;&#2626; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; &#2588;&#2624;  :- SearchGurbani.com';

			$this->load->view('pages/guru-granth-sahib', $page);
		}

        function ajax_remember_me()
        {
            global $SG_ScriptureTypes, $SG_Preferences;

            $page_no = !empty($this->input->get('current_page')) ? $this->input->get('current_page') :  1;

            if ($page_no >= $SG_ScriptureTypes['ggs']['page_from'] and $page_no <= $SG_ScriptureTypes['ggs']['page_to'])
            {
                set_cookie('ggs_page_no', $page_no, 365 * 24 * 60 * 60);
            }
        }

		function ang_by_ang()
		{
			global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;
			$keywords = array();
			$this->load->model('dao/sri_guru_granth_sahib_dao');
			$page_no = (get_cookie('ggs_page_no') != FALSE ? get_cookie('ggs_page_no') : $SG_ScriptureTypes['ggs']['page_from']);

			$lines   = $this->sri_guru_granth_sahib_dao->get_lines($page_no);
			if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes')
			{
				$keywords = $this->sri_guru_granth_sahib_dao->get_dictionary_words($lines);
			}

			$page['scripture']      = 'ggs';
			$page['current_page']   = $page_no;
			$page['lines']          = $lines;
			$page['keywords']       = $keywords;
			$page['highlight_line'] = 'NA';
			$page['base_url']       = $SG_ScriptureTypes['ggs']['controller_name_dash'] . '/ang';
            $page['remember_me_url'] = $SG_ScriptureTypes['ggs']['controller_name_dash'];
			// load the page
			$page['theme']            = 'theme_2';
			$page['meta_title']       = 'Sri Guru Granth Sahib Ji -: Ang :  ' . $page_no . ' -: &#2616;&#2620;&#2637;&#2608;&#2624; &#2583;&#2625;&#2608;&#2626; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; &#2588;&#2624; :- SearchGurbani.com';
			$page['meta_description'] = 'Explore,Share and Listen to Audio of Ang ' . $page_no . ' of Sri Guru Granth Sahib ji at SearchGurbani.com .';
			$page['meta_keywords']    = 'guru granth sahib, granth,  sikh scripture, Ang :' . $page_no . ' ,guru granth sahib ji, Page:' . $page_no . ' ,SGGS';

			$this->load->view('forms/page-by-page/guru-granth-sahib', $page);
		}

		function ang($page_no = 1, $d = 'line', $line_no = 'NA')
		{
			global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;
			$keywords = array();

			$this->load->model('dao/sri_guru_granth_sahib_dao');
			if ($page_no >= $SG_ScriptureTypes['ggs']['page_from'] and $page_no <= $SG_ScriptureTypes['ggs']['page_to'])
			{
				$lines = $this->sri_guru_granth_sahib_dao->get_lines($page_no);
			}
			else
			{
				$page_no = $SG_ScriptureTypes['ggs']['page_from'];
				$lines   = $this->sri_guru_granth_sahib_dao->get_lines($page_no);
			}
			if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes')
			{
				$keywords = $this->sri_guru_granth_sahib_dao->get_dictionary_words($lines);
			}

			$page['heading']       = $SG_ScriptureTypes['ggs'][1];
			$page['base_url']      = $SG_ScriptureTypes['ggs']['controller_name_dash'] . '/ang';
            $page['remember_me_url'] = $SG_ScriptureTypes['ggs']['controller_name_dash'];

            $page['scripture']      = 'ggs';
            $page['current_page']   = $page_no;
            $page['lines']          = $lines;
            $page['keywords']       = $keywords;
            $page['highlight_line'] = $line_no;
			// load the page
			$page['theme']            = 'theme_2';
			$page['meta_title']       = 'Sri Guru Granth Sahib Ji -: Ang :  ' . $page_no . ' -: &#2616;&#2620;&#2637;&#2608;&#2624; &#2583;&#2625;&#2608;&#2626; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; &#2588;&#2624; :- SearchGurbani.com';
			$page['meta_description'] = 'Explore,Share and Listen to Audio of Ang  -' . $page_no . ' - of Sri Guru Granth Sahib ji at SearchGurbani.com .';
			$page['meta_keywords']    = 'guru granth sahib, granth,  sikh scripture, sikhism + + +';

			if ($d == 'ajax')
			{
				echo json_encode([
				    'content' => $this->load->viewPartial('forms/page-by-page/guru-granth-sahib', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => $page['meta_keywords'],
                ]);
			}
			else
			{
				$this->load->view('forms/page-by-page/guru-granth-sahib', $page);
			}

		}

        function verse($verse_id, $d = null)
        {
            global $SG_ScriptureTypes;

            $this->load->model('dao/common_dao');

            $data = array(
                'table' => 'S01',
                'where' => array(
                    "verseID" => $verse_id,
                )
            );

            $page['base_url'] = $SG_ScriptureTypes['ggs']['controller_name_dash'] . '/verse';
            $page['start_page'] = 1;
            $page['end_page'] = 20234;
            $page['current_page'] = $verse_id;
            $page['lines'] = $this->common_dao->get_line_verse($data);
            $page['data'] = $page['lines']->result_array();

            // load the page
            $page['theme'] = 'theme_2';
            $page['meta_title'] = 'Sri Guru Granth Sahib Verse';
            $page['meta_description'] = 'This Verse '. $page['data'][0]['punjabi'] . $page['data'][0]['english'] . $page['data'][0]['hindi'];
            $page['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

            if($d == 'ajax'){
                echo json_encode([
                    'content' => $this->load->viewPartial('forms/page-by-page/guru-granth-sahib-verse', $page),
                    'title' => $page['meta_title'],
                    'description' => $page['meta_description'],
                    'keywords' => $page['meta_keywords'],
                ]);
            }else{
                $this->load->view('forms/page-by-page/guru-granth-sahib-verse', $page);
            }
        }

		/**
		 * List of Chapters with its starting
		 * page no.
		 */
		function chapter_index()
		{
			$this->load->model('dao/sri_guru_granth_sahib_dao');

			$page['chapters'] = $this->sri_guru_granth_sahib_dao->get_chapters();

			// load the page
			$page['theme']            = 'theme_2';
			$page['meta_title']       = 'Sri Guru Granth Sahib Ji - Gurbani Index :- SearchGurbani.com ';
			$page['meta_description'] = 'Sri Guru Granth Sahib Ji - Gurbani Index  at SearchGurbani.com';

			$this->load->view('forms/index-pages/ggs-chapter-index', $page);
		}

		/**
		 * List of authors and the page no. in
		 * which their lines starting
		 */
		function author_index()
		{
			$this->load->model('dao/sri_guru_granth_sahib_dao');

			$page['authors'] = $this->sri_guru_granth_sahib_dao->get_authors();

			// load the page
			$page['theme']            = 'theme_2';
			$page['meta_title']       = 'Sri Guru Granth Sahib Author Index :- SearchGurbani.com ';
			$page['meta_description'] = 'Sri Guru Granth Sahib Author Index :SearchGurbani.com ';

			$this->load->view('forms/index-pages/ggs-author-index', $page);
		}

		/**
		 * List of authors and the page no. in
		 * which their lines starting
		 */
		function author($author_name = '')
		{
			$this->load->model('dao/sri_guru_granth_sahib_dao');

			if ($author_name == '')
			{
				redirect('guru-granth-sahib/authors');
				exit();
			}

			$page['author'] = $author_name;

			$page['raags'] = $this->sri_guru_granth_sahib_dao->get_raags_of_author_by_at01($author_name);

			// load the page
			$page['theme']            = 'theme_2';
			$page['meta_title']       = 'Sri Guru Granth Sahib Raags Index - Author: ' . ucwords(str_replace('-', " ", $author_name)) . ' - SearchGurbani.com';
			$page['meta_description'] = 'Sri Guru Granth Sahib Raags Index - Author: ' . ucwords(str_replace('-', " ", $author_name)) . ' - SearchGurbani.com';

			$this->load->view('forms/index-pages/ggs-raag-index', $page);
		}

		function articles()
		{

			// load the page
			$page['theme'] = 'theme_2';

			$this->load->view('pages/guru-granth-sahib-selected-article', $page);
		}

		function hukm()
		{
			// load the page
			$page['theme'] = 'theme_2';

			$this->load->view('pages/guru-granth-sahib-ji', $page);
		}

		/**
		 * Individual Search
		 */
		function search()
		{
			$this->load->model('dao/sri_guru_granth_sahib_dao');

			// load the page
			$page['theme']      = 'theme_2';
			$page['meta_title'] = 'Advanced Search Sri Guru Granth Sahib :- Search Gurbani.com';

			$page['scripture'] = 'ggs';
			$page['authors']   = $this->sri_guru_granth_sahib_dao->get_authors();
			$page['raags']     = $this->sri_guru_granth_sahib_dao->get_raags();

			$this->load->view('forms/individual-search-form', $page);
		}

		/**
		 * Search Results
		 */
		function search_results($index = 0, $d = 'NA')
		{
			$this->load->model('search/Mdl_search');

			$search_results    = $this->session->userdata('search_results');
			$search_parameters = $this->session->userdata('search_parameters');

			$this->load->library('pagination');
			if (empty($search_results['ggs']))
			{
				redirect('guru-granth-sahib/search');
			}

            $config = array('base_url' => '',
                'total_rows' => $search_results['ggs']['result_count'],
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

			$page['search_results'] = $this->Mdl_search->get_results($search_results['ggs']['result_query'], $index);

			$page['search_results_info'] = array(
				"showing_from"  => $index + 1,
				"showing_to"    => ($index + 25 > $search_results['ggs']['result_count'] ? $search_results['ggs']['result_count'] : $index + 25),
				"total_results" => $search_results['ggs']['result_count']
			);
			$page['pagination_links']    = $this->pagination->create_links();
			// load the page
			$page['theme']    = 'theme_2';
			$page['base_url'] = 'guru-granth-sahib/search-results';

			$page['meta_title'] = 'Advanced Search Sri Guru Granth Sahib :- Search Gurbani.com';
			if ($d == 'ajax')
			{
                echo json_encode([
                    'content' => $this->load->viewPartial('forms/guru-granth-sahib-search-results', $page),
                    'title' => $page['meta_title'],
                    'description' => null,
                    'keywords' => null,
                ]);
			}
			else
			{
				$this->load->view('forms/guru-granth-sahib-search-results', $page);

			}
		}

		function shabad($shabad_id = 0, $line = 0, $lineno = 0)
		{
			global $SG_ScriptureTypes, $SG_Preferences;
			$keywords = array();
			$this->load->model('dao/sri_guru_granth_sahib_dao');
			$this->load->model('dao/common_dao');
			if ($shabad_id == 0 && $lineno == 0)
			{
				redirect('guru-granth-sahib/search-results');
			}
			$lines = $this->sri_guru_granth_sahib_dao->get_lines_in_shabad($shabad_id);

			if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes')
			{
				$keywords = $this->common_dao->get_dictionary_words($lines);
			}
			$page['lines']          = $lines;
			$page['shabad_info']    = $lines->result();
			$page['lines']          = $lines;
			$page['keywords']       = $keywords;
			$page['highlight_line'] = $lineno;
			// load the page

			$page['theme'] = 'theme_3';

			$page['meta_title'] = 'Shabad : ' . $page['shabad_info'][0]->translit . ' -' . $page['shabad_info'][0]->punjabi . ' : Sri Guru Granth Sahib : : &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622;';

			$page['meta_description'] = 'This shabad ' . $page['shabad_info'][0]->translit . ' is by ' . $page['shabad_info'][0]->author . ' in Raag ' . $page['shabad_info'][0]->raag . ' on Ang ' . $page['shabad_info'][0]->pageno . 'of Sri Guru Granth Sahib.';


			$this->load->view('forms/page-by-page/guru-granth-sahib-shabad', $page);
		}


		function print_guru_granth_sahib($id = 1)
		{
			$this->load->model('dao/sri_guru_granth_sahib_dao');


			$lines = $this->sri_guru_granth_sahib_dao->get_lines($id);

			$page['content'] = $lines;

			$page['meta_title']       = 'Sri Guru Granth Sahib Ji';
			$page['meta_description'] = 'Sri Guru Granth Sahib Ji';
			$page['meta_keywords']    = 'Sri Guru Granth Sahib Ji ';

			echo $this->load->viewPartial('pages/print-guru-granth-sahib', $page);
		}


	}