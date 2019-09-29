<?php defined('BASEPATH') OR exit('No direct script access allowed');

//$root=$_SERVER['DOCUMENT_ROOT'];

class Viewall extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('sample');

    }

    function index()
    {

        $hukamNamaSelect1 = $this->sample->selectHukamnama();
        $dataHukam = array();

        $dataHukam['content'] = $hukamNamaSelect1[0]->content;
        $dataHukam['head'] = $hukamNamaSelect1[0]->head;
        $dataHukam['id'] = $hukamNamaSelect1[0]->id;

        $page['meta_title'] = 'Today ' . date('D d F, Y') . ' Hukumnama Harmandir Sahib, Amritsar :SearchGurbani.com';
        $page['meta_description'] = 'Daily Hukumnama Harmandir Sahib, Amritsar :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, Darbar sahib, Harmandir sahib, Amritsar ';

        $this->load->view('pages/view-all', $dataHukam);


    }


    /*function bangla_sahib($bagla_sahib)
    {

        $hukamNamaBangla1=$this->sample->banglaSahibHukam();
        $dataHukam=array();
        $dataHukam['content']=$hukamNamaBangla1[0]->content;
        $dataHukam['id']=$hukamNamaBangla1[0]->id;
        $dataHukam['bs']=$bagla_sahib;
        $this->load->view('pages/viewall',$dataHukam);


    }

    /*function sis_ganj()
    {

        $hukamNamaSisganj=$this->sample->SisganjSahibHukam();
        $dataHukam=array();
        //echo "<pre>";
        //print_r($hukamNamaBangla);exit;


        $dataHukam['content']=$hukamNamaSisganj[0]->content;
        $dataHukam['id']=$hukamNamaSisganj[0]->id;

        $page['meta_title'] = 'Today '.date('D d F, Y').' Hukumnama Gurudwara Sis Ganj Sahib';
        $page['meta_description'] = 'Daily Hukumnama Sis Ganj Sahib , Delhi :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, Sis Ganj Sahib, Delhi ';

        $this->load->view('templates/header', $page);

        $this->load->view('pages/shish.php',$dataHukam);

        $this->load->view('templates/footer');

    }

    function rakab_ganj()
    {

        $hukamNamaBangla1=$this->sample->RakabganjSahibHukam();
        $dataHukam=array();
        //echo "<pre>";
        //print_r($hukamNamaBangla);exit;


        $dataHukam['content']=$hukamNamaBangla1[0]->content;
        $dataHukam['id']=$hukamNamaBangla1[0]->id;




        $page['meta_title'] = 'Today '.date('D d F, Y').' Hukumnama Gurudwara Rakab Ganj Sahib';
        $page['meta_description'] = 'Daily Hukumnama Rakab Ganj Sahib , Delhi :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, Rakab Ganj Sahib, Delhi ';

        $this->load->view('templates/header', $page);

        $this->load->view('pages/rakab.php',$dataHukam);

        $this->load->view('templates/footer');

    }

    function sangrand()
    {
        $page['meta_title'] = 'Hukumnama of the Month ( Sangrand)';
        $page['meta_description'] = 'Hukumnama of the Month ( Sangrand) :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, sangrand, Delhi ';

        $this->load->view('templates/header', $page);

        $this->load->view('pages/sangrand.php');

        $this->load->view('templates/footer');

    }
    function print_hukamnama($id)
    {

        $hukamNamaBangla1=$this->sample->print_hukamnama($id);
        $dataHukam=array();
        $dataHukam['content']=$hukamNamaBangla1[0]->content;
        $dataHukam['head']=$hukamNamaBangla1[0]->head;

        //$page['meta_title'] = 'Today '.date('D d F, Y').' Hukumnama Bangla Sahib , Delhi';
    //	$page['meta_description'] = 'Daily Hukumnama Bangla Sahib , Delhi :SearchGurbani.com';
    //	$page['meta_keywords'] = 'Hukum, Hukumnama, Bangla sahib, Delhi ';

        $this->load->view('templates/header');

        $this->load->view('pages/print.php',$dataHukam);

        //$this->load->view('templates/footer');

    } */

}