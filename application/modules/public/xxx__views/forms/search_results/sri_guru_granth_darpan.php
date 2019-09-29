<?php
    echo '<div id="sri_guru_granth_darpan_search_page">';
    echo '<div class="abc">';

?>

<h2>Sri Guru Granth Darpan</h2>

<div class="subhead">
    <?php
    if ($occurrences_count > 0) {
        echo "Showing from " . $search_results_info['showing_from'] . " to " . $search_results_info['showing_to'] . " of " . $search_results_info['total_results'] . " occurrences of '" . $this->session->userdata('book_4_keyword') . "' in Sri Guru Granth Darpan";
    } else {
        echo "Search result of '" . $this->session->userdata('book_4_keyword') . "' in Sri Guru Granth Darpan";
    }
    ?>
</div>

<p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>

<?php
if ($occurrences_count > 0) {
    foreach ($occurrences->result() as $occurrence) {
        echo "
			<div>
				<a href='" . site_url('sri-guru-granth-darpan/page/' . $occurrence->page_id . '/highlight/') . "'>
					Sri Guru Granth Darpan " . ($occurrence->volume_id != 0 ? "Section " . $occurrence->volume_id . ", " : "") . " Page " . $occurrence->page_id . "
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
                $('#sri_guru_granth_darpan_search_page').html(data);

            }
        }).always(function (data) {
            $.unblockUI();
        });


    }
</script>