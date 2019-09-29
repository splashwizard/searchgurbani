<!--start-->
<div class="page-content">
    <div class="container-fluid">
        <h3 class="no-top" style="color:#641214;">
            Hukumnama - Raag Index</h3>
        <div class="chapter_index">
            <div class="section_title">
                <span class="col_section_name">Raag/Hukumnama Title</span>
                <span class="col_page_no">Page No.</span><br
                        class="clearer">
                <?php
                    $i         = 1;
                    $id        = 0;
                    $prev_raag = '';
                    foreach ($hukumnama_titles->result() as $hukumnama_title)
                    {
                        $id++;
                        if ($prev_raag != $hukumnama_title->raag)
                        {
                            echo '
            </div>
            <a href="javascript:toggle(' . $id . ');">
            <div class="section_title">
              <span class="col_section_name">' . $hukumnama_title->raag . '</span>
              <span class="col_page_no">&nbsp;</span><div class="clearer"></div>
            </div>
            </a>
            <div id="content_' . $id . '" class="sub_chapter_name">';
                        }
                        $pageno = explode(".", $hukumnama_title->pageno);
                        echo '
                        <a href="' . site_url('hukumnama/ang/' . $hukumnama_title->pageno) . '">
                        <div class="section_line line row' . $i . '">
                          <span class="col_section_name">' . $hukumnama_title->title . '</span>
                          <span class="col_page_no">' . $pageno[0] . '</span>
                          <div class="clearer"></div>
                        </div>
                        </a>';
                        $prev_raag = $hukumnama_title->raag;

                        $i = -$i;
                    }

                ?>

            </div>
        </div>
    </div>
</div>

<div class="clearer"></div>
<!--end-->

<script type="text/javascript">
    $(".sub_chapter_name").hide();
    function toggle(id) {
        $(".sub_chapter_name").hide('slow');
        $("#content_" + id).toggle('slow');
    }
</script>