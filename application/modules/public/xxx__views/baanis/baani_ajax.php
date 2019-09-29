
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

    <p class="pagination_links"><?php echo $baani['pagination']=$pagination; ?>&nbsp;</p>


