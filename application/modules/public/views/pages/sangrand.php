<html>
<body>
<script type="text/javascript" src="http://www.searchgurbani.com/scripts/jquery.min.js"></script>


<?php

$newsUrl = 'http://www.dsgmc.in/index.php?option=com_content&view=article&id=172&Itemid=71';

$newsContents = file_get_contents($newsUrl);


$startDiv = '<div class="body-surround"><div class="body-surround2"><div class="body-surround3">';

$endDiv = '<table border="0" style="text-align: center; width: 100%;">';

$headDiv = stringSearch($startDiv, $endDiv, $newsContents);


/*echo '<pre>';

print_r($headDiv);

echo '</pre>';*/
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


<div id="vertical-sort">

    <div id="section-row3" class="section-row">
        <div id="section-row3-inner">

            <div id="main-body-surround" class="spacer">
                <div id="main-body" class="spacing">

                    <div class="module-light">
                        <div class="body-surround-top">
                            <div class="body-surround-top2">
                                <div class="body-surround-top3"></div>
                            </div>
                        </div>

                        <div class="body-surround">
                            <div class="body-surround2">
                                <div class="body-surround3">

                                    <div id="main-content">
                                        <div id="maincol2">

                                            <div class="maincol-padding">

                                                <div class="bodycontent">


                                                    <div class="mainbody-surround">

                                                        <div id="maincontent-block">
                                                            <div style="float:right;">
                                                                <?php
                                                                echo $utilityBar;
                                                                ?></div>

                                                            <div class="" style="padding-top:30px;">

                                                                <div id="page" class="full-article" align="center">


                                                                    <table cellpadding="1" cellspacing="1" border="0"
                                                                           style="width: 85.94%; height: 150px;">

                                                                        <tbody>

                                                                        <tr>

                                                                            <td width="96%" height="17">


                                                                            </td>

                                                                        </tr>

                                                                        <tr>

                                                                            <td>

                                                                                <div style="text-align: justify;"><span
                                                                                        style="font-size: 12pt;"><span
                                                                                            style="color: #000079;"><strong><span
                                                                                                    style="color: #000079;"><strong><span
                                                                                                            style="line-height:25px;"><span
                                                                                                                style="font-family: arial; color: #cc3333;"><span
                                                                                                                    style="color: #000000;"><?php echo $headDiv; ?></span></span></span></strong></span></strong></span></span>
                                                                                </div>


                                                                            </td>

                                                                        </tr>

                                                                        </tbody>

                                                                    </table>

                                                                    <p><span style="font-size: 12pt;"> </span></p>

                                                                    <div sizset="1" sizcache="5">


                                                                        <span style="font-size: 12pt;"><br/></span>


                                                                    </div>

                                                                    <table border="0"
                                                                           style="text-align: center; width: 100%;">

                                                                        <tbody>

                                                                        <tr>

                                                                            <td><strong>
                                                                                    <div class="clr"></div>
                                                                                    <div class="readon-wrap1">
                                                                                        <div class="readon1-l"></div>

                                                                                    </div>
                                                                                </strong></td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>