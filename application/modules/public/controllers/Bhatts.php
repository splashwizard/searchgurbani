<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bhatts extends My_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatts and Bards  - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatts',$page);
    }

    function bhatt_salh()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Salh- SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-salh',$page);
    }

    function bhatt_balh()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Balh - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-balh',$page);
    }

    function bhatt_bhalh()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Bhalh - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-bhalh',$page);
    }

    function bhatt_bhika()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Bhika - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-bhika',$page);
    }

    function bhatt_gyand()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Gyand - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-gyand',$page);
    }

    function bhatt_haribans()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Haribans - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-haribans',$page);
    }

    function bhatt_jalap()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Jalap - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-jalap',$page);
    }

    function bhatt_kalshar()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Kalshar - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-kalshar',$page);
    }

    function bhatt_kirat()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Kirat - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-kirat',$page);
    }

    function bhatt_mathura()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Mathura - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-mathura',$page);
    }

    function bhatt_nalh()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhatt Nalh - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/bhatt-nalh',$page);
    }

    function satta()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Satta & Balwand - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/satta',$page);
    }

    function mardana()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhai Mardana - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/mardana',$page);
    }

    function sunderbaba()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Sunder Baba - SearchGurbani.com';
        $page['meta_keywords'] = 'Sikh, sikhism, salh, gyand, balh,nalh, mathura, kirat, bhika, kalshar,';
        $this->load->view('pages/bhatts/sunderbaba',$page);
    }
}