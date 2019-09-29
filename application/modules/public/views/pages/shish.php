<html>
<body>
<script type="text/javascript" src="http://ci2.searchgurbani.com/scripts/jquery.min.js"></script>


<script type="text/javascript">

    $(document).ready(function () {
        $('#page').children('div').css('text-align', '');
    })
</script>


<?php
/*$newsUrl = 'http://www.dsgmc.in/index.php?option=com_content&view=article&id=165&Itemid=71';
$newsContents = file_get_contents($newsUrl);

$startDiv = '<div class="body-surround"><div class="body-surround2"><div class="body-surround3">';
$endDiv = '<span sizset="5" sizcache="5" style="font-family: times new roman,times;">';
$headDiv = stringSearch($startDiv,$endDiv,$newsContents);

$conTent=$headDiv[0];
$arr = explode("[",$conTent);
$arr1 = explode("]",$arr[1]);
$arr2=explode(' ',$arr1[0]);

$month=$arr2[0];
$mnthh=date("m", strtotime($month));

$day=$arr2[1];
$dayFnl=str_replace(',',"",$day);

$year=$arr2[2];
$yearFnl=str_replace(',',"",$year);

$dateFnl=date("Y-m-d", mktime(0, 0, 0, $mnthh, $dayFnl, $yearFnl));
$today=date("Y-m-d");
*/


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


                    <table cellpadding="1" cellspacing="1" border="0" style="width: 87%;">
                        <tbody>

                        </tr>
                        <tr>
                            <td>
                                <?php
                                echo $utilityBar;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p style="text-align: justify;"><span style="color: #000079;"><strong><span
                                                style="color: #000079;"><strong><span
                                                        style="font-size: xx-small; color: #cc3333; font-family: arial;"><span
                                                            style="color: #000000;"><span style="line-height:25px;"><div
                                                                    align="center"
                                                                    id="contentHukam"><?php echo $hukumContents; ?></div></span></span></span></strong></span></strong></span>
                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <p><span style="font-size: 12pt;"> </span></p>
                    <div sizset="1" sizcache="5" style="text-align: justify;">


                        <br/>

                        <div style="text-align: right;"></div>
                        <span sizset="5" sizcache="5" style="font-family: times new roman,times;">
<table border="0" style="text-align: center; width: 100%;">
<tbody>
<tr></tr></tbody></table></span>
</body>
</html>