<!--start-->
<link href="http://ci2.searchgurbani.com/Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="http://ci2.searchgurbani.com/Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>
<style>
    .content_inner {

        margin: 0 auto;
        overflow-x: hidden;
        overflow-y: scroll;
        padding: 0 10px 0 0;
        width: 98%;
    }
</style>
<div id="wrapper">
    <div class="content">
        <h1>Bhai Gurdas Vaaran <span class="right"><a onclick="switchPage('extra0', 'index')"
                                                      href="http://ci2.searchgurbani.com/scriptures/main_mob">back</a></span>
        </h1>
        <div class="content_inner">


            <h2><strong>Bhai Gurdas Vaaran - Vaar Index</strong></h2>
            <div id="vaar_index">
                <div style="margin:0px auto; width:95%; text-align:center;"><strong>Vaar #</strong>
                    <?php

                    for ($i = 1; $i <= 40; $i++) {
                        echo '<a href="' . site_url('scriptures/vaar-index/' . $i) . '"> ' . $i . ' </a>';
                        if ($i % 20 == 0)
                            echo '<br /><div class="clearer"></div>';
                    }

                    ?>
                </div>
                <div class="clearer"></div>
            </div>
            <?php

            if ($pauries != false) {

                ?>
                <br/>

                <h2 style="text-align:center;">Vaar No.: <?php echo $vaar_no; ?></h2>

                <br/>

                <div class="chapter_index">

                    <div class="section_title">
                        <span class="col_sl_no">Pauri No.</span>
                        <span class="col_section_name">Pauri Name</span><br class="clearer"/>
                    </div>


                    <?php

                    $id = 0;
                    $i = 1;
                    foreach ($pauries->result() as $pauri) {
                        $id++;
                        echo '
	<div class="section_line line row' . $i . '">
	  <span class="col_sl_no">' . $pauri->paurino . '</span>
	  <a href="' . site_url('scriptures/vaar/' . $vaar_no . '/pauri/' . $pauri->paurino) . '">
	  	<span class="col_section_name">' . $pauri->pauri_name_roman . '<br />' . $pauri->pauri_name_punjabi . '</span>
	  </a>
	  <div class="clearer"></div>
	</div>
	';

                        $i = -$i;

                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<!--end-->