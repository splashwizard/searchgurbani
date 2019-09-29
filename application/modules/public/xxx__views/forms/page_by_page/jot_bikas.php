<style type="text/css">
    .pagination_links, .pagination_links a, .pagination_links strong {
        padding: 0px 5px;
    }
    .lareevar-on {
        color: red;
    }

    .lareevar-off {
        color: #000;
</style>
<?php
global $SG_BNL, $SG_SearchTypes, $SG_BNL, $SG_SearchLanguage, $SG_Preferences;
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
	<span class="col_float_left">
		<div class="utility_buttons">
			' . anchor_popup(current_url() . '/print_view', '<img src="' . base_url() . 'images/icons/print.gif" border="0" title="Print this page" />', $atts) . '&nbsp;&nbsp;&nbsp;
			<a href="#" class="remember_this"><img src="' . base_url() . 'images/icons/remember_page.gif" border="0" title="Remember this page" /></a>&nbsp;&nbsp;&nbsp;
			' . anchor_popup(current_url() . '/pdf_view', '<img src="' . base_url() . 'images/icons/pdf.gif" border="0" title="Save page as PDF" />', $atts) . '
			
		</div>
	</span>
	<br class="clearer" />
</div>
';

$navigationBar = '
<div class="utility_bar">
	<span class="col_33_percent">
		<div class="goto_form">
			' . $utilityBar . '
		</div>
	</span>
	<span class="col_33_percent align_center">
		<div class="subhead">
			Displaying Page ' . $current_page . ' of ' . $SG_BNL[$scripture]['page_to'] . '
		</div>
	</span>
	<span class="col_33_percent align_right col_float_right">';
    
    $navigationBar .= lareevar_button();
    
	$navigationBar .= '<span class="navigation_links">';

//$navigationBar .= '<p class="pagination_links">' . $pagination_links . '&nbsp;</p>';

    if ($current_page > $SG_BNL[$scripture]['page_from']) {
        $navigationBar .= '<a onclick="loadPage(\'' . $SG_BNL[$scripture]['page_from'] . '\')" href="javascript:void(0);" class="button">Begin</a> ';
        if ($current_page + 1 > $SG_BNL[$scripture]['page_from']) {
            $navigationBar .= '<a onclick="loadPage(\'' . ($current_page - 1) . '\')" href="javascript:void(0);" class="button">Back</a> ';
        }
    }

    if ($current_page < $SG_BNL[$scripture]['page_to']) {
        $navigationBar .= '<a onclick="loadPage(\'' . ($current_page + 1) . '\')" href="javascript:void(0);" class="button">Next</a> ';
        if ($current_page - 1 < $SG_BNL[$scripture]['page_to']) {
            $navigationBar .= '<a onclick="loadPage(\'' . $SG_BNL[$scripture]['page_to'] . '\')" href="javascript:void(0);" class="button">Last</a> ';
        }
    }

$navigationBar .= '
	  </span> </span> <br class="clearer" />
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

<?php
    echo '<div id="page_body">';
echo "<h2>Bhai Nand Lal - Jot Bikas</h2>";
//echo $utilityBar."<br />";
echo $navigationBar;

$printable_languages = get_printable_languages('jot_bikas');

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

            //$url_shabad_name = url_title($line->shabad_name, 'underscore', TRUE);

            $attributes = '<p class="line_info">' . $line->lineno . ' ' . $line->attrib . '  <br> </p>';

            $sharing_data = '<span class="share_icons">';
            $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
            $share_data['link'] = site_url('public/shared/bhai_nand_lal/jot_bikas/page/' . $current_page . '/line/' . $line->lineno);
            $sharing_data .= $this->load->viewPartial('components/share_this', $share_data, true);
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

echo $navigationBar;
    echo '</div>';
?>

<script type="text/javascript">

    var pagination_url = '<?php echo site_url($base_url) ?>/';
    var current_url = '<?php echo current_url() ?>';
    var current_page = '<?php echo $current_page ?>';
    
</script>