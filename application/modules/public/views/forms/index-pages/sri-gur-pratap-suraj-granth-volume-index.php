<!--start-->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="contents">
                    <div class="options no-top top-heading center" align="">
                        <h3 class="bold small-bottom no-top">Sri Gur Pratap Suraj Granth - Volume Index</h3>
                    </div>


                    <br/>

                    <div class="chapter_index">

                        <div class="section_title">
                            <span class="col_sl_no">No.</span>
                            <span class="col_section_name1">Volume Name</span>
                            <span class="col_section_name2">Volume Name (English)</span><br class="clearer"/>
                        </div>


                        <?php

                        $i = 1;
                        $n = 1;
                        if ($volumes != false) {
                            foreach ($volumes->result() as $volume) {
                                $url_volume_name = url_title($volume->volume_ename, 'underscore', TRUE);
                                echo '
                            <a href="' . site_url('sri-gur-pratap-suraj-granth/chapters/' . $volume->volume_id . '/' . $url_volume_name) . '">
                            <div class="section_line line row1' . $i . '">
                              <span class="col_sl_no">' . $n . '</span>
                              <span class="col_section_name1">' . $volume->volume_name . '</span>
                              <span class="col_section_name2">' . $volume->volume_ename . '</span>
                              <div class="clearer"></div>
                            </div>
                            </a>
                            ';

                                $i = -$i;
                                $n++;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-->