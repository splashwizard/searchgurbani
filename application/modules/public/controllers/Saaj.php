<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Saaj extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Musical Instruments in Gurmat Sangeet - SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Asa -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,tabla,harmonium,sitar ';
        $this->load->view('pages/saaj/music', $page);
    }

    function stringed()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Tat vad (stringed instruments) in Gurmat Sangeet - SearchGurbani.com';
        $page['meta_description'] = 'Tat vad (stringed instruments) in Gurmat Sangeet -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,tabla,harmonium,sitar ';
        $this->load->view('pages/saaj/string', $page);
    }

    function wind()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Sushir vad (wind instruments) in Gurmat Sangeet - SearchGurbani.com';
        $page['meta_description'] = 'Sushir vad (wind instruments) in Gurmat Sangeet -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,tabla,harmonium,sitar ';
        $this->load->view('pages/saaj/wind', $page);
    }

    function percussion()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Avanad vad (leather or percussion instruments) in Gurmat Sangeet - SearchGurbani.com';
        $page['meta_description'] = 'Avanad vad (leather or percussion instruments) in Gurmat Sangeet-SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,tabla,harmonium,sitar ';
        $this->load->view('pages/saaj/percussion', $page);
    }

    function tabla()
    {

        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Tabla - SearchGurbani.com';
        $page['meta_description'] = 'Tabla -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,tabla,harmonium,sitar ';
        $this->load->view('pages/saaj/tabla', $page);
    }
}