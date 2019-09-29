<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sggs_kosh extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('logics/book_search');
        $this->load->model('dao/resources_dao');
        $this->load->library('pagination');
    }

    function index()
    {
        $page['inner_view'] = array('book_name' => 'SGGS Kosh', 'book_controller' => 'sggs_kosh', 'ac_source' => 'SK01');
        // load the page
        $page['theme'] = 'theme_7';
        $this->load->view('pages/sggs-kosh', $page);
    }

    function do_search($keyword = '', $alpha = '')
    {
        if ($keyword != '') {
            $keyword = $keyword;
        } elseif ($this->input->post('keyword') != '') {
            $keyword = $this->input->post('keyword');
        } else {
            redirect('sggs-kosh');
            exit;
        }
        $keyword = urldecode($keyword);
        $this->session->set_userdata('sggs_kosh_keyword', $keyword);
        $this->session->set_userdata('sggs_kosh_alpha', $alpha);

        redirect('sggs-kosh/view');
    }

    function view($index = 0)
    {
        $keyword = $this->session->userdata('sggs_kosh_keyword');
        $alpha = $this->session->userdata('sggs_kosh_alpha');

        $this->load->library('pagination');

    
        $page['lines_count'] = $this->resources_dao->get_kosh_lines_count($keyword, 'SK01', $alpha);
    
        $config = array('base_url' => site_url('sggs-kosh/view/'),
                        'total_rows' => $page['lines_count'],
                        'per_page' => '25'
        );
        $this->pagination->initialize($config);
    
        $page['search_results_info'] = array("showing_from" => $index + 1,
                                             "showing_to" => ($index + 25 > $page['lines_count'] ? $page['lines_count'] : $index + 25),
                                             "total_results" => $page['lines_count']
        );
        $page['pagination_links'] = $this->pagination->create_links();
    
        $page['lines'] = $this->resources_dao->get_kosh_lines($keyword, 'SK01', $index, $alpha);
        $page['keyword'] = $this->session->userdata('sggs_kosh_keyword');
        
        // load the page
        $page['theme'] = 'theme_7';
        $this->load->view('forms/search-results/sggs-kosh', $page);
    }


}