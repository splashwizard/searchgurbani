<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dasam_granth extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // load the page
        $page['theme'] = 'theme_5';

        $this->load->view('pages/dasam-granth-sahib', $page);
    }

    function introduction()
    {
        // load the page
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Sri Dasam Granth Sahib : &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; :- SearchGurbani.com';
        $page['meta_description'] = 'Sri Dasam Granth Sahib : &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; :- SearchGurbani.com';

        $this->load->view('pages/dasam-granth-sahib', $page);
    }

    function chapter_index($lang_type = 'en')
    {

        $this->load->model('dao/dasam_granth_dao');

        $page['chapters'] = $this->dasam_granth_dao->get_chapters($lang_type);

        // load the page
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Sri Dasam Granth Sahib Chapter Index : &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; :- SearchGurbani.com';
        $page['meta_description'] = 'Explore Sri Dasam Granth Sahib Chapter Index : &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; at SearchGurbani.com';

        $this->load->view('forms/index-pages/dg-chapter-index', $page);
    }

    function ajax_remember_me()
    {
        global $SG_ScriptureTypes, $SG_Preferences;

        $page_no = !empty($this->input->get('current_page')) ? $this->input->get('current_page') : 1;


        if ($page_no >= $SG_ScriptureTypes['dg']['page_from'] and
            $page_no <= $SG_ScriptureTypes['dg']['page_to']
        ) {
            set_cookie('dg_page_no', $page_no, 365 * 24 * 60 * 60);
        }
    }

    function page_by_page()
    {
        global $SG_ScriptureTypes, $SG_Preferences;
        $keywords = array();

        $this->load->model('dao/dasam_granth_dao');
        $this->load->model('dao/common_dao');

        $page_no = (get_cookie('dg_page_no') != false ? get_cookie('dg_page_no') : $SG_ScriptureTypes['dg']['page_from']);

        $lines = $this->dasam_granth_dao->get_lines($page_no);
        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }

        $page['scripture'] = 'dg';
        $page['current_page'] = $page_no;
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = 'NA';
        $page['base_url'] = $SG_ScriptureTypes['dg']['controller_name_dash'] . '/page';
        $page['remember_me_url'] = $SG_ScriptureTypes['dg']['controller_name_dash'];
        // load the page
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Sri Dasam Granth Sahib : - Page : ' . $page_no . ' -: &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; :- SearchGurbani.com';
        $page['meta_description'] = 'Explore Page :' . $page_no . '  of Sri Dasam Granth Sahib : &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; at SearchGurbani.com';

        $this->load->view('forms/page-by-page/dasam-granth', $page);
    }

    function page($page_no = 1, $d = 'line', $line_no = 'NA')
    {
        global $SG_ScriptureTypes, $SG_Preferences;
        $keywords = array();

        $this->load->model('dao/dasam_granth_dao');
        $this->load->model('dao/common_dao');


        if ($page_no >= $SG_ScriptureTypes['dg']['page_from'] and $page_no <= $SG_ScriptureTypes['dg']['page_to']) {
            $lines = $this->dasam_granth_dao->get_lines($page_no);
        } else {
            $page_no = $SG_ScriptureTypes['dg']['page_from'];
            $lines = $this->dasam_granth_dao->get_lines($page_no);
        }
        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }

        $page['heading'] = $SG_ScriptureTypes['dg'][1];
        $page['base_url'] = $SG_ScriptureTypes['dg']['controller_name_dash'] . '/page';

        $page['scripture'] = 'dg';
        $page['current_page'] = $page_no;
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = $line_no;
        $page['remember_me_url'] = $SG_ScriptureTypes['dg']['controller_name_dash'];
        // load the page
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Sri Dasam Granth Sahib : - Page : ' . $page_no . ' -: &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; :- SearchGurbani.com';
        $page['meta_description'] = 'Explore Page :' . $page_no . '  of Sri Dasam Granth Sahib : &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; at SearchGurbani.com';

        if ($d == 'ajax') {
            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/dasam-granth', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => null,
            ]);
        } else {
            $this->load->view('forms/page-by-page/dasam-granth', $page);
        }

    }

    function articles()
    {

        // load the page
        $page['theme'] = 'theme_5';
        $this->load->view('templates/header', $page);

        $this->load->view('templates/footer');
    }

    /**
     * Individual Search
     */
    function search()
    {

        // load the page
        $page['theme'] = 'theme_5';
        $page['meta_title'] = 'Advance Search  Sri Dasam Granth Sahib : &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; :- SearchGurbani.com';
        $page['meta_description'] = 'Advance Search  Sri Dasam Granth Sahib : &#2616;&#2637;&#2608;&#2624; &#2598;&#2616;&#2606; &#2583;&#2637;&#2608;&#2672;&#2597; &#2616;&#2622;&#2617;&#2623;&#2604; :- SearchGurbani.com';

        $page['scripture'] = 'dg';
        $page['authors'] = array();
        $page['raags'] = array();

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

        if (empty($search_results['dg'])) {
            redirect('dasam-granth/search');
        }

        $config = array('base_url' => '',
            'total_rows' => $search_results['dg']['result_count'],
            'full_tag_open' => '<ul class="pagination">',
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
            'anchor_open' => '<a href="javascript:loadPage(',
            'anchor_close' => ');">'
        );

        $this->pagination->initialize($config);

        $page['search_results'] = $this->Mdl_search->get_results($search_results['dg']['result_query'], $index);
        $page['search_results_info'] = array("showing_from" => $index + 1,
            "showing_to" => ($index + 25 > $search_results['dg']['result_count'] ? $search_results['dg']['result_count'] : $index + 25),
            "total_results" => $search_results['dg']['result_count']
        );
        $page['pagination_links'] = $this->pagination->create_links();

        // load the page
        $page['theme'] = 'theme_5';
        $page['base_url'] = 'dasam-granth/search-results';

        if ($d == 'ajax') {
            echo json_encode([
                'content' => $this->load->viewPartial('forms/dasam-granth-search-results', $page),
                'title' => null,
                'description' => null,
                'keywords' => null,
            ]);
        } else {
            $this->load->view('forms/dasam-granth-search-results', $page);

        }
    }

    function shabad($shabad_id = 0, $line = 0, $lineno = 0)
    {

        global $SG_ScriptureTypes, $SG_Preferences;
        $keywords = array();
        $this->load->model('dao/dasam_granth_dao');
        $this->load->model('dao/common_dao');
        if ($shabad_id == 0 && $lineno == 0) {

            redirect('guru-granth-sahib/search-results');
        }
        $lines = $this->dasam_granth_dao->get_lines_in_shabad($shabad_id);

        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }
        $page['lines'] = $lines;
        $page['shabad_info'] = $lines->result();
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = $lineno;
        // load the page

        $page['theme'] = 'theme_3';

        $page['meta_title'] = 'Shabad : ' . $page['shabad_info'][0]->translit . ' -' . $page['shabad_info'][0]->punjabi . ' : Sri Guru Granth Sahib : : &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622;';

        $page['meta_description'] = 'This shabad ' . $page['shabad_info'][0]->translit . ' on Ang ' . $page['shabad_info'][0]->pageID . 'of Sri Guru Granth Sahib.';


        $this->load->view('forms/page-by-page/dasam-granth-by-shabad', $page);
    }

    function verse($verse_id, $d = null)
    {
        global $SG_ScriptureTypes;
        $this->load->model('dao/common_dao');

        $data = array(
            'table' => 'D01',
            'where' => array(
                "verseID" => $verse_id,
            )
        );

        $page['lines'] = $this->common_dao->get_line_verse($data);
        $page['data'] = $page['lines']->result_array();
        $page['current_page'] = $verse_id;
        $page['start_page'] = 1;
        $page['end_page'] = 17178;
        $page['base_url'] = $SG_ScriptureTypes['dg']['controller_name_dash'] . '/verse';
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Sri Dasam Granth Sahib Verse';
        $page['meta_description'] = 'This Verse ' . $page['data'][0]['punjabi'] . $page['data'][0]['english'] . $page['data'][0]['hindi'];
        $page['meta_keywords'] = 'Gurbani Kirtan, Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';


        if ($d == 'ajax') {

            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/dasam-granth-verse', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => $page['meta_keywords'],
            ]);
        } else {
            $this->load->view('forms/page-by-page/dasam-granth-verse', $page);
        }

    }

}