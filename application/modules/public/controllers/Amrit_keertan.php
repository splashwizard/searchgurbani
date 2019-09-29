<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Amrit_keertan extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        // load the page
        $page['theme'] = 'theme_3';
        $this->load->view('pages/amrit-kirtan', $page);
    }

    function introduction($kirtan_id = '')
    {

        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Amrit Keertan Gutka -: &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622; :-SearchGurbani.com';
        $page['meta_description'] = 'Sikhism has a venerable tradition of Shabad-Kirtan (Chanting of Hymns in congregational gatherings. Down the centuries an uninterrupted flow of Kirtan has been going on the abodes of the Guru, i.e. Gurdwaras.';
        $page['meta_keywords'] = 'Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('pages/amrit-kirtan', $page);
    }

    /**
     * Chapter Index
     */
    function chapter_index()
    {

        $this->load->model('dao/amrit_keertan_dao');

        $page['chapters'] = $this->amrit_keertan_dao->get_chapters();


        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Amrit Keertan Gutka Chapter Index  :- SearchGurbani.com';
        $page['meta_description'] = 'Explore Amrit Keertan Gutka Chapter Index  at  SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('forms/index-pages/ak-chapter-index', $page);
    }

    /**
     * Shabads in a Chapter
     */
    function chapter($chapter_id = 0, $chapter_name = '')
    {
        $this->load->model('dao/amrit_keertan_dao');

        if ($chapter_id == 0) {
            redirect('amrit-keertan/index/chapter');
        }

        $page['chapter_name'] = $this->amrit_keertan_dao->get_chapter_name($chapter_id);
        $page['shabads'] = $this->amrit_keertan_dao->get_shabads_in_chapter($chapter_id);

        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Amrit Keertan Gutka Shabad Index  :- SearchGurbani.com';
        $page['meta_description'] = 'Explore Amrit Keertan Gutka Shabads Chapter Index  at  SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('forms/index-pages/ak-shabad-index', $page);
    }

    /**
     * Shabads in Translit (english alphabets)
     */
    function english_index($alpha = '')
    {
        $this->load->model('dao/amrit_keertan_dao');

        if ($alpha == '') {
            $alpha = 'A';
        }

        $page['current_alphabet'] = $alpha;
        $page['alphabets'] = array(
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z'
        );
        $page['current_index'] = "index/english";
        $page['shabad_field'] = "shabad_name";
        $page['shabads'] = $this->amrit_keertan_dao->get_shabads_by_alphabet($alpha, 'shabad_name');

        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Amrit Keertan Gutka Alphabetical Shabad Index in English  :- SearchGurbani.com';
        $page['meta_description'] = 'Explore Amrit Keertan Gutka Alphabetical Shabad Index in English at SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('forms/index-pages/ak-shabad-index-by-alpha', $page);
    }

    /**
     * Shabads in Punjabi (punjabi alphabets)
     */
    function punjabi_index($alpha = '')
    {
        $this->load->model('dao/amrit_keertan_dao');

        if ($alpha == '') {
            $alpha = html_entity_decode('&#2581;', 0, 'utf-8');
        }
        $alpha = urldecode($alpha);

        $page['current_alphabet'] = $alpha;
        $page['alphabets'] = array(
            '&#2581;',
            '&#2582;',
            '&#2583;',
            '&#2584;',
            '&#2585;',
            '&#2586;',
            '&#2587;',
            '&#2588;',
            '&#2589;',
            '&#2590;',
            '&#2591;',
            '&#2592;',
            '&#2593;',
            '&#2594;',
            '&#2595;',
            '&#2596;',
            '&#2597;',
            '&#2598;',
            '&#2599;',
            '&#2600;',
            '&#2602;',
            '&#2603;',
            '&#2604;',
            '&#2605;',
            '&#2606;',
            '&#2607;',
            '&#2608;',
            '&#2610;',
            '&#2613;',
            '&#2616;',
            '&#2617;',
            '&#2649;'
        );

        $page['current_index'] = "punjabi";
        $page['shabad_field'] = "shabad_punjabi";
        $page['shabads'] = $this->amrit_keertan_dao->get_shabads_by_alphabet($alpha, 'shabad_punjabi');

        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Amrit Keertan Gutka Alphabetical Shabad Index in Punjabi  :- SearchGurbani.com';
        $page['meta_description'] = 'Explore Amrit Keertan Gutka Alphabetical Shabad Index in Punjabi  at SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('forms/index-pages/ak-shabad-index-by-alpha', $page);
    }

    /**
     * Shabads in Hindi (hindi alphabets)
     */
    function hindi_index($alpha = '')
    {
        $this->load->model('dao/amrit_keertan_dao');

        if ($alpha == '') {
            $alpha = html_entity_decode('&#2325;', 0, 'utf-8');
        }
        $alpha = urldecode($alpha);

        $page['current_alphabet'] = $alpha;
        $page['alphabets'] = array(
            '&#2325;',
            '&#2326;',
            '&#2327;',
            '&#2328;',
            '&#2329;',
            '&#2330;',
            '&#2331;',
            '&#2332;',
            '&#2333;',
            '&#2334;',
            '&#2335;',
            '&#2336;',
            '&#2337;',
            '&#2338;',
            '&#2339;',
            '&#2340;',
            '&#2341;',
            '&#2342;',
            '&#2343;',
            '&#2344;',
            '&#2345;',
            '&#2346;',
            '&#2347;',
            '&#2348;',
            '&#2349;',
            '&#2350;',
            '&#2351;',
            '&#2354;',
            '&#2357;',
            '&#2358;',
            '&#2359;',
            '&#2360;',
            '&#2361;'
        );

        $page['current_index'] = "index/hindi";
        $page['shabad_field'] = "shabad_hindi";
        $page['shabads'] = $this->amrit_keertan_dao->get_shabads_by_alphabet($alpha, 'shabad_hindi');


        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Amrit Keertan Gutka Alphabetical Shabad Index in Hindi  :- SearchGurbani.com';
        $page['meta_description'] = 'Explore Amrit Keertan Gutka Alphabetical Shabad Index in Hindi at SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('forms/index-pages/ak-shabad-index-by-alpha', $page);
    }

    /**
     * Lines in a Shabad
     */
    function shabad($shabad_id = 0, $shabad_name = '', $d = 'line', $line_no = 'NA')
    {
        global $SG_ScriptureTypes, $SG_Preferences;
        $keywords = array();
        $this->load->model('dao/amrit_keertan_dao');
        $this->load->model('dao/common_dao');

        if ($shabad_id == 0) {
            redirect('amrit-keertan/index/chapter');
        }
        $lines = $this->amrit_keertan_dao->get_lines_in_shabad($shabad_id);
        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }

        $lines_result = $lines->result();

        if (!empty($lines_result)) {

            $page['youtubeID'] = $this->amrit_keertan_dao->get_youtubeid_for_shabad($shabad_id);
        }

        $page['shabad_name'] = $shabad_name;
        $page['shabad_id'] = $shabad_id;
        $page['shabad_info'] = $this->amrit_keertan_dao->get_shabad_info($shabad_id);
        $page['lines'] = $lines_result;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = $line_no;
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Shabad : ' . $page['shabad_info']->shabad_name . ' -' . $page['shabad_info']->shabad_punjabi . ' : Amrit Keertan Gutka : : &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622;';
        $page['meta_description'] = 'This shabad ' . $page['shabad_info']->shabad_name . ' is by ' . $page['shabad_info']->author . ' in Raag ' . $page['shabad_info']->raag . ' on Page ' . $page['shabad_info']->pageno . '  in Section ' . $page['shabad_info']->section_name . ' of Amrit Keertan Gutka.';
        $page['meta_keywords'] = 'Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan, shabad, shabd, Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan';

        $this->load->view('forms/page-by-page/amrit-keertan-by-shabad', $page);
    }

    function ajax_remember_me()
    {
        global $SG_ScriptureTypes, $SG_Preferences;

        $page_no = !empty($this->input->get('current_page')) ? $this->input->get('current_page') : 1;

        if ($page_no >= $SG_ScriptureTypes['ak']['page_from'] and $page_no <= $SG_ScriptureTypes['ak']['page_to']) {
            set_cookie('ak_page_no', $page_no, 365 * 24 * 60 * 60);
        }
    }

    function page_by_page()
    {
        global $SG_ScriptureTypes, $SG_Preferences;
        $keywords = array();
        $this->load->model('dao/amrit_keertan_dao');
        $this->load->model('dao/common_dao');

        $page_no = (get_cookie('ak_page_no') != FALSE ? get_cookie('ak_page_no') : $SG_ScriptureTypes['ak']['page_from']);
        $lines = $this->amrit_keertan_dao->get_lines($page_no);
        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }
        $page['scripture'] = 'ak';
        $page['current_page'] = $page_no;
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = 'NA';
        $page['base_url'] = $SG_ScriptureTypes['ak']['controller_name_dash'] . '/page';
        $page['remember_me_url'] = $SG_ScriptureTypes['ak']['controller_name_dash'];

        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Amrit Keertan Gutka:- Page : ' . $page_no . ' -: &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622; : SearchGurbani.com
