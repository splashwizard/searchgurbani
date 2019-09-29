<?php
global $SG_SearchTypes, $SG_SearchLanguage, $SG_ScriptureTypes;

$sess_search_parameters = $this->session->userdata('search_parameters');

$msg = '';
if ($this->session->flashdata("response") != "") {
    $msg = $this->session->flashdata("response");
}
?>
<!-- Start of Individual Search Form -->
<h2><strong>Advanced Search <?php echo $SG_ScriptureTypes[$scripture][1]; ?></strong></h2><br/>

<?php echo $msg; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>styles/typeahead.autocomplete.css" type="text/css"/>
<form action="<?php echo site_url("public/scriptures/search_results_preview"); ?>" method="post" name="search_home"
      id="search_gurbanis_frm">
    <div class="search_panel">
        <table border="0" cellpadding="5" cellspacing="0" width="80%">
            <tr>
                <td rowspan="3" align="center" bgcolor="#CAB99D"><strong>Find results</strong></td>
                <td>Find results with text</td>
                <td style="position: relative;">
                    <input type="hidden" name="individual_search" id="individual_search" value="1"/>
                    <input type="hidden" name="scripture" id="scripture" value="<?php echo $scripture; ?>"/>
                    <input type="hidden" name="<?php echo $scripture; ?>" id="<?php echo $scripture; ?>" value="1"/>
                    <input type="hidden" name="pageID" id="searchPageID"/>
<!--                    <input type="hidden" name="tableID" id="searchTableID"/>-->
                    <input type="text" size="25" value="<?php echo $sess_search_parameters['search_text']; ?>"
                           name="SearchData" id="SearchData" autocomplete="off"/>
                    <object class="typeahead-loader" data="<?php echo base_url('images/loader.svg') ?>"
                            type="image/svg+xml"
                            style="left: 192px; top: 6px; position: absolute; width: 18px;vertical-align: middle; display: none;">
                        <img class="typeahead-loader" src="<?php echo base_url('images/loading.gif') ?>"
                             style="left: 192px; top: 6px; position: absolute; width: 18px;vertical-align: middle; display: none;"/>
                    </object>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Search" name="SubmitSearch" id="SubmitSearch" class="button"/></td>
                </td>
            </tr>
            <tr>
                <td>Return results</td>
                <td><?php
                    echo form_dropdown('Searchtype', $SG_SearchTypes, $sess_search_parameters['search_type'], 'id="Searchtype"');
                    ?>
<!--                    <input type="checkbox"-->
<!--                           name="case" --><?php //echo $sess_search_parameters['search_case_sensitive'] == "on" ? " checked='checked'" : ""; ?>
<!--                           value="on"/>-->
<!--                    Case Sensitive-->
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#CAB99D"><strong>Language</strong></td>
                <td>Find results in language</td>
                <td><?php
                    $js = ' onChange="change_keypad(this.value);" id="language"';
                    echo form_dropdown('language', $SG_SearchLanguage, $sess_search_parameters['search_language'], $js);
                    ?></td>
            </tr>
            <?php
            if ($SG_ScriptureTypes[$scripture]['author'] == true) {
                ?>
                <tr>
                    <td align="center" bgcolor="#CAB99D"><strong>Author</strong></td>
                    <td>Find results from text written by</td>
                    <td><?php
                            echo '<select name="author" ID="author">';
                            echo '<option value="">Any Author</option> ';
                            foreach ($authors->result() as $author) {
                                echo '<option value=' . $author->ID . '>' . $author->author . '</option>';
                            }
                            echo '</select>';
                        ?></td>
                </tr>
                <?php
            }
            if ($SG_ScriptureTypes[$scripture]['raag'] == true) {
                ?>
                <tr>
                    <td align="center" bgcolor="#CAB99D"><strong>Raag</strong></td>
                    <td>Find results from text related to raag</td>
                    <td><?php
                        echo '<select name="raag" id="raag">';
                        echo '<option value="">Any Raag</option> ';
                        foreach($raags->result() as $raag)
                        {
                            echo '<option value='.$raag->id.'>'.$raag->name.'</option>';
                        }
                        echo '</select>';
                        ?></td>
                </tr>
                <?php
            }
            if ($SG_ScriptureTypes[$scripture][0] == 'bnl') {
                ?>
                <tr>
                    <td align="center" bgcolor="#CAB99D"><strong>Categories</strong></td>
                    <td>Search from</td>
                    <td><?php
                         echo '<select name="bnlSelect" id="bnlSelect">';
                         echo '<option value="">All Categories</option>';
                            foreach($bnlSelect->result() as $bnlname) {
                                echo '<option value = '.str_replace(" ","_",$bnlname->name).'>'. $bnlname->name.'</option >';
                            }
                        echo '</select>';
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td align="center" bgcolor="#CAB99D">
                    <strong><?php echo ucwords($SG_ScriptureTypes[$scripture]['page_name'] . "s"); ?></strong></td>
                <td>Find results from <?php echo $SG_ScriptureTypes[$scripture]['page_name']; ?> between</td>
                <td><input type="text" size="5" value="<?php echo $SG_ScriptureTypes[$scripture]['page_from']; ?>"
                           name="page_from" id="page_from"/>
                    and
                    <input type="text" size="5" value="<?php echo $SG_ScriptureTypes[$scripture]['page_to']; ?>"
                           name="page_to" id="page_to"/></td>
            </tr>
        </table>
    </div>
</form>
<br/>

<div
    id="key_pad_punjabi"<?php echo $sess_search_parameters['search_language'] == "PUNJABI" ? '' : ' style="display:none;"'; ?>><?php $this->load->view('keypads/punjabi'); ?> </div>
<div
    id="key_pad_hindi"<?php echo $sess_search_parameters['search_language'] == "hindi" ? '' : ' style="display:none;"'; ?>><?php $this->load->view('keypads/hindi'); ?> </div>

<!-- End of Individual Search Form -->

<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.bgiframe.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/auto-complete/typeahead.bundle.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/auto-complete/bloodhound.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/auto-complete/individual-auto-complete.js"></script>