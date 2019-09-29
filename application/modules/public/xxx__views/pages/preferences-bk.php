<?php
global $SG_Preferences, $SG_Languages;

extract($SG_Preferences);
$check = " checked='checked'";


$back_button = '';
if ($this->session->flashdata('referer') != '') {
    $back_button = '
	<input type="hidden" value="' . $this->session->flashdata('referer') . '" name="referer">
	<input name="Back" type="button" class="submit_btn" value="Go Back" id="Back" onClick="document.location.href=\'' . $this->session->flashdata('referer') . '\'" />';
} elseif ($_SERVER['HTTP_REFERER'] != '') {
    $back_button = '
	<input type="hidden" value="' . $_SERVER['HTTP_REFERER'] . '" name="referer">
	<input name="Back" type="button" class="submit_btn" value="Go Back" id="Back" onClick="document.location.href=\'' . $_SERVER['HTTP_REFERER'] . '\'" />';
}
?>


<!--start-->

<h2><strong>Gurbani Search Preferences</strong></h2>
<p><em>Please check the languages and attributes you want to view while browsing the Sri Guru Granth Sahib Ji , Amrit
        Keertan Gutka ,Vaaran Bhai Gurdas , Kabit Bhai Gurdas and Sri Dasam Granth Sahib </em></p>
<p><?php echo $back_button; ?></p>
<?php
if ($this->session->flashdata('response') != '') {
    echo $this->session->flashdata('response');
}
?>
<form name="choosefont" id="choosefont" action="<?php echo site_url('bhai-gurdas-vaaran/pauri-by-pauri'); ?>"
      method="post">
    <h4>Choose The Font: </h4>
    Gurmukhi:
    <select name="language" class="form-select" id="edit-months">
        <option value="">Default</option>
        <option value="prabhki">Prabhki</option>
        <option value="gurvatics">Gurvetics</option>
        <option value="raajaa">Raajaa</option>
    </select>
    English:
    <select name="PhonEnglish" class="form-select" id="edit-months">
        <option value="">Default</option>
        <option value="CardoRegular">CardoRegular</option>

    </select>
    Hindi:
    <select name="HinTrans" class="form-select" id="edit-months">
        <option value="">Default</option>
        <option value="DVTTSurekhENItalic">DVTTSurekhENItalic</option>
        <option value="AgraNormal">AgraNormal</option>
        <option value="DevanagariNewNormal">DevanagariNewNormal</option>
    </select>
    <!--English Translation:
    <select name="EngTrans" class="form-select" id="edit-months" >
    <option value="">Default</option>
    <option value="prabhki">Prabhki</option>
    <option value="gurvatics">Gurvetics</option>
    <option value="prabhki">Prabhki</option>
    </select>-->

    <input name="Submit" type="submit" class="submit_btn" value="Submit Changes"/>
