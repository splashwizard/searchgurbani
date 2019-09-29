<html>
<body>
<script type="text/javascript" src="http://www.searchgurbani.com/scripts/jquery.min.js"></script>


<?php
/*$newsUrl = 'http://www.dsgmc.in/index.php?option=com_content&view=article&id=164&Itemid=71';
$newsContents = file_get_contents($newsUrl);

$startContent = '<p><span style="color: #000000; font-family: Georgia, Times New Roman, Times, serif;"><span style="font-size: 12pt;">';
$endContent = '<td width="23%" height="23" style="text-align: right;"><span style="color: #000000; font-family: arial;">';
$firstDiv = stringSearch($startContent,$endContent,$newsContents);


    /*$dateDiv='<td align="center">';
    $endDate = '</span>';
    $dateDiv = stringSearch($dateDiv,$endDate,$newsContents);
    $conTent=$firstDiv[0];
    $arr = explode(" ",$conTent);
    echo "<pre>";

    $month=$arr[0];
    $mnth=explode('[',$month);
    $monthFnl=$mnth[1];
    $mnthh=date("m", strtotime($monthFnl));

    $day=$arr[1];
    $dayFnl=str_replace(',',"",$day);

    $year=$arr[2];
    $yearFnl=str_replace(',',"",$year);

    $dateFnl=date("Y-m-d", mktime(0, 0, 0, $mnthh, $dayFnl, $yearFnl));
    $today=date("Y-m-d");*/

//print_r($arr);


//$dateRaw=$dateDiv[0];
$hukumContents = $content;

if (isset($_COOKIE["csstypeG"])) {
    $hukumContents = str_replace('WebAkharSlim', $_COOKIE["csstypeG"], $hukumContents);
}

if (isset($_COOKIE["EngTrans"])) {
    $hukumContents = str_replace('Arial', $_COOKIE["EngTrans"], $hukumContents);
}


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

                    <div class="maincol-padding">

                        <div class="bodycontent">
                            <div class="mainbody-surround">

                                <div id="maincontent-block">
                                    <div style="float:right;">
                                        <?php
                                        echo $utilityBar;
                                        ?></div>

                                    <div class="" style="padding-top:30px;">

                                        <div id="page" class="full-article">


                                            <table cellpadding="1" cellspacing="1" border="0"
                                                   style="width: 85.94%; height: 150px;">

                                                <tbody>


                                                <tr>

                                                    <td>

                                                        <div style="text-align: justify;"><span
                                                                style="font-size: 12pt;"><span
                                                                    style="color: #000079;"><strong><span
                                                                            style="color: #000079;"><strong><span
                                                                                    style="line-height:25px;"><span
                                                                                        style="font-family: arial; color: #cc3333;"><div
                                                                                            align="center"><?php echo $hukumContents; ?></div></span></span></span></strong></span></strong></span></span>
                                                        </div>


                                                    </td>

                                                </tr>

                                                </tbody>

                                            </table>

                                            <p><span style="font-size: 12pt;"> </span></p>

                                            <div sizset="1" sizcache="5">


                                                <span style="font-size: 12pt;"><br/></span>


                                            </div>

                                        </div>