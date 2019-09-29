<!--start-->

<br>    <!--<input type="hidden" name="Action" value="mega" />-->    <!--<input type=hidden name=index value=0>-->
<table width="99%" cellspacing="0" cellpadding="6" border="0">

    <tbody>
    <tr>

        <td class="psrednav">

            <b class="pageheader">Gurbani Search Preferences</b></td>

    </tr>

    </tbody>
</table>

<table width="99%" cellspacing="0" cellpadding="3" bordercolor="#f6b906" border="2">

    <tbody>
    <tr bgcolor="#cbdced">

        <td bgcolor="#ffdd57" class="newshead2">
            <div align="center"><span class="newshead2">Please check the languages and attributes you want to view while browsing the Sri Guru Granth Sahib Ji , Amrit Keertan Gutka ,Vaaran Bhai Gurdas and Sri Dasam Granth Sahib <br>

</span><a href="/main.php?book=sri_guru_granth_sahib&amp;action=pagebypage&amp;page=2"><span class="newshead2"> Back to search page </span></a>
            </div>
        </td>

    </tr>

    </tbody>
</table>

<br>

<table width="95%" bordercolor="#333300" border="2" align="center">

    <tbody>
    <tr>

        <td bgcolor="#fceaaa" bordercolor="#F6B906">
            <form name="form1" method="post" action="preferen.php">

                <input type="hidden" value="/main.php?book=sri_guru_granth_sahib&amp;action=pagebypage&amp;page=2"
                       name="ref">

                <input type="hidden" value="true" name="commit">

                <input type="hidden" value="Main" name="Action1">

                <input type="hidden" value="" name="val">

                <input type="hidden" value="true" name="change_cookies">

                <center>

                    <table width="95%" cellspacing="10" cellpadding="5" bordercolor="#f6b906" border="2">

                        <tbody>
                        <tr>

                            <td valign="CENTER" align="left">
                                <table width="100%">

                                    <tbody>
                                    <tr>

                                        <td>
                                            <table width="100%" cellpadding="10" bordercolor="#f6b906" border="1"
                                                   bgcolor="#ffffff">

                                                <tbody>
                                                <tr>

                                                    <td bgcolor="#ffdd57"><p class="newshead2">Select how would you like
                                                            the text to be displayed:</p></td>

                                                </tr>

                                                <tr>

                                                    <td bgcolor="#fceaaa">
                                                        <blockquote>

                                                            <p><span class="newshead2">Display Line by Line </span>

                                                                <input type="radio" value="false"
                                                                       name="paragraph_display">

                                                                &nbsp;&nbsp; <span class="newshead2">Display by Paragraphs</span>

                                                                <input type="radio" value="true"
                                                                       name="paragraph_display">

                                                                <br></p>

                                                        </blockquote>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td bgcolor="#ffdd57" class="newshead2">Select the Language(s)/
                                                        Translation(s) / Description(s) that you would like displayed:
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td bgcolor="#fceaaa">
                                                        <blockquote>

                                                            <p>


<span class="newshead2">

<input type="checkbox" checked="" value="punjabi" name="languages[]" onclick="validateboxes(this)">

Gurmukhi<br>

<input type="checkbox" checked="" value="translit" name="languages[]" onclick="validateboxes(this)">

Phonetic English   <br>

<input type="checkbox" checked="" value="english" name="languages[]" onclick="validateboxes(this)">

English Translation by Sant Singh Khalsa<br>

<input type="checkbox" value="hindi" name="languages[]" onclick="validateboxes(this)">

Hindi Transliteration <br>

<input type="checkbox" value="translit1" name="languages[]" onclick="validateboxes(this)">

English Transliteration <br>
<input type="checkbox" value="urdu" name="languages[]" onclick="validateboxes(this)">

Shahmukhi Transliteration   <br>

<br>

<b> THESE OPTIONS ARE FOR GURU GRANTH SAHIB ONLY </b><br><br>



<input type="checkbox" value="punj_transmms" name="languages[]" onclick="validateboxes(this)">

Punjabi Translation by Manmohan Singh   <br>

<input type="checkbox" value="eng_transmms" name="languages[]" onclick="validateboxes(this)">

English Translation by Manmohan Singh   <br>

<input type="checkbox" value="sahib_01,sahib_02" name="languages[]" onclick="validateboxes(this)">

Guru Granth Darpan by Prof. Sahib Singh <br>

<input type="checkbox" value="fk_teeka" name="languages[]" onclick="validateboxes(this)">

Faridkot Teeka  <br>

<input type="checkbox" value="laree_punj" name="languages[]" onclick="validateboxes(this)">

Lareedar Gurmukhi  <br>

<input type="checkbox" value="spanish" name="languages[]" onclick="validateboxes(this)">

Spanish Translation <br>

<input type="checkbox" value="french" name="languages[]" onclick="validateboxes(this)">

French Translation of English Translation by Sant Singh Khalsa <br>

<input type="checkbox" value="german" name="languages[]" onclick="validateboxes(this)">

German Translation of English Translation by Sant Singh Khalsa <br>

</span></p>

                                                            <p><span class="newshead2">Please Limit your selections to maximum Five Language(s)/ Translation(s) <br>

</span></p>

                                                        </blockquote>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td bgcolor="#ffdd57" class="newshead2"><p>Select to view Gurmukhi
                                                            words meanings. Passing the mouseover Gurmukhi word will
                                                            show the meaning, on click will open a popup window with
                                                            English and Gurmukhi meanings. This option will make the
                                                            pageloading slower.</p></td>

                                                </tr>

                                                <tr>

                                                    <td bgcolor="#fceaaa">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                                            type="checkbox" value="1" name="tooltips"><span
                                                            class="newshead2">Mouseover Gurmukhi Dictionary</span>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td bgcolor="#ffdd57"><span class="newshead2">Select these Options to show Page line #, Author, Raag: </span>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td height="58" bgcolor="#fceaaa" class="newshead2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
                                                            type="checkbox" checked="" value="attr" name="attributes[]">

                                                        Show Attributes (Page line #, Author, Raag)
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>
                                        </td>

                                    </tr>

                                    </tbody>
                                </table>

                            </td>

                        </tr>

                        </tbody>
                    </table>

                    <br>

                    <input type="submit" value="Submit Changes">

                </center>

            </form>
        </td>

    </tr>

    </tbody>
</table>    <br>
<table width="100%" cellspacing="0" cellpadding="0" border="0">

    <tbody>
    <tr>

        <td><p class="newshead2"><br>

                <br>

            </p>

        </td>

    </tr>

    <tr>

        <td>&nbsp;</td>

    </tr>

    </tbody>
</table>    <br>

<!--end--> 
