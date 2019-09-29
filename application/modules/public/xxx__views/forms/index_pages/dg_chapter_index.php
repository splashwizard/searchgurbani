<!--start-->
<h2>Dasam Granth - Chapter Index</h2>

<br/>

<div class="chapter_index">

    <div class="section_title">
        <span class="col_section_name">Chapter</span>
        <span class="col_page_no">Page No.</span><br class="clearer"/>
    </div>


    <div>
        <?php
        $i = 1;
        $id = 0;

        foreach ($chapters->result() as $chapter) {
            if ($chapter->parentID == 0) {
                continue;
            } elseif ($chapter->parentID == 1369) {
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

                if ($chapter->page_id != 0) {
                    echo '
<a href="' . site_url('public/dasam-granth/page/' . $chapter->page_id.'/line/' .$chapter->lineID) . '">
<div class="section_line line row' . -$i . '">
  <span class="col_section_name">' . $chapter->chapter_name . '</span>
  <span class="col_page_no">' . $chapter->page_id . '</span>
  <div class="clearer"></div>
</div>
</a>
		';
                }
            } else {
                echo '
<a href="' . site_url('public/dasam-granth/page/' . $chapter->page_id.'/line/' .$chapter->lineID) . '">
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
<!--end-->