';
        $page['meta_description'] = 'Explore&nbsp; Page ' . $page_no . ' of Amrit    Kirtan Gutka ( &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622; ) at SearchGurbani.com&nbsp;';

        $this->load->view('forms/page-by-page/amrit-keertan', $page);
    }

    function page($page_no = 65, $d = 'line', $line_no = 'NA')
    {
        global $SG_ScriptureTypes, $SG_Preferences;

        $keywords = array();
        $this->load->model('dao/amrit_keertan_dao');
        $this->load->model('dao/common_dao');


        if ($page_no >= $SG_ScriptureTypes['ak']['page_from'] and $page_no <= $SG_ScriptureTypes['ak']['page_to']) {
            $lines = $this->amrit_keertan_dao->get_lines($page_no);
        } else {
            $page_no = $SG_ScriptureTypes['ak']['page_from'];
            $lines = $this->amrit_keertan_dao->get_lines($page_no);
        }
        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }

        $page['scripture'] = 'ak';
        $page['heading'] = $SG_ScriptureTypes['ak'][1];

        $page['current_page'] = $page_no;
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;

        $page['highlight_line'] = $line_no;
        $page['base_url'] = $SG_ScriptureTypes['ak']['controller_name_dash'] . '/page';
        $page['remember_me_url'] = $SG_ScriptureTypes['ak']['controller_name_dash'];
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Amrit Keertan Gutka:- Page : ' . $page_no . ' -: &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622; : SearchGurbani.com
';
        $page['meta_description'] = 'Explore&nbsp; Page ' . $page_no . ' of Amrit    Kirtan Gutka ( &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622; ) at SearchGurbani.com&nbsp;';

        if ($d == 'ajax') {
            echo json_encode([
                'content' => $this->load->viewPartial('forms/page-by-page/amrit-keertan', $page),
                'title' => $page['meta_title'],
                'description' => $page['meta_description'],
                'keywords' => null,
            ]);
        } else {
            $this->load->view('forms/page-by-page/amrit-keertan', $page);
        }
    }

    function reference($reference_id = '')
    {
        // load the page
        $page['theme'] = 'theme_3';

        $this->load->view('pages/', $page);
    }

    function music($music_id = '')
    {
        // load the page
        $page['theme'] = 'theme_3';

        $this->load->view('pages/', $page);
    }

    function english($alpha_char = '')
    {
        // load the page
        $page['theme'] = 'theme_3';

        $this->load->view('pages/amrit-keertan-english-index', $page);
    }

    function punjabi($punjabi_id = '')
    {
        // load the page
        $page['theme'] = 'theme_3';

        $this->load->view('pages/amrit-keertan-punjabi-index', $page);
    }

    function hindi($hindi_id = '')
    {
        // load the page
        $page['theme'] = 'theme_3';

        $this->load->view('pages/amrit-keertan-hindi-index', $page);
    }

    /**
     * Individual Search
     */
    function search()
    {
        $this->load->model('dao/amrit_keertan_dao');
        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Advance Search Amrit Keertan Gutka  :- SearchGurbani.com';
        $page['meta_description'] = 'Advance Search Amrit Keertan Gutka  :- SearchGurbani.com';

        $page['scripture'] = 'ak';
        $page['authors'] = $this->amrit_keertan_dao->get_authors();
        $page['raags'] = $this->amrit_keertan_dao->get_raags();

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
        if (empty($search_results['ak'])) {
            redirect('amrit-keertan/search');
        }

        $config = array('base_url' => '',
            'total_rows' => $search_results['ak']['result_count'],
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

        $page['base_url'] = 'amrit-keertan/search-results';
        $page['search_results'] = $this->Mdl_search->get_results($search_results['ak']['result_query'], $index);
        $page['search_results_info'] = array(
            "showing_from" => $index + 1,
            "showing_to" => ($index + 25 > $search_results['ak']['result_count'] ? $search_results['ak']['result_count'] : $index + 25),
            "total_results" => $search_results['ak']['result_count']
        );
        $page['pagination_links'] = $this->pagination->create_links();

        // load the page
        $page['theme'] = 'theme_3';
        if ($d == 'ajax') {

            echo json_encode([
                'content' => $this->load->viewPartial('forms/amrit-keertan-search-results', $page),
                'title' => null,
                'description' => null,
                'keywords' => null,
            ]);

        } else {
            $this->load->view('forms/amrit-keertan-search-results', $page);

        }
    }

    function aj_da_shabad()
    {
        global $SG_ScriptureTypes, $SG_Preferences;
        $keywords = array();
        $this->load->model('dao/amrit_keertan_dao');
        $this->load->model('dao/common_dao');

        $page_no = (get_cookie('ak_page_no') != FALSE ? get_cookie('ak_page_no') : $SG_ScriptureTypes['ak']['page_from']);
        $lines = $this->amrit_keertan_dao->get_random_lines($page_no);
        if ($SG_Preferences['mouse_over_gurmukhi_dictionary'] == 'yes') {
            $keywords = $this->common_dao->get_dictionary_words($lines);
        }

        $page['scripture'] = 'ak';
        $page['current_page'] = $page_no;
        $page['lines'] = $lines;
        $page['keywords'] = $keywords;
        $page['highlight_line'] = 'NA';

        // load the page
        $page['theme'] = 'theme_3';
        $page['meta_title'] = 'Amrit Keertan Gutka:- Page : ' . $page_no . ' -: &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622; : SearchGurbani.com
';
        $page['meta_description'] = 'Explore&nbsp; Page ' . $page_no . ' of Amrit    Kirtan Gutka ( &#2565;&#2606;&#2637;&#2608;&#2623;&#2596; &#2581;&#2624;&#2608;&#2596;&#2600; &#2583;&#2625;&#2591;&#2581;&#2622; ) at SearchGurbani.com&nbsp;';

        $this->load->view('forms/page-by-page/aj-da-shabad', $page);
    }

}