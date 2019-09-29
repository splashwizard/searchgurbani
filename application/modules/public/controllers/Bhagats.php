<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bhagats extends My_Controller
{
    function  __construct()
    {
        parent::__construct();
    }

    function index()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Sikh Bhagat Sahiban- SearchGurbani.com';
        
        $this->load->view('pages/bhagats.php',$page);
    }

    function baba_farid()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Baba Sheik Farid :SearchGurbani.com';
        $page['meta_description'] = 'Baba Sheik Farid -SearchGurbani.com';
        
        $this->load->view('pages/bhagats/baba-farid',$page);

    }

    function bhagat_kabir()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Kabir :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Kabeer-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-kabir',$page);

    }

    function bhagat_beni()
    {
        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Beni :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Beni-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-beni',$page);

    }

    function bhagat_ravidas()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Ravidas :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Ravidaas -SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-ravidas',$page);

    }

    function bhagat_namdev()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Naam Dev  :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Naam Dev -SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-namdev',$page);

    }

    function bhagat_sadhna()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Sadhana :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Sadhana-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-sadhna',$page);
    }

    function bhagat_bhikan()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Bhikan :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Bhikan-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-bhikan',$page);

    }

    function bhagat_parmanand()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Parmanand :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Parmanand-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-parmanand',$page);

    }

    function bhagat_sain()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Sain :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Sain-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-sain',$page);

    }

    function bhagat_dhanna()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Dhanna :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Dhanna-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-dhanna',$page);

    }

    function bhagat_pipa()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Pipa :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Pipa-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-pipa',$page);

    }

    function bhagat_surdas()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Surdas :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Surdas-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-surdas',$page);

    }

    function bhagat_jaidev()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Jaidev :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Jaidev-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-jaidev',$page);

    }

    function bhagat_ramanand()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Ramanand :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Ramanand-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-ramanand',$page);

    }

    function bhagat_trilochan()
    {

        // load the page
        $page['theme'] = 'theme_8';
        $page['meta_title'] = 'Bhagat Trilochan :SearchGurbani.com';
        $page['meta_description'] = 'Bhagat Trilochan-SearchGurbani.com';

        $this->load->view('pages/bhagats/bhagat-trilochan',$page);

    }


}