<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Introduction extends My_Controller
{
    function introduction()
    {
        parent::__construct();
    }

    function index()
    {

        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Bhai Nand Lal- SearchGurbani.com';
        $page['meta_description'] = 'Bhai Nand Lal -SearchGurbani.com';
        $page['meta_keywords'] = 'Bhai Nand Lal ';
        
        $this->load->view('pages/bhai-nand-lal',$page);
    }


}