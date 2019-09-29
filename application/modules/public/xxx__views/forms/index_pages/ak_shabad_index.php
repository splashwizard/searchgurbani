<!--start-->
<div style="background-color:#fceaaa" align="center">
    <h2><strong>Amrit Keertan - Shabads</strong></h2>
    <h2>Chapter: <?php echo $chapter_name; ?></h2>
</div>


<br/>

<p><a href="<?php echo site_url('public/amrit-keertan/chapter-index'); ?>" class="button">Chapter Index</a></p>


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
	<div class="section_line line row' . $i . '">
	  <span class="col_sl_no">' . $id . '</span>
	  <a href="' . site_url('public/amrit-keertan/shabad/' . $shabad->shabad_id . '/' . $url_shabad_name) . '"><span class="col_section_name">' . $shabad->shabad_name . '</span></a>
	  <a href="' . site_url('public/amrit-keertan/page/' . $shabad->pageno) . '"><span class="col_page_no">' . $shabad->pageno . '</span></a>
	  <div class="clearer"></div>
	</div>
	';
        $i = -$i;
    }


    ?>
</div>

<!--end-->