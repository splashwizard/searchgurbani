<?php
global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;

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
			<a href="#" class="save_as_pdf"><img src="' . base_url() . 'images/icons/pdf.gif" border="0" title="Save page as PDF" /></a>
		</div>
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
/*echo "</pre>";
print_r($shabad_info);
echo "<pre>";*/
?>


<div style="background-color:#fceaaa" align="center">

    <p>
        <?php
        $first_line = '<div style="text-align: -webkit-center">';
        foreach ($lines->result() as $line) {

        if ($highlight_line == $line->shabadlineno) {

                 $first_line .='<h3>'.$line->punjabi. '</h3></div>';
                 echo $first_line;
            }
        }
        echo "
  	<strong>This shabad is on Ang " . $shabad_info[0]->pageno . "   of Guru Granth Sahib.</strong>
  ";
        ?>
        <br>
        <br>

    </p>
</div>

<?php
echo $utilityBar;

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
//        $first_line ='<div style="text-align: -webkit-center">';
//        $first_row = '';
//        $rest_row = '';
        foreach ($lines->result() as $line) {



            $highlight = ($highlight_line == $line->shabadlineno ? ' hl2' : '');
            $attributes = '<p class="line_info">' . $line->shabadlineno . ' ' . $line->pattrib . ' <br> ' . $line->raag . ' ' . $line->author . ' 
			  <a href="' . site_url('guru-granth-sahib/ang/' . $line->pageno . '/line/' . $line->lineno) . '">Ang:' . $line->pageno . ' Line: ' . $line->pagelineno . '</a>  
			  </p>';

            $sharing_data = '<span class="share_icons">';
            $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
            $share_data['link'] = site_url('public/shared/guru-granth-sahib/shabad/' . $shabad_info[0]->shabad_id . '/line/' . $line->shabadlineno);
            $sharing_data .= $this->load->viewPartial('templates/share_this', $share_data, true);
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

echo $utilityBar;
?>
<script type="text/javascript">

    $('.save_as_pdf').click(function () {
        var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
        window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
        return false;
    });

</script>