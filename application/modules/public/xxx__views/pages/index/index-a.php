<!--start-->
<?php
global $SG_SearchTypes, $SG_SearchLanguage;

$sess_search_parameters = $this->session->userdata('search_parameters');

?>

<div class="calendar_text"><em>
        <script language="JavaScript"> document.write(getNanakshahi()) </script>
    </em></div>
<h2><strong>Pathway to God: Sri Guru Granth Sahib Ji</strong></h2>
<div id="home_intro">
    <div id="splash_div">
        <div><p class="green" align="justify"><img src="<?php echo base_url(); ?>images/isg-icon.png"
                                                   alt="iSearchGurbani" align="right"/><strong>iSearchGurbani </strong>:
                An FREE IPad App coming soon to an ITunes Store near you, <br/>
                <strong>iSearchGurbani </strong>:An Ipad app to search and display Shabads with ability to have
                projector display via Ipad 's vga out. Gurbani will be available in Gurmukhi, English transliteration
                and English & Spanish translation. iSearchGurbani will display Ang by Ang of Sri Guru Granth Sahib ji.
        </div>
        <div>
            <p class="red" align="justify"><img src="<?php echo base_url(); ?>images/sg-img.jpg" alt="Splash"
                                                align="left"/>SearchGurbani.com now brings you dynamic fonts for
                Gurmukhi and Translteration for web display and printing of SearchGurbani pages. Daily Hukumnamas from
                Sri Harmandir Sahib, Amritsar, Gurudwara Bangla Sahib, Gurudwara Sisganj Sahib and Gurudwara Rakabganj
                Sahib in Delhi. SearchGurbani.com optimized for all mobile platforms for IPad, IPhone, Android is now
                available for viewers worldwide. Sign up daily Hukumnamas and Random Shabad updates on SearchGurbani
                fanpage on Facebook.
        </div>
    </div>
    <div class="intro">
        <h3>Waheguru ji ka Khalsa Waheguru ji ki Fateh </h3>
        <p class="blue">Sri Guru Granth Sahib is indeed unique in its thought, literary expression and the message it
            continues to communicate centuries after it was written. Exalted thought needs to be transported on the
            vehicle of language to reach the masses. Poetic expression lifts prose to a higher plane. When verse and
            music meld, their beauty and sweetness makes mind transcend the humdrum of rational existence.</p>
        <p class="blue">The sacred verses of Sri Guru Granth Sahib are called Gurbani, which means the Guru's word or
            the song messages enshrined in Sri Guru Granth Sahib. In Sikhism, the Guru is the 'Wisdom of the Word' and
            not a human or a book. God revealed the Word through the holy men and women from time to time, and the most
            recent revelations were entered in the text of Sri Guru Granth Sahib. </p>
        <p class="blue">SearchGurbani.com brings to you a unique and comprehensive approach to explore and experience
            the word of God. We have the Sri Guru Granth Sahib Ji , Amrit Keertan Gutka and Bhai Gurdaas Vaaran , Kabit
            Bhai Gurdaas and Sri Dasam Granth Sahib. You can explore these scriptures page by page or search for a
            keyword in either one or all of the scriptures. </p>
    </div>
</div>
<div class="clearer"></div>

<div><?php $this->load->view('forms/search_form'); ?></div>
<div class="clearer"></div>
<div align="center" bgcolor="#ffffff">
    <p>--::-- <strong>Hukumnamas--::--
            <br/>
            --::--&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('hukum'); ?>">Harmandir Sahib</a>&nbsp;&nbsp;&nbsp;
            --::--&nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('hukum/bangla_sahib'); ?>">Bangla Sahib</a>&nbsp;&nbsp;&nbsp;
            --::-- &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('hukum/rakab_ganj'); ?>">RakabGanj Sahib</a> &nbsp;&nbsp;&nbsp;--::--
            &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('hukum/sis_ganj'); ?>">Sisganj Sahib </a>--::-- &nbsp;&nbsp;&nbsp;<a
                href="<?php echo site_url('hukum/sangrand'); ?>">Sangrand Hukum</a> --::--&nbsp;&nbsp;&nbsp; <a
                href="<?php echo site_url('hukumnama/cyber'); ?>">Cyber Hukum</a>--::--&nbsp;&nbsp;</strong></p>
</div>
<div class="red" style="padding:5px 0;">
    <p><strong class="blue">Gurbani Search Tips:</strong></p>
    <p class="red">Please click on <strong>'Preferences'</strong> tab in Top and Bottom Menu Bar or <a
            href="<?php echo site_url(); ?>preferences">-=Here=-</a> to set your languages preferences. </p>
    <ul>
        <li class="blue">Gurbani Search is enabled to search Sri Guru Granth Sahib Ji , Amrit Keertan Gutka, Vaaran Bhai
            Gurdas and Sri Dasam Granth Sahib.
        </li>
        <li class="blue"><a class="blue" href="<?php echo site_url(); ?>unicode">Instructions to Download and install
                Fonts </a></li>
        <li class="blue">New Search option <strong>&quot;First Letter Start&quot;</strong> searches for verses beginning
            with the &quot;first alphabet of the words in the verse in sequence&quot; , it is very important search
            option in searching for a Gurbani . Searching for Verse line&quot; <strong>pootha maaata ki aseess</strong>&quot;,
            the search keyword would be &quot;<strong>pmka</strong>&quot;, the 2 options 1.Begining of Verse 2 Anywhere
            in the verse.
        </li>
    </ul>
</div>

<div class="footer"><p class="rmenu">Please Donate to keep SearchGurbani.com in Chardikala : <a
            href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=7830051">Click Here to Donate
            via Paypal </a></p></div>
<!--end-->