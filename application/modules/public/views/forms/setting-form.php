<link href="<?php echo base_url(); ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>
<style>

    p {

        margin: 8px 0 14px;

    }

    .contentPre {
        background-color: #FFFFFF;
        border: 1px solid #E0E0E0;
        line-height: 17px;
        margin-bottom: 4px;
        padding: 15px 10px;

    }

    #preference_table {
        border: none;
        width: 99%;

    }

    input, textarea {
        -moz-border-radius: 5px 5px 5px 5px;
        border: 1px solid #E5E5E5;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 12px;
        line-height: 16px;
        margin-left: 5px;
        margin-right: 6px;
        margin-top: 2px;
        width: auto;

    }

</style>
<script type="text/javascript">
    function reset_defaults() {
        document.getElementById('frmPreferences').action = '<?php echo site_url('scriptures/reset_defaults'); ?>';
        document.getElementById('frmPreferences').submit();
    }

</script>

<?php

global $SG_SearchTypes, $SG_SearchLanguage, $SG_ScriptureTypes;

?>


<div id="header"><img alt="Search Gurbani" src="/Mobile/images/logo.jpg"></div>

<div id="wrapper">
    <?php

    if ($this->session->flashdata('response') != '') {

        echo $this->session->flashdata('response');

    }

    ?>


    <div class="content">
        <form action="<?php echo site_url('scriptures/save'); ?>" method="post" name="frmPreferences"
              id="frmPreferences">

            <h1>Preferences<span class="right"><a href="<?= base_url() ?>scriptures/"
                                                  style="margin-right:10px;">Home</a></span></h1>
            <p></p>
            <div id="preference_table">
                <h4>Choose The Font: </h4>
                <div class="contentPre">
                    Punjabi:
                    <select name="language" class="form-select" id="edit-months">

                        <option value="WebAkharSlim">Default</option>

                        <option
                            value="AnmolUniBani" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'AnmolUniBani') { ?> selected="selected" <?php } ?> >
                            AnmolUniBani
                        </option>

                        <option
                            value="RaajaaMediumMedium" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'RaajaaMediumMedium') { ?> selected="selected" <?php } ?>>
                            Raajaa
                        </option>

                        <option
                            value="RaajaaBoldBold" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'RaajaaBoldBold') { ?> selected="selected" <?php } ?> >
                            Raajaa Bold
                        </option>

                        <option
                            value="RaajBold" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'RaajBold') { ?> selected="selected" <?php } ?>>
                            Raaj
                        </option>

                        <option
                            value="AdhiapakMarkerMedium" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'AdhiapakMarkerMedium') { ?> selected="selected" <?php } ?>>
                            Adhiapak
                        </option>

                        <option
                            value="PrabhkiRegular" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'PrabhkiRegular') { ?> selected="selected" <?php } ?> >
                            Prabhki
                        </option>

                    </select>

                    Phonetic English:

                    <select name="PhonEnglish" class="form-select" id="edit-months">

                        <option value="arial">Default</option>

                        <option
                            value="Puritan20Italic" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'Puritan20Italic') { ?> selected="selected" <?php } ?> >
                            Puritan
                        </option>

                        <option
                            value="AndikaBasicRegular" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'AndikaBasicRegular') { ?> selected="selected" <?php } ?>>
                            Andika
                        </option>

                        <option
                            value="ArchitectsDaughterRegular" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'ArchitectsDaughterRegular') { ?> selected="selected" <?php } ?>>
                            Architect
                        </option>

                        <option
                            value="QuattrocentoRomanRegular" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'QuattrocentoRomanRegular') { ?> selected="selected" <?php } ?>>
                            Quattrocento
                        </option>

                        <option
                            value="DroidSansRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'DroidSansRegular') { ?> selected="selected" <?php } ?>>
                            Droid Sans
                        </option>

                        <option
                            value="DroidSerifBold" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'DroidSerifBold') { ?> selected="selected" <?php } ?>>
                            Droid Bold
                        </option>

                    </select>


                    Hindi:

                    <select name="HinTrans" class="form-select" id="edit-months">

                        <option value="arial">Default</option>

                        <option
                            value="JaipurRegular" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'JaipurRegular') { ?> selected="selected" <?php } ?>>
                            Jaipur Regular
                        </option>

                        <option
                            value="Gurumaa150Bold" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'Gurumaa150Bold') { ?> selected="selected" <?php } ?>>
                            Gurumaa Regular
                        </option>

                        <option
                            value="RaghindiRegular" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'RaghindiRegular') { ?> selected="selected" <?php } ?>>
                            Raghu Regular
                        </option>

                        <option
                            value="gargiMedium" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'gargiMedium') { ?> selected="selected" <?php } ?>>
                            Gargi Medium
                        </option>

                        <option
                            value="CDACGISTYogeshNormal" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'CDACGISTYogeshNormal') { ?> selected="selected" <?php } ?>>
                            Yogesh Normal
                        </option>

                        <option
                            value="CDACGISTSurekhNormal" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'CDACGISTSurekhNormal') { ?> selected="selected" <?php } ?>>
                            Surekh Normal
                        </option>

                    </select>

                    English Translation:

                    <select name="EngTrans" class="form-select" id="edit-months">

                        <option value="arial">Default</option>

                        <option
                            value="Puritan20Italic" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'Puritan20Italic') { ?> selected="selected" <?php } ?>>
                            Puritan
                        </option>

                        <option
                            value="AndikaBasicRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'AndikaBasicRegular') { ?> selected="selected" <?php } ?>>
                            Andika
                        </option>

                        <option
                            value="ArchitectsDaughterRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'ArchitectsDaughterRegular') { ?> selected="selected" <?php } ?>>
                            Architect
                        </option>

                        <option
                            value="QuattrocentoRomanRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'QuattrocentoRomanRegular') { ?> selected="selected" <?php } ?>>
                            Quattrocento
                        </option>

                        <option
                            value="DroidSansRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'DroidSansRegular') { ?> selected="selected" <?php } ?>>
                            Droid Sans
                        </option>

                        <option
                            value="DroidSerifBold" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'DroidSerifBold') { ?> selected="selected" <?php } ?>>
                            Droid Bold
                        </option>

                    </select>

                </div>
            </div>
            <div id="preference_table">
                <h4>Select the Language(s)/ Translation(s) / Description(s) that you would like displayed: </h4>
                <div class="contentPre">
                    <p>

                        <label>

                            <input type="checkbox" name="lang_1"
                                   value="yes" <?php if (isset($_COOKIE['lang_1']) && $_COOKIE['lang_1'] == 'yes') { ?> checked="checked" <?php } ?>>

                            Gurmukhi

                        </label>


                        <label>

                            <input type="checkbox" name="lang_2"
                                   value="yes" <?php if (isset($_COOKIE['lang_2']) && $_COOKIE['lang_2'] == 'yes') { ?> checked="checked" <?php } ?>>

                            Phonetic English

                        </label>


                        <label>

                            <input type="checkbox" name="lang_3"
                                   value="yes" <?php if (isset($_COOKIE['lang_3']) && $_COOKIE['lang_3'] == 'yes') { ?> checked="checked" <?php } ?>>

                            Hindi Transliteration

                        </label>


                        <label>

                            <input type="checkbox" name="lang_4"
                                   value="yes" <?php if (isset($_COOKIE['lang_4']) && $_COOKIE['lang_4'] == 'yes') { ?> checked="checked" <?php } ?>>

                            English Translation

                        </label>


                    </p>
                </div>
            </div>
            <div id="preference_table">
                <h4>Social Websites icons: </h4>
                <div class="contentPre">
                    Yes<input type="radio" value="yes" name="allow_share_lines" id="allow_share_lines"
                              style="width:35px;" <?php if (isset($_COOKIE['allow_share_lines']) && $_COOKIE['allow_share_lines'] == 'yes') { ?> checked="checked" <?php } ?>/>
                    No<input type="radio" value="no" name="allow_share_lines" id="allow_share_lines"
                             style="width:35px;" <?php if (isset($_COOKIE['allow_share_lines']) && $_COOKIE['allow_share_lines'] != 'yes') { ?> checked="checked" <?php } ?>/>
                </div>
            </div>

            <div id="preference_table">
                <h4>Show Attributes: </h4>
                <div class="contentPre">
                    Yes<input type="radio" value="yes" name="show_attributes" id="show_attributes"
                              style="width:35px;" <?php if (isset($_COOKIE['show_attributes']) && $_COOKIE['show_attributes'] == 'yes') { ?> checked="checked" <?php } ?>/>
                    No<input type="radio" value="no" name="show_attributes" id="show_attributes"
                             style="width:35px;" <?php if (isset($_COOKIE['show_attributes']) && $_COOKIE['show_attributes'] != 'yes') { ?> checked="checked" <?php } ?>/>
                </div>
            </div>
            <input type="button" value="Reset Default" name="resetDefault" onclick="reset_defaults()"/>

            <input type="submit" value="Submit Changes" name="changesubmit"/>


        </form>

    </div>

</div>

