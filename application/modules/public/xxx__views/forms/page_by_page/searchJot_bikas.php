<?php
    global $SG_BNL, $SG_SearchTypes, $SG_BNL, $SG_SearchLanguage, $SG_Preferences;
    
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
		<span style="float:left;">
			<form name="search_page" id="search_page" action="" method="post" onsubmit="return search_pageR(this);">
				Search
				<input name="serachText" id="serachText" type="text" size="5"  >
				<input type="submit" name="Submit" value="Search">
			</form>
		</span>

	
	<br class="clearer" />
</div>
';
?>
<?php /*?><span class="col_float_right">
		<div class="utility_buttons">
			'.anchor_popup(current_url().'/print_view', '<img src="'.base_url().'images/icons/print.gif" border="0" title="Print this page" />', $atts).'&nbsp;&nbsp;&nbsp;
		
			'.anchor_popup(current_url().'/pdf_view', '<img src="'.base_url().'images/icons/pdf.gif" border="0" title="Save page as PDF" />', $atts).'
			
		</div>
	</span>
<?php */ ?><?

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
    
    echo "<h2>Bhai Nand Lal - Jot Bikas</h2>";
    
    //echo $navigationBar;
    echo $utilityBar;
    if (!empty($pagination_links))
    {
?>
<p class="pagination_links">Pages: <?php echo $pagination_links; ?>&nbsp;</p>
<?
    }
    
    $printable_languages
    = get_printable_languages('ghazal');
    
    //print_r($printable_languages);
    //echo "<pre>";
    //print_r($lines);exit;
    if (empty($lines))
    {
    echo '
	<div class="line row1">
	  <p class="english">No Record found</p>
	</div>
	';
    }
    else
    {
    $alt_row
    = 1;
    
    if ($SG_Preferences['text_type'] == 'line_by_line')
    {
    /** Line by Line **/
    foreach ($lines as $line)
    {
    //$highlight = ($highlight_line==$line->lineno ? ' hl2' : '');
    
    //$url_shabad_name = url_title($line->shabad_name, 'underscore', TRUE);
    
    $attributes
    = '<p class="line_info">'.$line->lineno.' '.$line->attrib.'  <br> </p>';
    
    $sharing_data
    = '<span class="share_icons">';
    $share_data['text']
    = $line->punjabi . ' - ' . $line->translit;
    //$share_data['link'] = site_url('shared/bhai_nand_lal/ghazal/page/'.$current_page.'/line/'.$line->lineno);
    //$sharing_data .= $this->load->view('templates/share_this',$share_data,true);
    $sharing_data
    .= '</span>';
    
    echo '<div class="line row">';
    foreach ($printable_languages as $printable_language)
    {
    echo print_line($printable_language, $line);//
    }
    echo get_data_by_preferences($attributes, 'show_attributes');
    echo get_data_by_preferences($sharing_data, 'allow_share_lines');
    
    echo '<br class="clearer" /></div>';
    $alt_row
    = -$alt_row;
    }
        
    }
    else
    {
    /** Page by Page **/
    foreach ($lines as $line)
    {
    $i
    = 0;
    $highlight
    = ($highlight_line==$line->lineno ? ' hl2' : '');
    foreach ($printable_languages as $printable_language)
    {
    $printable_languages[$i]['data']
    .= print_line($printable_language, $line, $keywords, $highlight);//$keywords
    $i++;
    }
    $alt_row
    = -$alt_row;
    }
    
    foreach ($printable_languages as $printable_language)
    {
    echo '<p><strong>In '.$printable_language['lang_name'].'</strong></p>';
    echo '<div class="line row'.$alt_row.'">';
    echo $printable_language['data'];
    echo '</div>';
    $alt_row
    = -$alt_row;
    }
    }
        
        
    }
    if (!empty($pagination_links))
    {
?>

<p class="pagination_links">Pages: <?php echo $pagination_links; ?>&nbsp;</p>
<?
    }
    echo $utilityBar."<br />";
    
    //echo $navigationBar;

?>

<script type="text/javascript">
    function search_pageR(formobj1) {
//alert('here');
        var serachText = formobj1.serachText.value;
        document.location.href = '<?php echo site_url('bhai_nand_lal/jot_bikas/search'); ?>/' + serachText;
        return false;
    }
    
    
    
    <?php /*?>$('.remember_this').click(function(){
	$.ajax({
		url: '<?php echo site_url('bhai-nand-lal/ghazal/ajax-remember-me/'.$current_page); ?>',
		success: function(data)
		{
			alert('We bookmarked this page. You can also access this page later by clicking on the ang by ang (or) page by page links');
		}
	});
});<?php */?>
    
    $('.save_as_pdf').click(function () {
        var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
        window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
        return false;
    });

</script>