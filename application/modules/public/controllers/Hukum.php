<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hukum extends My_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('sample');
        $this->load->config('email_config');
    }

    function newindex()
    {
        // if(!$this->input->is_cli_request())
        // {
        //     echo "This script can only be accessed via the command line" . PHP_EOL;
        //     return;
        // }
        error_reporting(0);
        $newsUrl = 'http://old.sgpc.net/hukumnama/sgpconlinehukamnama.asp';
        $newsContents = file_get_contents($newsUrl);
        $startDiv = '<table width="88%" border="0" cellspacing="1" cellpadding="1">';
        $endDiv = '<table width="87%" border=';
        $headDiv = stringSearch($startDiv, $endDiv, $newsContents);

        $startContent = '</font><font color="#000079"><strong><font size="+1" face="WebAkharSlim" color="#cc3333">';
        $endContent = '<p align="justify"><font face="Arial"><font size="-1"><u>';
        $firstDiv = stringSearch($startContent, $endContent, $newsContents);

        $startPart = '<p align="justify"><font color="#8F1B08"';
        $endPart = '</table></center></body></html>';
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

            if (empty($hukamNamaSelect)) {
                $hukamNama = $this->sample->insertHukamnama(addslashes($firstDiv[0]), addslashes($headDiv[0]), $dateFnl);
            }
        }
        $hukamNamaSelect1 = $this->sample->selectHukamnama();
        $dataHukam = array();

        $dataHukam['content'] = $hukamNamaSelect1[0]->content;
        $dataHukam['head'] = $hukamNamaSelect1[0]->head;


        $page['meta_title'] = 'Today ' . date('D d F, Y') . ' Hukumnama Harmandir Sahib, Amritsar :SearchGurbani.com';
        $page['meta_description'] = 'Daily Hukumnama Harmandir Sahib, Amritsar :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, Darbar sahib, Harmandir sahib, Amritsar ';

        $this->load->view('templates/header', $page);

        $this->load->view('pages/hukum', $dataHukam);

        $this->load->view('templates/footer');

    }

    function rss()
    {
        $this->load->helper('xml');
        $this->load->helper('text');

        $dataHukam = array();
        $dataHukam = $this->sample->selectHukamnamaAmritRss();

        $data['feed_name'] = 'Searchgurbani.com';
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://www.searchgurbani.com/hukam/rss';
        $data['page_description'] = 'Harmandar Sahib Hukmnama at SearchGurbani.com';
        $data['page_language'] = 'en-en';
        $data['posts'] = $dataHukam;
        header("Content-Type: application/rss+xml");

        $this->load->setTemplate('blank');
        $this->load->view('rss', $data);
    }

    function sgpcindex()
    {
        // if(!$this->input->is_cli_request())
        // {
        //     echo "This script can only be accessed via the command line" . PHP_EOL;
        //     return;
        // }
        error_reporting(0);
        date_default_timezone_set('Asia/Calcutta');
        $dateFnl = date("Y-m-d");
        $hukamNamaSelect = $this->sample->countHukamnamaAmrit($dateFnl);
        
        if (empty($hukamNamaSelect)) {
            require('phpquery/phpQuery.php');
            //$urllink="http://www.sgpc.net/hukumnama/indexhtml.asp";
            $urllink = "http://old.sgpc.net/hukumnama/sgpconlinehukamnama.asp";
            $doc = phpQuery::newDocumentFileHTML($urllink);

            $arr = array();
            if (pq("div font[face='Georgia, Times New Roman, Times, serif']")->text()) {

                $arr['hukamdatetime'] = addslashes(trim(pq("div font[face='Georgia, Times New Roman, Times, serif']")->text()));

                /***********************************************************************************/

                $arr['titlePunjabi'] = addslashes(trim(mb_convert_encoding(pq("center div font[color='#000000'] b")->text(),"UTF-8//IGNORE","ASCII")));
                if ($arr['titlePunjabi'] == '')
                    $arr['titlePunjabi'] = addslashes(trim(mb_convert_encoding(pq("center div font[color='#000000'] b")->text(), 'UTF-8//IGNORE', 'ASCII')));
                if ($arr['titlePunjabi'] == '')
                    $arr['titlePunjabi'] = addslashes(trim(pq("center div font[color='#000000'] b")->text()));

                /***********************************************************************************/

                $arr['contentPunjabi'] = addslashes(trim(mb_convert_encoding(pq("center p[align='justify'] font[color='#000079'] strong font[color='#cc3333'] font[color='#000000']")->text(),"UTF-8//IGNORE","ASCII")));
                if ($arr['contentPunjabi'] == '')
                    $arr['contentPunjabi'] = addslashes(trim(mb_convert_encoding(pq("center p[align='justify'] font[color='#000079'] strong font[color='#cc3333'] font[color='#000000']")->text(), 'UTF-8', 'ASCII')));
                if ($arr['contentPunjabi'] == '')
                    $arr['contentPunjabi'] = addslashes(trim(pq("center:eq(0) p[align='justify'] font[color='#000079'] strong font[color='#cc3333'] font[color='#000000']")->text()));

                /***********************************************************************************/

                $arr['leftFooterPunjabi'] = addslashes(trim(mb_convert_encoding(pq("div[align='justify'] table tr td[width='75%'] font[color='black']")->text(),"UTF-8//IGNORE","ASCII")));
                if ($arr['leftFooterPunjabi'] == '')
                    $arr['leftFooterPunjabi'] = addslashes(trim(mb_convert_encoding(pq("div[align='justify'] table tr td[width='75%'] font[color='black']")->text(), 'UTF-8//IGNORE', 'ASCII')));
                if ($arr['leftFooterPunjabi'] == '')
                    $arr['leftFooterPunjabi'] = addslashes(trim(pq("div[align='justify'] table tr td[width='75%'] font[color='black']")->text()));

                /***********************************************************************************/

                $arr['rightFooterPunjabi'] = addslashes(trim(mb_convert_encoding(pq("div[align='justify'] table tr td[width='25%'] font[color='black']")->text(),"UTF-8//IGNORE","ASCII")));
                if ($arr['rightFooterPunjabi'] == '')
                    $arr['rightFooterPunjabi'] = addslashes(trim(mb_convert_encoding(pq("div[align='justify'] table tr td[width='25%'] font[color='black']")->text(), 'UTF-8//IGNORE', 'ASCII')));
                if ($arr['rightFooterPunjabi'] == '')
                    $arr['rightFooterPunjabi'] = addslashes(trim(pq("div[align='justify'] table tr td[width='25%'] font[color='black']")->text()));

                /***********************************************************************************/

                $arr['viyakhyaPunjabi'] = addslashes(trim(mb_convert_encoding(pq("center table tr td p[align='justify'] font[size='+1'][color='black'][face='WebAkharSlim']")->text(),"UTF-8//IGNORE","ASCII")));
                if ($arr['viyakhyaPunjabi'] == '')
                    $arr['viyakhyaPunjabi'] = addslashes(trim(mb_convert_encoding(pq("center table tr td p[align='justify'] font[size='+1'][color='black'][face='WebAkharSlim']")->text(), 'UTF-8//IGNORE', 'ASCII')));
                if ($arr['viyakhyaPunjabi'] == '')
                    $arr['viyakhyaPunjabi'] = addslashes(trim(pq("center table tr td p[align='justify'] font[size='+1'][color='black'][face='WebAkharSlim']")->text()));

                /***********************************************************************************/

                $arr['titleEnglish'] = addslashes(trim(mb_convert_encoding(pq("center table tr td[height='16'] div[align='center'] font")->text(),"UTF-8//IGNORE","ASCII")));
                if ($arr['titleEnglish'] == '')
                    $arr['titleEnglish'] = addslashes(trim(mb_convert_encoding(pq("center table tr td[height='16'] div[align='center'] font")->text(), 'UTF-8//IGNORE', 'ASCII')));
                if ($arr['titleEnglish'] == '')
                    $arr['titleEnglish'] = addslashes(trim(pq("center table tr td[height='16'] div[align='center'] font")->text()));

                /***********************************************************************************/

                $arr['contentEnglish'] = addslashes(trim(mb_convert_encoding(pq("center table tr td p[align='justify'] font[color='black'][size='3']")->text(),"UTF-8//IGNORE","ASCII")));
                if ($arr['contentEnglish'] == '')
                    $arr['contentEnglish'] = addslashes(trim(mb_convert_encoding(pq("center table tr td p[align='justify'] font[color='black'][size='3']")->text(), 'UTF-8//IGNORE', 'ASCII')));
                if ($arr['contentEnglish'] == '')
                    $arr['contentEnglish'] = addslashes(trim(pq("center table tr td p[align='justify'] font[color='black'][size='3']")->text()));

                /***********************************************************************************/


                $arr['leftFooterEnglish'] = addslashes(trim(pq(" table[align='center'] tr td[height='23'][width='77%'] font[color='black'][size='3']")->text()));
                $arr['rightFooterEnglish'] = addslashes(pq("table[align='center'] tr td[align='right'][height='23'][width='23%'] font[color='black'][size='3']")->text());


                $month = pq("font[size='1'] select[name='month'] option[selected]")->text();
                $day = pq("font[size='1'] select[name='date'] option[selected]")->text();
                $year = pq("font[size='1'] select[name='year'] option[selected]")->text();

                $date = $month . " " . $day . "," . $year;
                $arr['date_hukam'] = date("Y-m-d", strtotime($date));

                $hukamNamaSelect = $this->sample->countHukamnamaAmritInt($arr['hukamdatetime']);

                $hukum_cron_email = $this->config->item('hukum_cron_email');

                if (empty($hukamNamaSelect)) {
                    $hukamNama = $this->sample->insertHukamnamaAmrit($arr);

                    ob_start();
                    echo "added";
                    print_r($arr);
                    $out1 = ob_get_contents();
                    ob_end_clean();
                    mail($hukum_cron_email, "sgpc cron running", $out1);
                }
            }
        }
    }

    function index()
    {
        error_reporting(0);
        $dt = "";

        $dt = $this->input->get('dt');

        $page = array();
        $page = $this->sample->selectHukamnamaAmrit($dt);

        $page['hukum_data'] = $this->sample->get_all_hukumnama();

        $page['meta_title'] = 'Today ' . date('D d F, Y', strtotime($page[0]->date_hukam)) . ' Hukumnama Harmandir Sahib, Amritsar :SearchGurbani.com';

        if (isset($_REQUEST['dt'])) {
            $page['meta_title'] = date('D d F, Y', strtotime($page[0]->date_hukam)) . ' Hukumnama Harmandir Sahib, Amritsar :SearchGurbani.com';
        }

        $page['meta_description'] = 'Daily Hukumnama Harmandir Sahib, Amritsar :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, Darbar sahib, Harmandir sahib, Amritsar ';
        $page['og_title'] = "Harmandir Sahib Hukumnama : " . date('D d F, Y', strtotime($page[0]->date_hukam));
        $page['og_url'] = "https://www.searchgurbani.com/hukum/index/?dt=" . $page[0]->date_hukam;
        $page['og_description'] = $page[0]->contentEnglish;

        $page['dt'] = $dt;
        if(!empty($dt)){
            if(empty($page[0]->id)){
                $page['hukum_message'] = "No hukum data on this Date";
            }
        }
        $page['id'] = $page[0]->id;
        $page['date_hukam'] = $page[0]->date_hukam;
        $page['hukamdatetime'] = $page[0]->hukamdatetime;
        $page['titlePunjabi'] = $page[0]->titlePunjabi;
        $page['contentPunjabi'] = $page[0]->contentPunjabi;
        $page['viyakhyaPunjabi'] = $page[0]->viyakhyaPunjabi;
        $page['leftFooterPunjabi'] = $page[0]->leftFooterPunjabi;
        $page['rightFooterPunjabi'] = $page[0]->rightFooterPunjabi;
        $page['titleEnglish'] = $page[0]->titleEnglish;
        $page['contentEnglish'] = $page[0]->contentEnglish;
        $page['leftFooterEnglish'] = $page[0]->leftFooterEnglish;
        $page['rightFooterEnglish'] = $page[0]->rightFooterEnglish;
        $page['adddatetime'] = $page[0]->adddatetime;
        $page['js_arr'] = [
            'bootstrap-datepicker',
        ];
        $page['css_arr'] = [
            'bootstrap-datepicker',
        ];
        $page['hukum_url'] = base_url() . 'hukum';

        $this->load->view('pages/hukum-amrit', $page);


    }

    function bangla_sahib()
    {
        $newsUrl = 'http://www.dsgmc.in/index.php?option=com_content&view=article&id=164&Itemid=71';
        $newsContents = file_get_contents($newsUrl);
        $startContent = '<p><span style="color: #000000; font-family: Georgia, Times New Roman, Times, serif;"><span style="font-size: 12pt;">';
        $endContent = '<td width="23%" height="23" style="text-align: right;"><span style="color: #000000; font-family: arial;">';
        $firstDiv = stringSearch($startContent, $endContent, $newsContents);
        if (!empty($firstDiv)) {
            $conTent = $firstDiv[0];
            $arr = explode(" ", $conTent);

            $month = $arr[0];
            $mnth = explode('[', $month);
            $monthFnl = $mnth[1];
            $mnthh = date("m", strtotime($monthFnl));

            $day = $arr[1];
            $dayFnl = str_replace(',', "", $day);

            $year = $arr[2];
            $yearFnl = str_replace(',', "", $year);

            $dateFnl = date("Y-m-d", mktime(0, 0, 0, $mnthh, $dayFnl, $yearFnl));
            $today = date("Y-m-d");

            $hukamNamaBangla = $this->sample->countHukamnamaBangla($dateFnl);

            if (empty($hukamNamaBangla)) {
                $hukamNama = $this->sample->insertHukamnamaBangla(addslashes($firstDiv[0]), $dateFnl);
            }
        }
        $hukamNamaBangla1 = $this->sample->banglaSahibHukam();

        $dataHukam = array();
        $dataHukam['content'] = $hukamNamaBangla1[0]->content;


        $page['meta_title'] = 'Today ' . date('D d F, Y') . ' Hukumnama Bangla Sahib , Delhi';
        $page['meta_description'] = 'Daily Hukumnama Bangla Sahib , Delhi :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, Bangla sahib, Delhi ';

        $this->load->view('templates/header', $page);

        $this->load->view('pages/bangla', $dataHukam);

        $this->load->view('templates/footer');

    }

    function sis_ganj()
    {
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

        $hukamNamaBangla1 = $this->sample->SisganjSahibHukam();
        $dataHukam = array();

        $dataHukam['content'] = $hukamNamaBangla1[0]->content;

        $page['meta_title'] = 'Today ' . date('D d F, Y') . ' Hukumnama Gurudwara Sis Ganj Sahib';
        $page['meta_description'] = 'Daily Hukumnama Sis Ganj Sahib , Delhi :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, Sis Ganj Sahib, Delhi ';

        $this->load->view('templates/header', $page);

        $this->load->view('pages/shish', $dataHukam);

        $this->load->view('templates/footer');

    }

    function rakab_ganj()
    {
        $newsUrl = 'http://www.dsgmc.in/index.php?option=com_content&view=article&id=167&Itemid=71';

        $newsContents = file_get_contents($newsUrl);
        $startDiv = '<div class="body-surround"><div class="body-surround2"><div class="body-surround3">';

        $endDiv = '<table border="0" style="text-align: center; width: 100%;">';

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
        $hukamNamaBangla1 = $this->sample->RakabganjSahibHukam();
        $dataHukam = array();

        $dataHukam['content'] = $hukamNamaBangla1[0]->content;


        $page['meta_title'] = 'Today ' . date('D d F, Y') . ' Hukumnama Gurudwara Rakab Ganj Sahib';
        $page['meta_description'] = 'Daily Hukumnama Rakab Ganj Sahib , Delhi :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, Rakab Ganj Sahib, Delhi ';

        $this->load->view('templates/header', $page);

        $this->load->view('pages/rakab', $dataHukam);

        $this->load->view('templates/footer');

    }

    function sangrand()
    {
        $page['meta_title'] = 'Hukumnama of the Month ( Sangrand)';
        $page['meta_description'] = 'Hukumnama of the Month ( Sangrand) :SearchGurbani.com';
        $page['meta_keywords'] = 'Hukum, Hukumnama, sangrand, Delhi ';

        $this->load->view('templates/header', $page);

        $this->load->view('pages/sangrand');

        $this->load->view('templates/footer');

    }

}