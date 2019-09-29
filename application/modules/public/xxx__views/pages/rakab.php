<html>
<body>
<script type="text/javascript" src="http://ci2.searchgurbani.com/scripts/jquery.min.js"></script>


<script type="text/javascript">

    $(document).ready(function () {
        $('.save_as_pdf').click(function () {
            var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
            window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
            return false;
        });
    })
</script>

<?php

/*	$newsUrl = 'http://www.dsgmc.in/index.php?option=com_content&view=article&id=167&Itemid=71';

	$newsContents = file_get_contents($newsUrl);
   $startDiv = '<div class="body-surround"><div class="body-surround2"><div class="body-surround3">';

   $endDiv = '<table border="0" style="text-align: center; width: 100%;">';

   $headDiv = stringSearch($startDiv,$endDiv,$newsContents);
   
   print_r($headDiv);*/


/*echo '<pre>';

print_r($headDiv);

echo '</pre>';*/
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
				<a href="#" class="save_as_pdf" id="save_as_pdf"><img src="' . base_url() . 'images/icons/pdf.gif" border="0" title="Save page as PDF" /></a>
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