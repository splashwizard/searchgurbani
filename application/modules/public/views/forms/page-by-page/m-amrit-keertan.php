<?php

global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;
?>
<link href="<?= base_url() ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>
<style>
    .content_inner {

        margin: 0 auto;
        padding: 0 10px 0 0;
        width: 100%;
    }
</style>
<div id="wrapper">
    <div class="content">
        <h1>Sri Guru Granth Sahib<span class="right"><a href="<?= base_url() ?>scriptures/" style="margin-right:10px;">Home</a><?php if (isset($_SERVER['HTTP_REFERER'])) { ?>
                    <a href="<?= $_SERVER['HTTP_REFERER'] ?>">back</a><?php } ?></span></h1>
        <div class="content_inner">

            <?


            $navigationBar = '

<div class="utility_bar">

	<span class="col_33_percent">

		<div class="goto_form">

			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">

				Goto Page

			<input name="page_no" id="page_no" type="text" size="5" maxlength="5" value="' . $current_page . '" style="width:65px;">

				<input type="submit" name="Submit" value="Go" style="width:65px;">

			</form>

		</div>

	</span>

	<span class="col_33_percent align_center">

		<div class="subhead">

			Displaying Page ' . $current_page . ' of ' . $SG_ScriptureTypes[$scripture]['page_to'] . '

		</div>

	</span>

	<span class="col_33_percent align_right col_float_right"> 

		<span class="navigation_links">';


            if ($current_page > $SG_ScriptureTypes[$scripture]['page_from']) {

                $navigationBar .= '<a href="' . site_url('scriptures/page/' . $SG_ScriptureTypes[$scripture]['page_from']) . '" class="button">Begin</a> ';

                if ($current_page + 1 > $SG_ScriptureTypes[$scripture]['page_from']) {

                    $navigationBar .= '<a href="' . site_url('scriptures/page/' . ($current_page - 1)) . '" class="button">Back</a> ';

                }

            }


            if ($current_page < $SG_ScriptureTypes[$scripture]['page_to']) {

                $navigationBar .= '<a href="' . site_url('scriptures/page/' . ($current_page + 1)) . '" class="button">Next</a> ';

                if ($current_page - 1 < $SG_ScriptureTypes[$scripture]['page_to']) {

                    $navigationBar .= '<a href="' . site_url('scriptures/page/' . $SG_ScriptureTypes[$scripture]['page_to']) . '" class="button">Last</a> ';

                }

            }

            $navigationBar .= '

	  </span> </span> <br class="clearer" />

	</div>

	';

            $atts = array(

                'width' => '95%',
                'height' => '95%',

                'scrollbars' => 'yes',

                'status' => 'yes',

                'resizable' => 'yes',

                'screenx' => '0',

                'screeny' => '0'

            );


            $utilityBar = '

<div class="utility_bar">

	<span class="col_float_right">

	</span>

	<br class="clearer" />

</div>

';


            ?>

            <script src="<?php echo base_url(min_root_loc()); ?>static/js/jquery.dimensions.js" type="text/javascript"></script>

            <script src="<?php echo base_url(min_root_loc()); ?>static/js/jquery.tooltip.min.js" type="text/javascript"></script>

            <script type="text/javascript">

                $(function () {

                    $('.tt').tooltip({

                        track: true,

                        delay: 0,

                        showURL: false,

                        showBody: " - ",

                        fade: 0

                    });

                });

            </script>


            <?php


            echo "<h2>" . $SG_ScriptureTypes[$scripture][1] . "</h2>";

            echo $utilityBar . "<br />";

            echo $navigationBar;


            $printable_languages = get_printable_languages('ak');


            if ($lines === false) {

                echo '

	<div class="line row1">

	  <p class="english">No lines found</p>

	</div>

	';

            } else {

                $alt_row = 1;


                if ($SG_Preferences['text_type'] == 'line_by_line') {

                    /** Line by Line **/

                    foreach ($lines->result() as $line) {

                        $highlight = ($highlight_line == $line->pagelineno ? ' hl2' : '');


                        $url_shabad_name = url_title($line->shabad_name, 'underscore', TRUE);


                        $attributes = '<p class="line_info">' . $line->pagelineno . ' ' . $line->lattrib . ' <br> 

			   <a href="' . site_url('scriptures/m_shabad/' . $line->shabad_id . '/' . $url_shabad_name) . '">Shabad: ' . $line->shabad_name . '</a>

			  <br>' . $line->raag . ' ' . $line->author . '</p>';


                        $sharing_data = '<span class="share_icons">';

                        $share_data['text'] = $line->punjabi . ' - ' . $line->translit;

                        $share_data['link'] = site_url('shared/scriptures/page/' . $current_page . '/line/' . $line->pagelineno);
                        $share_data['whatsapp_sharelink'] = site_url('scriptures/page/' . $current_page . '/line/' . $line->pagelineno);

                        $sharing_data .= $this->load->view('templates/share-this', $share_data, true);

                        $sharing_data .= '</span>';


                        echo '<div class="line row' . $alt_row . $highlight . '">';

                        foreach ($printable_languages as $printable_language) {

                            echo print_line($printable_language, $line, $keywords);//

                        }

                        echo get_data_by_preferences($attributes, 'show_attributes');

                        echo get_data_by_preferences($sharing_data, 'allow_share_lines');


                        echo '<br class="clearer" /></div>';

                        $alt_row = -$alt_row;

                    }


                } else {

                    /** Page by Page **/

                    foreach ($lines->result() as $line) {

                        $i = 0;

                        $highlight = ($highlight_line == $line->pagelineno ? ' hl2' : '');

                        foreach ($printable_languages as $printable_language) {

                            $printable_languages[$i]['data'] .= print_line($printable_language, $line, $keywords, $highlight);//$keywords

                            $i++;

                        }

                        $alt_row = -$alt_row;

                    }


                    foreach ($printable_languages as $printable_language) {

                        echo '<p><strong>In ' . $printable_language['lang_name'] . '</strong></p>';

                        echo '<div class="line row' . $alt_row . '">';

                        echo $printable_language['data'];

                        echo '</div>';

                        $alt_row = -$alt_row;

                    }

                }


            }


            echo $utilityBar . "<br />";

            echo $navigationBar;


            ?>


            <script type="text/javascript">

                function gotoPage(formobj) {

                    var page_no = formobj.page_no.value;

                    document.location.href = '<?php echo site_url('scriptures/page'); ?>/' + page_no;

                    return false;

                }


                $('.remember_this').click(function () {

                    $.ajax({

                        url: '<?php echo site_url($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/ajax-remember-me/' . $current_page); ?>',

                        success: function (data) {

                            alert('We bookmarked this page. You can also access this page later by clicking on the ang by ang (or) page by page links');

                        }

                    });

                });

            </script>
        </div>
    </div>
</div>