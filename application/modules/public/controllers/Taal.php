<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Taal extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // load the page

        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Gurbani Raag : Taal - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/taal', $page);
    }

    function taal_char()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Taal Char- SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/taal-char', $page);
    }

    function taal_chau()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Taal Chau - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/taal-chau', $page);
    }

    function taal_dadra()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Taal Dadra - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/taal-dadra', $page);
    }

    function taal_ek()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Taal Ek - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/taal-ek', $page);
    }

    function taal_rupak()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Taal Rupak  - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/taal-rupak', $page);
    }

    function taal_teen()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Taal Teen - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/taal-teen', $page);
    }

    function tali()
    {
        // load the page.
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Tali - Clapping of hands  - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/tali', $page);
    }

    function theka()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Theka - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/theka', $page);
    }

    function vibhag()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Vibhag : The measure  - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/vibhag', $page);
    }

    function khali()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Khali: The wave of the hand  - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/khali', $page);
    }

    function lay()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Lay (Laya): The tempo  - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/lay', $page);
    }

    function matra()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Matra: The beat   - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/matra', $page);
    }

    function bol()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Bol : Rhythmic Mnemonic   - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/bol', $page);
    }

    function avartan()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Avartan: The Cycle in Indian Music  - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/avartan', $page);
    }

    function sam()
    {
        // load the page
        $page['theme'] = 'theme_7';
        $page['meta_title'] = 'Sam: The first beat  - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism,kirtan,keertan,raag,taal,thaat, teen tal, gurbani';
        $this->load->view('pages/taal/sam', $page);
    }
}