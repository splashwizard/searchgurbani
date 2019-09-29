<link href="<?php echo base_url(); ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>

<style>

    p {

        margin: 2px 0 2px;

    }

    .label_container label {
        width: 280px;
        color: #5B5A5A;
        float: left;
        font-size: 12px;
        font-weight: bold;
        margin: 0 0 0 0;
        padding: 0 0 5px;
    }

    .txt_in {
        float: left;
        width: 150px;
    }

    .search_ttls {
        padding: 0 0 5px;
    }
</style>

<?php

global $SG_SearchTypes, $SG_SearchLanguage, $SG_ScriptureTypes;
/*echo "<pre>";
print_r($SG_ScriptureTypes);
echo "</pre>";*/
?>

<?php /*?><div id="header" style="text-align:left;"><img alt="Search Gurbani" src="/images/logo.jpg"></div><?php */ ?>
<div id="wrapper" align="center" style="margin: 10px 2px 0 3px;;">
    <div class="content" style="width:243px;padding: 15px 7px;">
        <h1><img alt="Search Gurbani" src="/Mobile/images/sg_mini.jpg"><span class="right"></span></h1>
        <table width="98%" border="1" cellspacing="0" cellpadding="5" align="center">
            <tr>
                <td bgcolor="#EDE8D5">
                    <div style="width:100%;margin: 0 0 0 0;">
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
                                    <div><h5>Find results with First Letter Search</h5></div>
                                    <input type="text" autocomplete="off" class="text_box ac_input" id="SearchData"
                                           name="SearchData" value="" size="25">
                                    <input type="hidden" name="Searchtype" value="firstLetter"/>
                                    <input type="hidden" name="language" value="translit"/>

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

                                    <input type="submit" class="btn" id="SubmitSearch" name="SubmitSearch"
                                           value="Search">
                                    <div class="clearer"></div>
                                </div>
                            </div>
                        </form>
                        <div class="clearer"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>