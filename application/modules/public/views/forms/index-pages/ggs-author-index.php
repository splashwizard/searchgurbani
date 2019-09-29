<!--start-->
<div class="page-content">
    <div class="container-fluid">
        <div style="background-color:#f6b906" align="center">
            <h2>Sri Guru Granth Sahib Author Index</h2>
        </div>
        <br/>

        <div class="chapter_index">

            <div class="section_title">
                <span class="col_sl_no">Sl. No.</span>
                <span class="col_section_name">Author</span><br class="clearer" />
            </div>
            
            <?php
            $i = 1;
            $id = 0;
            foreach ($authors->result() as $author) {
                $id++;
                echo '
        <a href="' . site_url('guru-granth-sahib/author/' . $author->slug) . '">
        <div class="section_line line row' . $i . '">
          <span class="col_sl_no">' . $id . '</span>
          <span class="col_section_name">' . $author->author . '</span>
          <div class="clearer"></div>
        </div>
        </a>
                ';
                $i = -$i;
            }

            ?>
        </div>
    </div>
</div>
<!--end-->
