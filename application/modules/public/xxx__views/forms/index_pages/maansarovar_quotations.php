<!--start-->
<div style="background-color:#fceaaa" align="center">
    <h2><strong>Maansarovar - Quotations for <?php echo $word; ?></strong></h2>
</div>

<br/>

<div class="chapter_index" style="width:90%;">

    <div><a href="<?php echo site_url('maansarovar'); ?>" class="button">Search Page</a></div>
    <br class="clearer"/>

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
		  <span class="col_section_name lang_1a">' . $quotation->quotation . '</span>
		  <a href="' . site_url('guru-granth-sahib/ang/' . $quotation->pageno) . '">
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
<!--end-->