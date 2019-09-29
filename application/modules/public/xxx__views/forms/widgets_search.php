<link href="<?php echo base_url(); ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>

<style>

    p {

        margin: 4px 0 4px;

    }

    .label_container label {
        width: 240px;
        color: #5B5A5A;
        float: left;
        font-size: 12px;
        font-weight: bold;
        margin: 6px 0 0 0;
        padding: 0 0 11px;
    }

    .txt_in {
        float: left;
        width: 150px;
    }

    .search_ttls {
        padding: 0 0 10px;
    }
</style>

<?php


global $SG_SearchTypes, $SG_SearchLanguage, $SG_ScriptureTypes;
/*echo "<pre>";
print_r($SG_ScriptureTypes);
echo "</pre>";*/
?>

<?php /*?><div id="header" style="text-align:left;"><img alt="Search Gurbani" src="/Mobile/images/logo.jpg"></div><?php */ ?>
<div id="wrapper" align="center" style="margin: 2px 2px 0 2px;;">
    <div class="content" style="width:220px;padding: 5px 5px;">
        <table border="1" cellspacing="2" align="center">
            <tr>
                <td bgcolor="#EDE8D5">
                    <div style="width:97%;margin: 0 0 0 5px;">
                        <?php
                        if (!empty($result_counts)) {
                            ?>
                            <h3>Gurbani Search Results</h3>
                            <?php
                        }
                        ?>
                        <?php

                        foreach ($result_counts as $scripture => $result) {
                            if ($result['result_count'] > 0) {

                                echo "<div class='rw_result_count_name'><label><a target='_blank'  href='" . site_url($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/' . 'search_results/') . "'>" . $result['scripture_name'] . "  Results found " . $result['result_count'] . "</a></label></div>";

                            } else {

                                echo "<div class='rw_result_count_name'><label>" . $result['scripture_name'] . " Results found " . $result['result_count'] . "</label></div>";

                            }

                        }
                        ?>
                        <h3>Gurbani Search</h3>
                        <script src="http://www.searchgurbani.com/scripts/validator.js" type="text/javascript"></script>
                        <form id="search_home" name="search_home" method="post"
                              action="<?= base_url() ?>widgets/widgets_search_Form">

                            <div class="sear_row">

                                <div class="sear_1">

                                    <div class="search_ttls"><h5>Find results with Transliteration text</h5></div>

                                    <input type="text" autocomplete="off" class="text_box ac_input" id="SearchData"
                                           name="SearchData" value="" size="25">

                                    <input type="submit" class="btn" id="SubmitSearch" name="SubmitSearch"
                                           value="Search">

                                    <div class="clearer"></div>

                                </div>

                                <div class="sear_2">

                                    <div class="search_ttls"><h5>Return Results</h5></div>

                                    <select class="drop_down" name="Searchtype" style="width:95%;margin:0 0 7px 0px">

                                        <option value="firstLetter">first letters search in the begin</option>

                                        <option value="firstLetterSearchData">first letters search anywhere</option>

                                        <option value="begin">begins with</option>

                                        <option value="alldata">with all of the words</option>

                                        <option value="anydata">with any of the words</option>

                                        <option value="withoutdata">without the words</option>

                                        <option value="exact">with the exact phrase</option>

                                    </select>
                                    <input type="hidden" name="language" value="translit"/>
                                    <div class="clearer"></div>

                                </div>

                                <div class="clearer"></div>

                            </div>

                            <div class="sear_row">

                                <div class="search_ttls"><h5>Select the Scriptures to search for</h5></div>

                                <div class="label_container"
                                     style="float:left;margin:0px;padding:0px;width:70%;height:auto;">

                                    <label class="lbl_srch">
				<span class="txt_in">
					Sri Guru Granth Sahib
				</span>
                                        <input type="checkbox" checked="checked" value="1" id="ggs" name="ggs"
                                               style="width:auto; margin:1px 0 0 5px; float:right;">
                                    </label>

                                    <label class="lbl_srch">
				<span class="txt_in">
					  Amrit Keertan
				</span>
                                        <input type="checkbox" checked="checked" value="1" id="ak" name="ak"
                                               style="width:auto; margin:1px 0 0 5px; float:right;">

                                    </label>

                                    <label class="lbl_srch">
				<span class="txt_in">
					Bhai Gurdas Vaaran
				</span>
                                        <input type="checkbox" checked="checked" value="1" id="bgv" name="bgv"
                                               style="width:auto; margin:1px 0 0 5px; float:right;">

                                    </label>

                                    <label class="lbl_srch">
				<span class="txt_in">
					 Sri Dasam Granth Sahib
				</span>
                                        <input type="checkbox" checked="checked" value="1" id="dg" name="dg"
                                               style="width:auto; margin:1px 0 0 5px; float:right;">

                                    </label>

                                    <label class="lbl_srch">
				<span class="txt_in">
					Kabit Savaiye
				</span>
                                        <input type="checkbox" checked="checked" value="1" id="ks" name="ks"
                                               style="width:auto; margin:1px 0 0 5px; float:right;">

                                    </label>
                                </div>

                                <div class="clearer"></div>

                            </div>

                        </form>
                        <div class="clearer"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>