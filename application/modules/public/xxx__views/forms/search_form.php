<?php
global $SG_SearchTypes, $SG_SearchLanguage;

$sess_search_parameters = $this->session->userdata('search_parameters');

$msg = '';
if ($this->session->flashdata("response") != "") {
    $msg = $this->session->flashdata("response");
}
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>styles/jquery.autocomplete.css" type="text/css"/>


<script type="text/javascript" src="<?php echo base_url(); ?>scripts/validator.js"></script>

<div class="search_panel">
    <h2>Gurbani Search </h2>
    <p><strong>Access the scriptures by clicking on Menu Bar or search for a keyword below: </strong></p>
    <link rel="stylesheet" href="<?php echo base_url(); ?>styles/typeahead.autocomplete.css" type="text/css"/>
    <form action="<?php echo site_url("home/search-results-preview"); ?>" method="post" name="search_home"
          id="search_home">
        <div class="sear_row">
            <div class="sear_1">
                <div class="search_ttls">Find results with text</div>
                <input type="text" size="25" value="<?php echo $sess_search_parameters['search_text']; ?>"
                       name="SearchData" id="SearchData" class="text_box" autocomplete="off">
                <input type="submit" value="Search" name="SubmitSearch" id="SubmitSearch" class="btn">
                <div class="clearer"></div>
            </div>
            <div class="sear_2">
                <div class="search_ttls">Return Results</div>
                <?php
                $js = ' class="drop_down" id="Searchtype"';
                echo form_dropdown('Searchtype', $SG_SearchTypes, $sess_search_parameters['search_type'], $js);
                ?>
<!--                <label>-->
<!--                    <input type="checkbox"-->
<!--                           name="case" --><?php //echo $sess_search_parameters['search_case_sensitive'] == "on" ? " checked='checked'" : ""; ?>
<!--                           value="on">-->
<!--                    Case Sensitive</label>-->
                <div class="clearer"></div>
            </div>
            <div class="sear_3">
                <div class="search_ttls">Find results in language</div>
                <?php
                $js = ' onChange="change_keypad(this.value);" class="drop_down" id="language"';
                echo form_dropdown('language', $SG_SearchLanguage, $sess_search_parameters['search_language'], $js);
                ?>
                <div class="clearer"></div>
            </div>
            <div class="clearer"></div>
        </div>
        <div class="sear_row">
            <div class="search_ttls">Select the Scriptures to search for</div>
            <label class="lbl_srch">
                <input name="ggs" type="checkbox" id="ggs" value="1" checked="checked">
                Sri Guru Granth Sahib</label>
            <label class="lbl_srch">
                <input name="ak" type="checkbox" id="ak" value="1" checked="checked">
                Amrit Keertan</label>
            <label class="lbl_srch">
                <input name="bgv" type="checkbox" id="bgv" value="1" checked="checked">
                Bhai Gurdas Vaaran</label>
            <label class="lbl_srch">
                <input name="dg" type="checkbox" id="dg" value="1" checked="checked">
                Sri Dasam Granth Sahib</label>
            <label class="lbl_srch">
                <input name="ks" type="checkbox" id="ks" value="1" checked="checked">
                Kabit Savaiye</label>
            <label class="lbl_srch">
                <input name="bnl" type="checkbox" id="bnl" value="1" checked="checked">
                Bhai Nand Lal</label>
            <div class="clearer"></div>
        </div>
    </form>
</div>
<div
    id="key_pad_punjabi"<?php echo $sess_search_parameters['search_language'] == "punjabi" ? '' : ' style="display:none;"'; ?>>
    <?php $this->load->view('keypads/punjabi'); ?>
</div>
<div
    id="key_pad_hindi"<?php echo $sess_search_parameters['search_language'] == "hindi" ? '' : ' style="display:none;"'; ?>>
    <?php $this->load->view('keypads/hindi'); ?>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.bgiframe.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/auto-complete/typeahead.bundle.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/auto-complete/bloodhound.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>scripts/auto-complete/all-auto-complete.js"></script>
