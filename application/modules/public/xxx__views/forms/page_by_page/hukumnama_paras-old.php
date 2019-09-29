<?php
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
	<span class="col_float_left">
		<div class="utility_buttons">
			<a href="' . site_url('hukumnama') . '" class="button">Hukumnama Index</a>
		</div>
	</span>
	<span class="col_float_right">
		<div class="utility_buttons">
			' . anchor_popup(current_url() . '/print_view', '<img src="' . base_url() . 'images/icons/print.gif" border="0" title="Print this page" />', $atts) . '&nbsp;&nbsp;&nbsp;
			<a href="#" class="save_as_pdf"><img src="' . base_url() . 'images/icons/pdf.gif" border="0" title="Save page as PDF" /></a>
		</div>
	</span>
	<br class="clearer" />
</div>
';

if ($hukumnama_info != false) {
    $hukumnama_info = $hukumnama_info->result();
    $hukumnama_info = $hukumnama_info[0];
}


$mp3file = ltrim($hukumnama_info->audio, '/');
$audio = '';

if (file_exists($this->config->item('base_path') . $mp3file)) {
    $audio = '
	<div id="audio_player">
	<object width="165" height="38" align="" id="niftyPlayer_Audio" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
	  <param value="' . base_url() . 'scripts/niftyplayer.swf?file=' . base_url() . $mp3file . '" name="movie">
	  <param value="high" name="quality">
	  <param value="#FFFFFF" name="bgcolor">
	  <embed width="165" height="38" align="" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="niftyPlayer_Audio" bgcolor="#FFFFFF" quality="high" src="' . base_url() . 'scripts/niftyplayer.swf?file=' . base_url() . $mp3file . '" style="visibility: visible;">
	</embed>
	</object>
	</div>';
}


?>

<div style="background-color:#fceaaa" align="center">

    <h2>Hukumnama Ang (<?php echo $pageno; ?>)</h2>
    <p><strong><?php echo $hukumnama_info->title; ?> in <?php echo $hukumnama_info->raag; ?></strong><br/>&nbsp;</p>

</div>

<?php
echo $audio;
echo $utilityBar;

if ($lines === false) {
    echo '
	<div class="line row1">
	  <p class="english">No lines found</p>
	</div>
	';
} else {
    $data = array('punjabi' => '', 'translit' => '', 'english' => '', 'ss_para' => '');
    /** Para by Para **/
    foreach ($lines->result() as $line) {
        $data['punjabi'] .= ($line->punjabi != "" ? $line->punjabi . "<br />" : "");
        $data['translit'] .= ($line->translit != "" ? $line->translit . "<br />" : "");
        $data['english'] .= ($line->english != "" ? $line->english . "<br />" : "");
        $data['ss_para'] .= ($line->ss_para);
    }

    echo '<p><strong>In Punjabi</strong></p>';
    echo '<div class="line row1"><p class="lang_1">';
    echo $data['punjabi'];
    echo '</p></div>';

    echo '<p><strong>In Translit</strong></p>';
    echo '<div class="line row-1"><p class="lang_2">';
    echo $data['translit'];
    echo '</p></div>';

    echo '<p><strong>In English</strong></p>';
    echo '<div class="line row1"><p class="lang_4">';
    echo $data['english'];
    echo '</p></div>';

    echo '<p><strong>In SS Para</strong></p>';
    echo '<div class="line row-1"><p class="lang_5">';
    echo $data['ss_para'];
    echo '</p></div>';
}

echo $utilityBar;
?>
<script type="text/javascript">

    $('.save_as_pdf').click(function () {
        var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
        window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
        return false;
    });

</script>