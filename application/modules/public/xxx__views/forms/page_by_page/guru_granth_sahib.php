<style>
    .lareevar-on {
        color: red;
    }

    .lareevar-off {
        color: #000;
    }
</style>
<?php
    global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;
    $navigationBar
            = '
<div class="utility_bar">
	<span class="col_33_percent">
		<div class="goto_form">
			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">
				Goto Ang
				<input name="page_no" id="page_no" type="text" size="5" maxlength="5" value="' . $current_page . '">
				<input type="submit" name="Submit" value="Go">
			</form>
		</div>
	</span>
	<span class="col_33_percent align_center">
		<div class="subhead">
			Displaying Ang ' . $current_page . '
			<span class="hide_while_print"> of ' . $SG_ScriptureTypes[$scripture]['page_to'] . '</span>
			<span class="show_while_print">- Sri Guru Granth Sahib</span>
		</div>
	</span>
	<span class="col_33_percent align_right col_float_right">';

    $navigationBar .= lareevar_button();

    $navigationBar .= '<span class="navigation_links">';

    if ($current_page > $SG_ScriptureTypes[$scripture]['page_from'])
    {
        $navigationBar .= '<a onclick="loadPage(\'' . $SG_ScriptureTypes[$scripture]['page_from'] . '\')" href="javascript:void(0);" class="button">Begin</a> ';
        if ($current_page + 1 > $SG_ScriptureTypes[$scripture]['page_from'])
        {
            $navigationBar .= '<a onclick="loadPage(\'' . ($current_page - 1) . '\')" href="javascript:void(0);" class="button">Back</a> ';
        }
    }

    if ($current_page < $SG_ScriptureTypes[$scripture]['page_to'])
    {
        $navigationBar .= '<a onclick="loadPage(\'' . ($current_page + 1) . '\')" href="javascript:void(0);" class="button">Next</a> ';
        if ($current_page - 1 < $SG_ScriptureTypes[$scripture]['page_to'])
        {
            $navigationBar .= '<a onclick="loadPage(\'' . $SG_ScriptureTypes[$scripture]['page_to'] . '\')" href="javascript:void(0);" class="button">Last</a> ';
        }
    }
    $navigationBar
            .= '
	  </span> </span> <br class="clearer" />
	</div>
	';
    $atts = array(
            'width'      => '600',
            'height'     => '400',
            'scrollbars' => 'yes',
            'status'     => 'yes',
            'resizable'  => 'yes',
            'screenx'    => '0',
            'screeny'    => '0'
    );

    $utilityBar
            = '
<div class="utility_bar">
	<span class="col_float_right">
		<div class="utility_buttons">
			' . anchor_popup(site_url($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/print_guru_granth_sahib/' . $current_page), '<img src="' . base_url() . 'images/icons/print.gif" border="0" title="Print this page" />', $atts) . '&nbsp;&nbsp;&nbsp;
			<a href="#" class="remember_this" onclick="remember_this();"><img src="' . base_url() . 'images/icons/remember_page.gif" border="0" title="Remember this page" /></a>&nbsp;&nbsp;&nbsp;
			<a href="#" class="save_as_pdf" onclick="save_as_pdf();"><img src="' . base_url() . 'images/icons/pdf.gif" border="0" title="Save page as PDF" /></a>
		</div>
	</span>
	<br class="clearer" />
