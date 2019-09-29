<!--start-->
<div class="page-content">
    <div class="container-fluid">
        <div class="contents">
            <div style="background-color:#fceaaa;"
                 align="center">
                <h3 class="no-top bold">Amrit
                    Keertan Chapter Index</h3>
            </div>


            <br/>

            <div class="chapter_index">

                <div class="section_title">
                    <span class="col_sl_no">ID</span>
                    <span class="col_section_name">Section</span>
                    <span class="col_page_no">Page No.</span><br
                            class="clearer"/>
                </div>


                <?php

                    $i = 1;
                    foreach ($chapters->result() as $chapter)
                    {
                        $url_chapter_name = url_title($chapter->section, '-', TRUE);


                        echo '
	<div class="section_line line row' . $i . '">
	  <span class="col_sl_no">' . $chapter->section_id . '</span>
	  <a href="' . site_url('amrit-keertan/chapter/' . $chapter->section_id . '/' . $url_chapter_name) . '"><span class="col_section_name">' . $chapter->section . '</span></a>
	  <a href="' . site_url('amrit-keertan/page/' . $chapter->pageno) . '"><span class="col_page_no">' . $chapter->pageno . '</span></a>
	  <div class="clearer"></div>
	</div>';

                        $i = -$i;

                    }

                ?>
            </div>
        </div>
    </div>
</div><!--end-->