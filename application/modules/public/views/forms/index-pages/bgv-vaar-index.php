<!--start-->

<div class="page-content">
    <div class="container-fluid">
        <h3 class="no-top bold" style="color:#641214;">Bhai Gurdas Vaaran - Vaar Index</h3>
        <div id="vaar_index">
            <div class="bold center">Vaar #</div>
            <?php

                for ($i = 1; $i <= 40; $i++) {
                    echo '<a href="' . site_url('bhai-gurdas-vaaran/index/vaar/' . $i) . '"> ' . $i . ' </a>';
                    if ($i % 20 == 0)
                        echo '<br />';
                }

            ?>
        </div>
        <div class="clearfix"></div>
        <?php

            if ($pauries != false) {

        ?>
        <h3 class="center" style="color:#641214;">Vaar No.: <?php echo $vaar_no; ?></h3>
        <div class="chapter_index vaar_index">
            
            <div class="section_title">
                <span class="col_sl_no">Pauri No.</span>
                <span class="col_section_name">Pauri Name</span><br class="clearfix"/>
            </div>
            <?php

                $id = 0;
                $i = 1;
                $p=0;
                foreach ($pauries->result() as $pauri) {
                    $id++;
                    if($pauri->pauri_lineID!= 0) {

                        if($p==$pauri->paurino)
                        {
                            continue;
                        }
                        else {
                            echo '
	<div class="section_line line row' . $i . '">
	  <span class="col_sl_no">' . $pauri->paurino . '</span>
	  <a href="' . site_url('bhai-gurdas-vaaran/vaar/' . $vaar_no . '/pauri/' . $pauri->paurino . '/line/' . $pauri->pauri_lineID) . '">
	  	<span class="col_section_name">' . $pauri->pauri_name_roman . '<br />' . $pauri->pauri_name_punjabi . '</span>
	  </a>
	  <div class="clearfix"></div>
	</div>
	';
                            $p=$pauri->paurino;
                            $i = -$i;
                        }
                    }
                }
            ?>
        </div>
                <?php
            }
        ?>
    </div>
</div>

<!--end-->