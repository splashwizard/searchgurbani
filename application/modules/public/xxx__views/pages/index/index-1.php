<!--start-->
<?php
global $SG_SearchTypes, $SG_SearchLanguage;

$sess_search_parameters = $this->session->userdata('search_parameters');

?>

<div class="calendar_text"><em>
        <script language="JavaScript"> document.write(getNanakshahi()) </script>
    </em></div>
<h2><strong>Pathway to God: Sri Guru Granth Sahib Ji</strong></h2><br/>
<div id="home_intro">
    <div align="center" id="splash_div">
        <p><img src="<?php echo base_url(); ?>images/desktop_version.jpg" alt="Splash"/></p>
        <p>Search Gurbani Desktop Version 2.0- the Gurbani Search Software<br/>
            <a href="<?php echo site_url(); ?>sgdv"><strong>Go to Search Gurbani Desktop Version </strong></a></p>
    </div>
    <div class="intro">
        <h3>Waheguru ji ka Khalsa Waheguru ji ki Fateh </h3>
        <p>Sri Guru Granth Sahib is indeed unique in its thought, literary expression and the message it continues to
            communicate centuries after it was written. Exalted thought needs to be transported on the vehicle of
            language to reach the masses. Poetic expression lifts prose to a higher plane. When verse and music meld,
            their beauty and sweetness makes mind transcend the humdrum of rational existence.</p>
        <p>The sacred verses of Sri Guru Granth Sahib are called Gurbani, which means the Guru's word or the song
            messages enshrined in Sri Guru Granth Sahib. In Sikhism, the Guru is the 'Wisdom of the Word' and not a
            human or a book. God revealed the Word through the holy men and women from time to time, and the most recent
            revelations were entered in the text of Sri Guru Granth Sahib. </p>
        <p>SearchGurbani.com brings to you a unique and comprehensive approach to explore and experience the word of
            God. We have the Sri Guru Granth Sahib Ji , Amrit Keertan Gutka and Bhai Gurdaas Vaaran , Kabit Bhai Gurdaas
            and Sri Dasam Granth Sahib. You can explore these scriptures page by page or search for a keyword in either
            one or all of the scriptures.</p>
    </div>
</div>
<div class="clearer"></div>

<?php $this->load->view('forms/search_form'); ?>

<div class="red" style="padding:5px 0;"></div>
<p><strong class="green">Gurbani Search Tips:</strong></p>
<p class="red">Please click on <strong>'Preferences'</strong> tab in Top and Bottom Menu Bar or <a
        href="<?php echo site_url(); ?>preferences">-=Here=-</a> to set your languages preferences. </p>
<ul>
    <li class="green">Gurbani Search is enabled to search Sri Guru Granth Sahib Ji , Amrit Keertan Gutka, Vaaran Bhai
        Gurdas and Sri Dasam Granth Sahib.
    </li>
    <li class="blue"><a class="blue" href="<?php echo site_url(); ?>fonts">Instructions to Download and install
            Fonts </a></li>
    <li class="red">New Search option <strong>&quot;First Letter Start&quot;</strong> searches for verses beginning with
        the &quot;first alphabet of the words in the verse in sequence&quot; , it is very important search option in
        searching for a Gurbani . Searching for Verse line&quot; pootha maaata ki aseess&quot;, the search keyword would
        be &quot;pmka&quot;, the 2 options 1.Begining of Verse 2 Anywhere in the verse.
    </li>

</ul>
<div class="footer">
    <div align="center"><p>--::-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url(); ?>music/page/1">Indian
                Classical Music and Sikh Kirtan</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --::-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo site_url(); ?>compilation/page/1">Compilation of Sri Guru Granth Sahib ( Adi Birh
                Bare)</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--::-- </p></div>
</div>
<div class="footer">Please Donate to keep SearchGurbani.com in Chardikala : <a
        href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=7830051">Click Here to Donate via
        Paypal</a></div>
<!--end-->
