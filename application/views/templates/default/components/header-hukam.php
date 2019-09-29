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

if (!isset($og_title))
    $og_title = 'Search Gurbani: Gurbani Research Website';
if (!isset($og_description))
    $og_description = 'A comprehensive web site on research and  exploration of Sri Guru Granth Sahib, Amrit Keertan Gutka, Bhai Gurdas vaaran, Sri Dasam Granth Sahib, Bhai Nand Lal Baani,Mahan Kosh, Hukumnamas, Nitnem Baanis, exegesis , Gurbani, Gurbanee vichaar..';
if (!isset($og_url))
    $og_url = 'https://www.searchgurbani.com/hukum/index';
if (!isset($og_image))
    $og_image = "https://www.searchgurbani.com/images/sgimg.jpg";

if (!isset($meta_keywords))
    $meta_keywords = 'Gurmat Sangeet, Gurubani ,Kirtan,Amrit,Gurbani, Shabad, Keertan, English ,translation ,Phonetic, Transliteration, Hindi ,Sikh scriptures,sikhism, sikh, mahan kosh,hukamnama, dasam granth,granth,gurdas,guru,raag, vaaran,varan,kabit,nand lal,ang,gurdwara,hukumnama,bhagats;';
if (!isset($meta_description))
    $meta_description = 'A comprehensive web site on research and  exploration of Sri Guru Granth Sahib, Amrit Keertan Gutka, Bhai Gurdas vaaran, Sri Dasam Granth Sahib, Bhai Nand Lal Baani,Mahan Kosh, Hukumnamas, Nitnem Baanis, exegesis , Gurbani, Gurbanee vichaar..';
