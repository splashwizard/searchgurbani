<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends My_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function layout_css($color = 'maroon')
    {
        $data['bg_color'] = $color;
        $this->load->view('media/layout', $data);
        header("Content-type: text/css");
    }
}