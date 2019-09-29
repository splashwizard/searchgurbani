.<?php

if (!isset($meta_title)) {
    $meta_title = 'Search Gurbani: Gurbani Research Website';
}
if (!isset($meta_keywords)) {
    $meta_keywords
        = 'Gurmat Sangeet, Gurubani ,Kirtan,Amrit,Gurbani, Shabad, Keertan, English ,translation ,Phonetic, Transliteration, Hindi ,Sikh scriptures,sikhism, sikh, mahan kosh,hukamnama, dasam granth,granth,gurdas,guru,raag, vaaran,varan,kabit,nand lal,ang,gurdwara,hukumnama,bhagats;';
}
if (!isset($meta_description)) {
    $meta_description
        = 'A comprehensive web site on research and  exploration of Sri Guru Granth Sahib, Amrit Keertan Gutka, Bhai Gurdas vaaran, Sri Dasam Granth Sahib, Bhai Nand Lal Baani,Mahan Kosh, Hukumnamas, Nitnem Baanis, exegesis , Gurbani, Gurbanee vichaar..';
}
if (!isset($og_title)) {
    $og_title
        = $meta_title;
} else {
    $meta_title = $og_title;
}
if (!isset($og_description)) {
    $og_description
        = $meta_description;
} else {
    $meta_description = $og_description;
}
if (!isset($theme)) {
    $theme = 'theme_1';
}

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

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type"
          content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible"
          content="IE = edge">
    <meta name="viewport"
          content="width = device-width, initial-scale = 1">

    <title><?php echo $meta_title; ?></title>

    <meta name="copyright"
          content="2004-<?php echo date("Y"); ?> Copyright SearchGurbani.com"/>
    <meta name="robots" content="all, follow"/>
    <meta name="Description"
          content="<?php echo $meta_description; ?>"/>
    <meta name="Keywords"
          content="<?php echo $meta_keywords; ?>"/>
    <meta property="og:title" content="<?php echo $og_title ?>"/>
    <meta property="og:description" content="<?php echo $og_description ?>"/>

    <?php echo $template_css; ?>

    <style>
        p.lang_1 {
        <?php if(isset($_COOKIE["csstypeG"])){ ?> font-family: <?php echo $newcss;
            }
        ?>
        }

        p.lang_2 {
        <?php if(isset($_COOKIE["PhonEnglish"])){ ?> font-family: <?php echo $PhonEng;
            }
        ?>
        }

        p.lang_3 {
        <?php if(isset($_COOKIE["HinTrans"])){ ?> font-family: <?php echo $HinTrans;
            }
        ?>
        }

        p.lang_4 {
        <?php if(isset($_COOKIE["EngTrans"])){ ?> font-family: <?php echo $EngTrans;

            }
        ?>
        }
    </style>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript"
            src="<?php echo base_url(min_root_loc()) ?>static/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(min_root_loc()) ?>static/js/bootstrap.min.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(min_root_loc()) ?>static/js/custom.js"></script>
    <script type="text/javascript"
            src="<?php echo base_url(min_root_loc()) ?>static/js/nanakshahi.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>

        <?php
        global $SG_Preferences;
        ?>

        var SG_Preferences = <?php echo json_encode($SG_Preferences) ?>;
        var base_url = '<?php echo base_url() ?>';
        var lareevar_assist_sess = SG_Preferences.lareevar_assist;
        var social_show_data = SG_Preferences.allow_share_lines;

    </script>
<!-- Google Analytics BEGIN -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-17216358-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Google Analytics END -->
</head>
<?php

if ($theme == 'theme_1') {
    $class_name = 'burgundy';
} elseif ($theme == 'theme_2') {
    $class_name = 'mehendi';
} elseif ($theme == "theme_3") {

    $class_name = 'purple';
} elseif ($theme == "theme_4") {

    $class_name = 'dpurple';
} elseif ($theme == "theme_5") {

    $class_name = 'gmehendi';
} elseif ($theme == "theme_6") {

    $class_name = 'darkblue unicode';
} elseif ($theme == "theme_7") {

    $class_name = 'fuscia';
} elseif ($theme == "theme_8") {

    $class_name = 'ochre';
} else {
    $class_name = 'burgundy';
}

?>

<body class="<?php echo $class_name; ?>">

<div id="wrapper">
    <div class="main-body">
        <div class="abs-top"></div>
        <div class="abs-bottom"></div>
        <div class="abs-left"></div>
        <div class="abs-right"></div>

        <?php echo $template_header; ?>

        <?php echo $template_content; ?>

        <?php echo $template_footer; ?>

    </div><!-- .main-body ends -->

    <div class="center copyright">
        &copy;2004
        - <?php echo date('Y', time()) ?>.<a
                href="http://www.allaboutsikhs.com">Gateway
            to Sikhism. </a>All rights reserved.
    </div>
</div><!-- #wrapper ends -->

<?php echo $template_js; ?>

<?php
$addthis_widget = $this->config->item("addthis_widget");
echo $addthis_widget['js'];
?>

<script type="text/javascript">
    $(function () {
        $(document).ready(function () {
            $("#userRegisterForm").validate({
                rules: {
                    Ufname: {
                        required: true
                    },
                    Ulname: {
                        required: true
                    },
                    Uemail: {
                        required: true,
                        email: true
                    },
                    Upass: {
                        required: true
                    },
                    Uconfpass: {
                        required: true,
                        equalTo: "#Upass"
                    }
                },
            });

            $("#userRegisterForm").submit(function (e) {
                e.preventDefault();
                if ($(this).valid()) {
                    $(this).block({message: 'Please wait...'});
                    $(this).ajaxSubmit({
                        success: function showResponse(responseText, statusText, xhr, $form) {
                            $("#userRegisterForm").unblock();
                            if (responseText.status == '1') {
                                alert(responseText.statusMsg);
                                window.location.reload();
                            } else {
                                alert(responseText.statusMsg);
                            }
                        },
                        dataType: 'json'
                    });
                }
            });


            $("#userLoginForm").submit(function (e) {
                e.preventDefault();
                if ($(this).valid()) {
                    $(this).block({message: 'Please wait...'});
                    $(this).ajaxSubmit({
                        success: function showResponse(responseText, statusText, xhr, $form) {
                            $("#userLoginForm").unblock();
                            if (responseText.status == '1') {
                                alert(responseText.statusMsg);
                                window.location.reload();
                            } else {
                                alert(responseText.statusMsg);
                            }
                        },
                        dataType: 'json'
                    });
                }
            });

        });
    });
</script>

</body>

</html>