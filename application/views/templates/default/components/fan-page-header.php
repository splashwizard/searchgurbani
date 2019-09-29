<?php
include_once "fbmain.php";
?>
<?php

if (get_last_segment() == 'print_view') {
    $media = 'screen,print';
} else {
    $media = 'print';
}
if (!isset($meta_title))
    $meta_title = 'Search Gurbani: Gurbani Research Website';
if (!isset($meta_keywords))
    $meta_keywords = 'Gurmat Sangeet, Gurubani ,Kirtan,Amrit,Gurbani, Shabad, Keertan, English ,translation ,Phonetic, Transliteration, Hindi ,Sikh scriptures,sikhism, sikh, mahan kosh,hukamnama, dasam granth,granth,gurdas,guru,raag, vaaran,varan,kabit,nand lal,ang,gurdwara,hukumnama,bhagats;';
if (!isset($meta_description))
    $meta_description = 'A comprehensive web site on research and  exploration of Sri Guru Granth Sahib, Amrit Keertan Gutka, Bhai Gurdas vaaran, Sri Dasam Granth Sahib, Bhai Nand Lal Baani,Mahan Kosh, Hukumnamas, Nitnem Baanis, exegesis , Gurbani, Gurbanee vichaar..';
if (!isset($theme)) {
    $theme = 'theme_1';
}
?>
<?php


if (isset($_COOKIE["csstypeG"])) {
    $newcss = $_COOKIE["csstypeG"];
}
if (isset($_COOKIE["PhonEnglish"])) {
    $PhonEng = $_COOKIE["PhonEnglish"];
}
if (isset($_COOKIE["HinTrans"])) {
    $HinTrans = $_COOKIE["HinTrans"];
}
if (isset($_COOKIE["EngTrans"])) {
    $EngTrans = $_COOKIE["EngTrans"];
} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $meta_title; ?></title>
    <meta name="copyright" content="2004-<?php echo date("Y"); ?> Copyright SearchGurbani.com"/>
    <meta name="robots" content="all, follow"/>
    <meta name="Description" content="<?php echo $meta_description; ?>"/>
    <meta name="Keywords" content="<?php echo $meta_keywords; ?>"/>
    <link href="<?php echo base_url(); ?>styles/searchgurbani.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>styles/content.css" rel="stylesheet" type="text/css" charset="utf-8"/>
    <link href="<?php echo base_url(); ?>styles/fontface.css" rel="stylesheet" type="text/css" charset="utf-8"/>
    <link href="<?php echo base_url(); ?>styles/<?php echo $theme; ?>.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>styles/print.css" rel="stylesheet" type="text/css"
          media="<?php echo $media; ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/superfish.css" media="screen"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>scripts/nanakshahi.js"></script>
    <script type="text/javascript" language="JavaScript" src="<?php echo base_url(); ?>scripts/niftyplayer.js"></script>
    <script type="text/javascript"
            src="https://s7.addthis.com/js/250/addthis_widget.js#username=xa-4c8cd234798f01ed"></script>

    <style>
        .lang_1 {
            font-size: 14pt;
            color: #333;
            <?php
            if(isset($_COOKIE["csstypeG"])){
                ?> font-family: <?php echo $newcss;
}
?>
        }

        .lang_2 {
            font-size: 14px;
            color: #366732;
            <?php
            if(isset($_COOKIE["PhonEnglish"])){
                ?> font-family: <?php echo $PhonEng;
}
?>
        }

        .lang_3 {
            font-weight: 400;
            font-size: 13pt;
            color: #880808;
            <?php
            if(isset($_COOKIE["HinTrans"])){
            
                ?> font-family: <?php echo $HinTrans;
}
?>
        }

        .lang_4 {
            font-size: 14px;
            color: #06257B;
            <?php
            
            if(isset($_COOKIE["EngTrans"])){
            
                ?> font-family: <?php echo $EngTrans;

}

?>

        }
    </style>

    <!-- Google Analytics BEGIN -->
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-17216358-1']);
        _gaq.push(['_setDomainName', 'searchgurbani.com']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <!-- Google Analytics END -->
</head>
<body>
<div id="container" style="width:780px;">
    <div class="border_horizondal"></div>
    <div class="border_vertical_left">
        <div class="border_vertical_right">
            <div id="wrapper">
                <div id="logo" style="float:none;" align="center"><a href="<?php echo site_url(); ?>"><img
                            src="<?php echo base_url(); ?>images/logo.jpg" alt="Search Gurbani" width="318" height="54"
                            border="0"/></a></div>
                <div id="main_menu">
                    <?php //$this->load->view('templates/menu'); ?>
                </div>

                <div class="main_content">
                    <div class="contents">
                        <div class="show_while_print" style="padding:5px;">
                            <div style="padding-left:5px;"><a class="button" href="javascript:window.print();"><img
                                        border="0" title="Print this page"
                                        src="https://searchgurbani.com/images/icons/print.gif" align="texttop"/> Print
                                    Page</a></div>
                        </div>
