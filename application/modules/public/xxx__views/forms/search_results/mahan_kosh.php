<?php
    echo '<div id="mahan_kosh_search_page">';
    echo '<div class="abc">';
?>
<h2>Gur Shabad Ratanakar Mahankosh</h2>
<div id="amrit_keetrtan2" align="center"><span class="alpha"><a
            href="<?php echo site_url('mahan-kosh/do_search'); ?>/ੳ/alpha">&#2675;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/ਅ/alpha">&#2565;</a>&nbsp;<a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/ੲ/alpha">&#2674;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B8/alpha">&#2616;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B9/alpha">&#2617;</a>&nbsp;<a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%95/alpha">&#2581;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%96/alpha">&#2582;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%97/alpha">&#2583;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%98/alpha">&#2584;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%99/alpha">&#2585;</a> <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9A/alpha">&#2586;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9B/alpha">&#2587;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9C/alpha">&#2588;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9D/alpha">&#2589;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9E/alpha">&#2590;</a> <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9F/alpha">&#2591;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A0/alpha">&#2592;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A1/alpha">&#2593;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A2/alpha">&#2594;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A3/alpha">&#2595;</a>&nbsp;<a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A4/alpha">&#2596;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A5/alpha">&#2597;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A6/alpha">&#2598;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A7/alpha">&#2599;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A8/alpha">&#2600;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AA/alpha">&#2602;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AB/alpha">&#2603;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AC/alpha">&#2604;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AD/alpha">&#2605;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AE/alpha">&#2606;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AF/alpha">&#2607;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B0/alpha">&#2608;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B2/alpha">&#2610;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B5/alpha">&#2613;</a>&nbsp;<a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/ੜ/alpha">&#2652;</a></span><br/>
    <strong>Browse by letter</strong></div>

<div class="subhead">
    <a href="#" class="save_as_pdf"><img src="'.base_url().'images/icons/pdf.gif" border="0" title="Save page as PDF"/></a>
    <?php
    echo "<p>Here are the results for the letter " . $keyword . " from Gur Shabad Ratanakar Mahankosh</p>";

    if ($lines != false) {
        echo "
	<span class='col_float_left'>
	Showing words " . $search_results_info['showing_from'] . " to " . $search_results_info['showing_to'] . " of " . $search_results_info['total_results'] . "
	</span>
	<span class='col_float_right'>
	<a href='" . site_url('mahan-kosh') . "' class='button'>Index</a>
	</span>
	
	<br class='clearer'>
	";
    }

    ?>
</div>

<p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>

<?php
if ($lines != false) {
    $i = 1;
    foreach ($lines->result() as $line) {

        echo "
			<div class='line row$i'>
				<div class='word'><span class='lang_1b'><a href='javascript:view_sggs_results(\"" . $line->word . "\")'>" . $line->word . "</a></span> - <span class='lang_2'>" . $line->roman . "</span> - <span class='lang_3'>" . $line->hindi . "</span></div>
				<div class='description lang_1a'>" . $line->description . "</div>
				<div class='description lang_3a'>" . $line->roman_desc . "</div>
			</div>";
        $i = -$i;
    }
} else {
    echo "<div class='line row1'><label>No words found</label></div>";
}
?>
<div class="clearer"></div>

<p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>
<div align="center" id="amrit_keetrtan"><strong>Browse by letter</strong><br/>
    <span class="alpha"><a href="<?php echo site_url('mahan-kosh/do-search'); ?>/ੳ/alpha">&#2675;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/ਅ/alpha">&#2565;</a>&nbsp;<a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/ੲ/alpha">&#2674;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B8/alpha">&#2616;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B9/alpha">&#2617;</a>&nbsp;<a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%95/alpha">&#2581;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%96/alpha">&#2582;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%97/alpha">&#2583;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%98/alpha">&#2584;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%99/alpha">&#2585;</a> <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9A/alpha">&#2586;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9B/alpha">&#2587;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9C/alpha">&#2588;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9D/alpha">&#2589;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9E/alpha">&#2590;</a> <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%9F/alpha">&#2591;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A0/alpha">&#2592;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A1/alpha">&#2593;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A2/alpha">&#2594;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A3/alpha">&#2595;</a>&nbsp;<a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A4/alpha">&#2596;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A5/alpha">&#2597;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A6/alpha">&#2598;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A7/alpha">&#2599;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%A8/alpha">&#2600;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AA/alpha">&#2602;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AB/alpha">&#2603;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AC/alpha">&#2604;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AD/alpha">&#2605;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AE/alpha">&#2606;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%AF/alpha">&#2607;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B0/alpha">&#2608;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B2/alpha">&#2610;</a>&nbsp; <a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/%E0%A8%B5/alpha">&#2613;</a>&nbsp;<a
            href="<?php echo site_url('mahan-kosh/do-search'); ?>/ੜ/alpha">&#2652;</a></span></div>
<form id="search_home" name="search_home" method="post"
      action="<?php echo site_url('scriptures/search-results-preview'); ?>">
    <input type="hidden" value="1" id="individual_search" name="individual_search">
    <input type="hidden" value="ggs" id="scripture" name="scripture">
    <input type="hidden" value="1" id="ggs" name="ggs">
    <input type="hidden" id="SearchData" name="SearchData" value="" size="25">
    <input type="hidden" class="button" id="SubmitSearch" name="SubmitSearch" value="Search">
    <input name="Searchtype" value="PHRASE" type="hidden"/>
    <input type="hidden" name="case" value=""/>
    <input type="hidden" name="language" value="PUNJABI"/>
    <input type="hidden" name="author" value=""/>
    <input type="hidden" name="raag" value=""/>
    <input type="hidden" name="page_from" value="1"/>
    <input type="hidden" name="page_to" value="1430"/>
</form>
<?php
    echo '</div>';
    echo '</div>';
?>
<script type="text/javascript">
    function view_sggs_results(word) {
        $('#SearchData').val(word);
        $('#search_home').submit();
    }

    $('.save_as_pdf').click(function () {
        var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
        window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
        return false;
    });


    function loadPage(index) {
        $.blockUI();
        if (index == undefined) {
            index = 0;
        }

        $.ajax({
            url: '<?php echo site_url($base_url); ?>/' + index + '/ajax',
            success: function (data) {
                $('.abc').remove();
                $('#mahan_kosh_search_page').html(data);

            }
        }).always(function (data){
            $.unblockUI();
        });

    }
</script>


