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

$mp3file = 'audio/hukum/' . $hukumnama_info->audio;
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
<div class="page-content">
    <div class="container-fluid">
        <div style="background-color:#fceaaa" class="center">
            <h3 class="no-top maroon">Hukumnama - Ang <?php echo $pageno; ?></h3>
            <p class="bold more-bottom"><?php echo $hukumnama_info->title; ?> in <?php echo $hukumnama_info->raag; ?></p>
        </div>
<?php

echo $audio;

echo '<div class="clearfix"></div>';
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

    echo '<h6 class="bold">In Gurmukhi</h6>';
    echo '<div class="line row1 center"><p class="lang_1" style="font-size:18px;">';
    echo $data['punjabi'];
    echo '</p></div>';

    echo '<p><strong>Phonetic English</strong></p>';
    echo '<div class="line row-1 center"><p class="lang_2">';
    echo $data['translit'];
    echo '</p></div>';

    echo '<p><strong>English Translation</strong></p>';
    echo '<div class="line row1"><p class="lang_4">';
    echo $data['english'];
    echo '</p></div>';

    echo '<p><strong>Punjabi Viakhya</strong></p>';
    echo '<div class="line row-1"><p class="lang_3" style="font-size:17px;">';
    echo $data['ss_para'];
    echo '</p></div>';
}

?>
        </div>
    </div>