<link href="<?php echo base_url(); ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>

<style>

    p {

        margin: 8px 0 14px;

    }

    .label_container label {
        width: 100%;
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


?>

<div id="header"><img alt="Search Gurbani" src="/Mobile/images/logo.jpg"></div>

<div id="wrapper">

    <div class="content">

        <h1>Gurbani Search<span class="right"><a href="<?= base_url() ?>scriptures/" style="margin-right:10px;">Home</a></span>
        </h1>

        <p></p>

        <table width="100%" border="1" cellspacing="2" cellpadding="15" align="center">

            <tr>


                <td bgcolor="#EDE8D5">
                    <div style="width:280px;margin: 0 0 0 8px;">
                        <?php
                        if (!empty($result_counts)) {
                            ?>
                            <h2>Gurbani Search Results</h2>
                            <?php
                        }
                        ?>
                        <?php

                        foreach ($result_counts as $scripture => $result) {

                            if ($result['result_count'] > 0) {

                                echo "<div class='rw_result_count_name'><label><a  href='" . site_url('scriptures/' . $scripture . '_search_results/') . "'>" . $result['scripture_name'] . "  Results found " . $result['result_count'] . "</a></label></div>";

                            } else {

                                echo "<div class='rw_result_count_name'><label>" . $result['scripture_name'] . " Results found " . $result['result_count'] . "</label></div>";

                            }

                        }

                        ?>


                        <p></p>

                        <h2>Gurbani Search</h2>
                        <script src="http://www.searchgurbani.com/scripts/validator.js" type="text/javascript"></script>


                        <form id="search_home" name="search_home" method="post"
                              action="<?= base_url() ?>scriptures/search_form">

                            <div class="sear_row">

                                <div class="sear_1">

                                    <div class="search_ttls">Find results with text</div>

                                    <input type="text" autocomplete="off" class="text_box ac_input" id="SearchData"
                                           name="SearchData" value="" size="25">

                                    <input type="submit" class="btn" id="SubmitSearch" name="SubmitSearch"
                                           value="Search">

                                    <div class="clearer"></div>

                                </div>

                                <div class="sear_2">

                                    <div class="search_ttls">Return Results</div>

                                    <select class="drop_down" name="Searchtype" style="width:95%;margin:0 0 7px 0px">

                                        <option value="firstLetter">first letters search in the begin</option>

                                        <option value="firstLetterSearchData">first letters search anywhere</option>

                                        <option value="begin">begins with</option>

                                        <option value="alldata">with all of the words</option>

                                        <option value="anydata">with any of the words</option>

                                        <option value="withoutdata">without the words</option>

                                        <option value="exact">with the exact phrase</option>

                                    </select>

                                    <label>

                                        <input type="checkbox" value="on" name="case" style="width:auto;">

                                        Case Sensitive</label>

                                    <div class="clearer"></div>

                                </div>

                                <div class="sear_3">

                                    <div class="search_ttls">Find results in language</div>

                                    <select id="language" class="drop_down" onChange="change_keypad(this.value);"
                                            name="language">

                                        <option value="translit">Transliteration</option>

                                    </select>

                                    <div class="clearer"></div>

                                </div>

                                <div class="clearer"></div>

                            </div>

                            <div class="sear_row">

                                <div class="search_ttls">Select the Scriptures to search for</div>

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

                        <strong><a href="http://www.searchgurbani.com">SearchGurbani.com</a></strong>

                        <?php /*?></span></div><div><h2>Gurbani Search Results</h2>

	<div class="subhead">

	  <input type="button" value="Goto Megasearch" class="button" onclick="document.location.href='<?php echo site_url('scriptures/search'); ?>'">

	</div><?php */ ?>


                        <div class="clearer"></div>
                    </div>
                </td>


            </tr>

        </table>


    </div>

</div>