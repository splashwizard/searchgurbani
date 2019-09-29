<div id="page_body">
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="contents">
                   
                    <h2 class="top-heading no-top">Faridkot Wala Teeka</h2>

                    <div class="subhead">
                        <?php
                        if ($occurrences_count > 0) {
                            echo "Showing from " . $search_results_info['showing_from'] . " to " . $search_results_info['showing_to'] . " of " . $search_results_info['total_results'] . " occurrences of '" . $this->session->userdata('book_3_keyword') . "' in Faridkot Wala Teeka";
                        } else {
                            echo "Search result of '" . $this->session->userdata('book_3_keyword') . "' in Faridkot Wala Teeka";
                        }
                        ?>
                    </div>

                   <?php echo $pagination_links; ?>

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

                    <?php echo $pagination_links; ?>&nbsp;
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">

    var pagination_url = '<?php echo site_url($base_url) ?>/';
    var current_url = '<?php echo current_url() ?>';
    
</script>