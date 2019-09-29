<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Unicode extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Enabling Unicode Fonts- SearchGurbani.com';
        
        $this->load->view('pages/unicode', $page);
    }


}