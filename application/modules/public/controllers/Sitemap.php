<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Sitemap - SearchGurbani.com';
        $this->load->view('pages/sitemap', $page);
    }


}