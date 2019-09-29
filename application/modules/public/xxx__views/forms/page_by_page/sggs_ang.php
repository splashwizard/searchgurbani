<?php
global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;
?>
<link href="<?= base_url() ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>
<style>

    .right a {
        background-color: #000000;
        color: #FFFFFF;
        font-size: 11px;
        font-weight: bold;
        line-height: 24px;
        padding: 2px 6px;
        text-decoration: none;
    }
</style>
<div id="wrapper">
    <div class="content">
        <!--h1>Sri Guru Granth Sahib<span class="right"><a onclick="switchPage('extra0', 'index')" href="http://ci2.searchgurbani.com/scriptures/main_mob">back</a></span></h1-->
        <div class="content_inner">

            <?

            $navigationBar = '
<div class="utility_bar">
	<span class="col_33_percent">
		<div class="goto_form">
			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">
				Goto Ang
				<input name="page_no" id="page_no" type="text" size="5" maxlength="5" value="' . $current_page . '" style="width:65px;">
				<input type="submit" name="Submit" value="Go" style="width:65px;">
			</form>
		</div>
	</span>
	<span class="col_33_percent align_center">
		<div class="subhead">
			Displaying Ang ' . $current_page . '
			<span class="hide_while_print"> of ' . $SG_ScriptureTypes[$scripture]['page_to'] . '</span>
			
		</div>
	</span>
	<span class="col_33_percent align_right col_float_right"> 
		<span class="navigation_links">';

            if ($current_page > $SG_ScriptureTypes[$scripture]['page_from']) {
                $navigationBar .= '<a href="' . site_url('scriptures/sggs/' . $SG_ScriptureTypes[$scripture]['page_from']) . '" class="button">Begin</a> ';
                if ($current_page + 1 > $SG_ScriptureTypes[$scripture]['page_from']) {
                    $navigationBar .= '<a href="' . site_url('scriptures/sggs/' . ($current_page - 1)) . '" class="button">Back</a> ';
                }
            }

            if ($current_page < $SG_ScriptureTypes[$scripture]['page_to']) {
                $navigationBar .= '<a href="' . site_url('scriptures/sggs/' . ($current_page + 1)) . '" class="button">Next</a> ';
                if ($current_page - 1 < $SG_ScriptureTypes[$scripture]['page_to']) {
                    $navigationBar .= '<a href="' . site_url('scriptures/sggs/' . $SG_ScriptureTypes[$scripture]['page_to']) . '" class="button">Last</a> ';
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
		<div class="utility_buttons">
			' . anchor_popup(current_url() . '/print_view', '<img src="' . base_url() . 'images/icons/print.gif" border="0" title="Print this page" />', $atts) . '&nbsp;&nbsp;&nbsp;
			<a href="#" class="remember_this"><img src="' . base_url() . 'images/icons/remember_page.gif" border="0" title="Remember this page" /></a>&nbsp;&nbsp;&nbsp;
			<a href="#" class="save_as_pdf"><img src="' . base_url() . 'images/icons/pdf.gif" border="0" title="Save page as PDF" /></a>
		</div>
	</span>
	<br class="clearer" />
</div>';

            $mp3file = 'audio/sggs/' . $current_page . '.mp3';
            $audio = '';

            if (file_exists($this->config->item('base_path') . $mp3file)) {
                $audio = '
	<div id="audio_player">
	<object width="165" height="38" align="" id="niftyPlayer_Audio" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
	  <param value="' . base_url() . 'scripts/niftyplayer.swf?file=' . base_url() . $mp3file . '" name="movie">
	  <param value="high" name="quality">
	  <param value="#FFFFFF" name="bgcolor">
	  <embed width="165" height="38" align="" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="niftyPlayer_Audio" bgcolor="#FFFFFF" quality="high" src="' . base_url() . 'scripts/niftyplayer.swf?file=' . base_url() . $mp3file . '" style="visibility: visible;">
	</embed>
	</object>
	</div>';
            }
            ?>
            <script src="<?php echo base_url(); ?>scripts/jFav_v1.0.js" type="text/javascript"></script>
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
            ?>

            <span style="float: right;" class="right"><a href="<?= base_url() ?>scriptures/" style="margin-right:10px;">Home</a></span>

            <?
            echo "<h2>" . $SG_ScriptureTypes[$scripture][1] . "</h2>";
            //echo $utilityBar."<br />";
            echo $navigationBar;
            echo $audio;
            $printable_languages = get_printable_languages('ggs');

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
                        $highlight = ($highlight_line == $line->lineno ? ' hl2' : '');
                        $attributes = '<p class="line_info"> ' . $line->pagelineno . ' ' . $line->pattrib . ' <br>  ' . $line->raag . ' ' . $line->author . ' </p>';

                        $sharing_data = '<span class="share_icons">';
                        $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
                        $share_data['link'] = site_url('shared/guru-granth-sahib/ang/' . $current_page . '/line/' . $line->lineno);
                        $sharing_data .= $this->load->view('templates/share_this', $share_data, true);
                        $sharing_data .= '</span>';

                        echo '<div class="line row' . $alt_row . $highlight . '">';
                        foreach ($printable_languages as $printable_language) {
                            echo print_line($printable_language, $line, $keywords);
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
                        $highlight = ($highlight_line == $line->lineno ? ' hl2' : '');
                        foreach ($printable_languages as $printable_language) {
                            $printable_languages[$i]['data'] .= print_line($printable_language, $line, $keywords, $highlight);
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

            //echo $utilityBar."<br />";
            echo $navigationBar;

            ?>

            <script type="text/javascript">
                function gotoPage(formobj) {
                    var page_no = formobj.page_no.value;
                    document.location.href = '<?php echo site_url('scriptures/sggs'); ?>/' + page_no;
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

                $('.save_as_pdf').click(function () {
                    var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
                    window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
                    return false;
                });

            </script>
        </div>
    </div>
</div>