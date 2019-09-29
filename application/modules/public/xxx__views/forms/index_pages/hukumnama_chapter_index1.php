<!--start-->

<h2>Hukumnama - Raag Index</h2>
<br/>
<div class="chapter_index">
    <div class="section_title">
        <span class="col_section_name">Raag/Hukumnama Title</span>
        <span class="col_page_no">Page</span><br class="clearer"/>
    </div>

    <div>
        <?php
        $i = 1;
        $id = 0;
        $prev_raag = '';
        foreach ($hukumnama_titles->result() as $hukumnama_title) {
            $id++;
            if ($prev_raag != $hukumnama_title->raag) {
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

            echo '
<a href="' . site_url('hukumnama/chapter/' . $hukumnama_title->id) . '">
<div class="section_line line row' . $i . '">
  <span class="col_section_name">' . $hukumnama_title->title . '</span>
  <span class="col_page_no">' . $hukumnama_title->pageno . '</span>
  <div class="clearer"></div>
</div>
</a>';
            $prev_raag = $hukumnama_title->raag;

            $i = -$i;
        }

        ?>
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