</form>
<form name="frmPreferences" id="frmPreferences" action="<?php echo site_url('preferences/save'); ?>" method="post">
    <div id="preference_table">
        <h4>Select how would you like the text to be displayed:</h4>
        <div class="content">
            <label>
                <input type="radio" value="line_by_line" name="text_type"
                       id="text_type_1" <?php echo $text_type == "line_by_line" ? $check : ''; ?> />
                Display Line by Line</label>
            <label>
                <input type="radio" value="para_by_para" name="text_type"
                       id="text_type_2" <?php echo $text_type == "para_by_para" ? $check : ''; ?>/>
                Display by Paragraphs</label>
        </div>
        <h4>Select the Language(s)/ Translation(s) / Description(s) that you would like displayed: </h4>
        <div class="content">

            <?php
            $pref = array("common" => array(), "ggs" => array(), "ak" => array(), "bgv" => array(), "dg" => array(), "ks" => array());

            foreach ($SG_Languages as $language_key => $language_data) {
                // Adding for common languages
                if (in_array("ggs", $language_data['tables']) and
                    in_array("ak", $language_data['tables']) and
                    in_array("bgv", $language_data['tables']) and
                    in_array("dg", $language_data['tables']) and
                    $language_data['active'] == true
                ) {
                    $pref['common']['title'] = 'Common Languages for Guru Granth Shahib, Amrit Keertan, Bhai Gurdas Vaaran and Dasam Granth Sahib';
                    $pref['common']['langs'][$language_key] = $language_data;
                } else {
                    if (in_array("ggs", $language_data['tables']) and $language_data['active'] == true) {
                        $pref['ggs']['title'] = 'Additional Translations available on Guru Granth Shahib';
                        $pref['ggs']['langs'][$language_key] = $language_data;
                    }
                    if (in_array("ak", $language_data['tables']) and $language_data['active'] == true) {
                        $pref['ak']['title'] = 'Additional Translations available on Amrit Keertan';
                        $pref['ak']['langs'][$language_key] = $language_data;
                    }
                    if (in_array("bgv", $language_data['tables']) and $language_data['active'] == true) {
                        $pref['bgv']['title'] = 'Additional Translations available on Bhai Gurdas Vaaran';
                        $pref['bgv']['langs'][$language_key] = $language_data;
                    }
                    if (in_array("dg", $language_data['tables']) and $language_data['active'] == true) {
                        $pref['dg']['title'] = 'Additional Translations available on Dasam Granth Sahib';
                        $pref['dg']['langs'][$language_key] = $language_data;
                    }
                    if (in_array("ks", $language_data['tables']) and $language_data['active'] == true) {
                        $pref['ks']['title'] = 'Additional Translations available on Kabbit Savaiye';
                        $pref['ks']['langs'][$language_key] = $language_data;
                    }
                }
            }

            foreach ($pref as $pref_data) {
                if (isset($pref_data['langs']) and count($pref_data['langs']) > 0) {
                    echo '<p><strong>' . $pref_data['title'] . ':</strong></p><p>';
                    foreach ($pref_data['langs'] as $language_key => $language_data) {
                        echo '
<label>
<input type="checkbox" value="yes" name="' . $language_key . '" ' . ($$language_key == "yes" ? $check : '') . '>
' . $language_data['lang_name'] . '
</label>
			';
                    }
                    echo '</p>';
                }
            }
            ?>

            <?
            /*
            ?>


                  <label>
                  <input type="checkbox" value="yes" name="Gurmukhi"<?php echo $Gurmukhi == "yes" ? $check : ''; ?>>
                  Gurmukhi</label>
                  <label>
                  <input type="checkbox" value="yes" name="Phonetic_English" <?php echo $Phonetic_English == "yes" ? $check : ''; ?>>
                  Phonetic English </label>
                  <label>
                  <input type="checkbox" value="yes" name="English_Translation_by_Sant_Singh_Khalsa" <?php echo $English_Translation_by_Sant_Singh_Khalsa == "yes" ? $check : ''; ?>>
                  English Translation by Sant Singh Khalsa </label>
                  <label>
                  <input type="checkbox" value="yes" name="Hindi_Transliteration" <?php echo $Hindi_Transliteration == "yes" ? $check : ''; ?>>
                  Hindi Transliteration </label>
                  <label>
                  <input type="checkbox" value="yes" name="English_Transliteration" <?php echo $English_Transliteration == "yes" ? $check : ''; ?>>
                  English Transliteration</label>
                  <label>
                  <input type="checkbox" value="yes" name="Shahmukhi_Transliteration" <?php echo $Shahmukhi_Transliteration == "yes" ? $check : ''; ?>>
                  Shahmukhi Transliteration</label></p>
                  <p><strong>THESE OPTIONS ARE FOR GURU GRANTH SAHIB ONLY </strong> </p>
                  <p>
                  <label>
                  <input type="checkbox" value="yes" name="Punjabi_Translation_by_Manmohan_Singh" <?php echo $Punjabi_Translation_by_Manmohan_Singh == "yes" ? $check : ''; ?>>
                  Punjabi Translation by Manmohan Singh</label>
                  <label>
                  <input type="checkbox" value="yes" name="English_Translation_by_Manmohan_Singh" <?php echo $English_Translation_by_Manmohan_Singh == "yes" ? $check : ''; ?>>
                  English Translation by Manmohan Singh</label>
                  <label>
                  <input type="checkbox" value="yes" name="Guru_Granth_Darpan_by_Prof_Sahib_Singh" <?php echo $Guru_Granth_Darpan_by_Prof_Sahib_Singh == "yes" ? $check : ''; ?>>
                  Guru Granth Darpan by Prof. Sahib Singh</label>
                  <label>
                  <input type="checkbox" value="yes" name="Faridkot_Teeka" <?php echo $Faridkot_Teeka == "yes" ? $check : ''; ?>>
                  Faridkot Teeka</label>
                  <label>
                  <input type="checkbox" value="yes" name="Lareedar_Gurmukhi" <?php echo $Lareedar_Gurmukhi == "yes" ? $check : ''; ?>>
                  Lareedar Gurmukhi</label>
                  <label>
                  <input type="checkbox" value="yes" name="Spanish_Translation" <?php echo $Spanish_Translation == "yes" ? $check : ''; ?>>
                  Spanish Translation</label>
                  <label>
                  <input type="checkbox" value="yes" name="French_Translation_of_English_Translation_by_Sant_Singh_Khalsa" <?php echo $French_Translation_of_English_Translation_by_Sant_Singh_Khalsa == "yes" ? $check : ''; ?>>
                  French Translation of English Translation by   Sant Singh Khalsa</label>
                  <label>
                  <input type="checkbox" value="yes" name="German_Translation_of_English_Translation_by_Sant_Singh_Khalsa" <?php echo $German_Translation_of_English_Translation_by_Sant_Singh_Khalsa == "yes" ? $check : ''; ?>>
                  German Translation of English Translation by   Sant Singh Khalsa </label>
                  <?php
                  */
            ?>

            </p>
        </div>
        <h4>Select to view instant Gurmukhi words meanings. Passing the mouseover Gurmukhi word will show the meaning,
            on click will open a popup window with English and Gurmukhi </h4>
        <div class="content">
            <p><label>
                    <input type="checkbox" value="yes"
                           name="mouse_over_gurmukhi_dictionary" <?php echo $mouse_over_gurmukhi_dictionary == "yes" ? $check : ''; ?>>
                    Mouseover Gurmukhi Dictionary </label></p>
        </div>
        <h4>Select these Options to show Page line #, Author, Raag: </h4>
        <div class="content">
            <p><label><input type="checkbox" value="yes"
                             name="show_attributes" <?php echo $show_attributes == "yes" ? $check : ''; ?>>
                    Show Attributes (Page line #, Author, Raag)</label></p>
        </div>
        <h4>Select this option to enable sharing scripture lines to social networking websites: </h4>
        <div class="content">
            <p><label><input type="checkbox" value="yes"
                             name="allow_share_lines" <?php echo $allow_share_lines == "yes" ? $check : ''; ?>>
                    Enable sharing to social networking websites</label></p>
        </div>
    </div>
    <div id='pref_buttons'>
        <?php
        echo $back_button;
        ?>
        <input name="Reset" type="button" class="submit_btn" value="Reset to Defaults" onClick="reset_defaults()"/>
        <input name="Submit" type="submit" class="submit_btn" value="Submit Changes"/>
    </div>
</form>

<script type="text/javascript">
    function reset_defaults() {
        document.getElementById('frmPreferences').action = '<?php echo site_url('preferences/reset-defaults'); ?>';
        document.getElementById('frmPreferences').submit();
    }
</script>
<!--end-->
