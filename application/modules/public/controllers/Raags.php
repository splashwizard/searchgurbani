<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Raags extends My_Controller
{
    function __construct()

    {
        parent::__construct();
    }

    function index()
    {
        // load the page
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raags - SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Sri, Devghandhari, Jaitsiri, Bilawal, Maru, Sarang, Majh, Bihagra, Todi,Gaund, Tukhari, Malhar, Gauri ,Wadhans, Berari, Ramkali, Kedara, Kanara, Asa ,Sorath, Tilang, Nutnarain, Bhairav, Kalyan, Gujri ,Dhanasri, Suhi ,Mali Gaura, Basant, Parbhati, Jaijaiwanti  ';
        $this->load->view('pages/raags/raags', $page);
    }

    function raag_asa()
    {
        // load the page
        $page['audio'] = 'raag_asa.mp3';
        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Raag Asa :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Asa -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,asa, aasa  ';
        $this->load->view('pages/raags/raag-asa', $page);
    }
    
    function raags_time()
    {		// load the page
        $page['theme'] = 'theme_6';
        
        $page['meta_title'] = 'Gurbani Raag Time  :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Time  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,timing ';
        $this->load->view('pages/raags/raags-time', $page);
    }

    function glossary()
    {
        $page['theme'] = 'theme_6';
    
        $page['meta_title'] = 'Glosssary of Indian Musical Terms  :SearchGurbani.com';
        $page['meta_description'] = 'Musical Terms in Gurbani  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag, Musical Glossary ';
        $this->load->view('pages/raags/glossary', $page);
    }

    function raag_gauri()
    {        // load the page
        $page['audio'] = 'raag_gauri.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Gauri :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Gauri -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,gauri, gauhree ';
        $this->load->view('pages/raags/raag-gauri', $page);
    }

    function raag_dhanasri()
    {        // load the page
        $page['audio'] = 'raag_dhanasri.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Asa :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Asa -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,dhanasri ';
        $this->load->view('pages/raags/raag-dhanasri', $page);
    }

    function raag_siri()
    {        // load the page
        $page['audio'] = 'raag_siri.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Siri, Sri :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Siri -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,sri, siri';
        $this->load->view('pages/raags/raag-siri', $page);
    }

    function raag_majh()
    {        // load the page
        $page['audio'] = 'raag_majh.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Majh :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Maajh -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag , majh, maajh ';
        $this->load->view('pages/raags/raag-majh', $page);
    }

    function raag_gujri()
    {        // load the page
        $page['audio'] = 'raag_gujri.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Gujri Goojree :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Gujri Goojree -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,gujri, goojree ';
        $this->load->view('pages/raags/raag-gujri', $page);
    }

    function raag_devgandhari()
    {        // load the page
        $page['audio'] = 'raag_devgandhari.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Devgandhari :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Devgandhari-SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Devgandhari ';
        $this->load->view('pages/raags/raag-devgandhari', $page);
    }

    function raag_bihagara()
    {        // load the page
        $page['audio'] = 'raag_bihagara.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Bihagaraa :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Bihagaraa -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Bihagara ';
        $this->load->view('pages/raags/raag-bihagara', $page);
    }

    function raag_vadahans()
    {        // load the page
        $page['audio'] = 'raag_vadahans.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Vadhans Wadahans :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Vadhans Wadahans -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Vadhans Wadahans ';
        $this->load->view('pages/raags/raag-vadahans', $page);
    }

    function raag_sorathi()
    {        // load the page
        $page['audio'] = 'raag_sorath.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Sorath :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Sorath -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Sorath,Sorathi ';
        $this->load->view('pages/raags/raag-sorath', $page);
    }

    function raag_jaitsri()
    {        // load the page
        $page['audio'] = 'raag_jaitsri.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Jaitsri :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Jaitsri -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Jaitsri ';
        $this->load->view('pages/raags/raag-jaitsri', $page);
    }

    function raag_todi()
    {        // load the page
        $page['audio'] = 'raag_todi.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Todi, Todee :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Todi, Todee  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Todi, Todee ';
        $this->load->view('pages/raags/raag-todi', $page);
    }

    function raag_bairari()
    {        // load the page
        $page['audio'] = 'raag_bairari.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Bairari :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Bairari -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Bairari, Bairrarhi ';
        $this->load->view('pages/raags/raag-bairari', $page);
    }

    function raag_tilang()
    {        // load the page
        $page['audio'] = 'raag_tilang.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Tilang :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Tilang -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Tilang ';
        $this->load->view('pages/raags/raag-tilang', $page);
    }

    function raag_suhi()
    {        // load the page
        $page['audio'] = 'raag_suhi.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Suhi Soohee :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Suhi Soohee  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Suhi, Soohee ';
        $this->load->view('pages/raags/raag-suhi', $page);
    }

    function raag_bilaval()
    {        // load the page
        $page['audio'] = 'raag_bilaval.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Bilaval :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Bilaval-SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Bilaval ';
        $this->load->view('pages/raags/raag-bilaval', $page);
    }

    function raag_gond()
    {        // load the page
        $page['audio'] = 'raag_gond.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Gond Gaund:SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Gond Gaund-SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Gond ,Gaund ';
        $this->load->view('pages/raags/raag-gond', $page);
    }

    function raag_ramkali()
    {        // load the page
        $page['audio'] = 'raag_ramkali.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Ramkali Raamkali :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Ramkali Raamkali -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Ramkali ';
        $this->load->view('pages/raags/raag-ramkali', $page);
    }

    function raag_nutnarain()
    {        // load the page
        $page['audio'] = 'raag_nutnarain.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Nut Narain :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Nut Narain  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Nut Narain  ';
        $this->load->view('pages/raags/raag-nutnarain', $page);
    }

    function raag_maligaura()
    {        // load the page

        $page['audio'] = 'raag_maligaura.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Mali Gaura :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Mali Gaura -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Mali Gaura ';
        $this->load->view('pages/raags/raag-maligaura', $page);
    }

    function raag_tukhari()
    {        // load the page
        $page['audio'] = 'raag_tukhari.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Tukhari :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Tukhari -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Tukhari ';
        $this->load->view('pages/raags/raag-tukhari', $page);
    }

    function raag_maru()
    {        // load the page
        $page['audio'] = 'raag_maru.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Maru, Maroo :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Maru, Maroo -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,maru, maroo, maaru ';
        $this->load->view('pages/raags/raag-maru', $page);
    }

    function raag_kedara()
    {        // load the page
        $page['audio'] = 'raag_kedara.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Kedara :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Kedara -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,kedara, kaydaraaa ';
        $this->load->view('pages/raags/raag-kedara', $page);
    }

    function raag_bhairav()
    {        // load the page
        $page['audio'] = 'raag_bhairav.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Bhairav :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Bhairav -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Bhairav, Bhaira-o ';
        $this->load->view('pages/raags/raag-bhairav', $page);
    }

    function raag_basant()
    {        // load the page
        $page['audio'] = 'raag_basant.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Basant :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Basant -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Basant ';
        $this->load->view('pages/raags/raag-basant', $page);
    }

    function raag_sarang()
    {        // load the page
        $page['audio'] = 'raag_sarang.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Sarang :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Sarang -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Sarang ';
        $this->load->view('pages/raags/raag-sarang', $page);
    }

    function raag_malar()
    {        // load the page
        $page['audio'] = 'raag_malar.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Malar Malaar :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Malar Malaar -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Malar, Malaar ';
        $this->load->view('pages/raags/raag-malar', $page);
    }

    function raag_kanara()
    {        // load the page
        $page['audio'] = 'raag_kanara.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Kanara :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Kanara -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Kanara ';
        $this->load->view('pages/raags/raag-kanara', $page);
    }

    function raag_kalyan()
    {        // load the page
        $page['audio'] = 'raag_kalyan.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Kalyan :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Kalyan -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Kalyan ';
        $this->load->view('pages/raags/raag-kalyan', $page);
    }

    function raag_prabhati()
    {        // load the page
        $page['audio'] = 'raag_prabhati.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Prabhati :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Prabhati -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Prabhati ';
        $this->load->view('pages/raags/raag-prabhati', $page);
    }

    function raag_jaijaiwanti()
    {        // load the page

        $page['audio'] = 'raag_jaijaiwanti.mp3';
        $page['theme'] = 'theme_6';
        $page['meta_title'] = 'Gurbani Raag Jaijaivanti :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Raag Jaijaivanti  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Jaijaivanti ';
        $this->load->view('pages/raags/raag-jaijaiwanti', $page);
    }

    function thaat_asavari()
    {        // load the page
        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Asavari :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Asavari -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Thaat ,Asavari ';
        $this->load->view('pages/raags/thaat-asavari', $page);
    }

    function thaat_bhairav()
    {        // load the page
        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Bhairav :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Bhairav  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Thaat, Bhairav ';
        $this->load->view('pages/raags/thaat-bhairav', $page);
    }

    function thaat_bilaval()
    {        // load the page
        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Bilaval :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Bilaval -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Thaat ,Bilaval ';
        $this->load->view('pages/raags/thaat-bilaval', $page);
    }

    function thaat_bhairavi()
    {        // load the page
        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Bhairavi :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Bhairavi  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Thaat, Bhairavi ';
        $this->load->view('pages/raags/thaat-bhairavi', $page);
    }

    function thaat_kalyan()
    {        // load the page

        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Kalyan :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Kalyan -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Thaat ,Kalyan ';
        $this->load->view('pages/raags/thaat-kalyan', $page);
    }

    function thaat_khamaj()
    {        // load the page
        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Khamaj :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Khamaj  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Thaat, Khamaj ';
        $this->load->view('pages/raags/thaat-khamaj', $page);
    }

    function thaat_marwa()
    {        // load the page

        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Marwa :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Marwa -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Thaat ,Marwa ';
        $this->load->view('pages/raags/thaat-marwa', $page);
    }

    function thaat_poorvi()
    {        // load the page

        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Poorvi :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Poorvi  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Thaat, Poorvi ';
        $this->load->view('pages/raags/thaat-poorvi', $page);
    }

    function thaat_todi()
    {        // load the page

        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Todi :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Todi -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Thaat ,Todi ';
        $this->load->view('pages/raags/thaat-todi', $page);
    }

    function thaat_kafi()
    {        // load the page
        $page['theme'] = 'theme_6';

        $page['meta_title'] = 'Gurbani Thaat Kafi :SearchGurbani.com';
        $page['meta_description'] = 'Gurbani Thaat Kafi  -SearchGurbani.com';
        $page['meta_keywords'] = 'Gurbaanee Keertan,Gurmat,Gurbani,Raag ,Thaat, Kafi ';
        $this->load->view('pages/raags/thaat-kafi', $page);
    }
}