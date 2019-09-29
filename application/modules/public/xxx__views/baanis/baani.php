<h2><?php echo $baani_title; ?></h2>
<span id="loader"></span>
<?php
if (isset($audio)) {
    ?>
    <div id="audio_player">
        <audio id="audio_with_controls" style="margin:3px auto;width:165px;" controls>
            <source
                <?php if ($_COOKIE['ucharan_type'] == "normal"){ ?>src="<?= base_url() . "audio/baanis/" . $audio; ?>"
                <?php } else { ?>src="<?= base_url() . "audio/baanis/shudh/" . $audio; ?>"<?php } ?> type="audio/mpeg"/>
        </audio>

        <object width="165" height="38" align="" id="niftyPlayer_Audio"
                codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
                classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
            <param
                value="<?php echo base_url() . "scripts/niftyplayer.swf?file=" . base_url() . "audio/baanis/" . $audio; ?>"
                name="movie">
            <param value="high" name="quality">
            <param value="#FFFFFF" name="bgcolor">
            <embed width="165" height="38" align="" pluginspage="http://www.macromedia.com/go/getflashplayer"
                   type="application/x-shockwave-flash" name="niftyPlayer_Audio" bgcolor="#FFFFFF" quality="high"
                   src="<?php if ($_COOKIE['ucharan_type'] == "normal") {
                       echo base_url() . "scripts/niftyplayer.swf?file=" . base_url() . "audio/baanis/" . $audio;
                   } else {
                       echo base_url() . "scripts/niftyplayer.swf?file=" . base_url() . "audio/baanis/shudh/" . $audio;
                   } ?>" style="visibility: visible;">
            </embed>
        </object>
    </div>
    <script type="text/javascript">
        if (document.createElement('audio').canPlayType) {
            if (!document.createElement('audio').canPlayType('audio/mpeg')) {
                document.getElementById("audio_with_controls").style.display = "none";
                document.getElementById("niftyPlayer_Audio").style.display = "block";

            } else {
                document.getElementById("niftyPlayer_Audio").style.display = "none";
                document.getElementById("audio_with_controls").style.display = "block";
            }
        }
    </script>
    <?php
}

?>
<div id="baani_page">
    <?php
        
        echo $baani['pagination']=$pagination;
    
    ?>
    
    <?php
        
        if ($lines === false) {
            echo '
	<div class="line row1">
	  <p class="english">No lines found</p>
	</div>
	';
        } else {
            $alt_row = 1;
            $i = 0;
            foreach ($lines->result() as $line) {
                $i++;
                //('.$line->lineno.')
                echo '<div class="line row' . $alt_row . '">
				<p class="punjabi">' . $line->punjabi . '</p>
				<p class="translit">' . $line->translit . '</p>
				<p class="hindi">' . $line->hindi . '</p>
				<p class="english">' . $line->english . '</p>
			  </div>';
                
                $alt_row = -$alt_row;
            }
        }
    
    ?>
    

</div>

<script type="text/javascript">

    var pagination_url = '<?php echo site_url($base_url) ?>/';
    var base_url = '<?php echo base_url() ?>';

</script>