<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sgdv extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Search Gurbani Desktop Version 2.5 Available Now - SearchGurbani.com';
        $page['meta_description'] = 'Download Search Gurbani Desktop version: A cross Platform software for exploring sikh scriptures and displaying Gurbani text on projectors';
        $page['meta_keywords'] = 'Desktop Version, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, Bhai Gurdas, Vaaran, Varan, Mahankosh, Kosh, Hukumnama, Baanis, Japji, jaap, Sukhmani, Ardaas';
        $this->load->view('pages/sgdv.php', $page);
    }

    function jre()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Search Gurbani Desktop Version JRE Requirements- SearchGurbani.com';
        $this->load->view('pages/jre.php', $page);
    }

    function isg()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'iSearchGurbani v4.0 Gurbani Search Software- SearchGurbani.com';
        $page['meta_description'] = 'Download iSearchGurbani: A cross Platform software for exploring sikh scriptures and displaying Gurbani text on projectors . Available for PC, Mac, Linux , Android smartphones and tablets and IPhone and Ipad';
        $page['meta_keywords'] = 'Mobile Version, Gurbani, Shabad Keertan,  Dasam Granth, Guru granth, granth, Bhai Gurdas, Vaaran, Varan, Mahankosh, Kosh, Hukumnama, Baanis, Japji, jaap, Sukhmani, Ardaas';
        $this->load->view('pages/isg.php', $page);
    }

}