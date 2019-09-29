<?php

    global $SG_Preferences, $SG_Languages;
    extract($SG_Preferences);
    $check = " checked='checked'";


    $back_button = '';

    if ($this->session->flashdata('referer') != '')
    {

        $back_button
                = '

	<input type="hidden" value="' . $this->session->flashdata('referer') . '" name="referer">

	<input name="Back" type="button" class="submit_btn" value="Go Back" id="Back" onClick="document.location.href=\'' . $this->session->flashdata('referer') . '\'" />';

    }
    elseif (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '')
    {

        $back_button
                = '

	<input type="hidden" value="' . $_SERVER['HTTP_REFERER'] . '" name="referer">

	<input name="Back" type="button" class="submit_btn" value="Go Back" id="Back" onClick="document.location.href=\'' . $_SERVER['HTTP_REFERER'] . '\'" />';

    }

?>

<!--start-->
<h2><strong>Gurbani Search Preferences</strong>
</h2>

<p><em>Please check the languages and attributes
        you want to view while browsing the Sri
        Guru Granth Sahib Ji , Amrit
        Keertan Gutka ,Vaaran Bhai Gurdas , Kabit
        Bhai Gurdas and Sri Dasam Granth
        Sahib </em></p>

<p><?php echo $back_button; ?></p>

<?php

    if ($this->session->flashdata('response') != '')
    {

        echo $this->session->flashdata('response');

    }

?>

