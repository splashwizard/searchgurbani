<?php
global $SG_SearchTypes, $SG_SearchLanguage, $SG_ScriptureTypes;
?>
<h2>Gurbani Search Results</h2>
<div class="subhead">Find Results : <?php echo $this->input->post('SearchData'); ?>
    (<?php echo $SG_SearchTypes[$this->input->post('Searchtype')]; ?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Language
    : <?php echo $SG_SearchLanguage[$this->input->post('language')]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" value="Goto Megasearch" class="button"
           onclick="document.location.href='<?php echo site_url('scriptures/search'); ?>'">
</div>
<p>&nbsp;</p>
<?php
foreach ($result_counts as $scripture => $result) {
    if ($result['result_count'] > 0) {
        echo "<div class='rw_result_count_name'><label><a href='" . base_url($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/search-results') . "'>" . $result['scripture_name'] . "</a></label><strong>Results found " . $result['result_count'] . "</strong></div>";
    } else {
        echo "<div class='rw_result_count_name'><label>" . $result['scripture_name'] . "</label><strong>Results found " . $result['result_count'] . "</strong></div>";
    }
}
?>
<div class="clearer"></div>
