<?php
global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;
?>
<link href="<?= base_url() ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ci2.searchgurbani.com/scripts/jquery.min.js"></script>

<div id="wrapper">
    <div class="content">
        <h1>Bhai Gurdas Vaaran <span class="right"><a href="<?= base_url() ?>scriptures/" style="margin-right:10px;">Home</a><a
                    href="<?= base_url() ?>scriptures/bgv_search_results">back</a></span></h1>
        <div class="content_inner">

            <?

            $navigationBar = '
<div class="utility_bar">
	<span class="col_33_percent">
		<div class="goto_form">
			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">
				Goto Pauri
				<input name="page_no" id="page_no" type="text" size="5" maxlength="5" value="' . $current_pauri . '" style="width:65px;">
				<input type="submit" name="Submit" value="Go" style="width:65px;>
			</form>
		</div>
	</span>
	<span class="col_33_percent align_center">
		<div class="subhead">
			Displaying Vaar ' . $current_vaar . ', Pauri ' . $current_pauri . ' of ' . $pauri_count . '
		</div>
	</span>
	<span class="col_33_percent align_right col_float_right"> 
		<span class="navigation_links">';

            if ($current_pauri > 1) {
                $navigationBar .= '<a href="' . site_url('scriptures/vaar/' . $current_vaar . '/pauri/1') . '" class="button">Begin</a> ';
                if ($current_pauri + 1 > 1) {
                    $navigationBar .= '<a href="' . site_url('scriptures/vaar/' . $current_vaar . '/pauri/' . ($current_pauri - 1)) . '" class="button">Back</a> ';
                }
            }

            if ($current_pauri < $pauri_count) {
                $navigationBar .= '<a href="' . site_url('scriptures/vaar/' . $current_vaar . '/pauri/' . ($current_pauri + 1)) . '" class="button">Next</a> ';
                if ($current_pauri - 1 < $pauri_count) {
                    $navigationBar .= '<a href="' . site_url('scriptures/vaar/' . $current_vaar . '/pauri/' . $pauri_count) . '" class="button">Last</a> ';
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
	<span class="col_float_left">
		<a href="' . site_url('scriptures/vaar-index/' . $current_vaar) . '" class="button">Vaar Index</a>
	</span>
	
	<br class="clearer" />
</div>
';


            ?>
            <script src="<?php echo base_url(); ?>scripts/jquery.dimensions.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>scripts/jquery.tooltip.min.js" type="text/javascript"></script>
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
            echo '<div class="align_center"><h3>';
            if (isset($pauri_info->pauri_name_roman)) {
                echo $pauri_info->pauri_name_roman . "<br />";
            }
            if (isset($pauri_info->pauri_name_roman)) {
                echo $pauri_info->pauri_name_punjabi;
            }
            echo '</h3></div>';
            echo $utilityBar . "<br />";
            echo $navigationBar;

            $printable_languages = get_printable_languages('bgv');

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
                        $highlight = ($highlight_line == $line->pauri_lineno ? ' hl2' : '');
                        $attributes = '<p class="line_info">' . $line->pauri_lineno . ' ' . $line->lattrib . '</p>';

                        $sharing_data = '<span class="share_icons">';
                        $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
                        $share_data['link'] = site_url('shared/bhai-gurdas-vaaran/vaar/' . $current_vaar . '/pauri/' . $current_pauri . '/line/' . $line->pauri_lineno);
                        $sharing_data .= $this->load->view('templates/share_this', $share_data, true);
                        $sharing_data .= '</span>';

                        echo '<div class="line row' . $alt_row . $highlight . '">';
                        foreach ($printable_languages as $printable_language) {
                            echo print_line($printable_language, $line, $keywords);//$keywords
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
                        $highlight = ($highlight_line == $line->pauri_lineno ? ' hl2' : '');
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
                    //var page_no = formobj.page_no.value;
                    var page_no = $('#page_no').val();
                    document.location.href = '<?php echo site_url('scriptures/vaar/' . $current_vaar . '/pauri'); ?>/' + page_no;
                    return false;
                }
                $('.remember_this').click(function () {
                    $.ajax({
                        url: '<?php echo site_url($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/ajax-remember-me/' . $current_vaar . '/' . $current_pauri); ?>',
                        success: function (data) {
                            alert('We bookmarked this page. You can also access this page later by clicking on the ang by ang (or) page by page links');
                        }
                    });

                });

                $('.save_as_pdf').click(function () {
                    var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
                    window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
                    return false;
                });

            </script>
        </div>
    </div>
</div>