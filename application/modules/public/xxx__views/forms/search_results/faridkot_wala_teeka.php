<?php
    echo '<div id="faridkot_wala_teeka_search_page">';
    echo '<div class="abc">';

?>
<h2>Faridkot Wala Teeka</h2>

<div class="subhead">
    <?php
    if ($occurrences_count > 0) {
        echo "Showing from " . $search_results_info['showing_from'] . " to " . $search_results_info['showing_to'] . " of " . $search_results_info['total_results'] . " occurrences of '" . $this->session->userdata('book_3_keyword') . "' in Faridkot Wala Teeka";
    } else {
        echo "Search result of '" . $this->session->userdata('book_3_keyword') . "' in Faridkot Wala Teeka";
    }
    ?>
</div>

<p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>

<?php
if ($occurrences_count > 0) {
    foreach ($occurrences->result() as $occurrence) {
        echo "
			<div>
				<a href='" . site_url('faridkot-wala-teeka/page/' . $occurrence->page_id . '/highlight/') . "'>
					Faridkot Wala Teeka " . ($occurrence->volume_id != 0 ? "Section " . $occurrence->volume_id . ", " : "") . " Page " . $occurrence->page_id . "
				</a>
			</div>";
    }
} else {
    echo "<div class='rw_result_count_name'><label>No occurrences found</label></div>";
}
?>
<div class="clearer"></div>

<p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>
<?php
    echo '</div>';
    echo '</div>';
?>
<script type="text/javascript">

    function loadPage(index) {

        $.blockUI();
        if (index == undefined) {
            index = 0;
        }

        $.ajax({
            url: '<?php echo site_url($base_url); ?>/' + index + '/ajax',
            success: function (data) {
                $('.abc').remove();
                $('#faridkot_wala_teeka_search_page').html(data);

            }
        }).always(function (data) {
            $.unblockUI();
        });


    }
</script>