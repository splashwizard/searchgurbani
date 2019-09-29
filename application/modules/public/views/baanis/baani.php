<div class="page-content">
    <div class="container-fluid">
        <h3 class="no-top"><?php echo $baani_title; ?></h3>
        <span id="loader"></span>
        <?php
        if (isset($audio)) {
            ?>
            <div id="audio_player">
                <audio id="audio_with_controls" style="margin:3px auto;width:165px;" controls>
                    <?php
                    $audio_src = ($_COOKIE['ucharan_type'] == "normal") ? 'src="' . base_url() . "audio/baanis/" . $audio . '"' : 'src="' . base_url() . "audio/baanis/shudh/" . $audio . '"';
                    ?>
                    <source type="audio/mpeg" <?php echo $audio_src ?>/>
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
                           type="application/x-shockwave-flash" name="niftyPlayer_Audio" bgcolor="#FFFFFF"
                           quality="high"
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

            echo $baani['pagination'] = $pagination;

            ?>

            <?php
            echo '<div class="ang-content">';
            if ($lines === false) {
                echo '
	<div class="line row11">
	  <p class="english">No lines found</p>
	</div>
	';
            } else {

                $alt_row = 1;
                $i = 0;
                foreach ($lines->result() as $line) {
                    $i++;
                    //('.$line->lineno.')
                    echo '<div class="content-block row' . $alt_row . '">
				<p class="lang_1 ">' . $line->punjabi . '</p>
				<p class="lang_2">' . $line->translit . '</p>
				<p class="lang_3">' . $line->hindi . '</p>
				<p class="lang_4">' . $line->english . '</p>
			  </div>';

                    $alt_row = -$alt_row;
                }

            }
            echo '</div>';
            ?>

            <?php

            echo $baani['pagination'] = $pagination;

            ?>
        </div>

    </div>
</div>

<script type="text/javascript">

    var pagination_url = '<?php echo site_url($base_url) ?>/';
    var base_url = '<?php echo base_url() ?>';

</script>