<form name="frmPreferences" id="frmPreferences"
      action="<?php echo site_url('preferences/save'); ?>"
      method="post">

    <div id="preference_table">

        <h4>DISPLAY OPTIONS: <br>Select how would
            you like the text to be displayed:
        </h4>

        <div class="content">

            <label>

                <input type="radio"
                       value="line_by_line"
                       name="text_type"
                       id="text_type_1" <?php echo $text_type == "line_by_line" ? $check : ''; ?> />
                Display Line by Line</label>

            <label>

                <input type="radio"
                       value="para_by_para"
                       name="text_type"
                       id="text_type_2" <?php echo $text_type == "para_by_para" ? $check : ''; ?>/>

                Display by Paragraphs</label>

        </div>

        <h4>LANGUAGE SELECTION :<br>Select the
            Language(s)/ Translation(s) /
            Description(s) that you would like
            displayed: </h4>

        <div class="content">


            <?php

                $pref = array(
                        "common" => array(),
                        "ggs"    => array(),
                        "ak"     => array(),
                        "bgv"    => array(),
                        "dg"     => array(),
                        "ks"     => array()
                );


                foreach ($SG_Languages as $language_key => $language_data)
                {

                    // Adding for common languages

                    if (in_array("ggs", $language_data['tables']) and

                        in_array("ak", $language_data['tables']) and

                        in_array("bgv", $language_data['tables']) and

                        in_array("dg", $language_data['tables']) and

                        $language_data['active'] == TRUE
                    )
                    {

                        $pref['common']['title']     = 'Common Languages for Guru Granth Shahib, Amrit Keertan, Bhai Gurdas Vaaran, Dasam Granth Sahib, Kabit Bhai Gurudas and Bhai Nand Lal';
                        $pref['common']['sub_title'] = 'Other Options';

                        if (!empty($language_data['relation']))
                        {

                            $pref['common']['relation'][$language_data['relation']]['sub_title']            = 'Heading Option';
                            $pref['common']['relation'][$language_data['relation']]['langs'][$language_key] = $language_data;
                        }
                        else
                        {

                            $pref['common']['langs'][$language_key] = $language_data;
                        }

                    }
                    else
                    {

                        if (in_array("ggs", $language_data['tables']) and $language_data['active'] == TRUE)
                        {

                            $pref['ggs']['title'] = 'Additional Translations available on Guru Granth Shahib';

                            $pref['ggs']['langs'][$language_key] = $language_data;

                        }

                        if (in_array("ak", $language_data['tables']) and $language_data['active'] == TRUE)
                        {

                            $pref['ak']['title'] = 'Additional Translations available on Amrit Keertan';

                            $pref['ak']['langs'][$language_key] = $language_data;

                        }

                        if (in_array("bgv", $language_data['tables']) and $language_data['active'] == TRUE)
                        {

                            $pref['bgv']['title'] = 'Additional Translations available on Bhai Gurdas Vaaran';

                            $pref['bgv']['langs'][$language_key] = $language_data;

                        }

                        if (in_array("dg", $language_data['tables']) and $language_data['active'] == TRUE)
                        {

                            $pref['dg']['title'] = 'Additional Translations available on Dasam Granth Sahib';

                            $pref['dg']['langs'][$language_key] = $language_data;

                        }

                        if (in_array("ks", $language_data['tables']) and $language_data['active'] == TRUE)
                        {

                            $pref['ks']['title'] = 'Additional Translations available on Kabbit Savaiye';

                            $pref['ks']['langs'][$language_key] = $language_data;

                        }
                        if (in_array("bnl", $language_data['tables']) and $language_data['active'] == TRUE)
                        {

                            $pref['bnl']['title'] = 'Additional Translations available on Bhai Nand Lal';

                            $pref['bnl']['langs'][$language_key] = $language_data;

                        }
                        if (in_array("dg", $language_data['tables']) and $language_data['active'] == TRUE)
                        {

                            $pref['dg']['title'] = 'Additional Translations available on Sri Dasam Granth';

                            $pref['dg']['langs'][$language_key] = $language_data;

                        }

                    }

                }

                foreach ($pref as $pref_data)
                {

                    if (!empty($pref_data['title']))
                    {
                        echo '<p><strong>' . $pref_data['title'] . ':</strong></p>';
                    }

                    if (isset($pref_data['relation']) and !empty($pref_data['relation']))
                    {

                        foreach ($pref_data['relation'] as $rel_key => $rel_data)
                        {
                            echo '<p><strong>' . $rel_data['sub_title'] . ':</strong></p>';
                            foreach ($rel_data['langs'] as $rel_language_key => $rel_language_data)
                            {
                                echo '

<label>

<input type="radio" value="'.$rel_language_key.'" name="' . $rel_key . '" ' . ($$rel_language_key == "yes" ? $check : '') . '>

' . $rel_language_data['lang_name'] . '

</label>

			';
                            }
                        }
                    }

                    if (isset($pref_data['langs']) and count($pref_data['langs']) > 0)
                    {

                        if (!empty($pref_data['sub_title']))
                        {
                            echo '<p><strong>' . $pref_data['sub_title'] . ':</strong></p>';
                        }

                        foreach ($pref_data['langs'] as $language_key => $language_data)
                        {

                            echo '

<label>

<input type="checkbox" value="yes" name="' . $language_key . '" ' . ($$language_key == "yes" ? $check : '') . '>

' . $language_data['lang_name'] . '

</label>

			';

                        }

                    }

                }

            ?>
            <!--            <h4> Lareevar </h4>-->
            <!--            <div class="content">-->
            <!--                <p><label>-->
            <!---->
            <!--                        <input type="checkbox" value="yes"-->
            <!--                               name="lareevar" -->
            <?php //echo $lareevar == "yes" ? $check : ''; ?><!-->
            <!--                        Lareevar line display  </label>-->
            <!--                <label>-->
            <!---->
            <!--                        <input type="checkbox" value="yes"-->
            <!--                               name="lareevar_assist_button" -->
            <?php //echo $lareevar_assist_button == "yes" ? $check : ''; ?><!-->
            <!--                        Lareevar assist button line display </label></p>-->
            <!--            </div>-->

            <h4>GURMUKHI DICTIONARY<br>Select to
                view instant Gurmukhi words
                meanings. Passing the mouseover
                Gurmukhi
                word will show the meaning, on
                click will open a popup window
                with English and Gurmukhi </h4>

            <div class="content">

                <p><label>

                        <input type="checkbox"
                               value="yes"
                               name="mouse_over_gurmukhi_dictionary" <?php echo $mouse_over_gurmukhi_dictionary == "yes" ? $check : ''; ?>>
                        Mouseover Gurmukhi
                        Dictionary </label></p>

            </div>

            <h4> SHOW ATTRIBUTES (Page Line No.,
                Author, Raag) </h4>

            <div class="content">

                <p><label><input type="checkbox"
                                 value="yes"
                                 name="show_attributes" <?php echo $show_attributes == "yes" ? $check : ''; ?>>

                        Show Attributes (Page line
                        #, Author, Raag)</label>
                </p>

            </div>

            <h4>SOCIAL NETWORK SHARING
                OPTION </h4>

            <div class="content">

                <p><label><input type="checkbox"
                                 value="yes"
                                 name="allow_share_lines" <?php echo $allow_share_lines == "yes" ? $check : ''; ?>>

                        Enable sharing to social
                        networking
                        websites</label></p>

            </div>
            <h4>GURBANI AUDIO OPTIONS </h4>

            <div class="content">

                <p><label><input type="radio"
                                 value="shudh_ucharan"
                                 name="ucharan_type" <?php echo $ucharan_type == "shudh_ucharan" ? $check : ''; ?>>

                        Shudh Gurbani Ucharan
                        Audio by Bhagat Jaswant
                        Singh</label></p>
                <p><label><input type="radio"
                                 value="normal"
                                 name="ucharan_type" <?php echo $ucharan_type == "normal" ? $check : ''; ?>>

                        Normal Gurbani
                        Audio</label></p>
            </div>
            <h4>FONT SELECTION:<br> Select fonts
                to display for Gurmukhi, Phonetic
                English, Hindi Transliteration and
                English translation </h4>

            <div class="content">

                Gurmukhi:


                <select name="language"
                        class="form-select"
                        id="edit-months">

                    <option
                            value="arial"<?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'AnmolUniBani')
                    { ?> selected="selected" <?php } ?>>
                        Default
                    </option>


                    <option
                            value="RaajaaMediumMedium" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'RaajaaMediumMedium')
                    { ?> selected="selected" <?php } ?>>
                        Raajaa
                    </option>

                    <option
                            value="RaajaaBoldBold" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'RaajaaBoldBold')
                    { ?> selected="selected" <?php } ?> >
                        Raajaa Bold
                    </option>

                    <option
                            value="RaajBold" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'RaajBold')
                    { ?> selected="selected" <?php } ?>>
                        Raaj
                    </option>

                    <option
                            value="AdhiapakMarkerMedium" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'AdhiapakMarkerMedium')
                    { ?> selected="selected" <?php } ?>>
                        Adhiapak
                    </option>

                    <option
                            value="PrabhkiRegular" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'PrabhkiRegular')
                    { ?> selected="selected" <?php } ?> >
                        Prabhki
                    </option>

                    <option
                            value="KarmicSanjMedium" <?php if (isset($_COOKIE['csstypeG']) && $_COOKIE['csstypeG'] == 'KarmicSanjMedium')
                    { ?> selected="selected" <?php } ?>>
                        Karmic sanj
                    </option>

                </select>

                Phonetic English:

                <select name="PhonEnglish"
                        class="form-select"
                        id="edit-months">

                    <option value="arial">
                        Default
                    </option>

                    <option
                            value="Puritan20Italic" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'Puritan20Italic')
                    { ?> selected="selected" <?php } ?> >
                        Puritan
                    </option>

                    <option
                            value="AndikaBasicRegular" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'AndikaBasicRegular')
                    { ?> selected="selected" <?php } ?>>
                        Andika
                    </option>

                    <option
                            value="ArchitectsDaughterRegular" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'ArchitectsDaughterRegular')
                    { ?> selected="selected" <?php } ?>>
                        Architect
                    </option>

                    <option
                            value="QuattrocentoRomanRegular" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'QuattrocentoRomanRegular')
                    { ?> selected="selected" <?php } ?>>
                        Quattrocento
                    </option>

                    <option
                            value="DroidSansRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'DroidSansRegular')
                    { ?> selected="selected" <?php } ?>>
                        Droid Sans
                    </option>

                    <option
                            value="DroidSerifBold" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'DroidSerifBold')
                    { ?> selected="selected" <?php } ?>>
                        Droid Bold
                    </option>

                </select>


                Hindi:

                <select name="HinTrans"
                        class="form-select"
                        id="edit-months">

                    <option value="arial">
                        Default
                    </option>

                    <option
                            value="JaipurRegular" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'JaipurRegular')
                    { ?> selected="selected" <?php } ?>>
                        Jaipur Regular
                    </option>

                    <option
                            value="Gurumaa150Bold" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'Gurumaa150Bold')
                    { ?> selected="selected" <?php } ?>>
                        Gurumaa Regular
                    </option>

                    <option
                            value="RaghindiRegular" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'RaghindiRegular')
                    { ?> selected="selected" <?php } ?>>
                        Raghu Regular
                    </option>

                    <option
                            value="gargiMedium" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'gargiMedium')
                    { ?> selected="selected" <?php } ?>>
                        Gargi Medium
                    </option>

                    <option
                            value="CDACGISTYogeshNormal" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'CDACGISTYogeshNormal')
                    { ?> selected="selected" <?php } ?>>
                        Yogesh Normal
                    </option>

                    <option
                            value="CDACGISTSurekhNormal" <?php if (isset($_COOKIE['HinTrans']) && $_COOKIE['HinTrans'] == 'CDACGISTSurekhNormal')
                    { ?> selected="selected" <?php } ?>>
                        Surekh Normal
                    </option>

                </select>

                English Translation:

                <select name="EngTrans"
                        class="form-select"
                        id="edit-months">

                    <option value="arial">
                        Default
                    </option>

                    <option
                            value="Puritan20Italic" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'Puritan20Italic')
                    { ?> selected="selected" <?php } ?>>
                        Puritan
                    </option>

                    <option
                            value="AndikaBasicRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'AndikaBasicRegular')
                    { ?> selected="selected" <?php } ?>>
                        Andika
                    </option>

                    <option
                            value="ArchitectsDaughterRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'ArchitectsDaughterRegular')
                    { ?> selected="selected" <?php } ?>>
                        Architect
                    </option>

                    <option
                            value="QuattrocentoRomanRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'QuattrocentoRomanRegular')
                    { ?> selected="selected" <?php } ?>>
                        Quattrocento
                    </option>

                    <option
                            value="DroidSansRegular" <?php if (isset($_COOKIE['EngTrans']) && $_COOKIE['EngTrans'] == 'DroidSansRegular')
                    { ?> selected="selected" <?php } ?>>
                        Droid Sans
                    </option>

                    <option
                            value="DroidSerifBold" <?php if (isset($_COOKIE['PhonEnglish']) && $_COOKIE['PhonEnglish'] == 'DroidSerifBold')
                    { ?> selected="selected" <?php } ?>>
                        Droid Bold
                    </option>

                </select>

            </div>

        </div>

        <div id='pref_buttons'>

            <?php

                echo $back_button;

            ?>

            <input name="Reset" type="button"
                   class="submit_btn"
                   value="Reset to Defaults"
                   onClick="reset_default()"/>

            <input name="Submit" type="submit"
                   class="submit_btn"
                   value="Submit Changes"/>

        </div>

