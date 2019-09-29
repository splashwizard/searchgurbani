
    <?php

    echo $baani['pagination']=$pagination;

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
            echo '<div class="line row' . $alt_row . '">
				<p class="lang_1">' . $line->punjabi . '</p>
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

        echo $baani['pagination']=$pagination;

    ?>


