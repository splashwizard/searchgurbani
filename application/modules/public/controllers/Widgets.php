<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Widgets extends My_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('sample');
    }

    function widgets_search_Form()
    {
        global $SG_ScriptureTypes;

        $this->load->model('logics/search_logic');


        log_message('info', 'SG: ******* New Search *******');

        $search_text = $this->input->post('SearchData');

        $search_type = $this->input->post('Searchtype');

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


        //print_r($search_scriptures);exit;

        //print_r($this->session);

        $this->search_logic->get_results_count($search_text, $search_type, $search_case_sensitive,

            $search_language, $search_scriptures, $search_author,

            $search_raag, $search_page_from, $search_page_to, $individual_search);

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

            $this->load->view("forms/widgets-search", array("result_counts" => $result_counts));

        }
    }

}