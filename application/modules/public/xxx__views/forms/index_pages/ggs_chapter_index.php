<!--start-->

<h2>Guru Granth Sahib Jee - Gurbani Index</h2>
<br/>
<div class="chapter_index">
    <div class="section_title">
        <span class="col_section_name">Writer / Bani</span>
        <span class="col_page_no">Page</span><br class="clearer"/>
    </div>

    <div>
        <?php
        $i = 1;
        $id = 0;
        foreach ($chapters->result() as $chapter) {
            if ($chapter->page_id == 0) {
                $id++;
                echo '
</div>
<a href="javascript:toggle(' . $id . ');">
<div class="section_title">
  <span class="col_section_name">' . $chapter->chapter_name . '</span>
  <span class="col_page_no">&nbsp;</span><div class="clearer"></div>
</div>
</a>
<div id="content_' . $id . '" class="sub_chapter_name">
		';
            } else {
                echo '
<a href="' . site_url('guru-granth-sahib/ang/' . $chapter->page_id.'/line/'.$chapter->lineID) . '">
<div class="section_line line row' . $i . '">
  <span class="col_section_name">' . $chapter->chapter_name . '</span>
  <span class="col_page_no">' . $chapter->page_id . '</span>
  <div class="clearer"></div>
</div>
</a>
		';
            }
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