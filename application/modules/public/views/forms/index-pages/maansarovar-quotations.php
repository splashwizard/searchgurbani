<!--start-->
<div class="page-content">
    <div class="container-fluid">
            <div style="background-color:#fceaaa" align="center">
                <h3 class="top-heading no-top">Maansarovar - Quotations for <?php echo $word; ?></h3>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    <ul class="inline-block highlight-li">
                        <li><a href="<?php echo site_url('maansarovar'); ?>" class="button">Search Page</a></li>
                    </ul>
                </div>
            </div>

            <div class="chapter_index" style="width:90%;">

                <div class="section_title">
                    <span class="col_sl_no">No.</span>
                    <span class="col_section_name">Quotation</span>
                    <span class="col_page_no">SGGS Ang</span><br class="clearer"/>
                </div>

                <?php

                $i = 1;
                $n = 1;
                if ($quotations != false) {
                    foreach ($quotations->result() as $quotation) {
                        //$url_chapter_name = url_title($chapter->chapter_ename, 'underscore', TRUE);
                        echo '
                    <div class="section_line line row' . $i . '">
                      <span class="col_sl_no">' . $n . '</span>
                      <a href="' . site_url('guru-granth-sahib/ang/' . $quotation->pageno) . '">
                          <span class="col_section_name lang_1a">' . $quotation->quotation . '</span>                        
                          <span class="col_page_no">' . $quotation->pageno . '</span>
                      </a>
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

<!--end-->