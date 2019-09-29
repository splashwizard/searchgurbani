<html>
<title>Gurbani</title>
<body>
<script type="text/javascript" src="http://ci2.searchgurbani.com/scripts/jquery.min.js"></script>
<style type="text/css">
    ul.Tabbed {
        margin: 0px;
        padding: 0px;
    }

    ul.Tabbed li {
        margin: 0px;
        padding: 0px;
        line-height: 18px;
        display: inline;
    }

    ul.Tabbed li a {
        padding: 10px;
        color: #000000;
        font-size: 16px;
        text-decoration: none;
        bgcolor: #cecece;
    }

    ul.Tabbed li a:hover {
        text-decoration: underline;
    }
</style>
<script type="text/javascript">
    function showDarbar() {
        document.getElementById('ShowDarbarSahib').style.display = "block";
        document.getElementById('ShowBanglaSahib').style.display = "none";
    }
    function showBangla() {
        document.getElementById('ShowBanglaSahib').style.display = "block";
        document.getElementById('ShowDarbarSahib').style.display = "none";
    }
</script>
<link href="<?php echo base_url(); ?>styles/fontface.css" rel="stylesheet" type="text/css" charset="utf-8"/>

<ul class="Tabbed">
    <li><a href="#" title="Darbar sahib" onclick="showDarbar()">Darbar sahib</a></li>
    <li><a href="#" title="Bangla Sahib" onclick="showBangla()">Bangla Sahib</a></li>
    <li><a href="#" title="Sis Ganj Sahib">Sis Ganj Sahib</a></li>
    <li><a href="#" title="Rakab Ganj Sahib">Rakab Ganj Sahib</a></li>
</ul>

<div id="ShowDarbarSahib" style="display:none;">
    <table width="88%" border="0" cellspacing="1" cellpadding="1">
        <tr>
            <td colspan="2">
                <font face="Courier New, Courier, mono">
                    <b>
                        <FONT size="4"><FONT color="darkred">
                                <A href="sangrand.asp"></A>
                                <br>
                                <font size="4" color="#000000" face="Georgia, Times New Roman, Times, serif">
                                    <?php echo $head; ?>
                                </font>
                                &nbsp; </FONT></FONT></b></font>
            </td>
        </tr>
        <tr>
            <td>
                <p align="justify">
                    <font color="#000079">
                        <strong><font size="+1" face="WebAkharSlim" color="#cc3333">
                            </font>
                            <font color="#000079">
                                <strong><font size="+1" face="WebAkharSlim" color="#cc3333">
                                        <font color="#000000">
                                            <?php echo utf8_encode($content); ?>
                                        </font>
                                    </font></strong></font>
                        </strong>
                    </font>
                </p>
            </td>
        </tr>
    </table>
</div>
<?php if ($bs == "bs") { ?>
    <div id="ShowBanglaSahib" style="display:none;">
        <table width="88%" border="0" cellspacing="1" cellpadding="1">
            <tr>
                <td colspan="2">
                    <font face="Courier New, Courier, mono">
                        <b>
                            <FONT size="4"><FONT color="darkred">
                                    <A href="sangrand.asp"></A>
                                    <br>
                                    <font size="4" color="#000000" face="Georgia, Times New Roman, Times, serif">
                                        <?php echo $head; ?>
                                    </font>
                                    &nbsp; </FONT></FONT></b></font>
                </td>
            </tr>
            <tr>
                <td>
                    <p align="justify">
                        <font color="#000079">
                            <strong><font size="+1" face="WebAkharSlim" color="#cc3333">
                                </font>
                                <font color="#000079">
                                    <strong><font size="+1" face="WebAkharSlim" color="#cc3333">
                                            <font color="#000000">
                                                <?php echo utf8_encode($content); ?>
                                            </font>
                                        </font></strong></font>
                            </strong>
                        </font>
                    </p>
                </td>
            </tr>
        </table>
    </div>
<?php } ?>
</body>

</html>

