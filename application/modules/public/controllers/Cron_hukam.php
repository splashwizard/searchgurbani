<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_hukam extends My_Controller
{
    function __construct()
    {
        parent::__construct();


    }

    function cronMail()
    {

        // if(!$this->input->is_cli_request())
        // {
        //     echo "This script can only be accessed via the command line" . PHP_EOL;
        //     return;
        // }

        $this->load->model('sample');

        /*Hukamnama From Sri Harminder Sahib Start*/

        $newsUrl = 'http://www.sgpc.net/hukumnama/index.asp';
        $newsContents = file_get_contents($newsUrl);
        $startDiv = '<table width="88%" border="0" cellspacing="1" cellpadding="1">';
        $endDiv = '<table width="87%" border=';
        $headDiv = stringSearch($startDiv, $endDiv, $newsContents);

        $startContent = '</font><font color="#000079"><strong><font size="+1" face="WebAkharSlim" color="#cc3333">';
        $endContent = '<p align="justify"><font face="Arial"><font size="-1"><u>';
        $firstDiv = stringSearch($startContent, $endContent, $newsContents);

        $startPart = '<p align="justify"><font face="Arial"><font size="-1"><u><font size="3" color="#000000">English';
        $endPart = '<A href=';
        $secondDiv = stringSearch($startPart, $endPart, $newsContents);


        $dateDiv = '<font size="4" color="#000000" face="Georgia, Times New Roman, Times, serif"';
        $endDate = '</font>';
        $dateDiv = stringSearch($dateDiv, $endDate, $newsContents);


        if (!empty($firstDiv)) {
            $dateRaw = $dateDiv[0];

            //echo $dateRaw;
            $dateExpo = explode(' ', $dateRaw);

            $month = $dateExpo[0];
            $mnth = explode('[', $month);
            $monthFnl = $mnth[1];
            $mnthh = date("m", strtotime($monthFnl));

            $day = $dateExpo[1];
            $dayFnl = str_replace(',', "", $day);

            $year = $dateExpo[2];
            $yearFnl = str_replace(',', "", $year);


            $dateFnl = date("Y-m-d", mktime(0, 0, 0, $mnthh, $dayFnl, $yearFnl));
            $today = date("Y-m-d");

            $hukamNamaSelect = $this->sample->countHukamnama($dateFnl);
            $count = count($hukamNamaSelect);

            if (empty($hukamNamaSelect)) {
                $hukamNama = $this->sample->insertHukamnama(addslashes($firstDiv[0] . '<p align="justify"><font face="Arial"><font size="-1"><u><font size="3" color="#000000">English' . $secondDiv[0]), addslashes($headDiv[0]), $dateFnl);
            }
        }

        /*Hukamnama From Sri Harminder Sahib End*/

        /*Hukamnama From Bangla Sahib Start*/
        $newsUrl = 'http://www.dsgmc.in/index.php?option=com_content&view=article&id=164&Itemid=71';
        $newsContents = file_get_contents($newsUrl);
        $startContent = '<p style="text-align: left;"><span style="color: #000000; font-family: Georgia, Times New Roman, Times, serif;"><span style="font-size: 12pt;">';
        $endContent = '<td width="23%" height="23" style="text-align: right;"><span style="font-family: arial; font-size: small;">';
        $firstDiv = stringSearch($startContent, $endContent, $newsContents);
// echo "<pre>";
// print_r($firstDiv);
// echo "</pre>";
        if (!empty($firstDiv)) {
            $conTent = $firstDiv[0];
            $arr = explode(" ", $conTent);

            $month = $arr[0];
            $mnth = explode('[', $month);
            $monthFnl = $mnth[1];
            $mnthh = date("m", strtotime($monthFnl));
            //echo "<br/>";
            $day = str_replace(',', "", $arr[1]);
            $dateFnl = date("Y-m-d", strtotime(str_replace(',', "", $day) . " " . $monthFnl));

            $year = $arr[2];
            //echo $yearFnl=date("Y");//str_replace(',',"",$year);
            //echo "<br/>";
            //$dateFnl=date("Y-m-d", mktime(0, 0, 0, $mnthh, $dayFnl, $yearFnl));
            $today = date("Y-m-d");

            $hukamNamaBangla = $this->sample->countHukamnamaBangla($dateFnl);
            //echo "<pre>";
            //print_r($hukamNamaBangla);
            //exit;

            if (empty($hukamNamaBangla)) {
                $hukamNama = $this->sample->insertHukamnamaBangla(addslashes($firstDiv[0]), $dateFnl);
            }
        }


        /*Hukamnama From Bangla Sahib End*/

        /*Hukamnama From Sish Ganj Sahib Start*/
        $newsUrl = 'http://www.dsgmc.in/index.php?option=com_content&view=article&id=165&Itemid=71';
        $newsContents = file_get_contents($newsUrl);

        $startDiv = '<div class="body-surround"><div class="body-surround2"><div class="body-surround3">';
        $endDiv = '<span sizset="5" sizcache="5" style="font-family: times new roman,times;">';
        $headDiv = stringSearch($startDiv, $endDiv, $newsContents);
        if (!empty($headDiv)) {
            $conTent = $headDiv[0];
            $arr = explode("[", $conTent);
            $arr1 = explode("]", $arr[1]);
            $arr2 = explode(' ', $arr1[0]);

            $month = $arr2[0];
            $mnthh = date("m", strtotime($month));

            $day = $arr2[1];
            $dayFnl = str_replace(',', "", $day);

            $year = $arr2[2];
            $yearFnl = str_replace(',', "", $year);

            $dateFnl = date("Y-m-d", mktime(0, 0, 0, $mnthh, $dayFnl, $yearFnl));
            $today = date("Y-m-d");


            $hukamNamaBangla = $this->sample->countHukamnamaSisganj($dateFnl);

            if (empty($hukamNamaBangla)) {
                $hukamNama = $this->sample->insertHukamnamaSisganj(addslashes($headDiv[0]), $dateFnl);
            }
        }
        /*Hukamnama From Sish Ganj Sahib End*/

        /*Hukamnama From Rakab Ganj Sahib Start*/

        $newsUrl = 'http://www.dsgmc.in/index.php?option=com_content&view=article&id=167&Itemid=71';

        $newsContents = file_get_contents($newsUrl);
        $startDiv = '<div class="body-surround"><div class="body-surround2"><div class="body-surround3">';

        $endDiv = '<table style="text-align: center; width: 100%;" border="0">';

        $headDiv = stringSearch($startDiv, $endDiv, $newsContents);
        if (!empty($headDiv)) {
            $conTent = $headDiv[0];
            $arr = explode("[", $conTent);
            $arr1 = explode("]", $arr[1]);
            $arr2 = explode(' ', $arr1[0]);

            $month = $arr2[0];
            $mnthh = date("m", strtotime($month));

            $day = $arr2[1];
            $dayFnl = str_replace(',', "", $day);

            $year = $arr2[2];
            $yearFnl = str_replace(',', "", $year);

            $dateFnl = date("Y-m-d", mktime(0, 0, 0, $mnthh, $dayFnl, $yearFnl));
            $today = date("Y-m-d");

            $hukamNamaBangla = $this->sample->countHukamnamaRakabganj($dateFnl);
            if (empty($hukamNamaBangla)) {
                $hukamNama = $this->sample->insertHukamnamaRakabganj(addslashes($headDiv[0]), $dateFnl);
            }
        }
    }
}