<html>
<title>Gurbani</title>
<body>
<script type="text/javascript" src="http://www.searchgurbani.com/scripts/jquery.min.js"></script>

<?php
/*echo "<pre>";
print_r($content);
print_r($head);
exit;*/

$newsUrl = 'http://www.sgpc.net/hukumnama/index.asp';

$newsContents = file_get_contents($newsUrl);

$startDiv = '<table width="88%" border="0" cellspacing="1" cellpadding="1">';

$endDiv = '<table width="87%" border=';

$headDiv = stringSearch($startDiv, $endDiv, $newsContents);


$startContent = '</font><font color="#000079"><strong><font size="+1" face="WebAkharSlim" color="#cc3333">';

$endContent = '<p align="justify"><font face="Arial"><font size="-1"><u>';

$firstDiv = stringSearch($startContent, $endContent, $newsContents);


$startPart = '<p align="justify"><font color="#8F1B08"';

$endPart = '</table></center></body></html>';

$secondDiv = stringSearch($startPart, $endPart, $newsContents);

$dateDiv = '<font size="4" color="#000000" face="Georgia, Times New Roman, Times, serif"';
$endDate = '</font>';
$dateDiv = stringSearch($dateDiv, $endDate, $newsContents);
$dateRaw = $dateDiv[0];

//echo $dateRaw;
$dateExpo = explode(' ', $dateRaw);

$month = $dateExpo[0];
$mnth = explode('[', $month);
$monthFnl = $mnth[1];
$mnthh = date("m", strtotime($monthFnl));

$day = $dateExpo[1];
$dayFnl = str_replace(',', "", $day);

$year = $dateExpo[2];
$yearFnl = str_replace(',', "", $year);

$dateFnl = date("Y-m-d", mktime(0, 0, 0, $mnthh, $dayFnl, $yearFnl));

echo $dateFnl;


$atts = array(
    'width' => '600',
    'height' => '400',
    'scrollbars' => 'yes',
    'status' => 'yes',
    'resizable' => 'yes',
    'screenx' => '0',
    'screeny' => '0'
);

$utilityBar = '
	<div class="utility_bar">
		<span class="col_float_right">
			<div class="utility_buttons">
				' . anchor_popup(current_url() . '/print_view', '<img src="' . base_url() . 'images/icons/print.gif" border="0" title="Print this page" />', $atts) . '&nbsp;&nbsp;&nbsp;
			</div>
		</span>
		<br class="clearer" />
	</div>
	';


?>


<CENTER>

    <table width="88%" border="0" cellspacing="1" cellpadding="1">


        <tr>
            <td>
                <?php
                echo $utilityBar;
                ?>
            </td>
        </tr>


        <tr>

            <td colspan="2">

                <div align="center"><font face="Courier New, Courier, mono"><b><FONT size="4"><FONT color="darkred"><A
                                        href="sangrand.asp"></A><br>


                                    <font size="4" color="#000000" face="Georgia, Times New Roman, Times, serif">

                                        <?php echo $head; ?>

                                    </font>


                                    &nbsp; </FONT></FONT></b></font>

                </div>

            </td>

        </tr>

    </table>

</CENTER>

<CENTER>

    <table width="87%" border="0" cellspacing="1" cellpadding="1">


        <tr>

            <td>

                <p align="justify"><font color="#000079"><strong><font size="+1" face="WebAkharSlim" color="#cc3333">

                            </font><font color="#000079"><strong><font size="+1" face="WebAkharSlim"
                                                                       color="#cc3333"><font color="#000000">

                                            <?php echo utf8_encode($content); ?>

                                        </font></font></strong></font></strong></font>

                </p>

            </td>


        </tr>

    </table>

</CENTER>

<CENTER>

    <br>

</CENTER>


<strong>


    <br>

    <u><font color="#000066">

            <br>


            <center>


                <!--<p align="justify"><font face="Arial"><font size="-1"><u><font size="3" color="#000000">English

                                    Translation</font></u><font size="3" color="#000000"> :</font></font>

                </font>

                </p>

                <table width="87%" border="0" cellspacing="1" cellpadding="1" height="47">

                    <tr>

                        <td height="16" width="88%">

                            <div align="center"><font size="3">SHALOK,  THIRD MEHL:</font></div>



                        </td>

                    </tr>-->


                <tr>

                    <td>

                        <p align="justify">

                            <font color="#8F1B08" size="3">


                            </font>

                        </p>


                    </td>

                </tr>

                </table>

            </center>


</body>

</html>

