<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Controller
{

    function index()
    {
        // load the page
        $page['theme'] = 'theme_1';
        $page['meta_title'] = 'Search Gurbani : Gurbani Research Website';
        $page['meta_description'] = 'A comprehensive web site on research and  exploration of Sri Guru Granth Sahib, Amrit Keertan Gutka, Bhai Gurdas Vaaran, Kabit Bhai Gurdaas ,Sri Dasam Granth Sahib, exegesis , Gurbani, Gurbanee vichaar';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat Sangeet, Gurbani Kirtan,Amrit Keertan, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, kabit, Bhai Gurdas, Vaaran, Varan, Mahankosh, Kosh, Hukumnama, Baanis, Japji, jaap, Sukhmani, Ardaas';
        $page['search_form']=$this->load->viewPartial('forms/search-form');
        $this->load->view('pages/index', $page);
    }

    /**
     * Method to search the given keyword with multiple criterias
     */
    function search()
    {
        $this->load->model('sample');

        $search_keyword = $this->input->post("SearchData");

        echo "
		<style>
		.hl {
			background-color:yellow;
			color:red;
		}
		</style>
		";
        $search_keyword = $this->clean_keywords($search_keyword);
        $ar_search_keyword = explode(" ", $search_keyword);

        $res = $this->sample->get_ak_results($search_keyword);
        if ($res === false) {
            echo "Not found";
        } else {
            //echo "<pre>";
            foreach ($res->result() as $row) {
                $shabad_name = $row->shabad_name;
                foreach ($ar_search_keyword as $keyword) {
                    $shabad_name = eregi_replace($keyword, "<span title='" . $row->shabad_punjabi . "' class='hl'>" . $keyword . "</span>", $shabad_name);
                }
                echo $shabad_name . "<br />";
            }
            //echo "</pre>";
        }
    }

    function clean_keywords($keyword)
    {
        $keyword = ereg_replace("[^[:alnum:]+]", " ", $keyword);
        return $keyword;
    }

    function search_results_preview()
    {
        global $SG_ScriptureTypes;
        $this->load->model('search/Mdl_search');

        log_message('info', 'SG: ******* New Search *******');

        $search_text = $this->input->post('SearchData');

        $search_type = $this->input->post('Searchtype');

        $search_tableID='';
        $search_from='';

        $search_case_sensitive = $this->input->post('case');

        $search_language = $this->input->post('language');

        $search_author = $this->input->post('author');

        $search_raag = $this->input->post('raag');

        $search_page_from = $this->input->post('page_from');

        $search_page_to = $this->input->post('page_to');

        $individual_search = $this->input->post('individual_search');

        $search_scriptures = array();

        if ($this->input->post('ggs') == 1)
            $search_scriptures[] = "ggs";

        if ($this->input->post('ak') == 1)
            $search_scriptures[] = "ak";

        if ($this->input->post('bgv') == 1)
            $search_scriptures[] = "bgv";

        if ($this->input->post('dg') == 1)
            $search_scriptures[] = "dg";

        if ($this->input->post('ks') == 1)
            $search_scriptures[] = "ks";

        if($this->input->post('bnl') == 1)
            $search_scriptures[] = "bnl";

        $this->Mdl_search->search_logic_count($search_text, $search_type, $search_tableID, $search_case_sensitive,
            $search_language, $search_scriptures, $search_author, $search_raag, $search_page_from, $search_page_to,
            $individual_search, $search_from);

        $result_counts = $this->session->userdata('search_results');

        if ($individual_search == 1) {
            foreach ($result_counts as $scripture => $result) {
                if ($result['result_count'] > 0) {
                    redirect($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/search-results/');
                } else {
                    $this->session->set_flashdata("response", "<div class='info'>No results found</div>");
                    redirect($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/search/');
                }
            }
        } else {
            
            $result_counts = $this->session->userdata('search_results');
            // load the page
            $page['theme'] = 'theme_7';
            $page['result_counts']=$result_counts;
            $this->load->view("forms/search-results-preview", $page);
        }
    }

    function test_pdf()
    {
//        $html = 'Test';
//
//        $this->load->plugin('to_pdf');
//         page info here, db calls, etc.
//        $html = $this->load->view('controller/viewfile', $data, true);
//        echo $html;
//        pdf_create($html, 'SearchGurbani');
    }

}