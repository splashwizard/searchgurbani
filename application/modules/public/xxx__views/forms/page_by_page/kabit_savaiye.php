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

$navigationBar = '
<div class="utility_bar">
	<span class="col_33_percent">
		<div class="goto_form">
			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">
				Goto Kabit
				<input name="page_no" id="page_no" type="text" size="5" maxlength="5" value="' . $current_page . '">
				<input type="submit" name="Submit" value="Go">
			</form>
		</div>
	</span>
	<span class="col_33_percent align_center">
		<div class="subhead">
			Displaying Kabit ' . $current_page . ' of ' . $SG_ScriptureTypes[$scripture]['page_to'] . '
		</div>
	</span>
	<span class="col_33_percent align_right col_float_right">';
    
    $navigationBar .= lareevar_button();

    $navigationBar .= '<span class="navigation_links">';

if ($current_page > $SG_ScriptureTypes[$scripture]['page_from']) {
    $navigationBar .= '<a onclick="loadPage(\'' . $SG_ScriptureTypes[$scripture]['page_from'] . '\')" href="javascript:void(0);" class="button">Begin</a> ';
    if ($current_page + 1 > $SG_ScriptureTypes[$scripture]['page_from']) {
        $navigationBar .= '<a onclick="loadPage(\'' . ($current_page - 1) . '\')" href="javascript:void(0);" class="button">Back</a> ';
    }
}

if ($current_page < $SG_ScriptureTypes[$scripture]['page_to']) {
    $navigationBar .= '<a onclick="loadPage(\'' . ($current_page + 1) . '\')" href="javascript:void(0);" class="button">Next</a> ';
    if ($current_page - 1 < $SG_ScriptureTypes[$scripture]['page_to']) {
        $navigationBar .= '<a onclick="loadPage(\'' . $SG_ScriptureTypes[$scripture]['page_to'] . '\')" href="javascript:void(0);" class="button">Last</a> ';
    }
}
$navigationBar .= '
	  </span> </span> <br class="clearer" />
	</div>
	';
$atts = array(
    'width' => '600',
    'height' => '400',
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
</div>
';


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
<style>
    .lang_4 {
        word-wrap: break-word;
    }
</style>

<?php
    echo '<div id="page_body">';
echo "<h2>" . $SG_ScriptureTypes[$scripture][1] . "</h2>";
echo $utilityBar . "<br />";
echo $navigationBar;


$printable_languages = get_printable_languages('ks');

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
            $attributes = ($line->k_line != "" ? '<p class="line_info"> ' . $line->k_line . ' ' . $line->lattrib . '</p>' : '');

            $sharing_data = '<span class="share_icons">';
            $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
            $share_data['link'] = site_url('shared/kabit_savaiye/kabit/' . $current_page . '/line/' . $line->lineno);
            $sharing_data .= $this->load->viewPartial('components/share_this', $share_data, true);
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
            $highlight = ($highlight_line == $line->lineno ? ' hl2' : '');
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
    echo '</div>';
?>

 
<script type="text/javascript">
    
    var pagination_url = '<?php echo site_url($base_url) ?>/';
    var current_url = '<?php echo current_url() ?>';
    var current_page = '<?php echo $current_page ?>';

</script>