if (!isset($theme)) {
    $theme = 'theme_1';
}
?>
<?php
/*$q = file_get_contents($filename); 

str_replace('WebAkharSlim',$_COOKIE["csstypeG"],$q); 	*/

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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $meta_title; ?></title>
    <meta property="og:url" content="<?php echo $og_url; ?>"/>
    <meta property="og:title" content="<?php echo $og_title; ?>"/>
    <meta property="og:image" content="<?php echo $og_image; ?>"/>
    <meta property="og:description" content="<?php echo $og_description; ?>"/>
    <meta property="fb:app_id" content="127235423987422"/>
    <meta property="og:locale" content="en_US"/>

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
    <script>
        $(document).ready(function () {
//alert('waheguru');
            $('.utility_buttons').children('a').last('a').empty();
            $('.utility_buttons').children('a').next('a').next('a').empty();

//alert($('.utility_buttons').children('a').last('a'));
            // $("div span:last-child")
//alert($(".utility_buttons:last-child()").html);
            //alert($('.utility_buttons').last('a').html);
//alert($('.utility_buttons').children('a').last('a').html());

        })
    </script>
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
<div id="container">
    <div class="border_horizondal"></div>
    <div class="border_vertical_left">
        <div class="border_vertical_right">
            <div id="wrapper">
                <div id="header">
                    <div id="logo"><a href="<?php echo site_url(); ?>"><img
                                src="<?php echo base_url(); ?>images/logo.jpg" alt="Search Gurbani" width="318"
                                height="54" border="0"/></a></div>
                    <div id="header_right">

                        <div id="fb-root"></div>
                        <script type="text/javascript">
                            window.fbAsyncInit = function () {
                                FB.init({
                                    appId: '<?=$fbconfig['appid']?>',
                                    status: true,
                                    cookie: true,
                                    xfbml: true,
                                    oauth: true
                                });

                                FB.Event.subscribe('auth.statusChange', function (response) {
                                    //alert('The status of the session is: ' + response.status);
                                    if (response.status == 'connected') {
                                        login();
                                    }
                                });
                                /* All the events registered
                                 FB.Event.subscribe('auth.login', function(response) {
                                 // do something with response
                                 login();
                                 });
                                 FB.Event.subscribe('auth.logout', function(response) {
                                 // do something with response
                                 logout();
                                 });*/
                            };
                            (function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?=$fbconfig['appid']?>";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));

                            function login() {
                                FB.api('/me', function (response) {
                                    if (!response || response.error) {
                                        alert('Error occured');
                                    } else {
                                        $.post("<?php echo site_url();?>newsletter/saveFb", {resp: response}, function (data) {

                                        });
                                    }
                                });
                                // document.location.href = "<?php echo site_url();?>newsletter/saveFb";
                            }
                            function logout() {
                                document.location.href = "<?php echo site_url();?>";
                            }
                            function feedpost() {
                                FB.api('/me/accounts', function (response) {
                                    if (!response || response.error) {
                                        alert('Error occured');
                                    } else {
                                        var accessTok = dump(response);
                                        if (accessTok != "") {
                                            FB.api('/151450731557387/feed?access_token=' + accessTok, 'post', {
                                                access_token: accessTok,
                                                message: '<?php echo $meta_description; ?>',
                                                link: '<?php echo current_url(); ?>'
                                            }, function (response) {
                                                if (!response || response.error) {
                                                    alert('Error occured');
                                                } else {
                                                    alert('Post ID: ' + response.id);
                                                }
                                            });
                                        }
                                    }
                                });

                            }
                            function dump(arr, level) {
                                var dumped_text = "";
                                if (!level) level = 0;

                                //The padding given at the beginning of the line.
                                var level_padding = "";
                                for (var j = 0; j < level + 1; j++) level_padding += "    ";

                                if (typeof(arr) == 'object') { //Array/Hashes/Objects
                                    for (var item in arr) {
                                        var value = arr[item];

                                        if (typeof(value) == 'object') { //If it is an array,
                                            dumped_text += '';//level_padding + "'" + item + "' ...\n";
                                            dumped_text += dump(value, level + 1);
                                        } else {
                                            if (item == "id" && value == '151450731557387') {
                                                dumped_text += arr['access_token'];
                                            }
                                            dumped_text += '';//level_padding + "'" + item + "' => \"" + value + "\"\n";
                                        }
                                    }
                                } else { //Stings/Chars/Numbers etc.
                                    dumped_text = '';//"===>"+arr+"<===("+typeof(arr)+")";
                                }
                                return dumped_text;
                            }
                        </script>
                        <style type="text/css">
                            .box {
                                margin: 5px;
                                /*border: 1px solid #60729b;*/
                                padding: 5px;
                                /*width: 500px;*/
                                /* height: 200px;*/
                                /* overflow:auto;*/
                                /*background-color: #e6ebf8;*/
                            }
                        </style>


                        <div style="padding-left:0px;float:right;margin-top:5px;">
                            <fb:login-button autologoutlink="true"
                                             scope="email,user_interests,user_status,user_birthday,user_location,offline_access,status_update,publish_stream,manage_pages"></fb:login-button>

                            <!-- all time check if user session is valid or not -->
                            <?php if ($fbme) { ?>

                                <!-- Data retrived from user profile are shown here -->
                                <div class="box" style="margin:0px; padding:0;">
                                    <?php if ($fbme['id'] == '1377547655' || $fbme['id'] == '1180126452' || $fbme['id'] == '649717335') { ?>
                                        <div style="margin: 0px 10px 0px 0px; padding: 0pt; float: right;">
                                            <span><a href="javascript:void(0);"
                                                     onclick="feedpost();">Post to Page</a></span>
                                        </div>
                                    <?php }

                                    ?>
                                </div>

                            <?php } ?>
                        </div>
                        <div id="sharethis_top" style="padding-top:15px;width:450px;">
<span>
<div id="addthis_share">
<?php
$share_data['text'] = $meta_title;
$share_data['link'] = current_url();
$this->load->view('templates/share_this', $share_data);
?>
</div>
<span class="addthis_separator">|</span>

      <!- AddThis Button START -->
<div id="addthis_follow" class="addthis_toolbox addthis_default_style">
<a class="addthis_button_facebook_follow" addthis:userid="151450731557387"></a>
<a class="addthis_button_twitter_follow" addthis:userid="searchgurbani"></a>
<a class="addthis_button_youtube_follow" addthis:userid="searchgurbani">Follow Us</a>
</div>
<!- AddThis Button END -->
 </span>
                        </div>
                        <div class="clearer"><br/></div>
                        <div id="top_menu"><a href="<?php echo site_url(); ?>">Home</a> | <a
                                href="<?php echo site_url('preferences'); ?>">Preferences</a> | <a
                                href="<?php echo site_url('guestbook'); ?>">Guestbook</a> | <a
                                href="<?php echo site_url('feedback'); ?>">Feedback</a> | <a
                                href="<?php echo site_url('sitemap'); ?>">Sitemap</a>| <a
                                href="<?php echo site_url('hukum'); ?>">Hukumnama</a></div>

                    </div>
                    <div class="clearer"></div>
                </div>
                <div id="main_menu">
                    <?php $this->load->view('templates/menu'); ?>
                </div>
                <div id="banner">
                    <?php /* 
<img src="<?php echo base_url(); ?>images/banner.jpg" alt="Gurbani Research" width="913" height="210" />
*/ ?>
                </div>
                <div class="main_content">
                    <div class="contents">
                        <div class="show_while_print" style="padding:5px;">
                            <div style="padding-left:5px;"><a class="button" href="javascript:window.print();"><img
                                        border="0" title="Print this page"
                                        src="https://searchgurbani.com/images/icons/print.gif" align="texttop"/> Print
                                    Page</a></div>
                            <div style="text-align:right; font-weight:bold;">SearchGurbani.com</div>

                        </div>