</form>


<script type="text/javascript">


    function reset_default() {
        
        if (confirm('Do you want to save the current preferences settings ?')) {
            var url = '<?php echo site_url('preferences/reset-defaults'); ?>';
            var request = $.ajax({
                url: url,
                type: "GET",
                dataType: 'json'
            }).done(function (msg) {
                $.each(msg, function(k, v) {
                    if(v == 'yes'){
                        var action = true;
                    }else{
                        var action = false;
                    }
                    
                    if(k == 'text_type' || k == 'ucharan_type' || k == 'main_heading') {

                    $("input:radio[name="+ k +"][value="+ v +"]").prop('checked', true);
                        
                    }
                    if(v == 'yes' || v == 'no'){

                        $("input[name="+ k +"]").attr('checked', action);
                    }
                    if(v == 'arial'){

                        $("#edit-months option[value="+ v +"]").attr('selected', 'selected');
                    }
                    
                });

                alert('Default Settings have been saved');
            });
        }else{
            // Do nothing!
        }


    }

    $("form").on("submit", function (e) {
        e.preventDefault();
        
        if (confirm('Do you want to save the current preferences settings ?')) {

            var $form = $(this),
                    url = $form.attr('action');

            var data = $(this).serialize();
            var request = $.ajax({
                url: url,
                type: "GET",
                data: data
            }).done(function (msg) {
                alert('Settings have been saved');
            });
        }else{
            // Do nothing!
        }

    });


</script>

<!--end-->