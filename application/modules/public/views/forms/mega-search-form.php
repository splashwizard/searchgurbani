<?php
global $SG_SearchTypes, $SG_SearchLanguage;

$sess_search_parameters = $this->session->userdata('search_parameters');

$msg = '';
if ($this->session->flashdata("response") != "") {
    $msg = $this->session->flashdata("response");
}
?>

<link rel="stylesheet" href="<?php echo base_url(min_root_loc()); ?>static/css/jquery.autocomplete.css" type="text/css"/>

<script type="text/javascript" src="<?php echo base_url(min_root_loc()); ?>static/js/validator.js"></script>

<link rel="stylesheet" href="<?php echo base_url(min_root_loc()); ?>static/css/typeahead.autocomplete.css" type="text/css"/>


<div class="page-content">
    <div class="container-fluid">
        <div class="search_panel">

            <h3 class="top-heading bold no-top">Gurubani Search</h3>
            <p class="bold">Access the scriptures by clicking on Menu Bar or search for a keyword below:</p>
            <form action="<?php echo site_url("home/search-results-preview"); ?>" method="post" role="form"
                  name="search_home"
                  id="search_home">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <label>Find results with text</label>
                        <div class="input-group">
                            <input type="text" value="<?php echo $sess_search_parameters['search_text']; ?>"
                                   name="SearchData" id="SearchData" class="search-input form-control"
                                   autocomplete="off">
                            <input type="submit" value="Search" name="SubmitSearch" id="SubmitSearch"
                                   class="btn search-btn">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <label>Return Results</label>
                        <?php
                        $js = ' class="form-control" id="Searchtype"';
                        echo form_dropdown('Searchtype', $SG_SearchTypes, $sess_search_parameters['search_type'], $js);
                        ?>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <label>Find results in language</label>
                        <?php
                        $js = ' onChange="change_keypad(this.value);" class="form-control" id="language"';
                        echo form_dropdown('language', $SG_SearchLanguage, $sess_search_parameters['search_language'], $js);
                        ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 bold">Select the Scriptures to search for</div>
                    <div class="col-md-12">
                        <div class="options-row">
                            <label><input name="ggs" type="checkbox" id="ggs" value="1" checked="checked"/> Sri Guru
                                Granth
                                Sahib</label>
                            <label><input name="ak" type="checkbox" id="ak" value="1" checked="checked"/> Amrit Keertan</label>
                            <label><input name="bgv" type="checkbox" id="bgv" value="1" checked="checked"/> Bhai Gurdas
                                Vaaran</label>
                            <label><input name="dg" type="checkbox" id="dg" value="1" checked="checked"/> Sri Dasam
                                Granth Sahib</label>
                            <label><input name="ks" type="checkbox" id="ks" value="1" checked="checked"/> Kabit Savaiye</label>
                            <label><input name="bnl" type="checkbox" id="bnl" value="1" checked="checked"/> Bhai Nand
                                Lal</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="key_pad_punjabi"<?php echo $sess_search_parameters['search_language'] == "punjabi" ? '' : ' style="display:none;"'; ?> >
    <?php echo $this->load->viewPartial('keypads/punjabi'); ?>
</div>
<div id="key_pad_hindi"<?php echo $sess_search_parameters['search_language'] == "hindi" ? '' : ' style="display:none;"'; ?> >
    <?php echo $this->load->viewPartial('keypads/hindi'); ?>
</div>

<script type="text/javascript" src="<?php echo base_url(min_root_loc()); ?>static/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="<?php echo base_url(min_root_loc()); ?>static/js/jquery.dimensions.js"></script>
<script type="text/javascript" src="<?php echo base_url(min_root_loc()); ?>static/js/auto-complete/typeahead.bundle.js"></script>
<script type="text/javascript" src="<?php echo base_url(min_root_loc()); ?>static/js/auto-complete/bloodhound.js"></script>
<script type="text/javascript" src="<?php echo base_url(min_root_loc()); ?>static/js/auto-complete/all-auto-complete.js"></script>
