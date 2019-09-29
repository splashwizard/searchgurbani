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

        <p><img src="<?php echo base_url(); ?>images/media/isg-poster-sm.jpg" alt="iSearchGurbani"/></p>
        <p class="newsheader"><a href="<?php echo site_url(); ?>sgdv/isg"> iSEARCHGURBANI for the PC , Mac and Linux
                platforms.</a></p>
        <p align="left"><strong>iSearchGurbani ( iSG)</strong> is a cross platform software bringing you  a simplistic
            approach to search and explore Gurbani . iSG includes complete Sri Guru Granth Sahib , Bhai Gurdas Vaaran ,
            Kabit Bhai Gurdas, Bhai Nand Lal Baani and  essential Baani’s from Sri Dasam Granth Sahib. <br/>
            <strong>iSearchGurbani ( iSG)</strong> has a built in slideshow/projector feature, which automatically
            displays text to an additional monitor or projector screen configured as extended monitor.</p>
    </div>
    <div class="intro">
        <h3><strong>Waheguru ji ka Khalsa Waheguru ji ki Fateh</strong></h3>
        <p class="newsheader" align="justify"><img src="<?php echo base_url(); ?>images/isg-icon.png"
                                                   alt="iSearchGurbani" width="80" height="80" align="right"/>SearchGurbani.com
            proudly announces the release of iSearchGurbani for the <a
                href="https://itunes.apple.com/us/app/isearch-gurbani-!/id674467937?ls=1&mt=8"> iPhone & iPad at Apple
                iTunes store.</a> and for<a
                href="https://play.google.com/store/apps/details?id=com.smartbuzz.vkh.isg&hl=en"> Android Platform at
                Google Play Store.</a> Click on above links to download the apps. </p>
        <p class="blue"><br/>
            Sri Guru Granth Sahib is indeed unique in its thought, literary expression and the message it continues to
            communicate centuries after it was written. Exalted thought needs to be transported on the vehicle of
            language to reach the masses. Poetic expression lifts prose to a higher plane. When verse and music meld,
            their beauty and sweetness makes mind transcend the humdrum of rational existence.</p>
        <p class="blue">The sacred verses of Sri Guru Granth Sahib are called Gurbani, which means the Guru's word or
            the song messages enshrined in Sri Guru Granth Sahib. In Sikhism, the Guru is the 'Wisdom of the Word' and
            not a human or a book. God revealed the Word through the holy men and women from time to time, and the most
            recent revelations were entered in the text of Sri Guru Granth Sahib. </p>
        <p class="blue">SearchGurbani.com brings to you a unique and comprehensive approach to explore and experience
            the word of God. We have the Sri Guru Granth Sahib Ji , Amrit Keertan Gutka , Bhai Gurdaas Vaaran , Kabit
            Bhai Gurdaas , Bhai Nand Lal Baani and Sri Dasam Granth Sahib. You can explore these scriptures page by page
            or search for a keyword in either one or all of the scriptures.</p>
    </div>
</div>
<div class="clearer"></div>
<div id="home_intro">
    <div>
        <p class="green" align="justify">&nbsp;</p>
    </div>
    <div>
        <p class="red" align="justify"><img src="<?php echo base_url(); ?>images/sg-img.jpg" alt="Splash" width="80"
                                            height="80" align="left"/>SearchGurbani.com now brings you dynamic fonts for
            Gurmukhi and Translteration for web display and printing of SearchGurbani pages. Daily Hukumnamas from Sri
            Harmandir Sahib, Amritsar. SearchGurbani.com optimized for all mobile platforms for IPad, IPhone, Android is
            now available for viewers worldwide. Sign up daily Hukumnamas and Random Shabad updates on SearchGurbani
            fanpage on Facebook. </p>
    </div>
</div>
<p>&nbsp;</p>
<div class="clearer"></div>

<?php $this->load->view('forms/search_form'); ?>

<div class="red" style="padding:5px 0;"></div>
<div align="center" bgcolor="#ffffff">
    <p>--::-- <strong>Hukumnamas--::-- <br/>
            --::--&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('hukum'); ?>">Harmandir Sahib</a>&nbsp;&nbsp;&nbsp;
            --::--:: --::--&nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('hukumnama/cyber'); ?>">Cyber Hukum</a>--::--&nbsp;&nbsp;
        </strong></p>
</div>
<p><strong class="green">Gurbani Search Tips:</strong></p>
<p class="red">Please click on <strong>'Preferences'</strong> tab in Top and Bottom Menu Bar or <a
        href="<?php echo site_url(); ?>preferences">-=Here=-</a> to set your languages preferences. </p>
<ul>
    <li class="green">Gurbani Search is enabled to search Sri Guru Granth Sahib Ji , Amrit Keertan Gutka, Vaaran Bhai
        Gurdas and Sri Dasam Granth Sahib.
    </li>
    <li class="blue"><a class="blue" href="<?php echo site_url(); ?>unicode">Instructions to Download and install
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
<p></p>
<div class="footer">Please Donate to keep SearchGurbani.com in Chardikala : <a
        href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=RN6N7BTG9T5NE"><b>Click Here to
            Donate for development of iSearchGurbani</b></a></div>
<!--end-->