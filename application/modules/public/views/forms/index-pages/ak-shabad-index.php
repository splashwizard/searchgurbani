<!--start--><div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="contents">
                    <div class="options no-top top-heading center" align="">
                        <h3 class="bold small-bottom no-top">Amrit Keertan - Shabads</strong></h3>
                        <h2>Chapter: <?php echo $chapter_name; ?></h2>
                    </div>


                    <br/>

                    <ul class="inline-block highlight-li center">
                        <li><a href="<?php echo site_url('amrit-keertan/index/chapter'); ?>" class="button">Chapter Index</a></li>
                    </ul>


                    <br/>

                    <div class="chapter_index">

                        <div class="section_title">
                            <span class="col_sl_no">No.</span>
                            <span class="col_section_name">Shabad Title</span>
                            <span class="col_page_no">Page No.</span><br class="clearer"/>
                        </div>


                        <?php

                        $i = 1;
                        $id = 0;
                        foreach ($shabads->result() as $shabad) {
                            $id++;
                            $url_shabad_name = url_title($shabad->shabad_name, '-', TRUE);
                            echo '
                        <div class="section_line line row1' . $i . '">
                          <span class="col_sl_no">' . $id . '</span>
                          <a href="' . site_url('amrit-keertan/shabad/' . $shabad->shabad_id . '/' . $url_shabad_name) . '"><span class="col_section_name">' . $shabad->shabad_name . '</span></a>
                          <a href="' . site_url('amrit-keertan/page/' . $shabad->pageno) . '"><span class="col_page_no">' . $shabad->pageno . '</span></a>
                          <div class="clearer"></div>
                        </div>
                        ';
                            $i = -$i;
                        }


                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end-->