</div>';
    if (isset($_COOKIE['ucharan_type']))
    {
        if ($_COOKIE['ucharan_type'] == "normal")
        {
            $mp3file = 'audio/sggs/' . $current_page . '.mp3';
        }
        else
        {
            $mp3file = 'audio/shudh/Ang-' . $current_page . '.mp3';
        }
    }
    else
    {
        if ($SG_Preferences['ucharan_type'] == "normal")
        {
            $mp3file = 'audio/sggs/' . $current_page . '.mp3';
        }
        else
        {
            $mp3file = 'audio/shudh/Ang-' . $current_page . '.mp3';
        }
    }
    $audio = '';

    if (file_exists($this->config->item('base_path') . $mp3file))
    {
        $audio
                = '
	<div id="audio_player">
	<audio id="audio_with_controls" controls style="margin:3px auto;width:165px;">
		<source src="' . base_url() . $mp3file . '" type="audio/mpeg" />
	</audio>
	<object width="165" height="38" align="" id="niftyPlayer_Audio" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
	  <param value="' . base_url() . 'scripts/niftyplayer.swf?file=' . base_url() . $mp3file . '" name="movie">
	  <param value="high" name="quality">
	  <param value="#FFFFFF" name="bgcolor">
	  <embed width="165" height="38" align="" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="niftyPlayer_Audio" bgcolor="#FFFFFF" quality="high" src="' . base_url() . 'scripts/niftyplayer.swf?file=' . base_url() . $mp3file . '" style="visibility: visible;">
	</embed>
	</object>
	</div>';

        $audio
                .= '<script>
	  if (document.createElement(\'audio\').canPlayType) {
		if (!document.createElement(\'audio\').canPlayType(\'audio/mpeg\')) {
		  	document.getElementById("audio_with_controls").style.display = "none";
			document.getElementById("niftyPlayer_Audio").style.display = "block";
		}else{
			document.getElementById("niftyPlayer_Audio").style.display = "none";
			document.getElementById("audio_with_controls").style.display = "block";
		}
	  }
	</script>';

    }
?>

<script type="text/javascript">
    $(function () {
        $('.tt').tooltip({
            track: true,
            delay: 0,
            showURL: false,
            showBody: " - ",
            fade: 0,
            width: 100,
            height: 30
        });
    });
</script>

<?php
    echo '<div id="page_body">';
    echo "<h2>" . $SG_ScriptureTypes[$scripture][1] . "</h2>";
    echo $utilityBar . "<br />";
    echo $navigationBar;
    echo $audio;
    $printable_languages = get_printable_languages('ggs');

    if ($lines === FALSE)
    {
        echo '
	<div class="line row1">
	  <p class="english">No lines found</p>
	</div>
	';
    }
    else
    {
        $alt_row = 1;

        if ($SG_Preferences['text_type'] == 'line_by_line')
        {
            /** Line by Line **/
            foreach ($lines->result() as $line)
            {
                $highlight  = ($highlight_line == $line->lineno ? ' hl2' : '');
                $attributes = '<p class="line_info"> ' . $line->lineno . ' ' . $line->pattrib . ' <br>  ' . $line->raag . ' ' . $line->author . ' </p>';

                $sharing_data       = '<span class="share_icons">';
                $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
                $share_data['link'] = site_url('shared/guru-granth-sahib/ang/' . $current_page . '/line/' . $line->lineno);
                $sharing_data .= $this->load->viewPartial('components/share_this', $share_data, TRUE);
                $sharing_data .= '</span>';
                
                echo '<div class="line row' . $alt_row . $highlight . '">';
                foreach ($printable_languages as $printable_language)
                {
                    echo print_line($printable_language, $line, $keywords);
                }
                echo get_data_by_preferences($attributes, 'show_attributes');
                echo get_data_by_preferences($sharing_data, 'allow_share_lines');

                echo '<br class="clearer" /></div>';
                $alt_row = -$alt_row;
            }

        }
        else
        {
            /** Page by Page **/
            foreach ($lines->result() as $line)
            {
                $i         = 0;
                $highlight = ($highlight_line == $line->lineno ? ' hl2' : '');
                foreach ($printable_languages as $printable_language)
                {
                    $printable_languages[$i]['data'] .= print_line($printable_language, $line, $keywords, $highlight);
                    $i++;
                }
                
                $alt_row = -$alt_row;
            }

            foreach ($printable_languages as $printable_language)
            {
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
    echo '</div>';


?>

<script type="text/javascript">
    
    var pagination_url = '<?php echo site_url($base_url) ?>/';
    var current_url = '<?php echo current_url() ?>';
    var current_page = '<?php echo $current_page ?>';

</script>