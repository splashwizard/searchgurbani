
<?php
global $SG_SearchTypes, $SG_SearchLanguage, $SG_ScriptureTypes;
?>

<div class="page-content">
    <div class="container-fluid">
        <h2>Gurbani Search Results</h2>
        <div class="subhead">Find Results : <?php echo $this->input->post('SearchData'); ?>
            (<?php echo $SG_SearchTypes[$this->input->post('Searchtype')]; ?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Language
            : <?php echo $SG_SearchLanguage[$this->input->post('language')]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="Goto Megasearch" class="button"
                   onclick="document.location.href='<?php echo site_url('scriptures/search'); ?>'">
        </div>
        <p>&nbsp;</p>
        <table>

                <?php
                if(!empty($result_counts)){

                    foreach ($result_counts as $scripture => $result) {
                        echo "<tr>";
                        if ($result['result_count'] > 0) {
                            echo "<td><label><a href='" . base_url($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/search-results') . "'>" . $result['scripture_name'] . "</a></label></td><td style='width: 300px'></td><td><strong>Results found " . $result['result_count'] . "</strong></td>";
                        } else {
                            echo "<td><label>" . $result['scripture_name'] . "</label></td><td style='width: 300px'></td><td><strong>Results found " . $result['result_count'] . "</strong></td>";
                        }
                        echo "</tr>";
                    }
                }else{
                    redirect('scriptures/search');
                }
                ?>

        </table>
        <div class="clearer"></div>
    </div>
</div>
