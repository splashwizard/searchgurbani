<?php
if (get_last_segment() == 'gurmukhi')
    $this->session->set_userdata('book_lang', 'gurmukhi');
if (get_last_segment() == 'hindi')
    $this->session->set_userdata('book_lang', 'hindi');

if ($this->session->userdata('book_lang') == '' or $this->session->userdata('book_lang') == 'gurmukhi') {
    $lang_button = '<a href="' . site_url('sri-gur-pratap-suraj-granth/page/' . $page_no . '/volume/' . $volume_id . '/hindi') . '" class="btn btn-next">View in Hindi</a>';
    $display_lang_field = 'text';
} else {
    $lang_button = '<a href="' . site_url('sri-gur-pratap-suraj-granth/page/' . $page_no . '/volume/' . $volume_id . '/gurmukhi') . '" class="btn btn-next">View in Gurmukhi</a>';
    $display_lang_field = 'hindi';
}
$first_page = 1;
$navigationBar = '
<div class="utility-bar2">
<div class="row">
<div class="col-md-4 col-sm-4">
		<div class="ang-search ang-paginate">
			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">
				Goto Page<input name="page_no" id="page_no" type="text" style="width: 22%" maxlength="5" class="form-control" value="' . $page_no . '" />
				<input type="submit" name="Submit" value="Go" class="btn btn-next">
			</form>
		</div>
		</div>
	
<div class="col-md-8 col-sm-8 text-right">
		<div class="ang-paginate">
			' . $lang_button . '
			<a href="' . site_url('sri-gur-pratap-suraj-granth/') . '" class="btn btn-next">Search Page</a> 
			<a href="' . site_url('sri-gur-pratap-suraj-granth/chapters/' . $volume_id) . '" class="btn btn-next">Chapter Index</a> ';

if ($page_no > 1) {
    $navigationBar .= '<button onclick="loadPage(\'' . $first_page . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
    if ($page_no + 1 > 1) {
        $navigationBar .= '<button onclick="loadPage(\'' . ($page_no - 1) . '\')" href="javascript:void(0);" class="btn btn-next">Back</button> ';
    }
}

if ($page_no < $lines_count) {
    $navigationBar .= '<button onclick="loadPage(\'' . ($page_no + 1) . '\')" href="javascript:void(0);" class="btn btn-next">Next</button> ';
    if ($page_no - 1 < $lines_count) {
        $navigationBar .= '<button onclick="loadPage(\'' . $lines_count . '\')" href="javascript:void(0);" class="btn btn-next">Last</button> ';
    }
}
$navigationBar .= '
</div>
</div>
	   <div class="col-md-12 col-xs-12">
		<div class="bold center">
			<h5><strong>Displaying Page ' . $page_no . ' of ' . $lines_count . ($volume_id != 0 ? ' from Volume ' . $volume_id : '') . '</strong></h5>
		</div>
	</div>
	</div>
</div>
	';
$atts = array(
    'width' => '600',
    'height' => '400',
    'scrollbars' => 'yes',
    'status' => 'yes',
    'resizable' => 'yes',
    'screenx' => '0',
    'screeny' => '0'
);

$utilityBar = '
    <div class="utility-bar1 text-right">
			' . anchor_popup('sri-gur-pratap-suraj-granth/page/' . $page_no . '/print-view', '<i class="fa fa-print" title="Print this page"></i>', $atts) . '&nbsp;
    </div>
';


?>
<div id="page_body">
    <div class="page-content">
        <div class="container-fluid">
            <div class="contents">
                <h3 class="top-heading no-top">Sri Gur Pratap Suraj Granth</h3>

                <?php

                echo $utilityBar;
                echo $navigationBar;

                ?>

                <div class="page">
                    <?php

                    if ($lines === false) {
                        echo '
                <div class="line row1">
                  <p class="lang_1b">No lines found</p>
                </div>
                ';
                    } else {
                        foreach ($lines->result() as $line) {
                            $data = str_replace('{', '<strong>', $line->$display_lang_field);
                            $data = str_replace('}', '</strong>', $data);

                            if ($highlight == true) {
                                $keyword = $this->session->userdata('book_2_keyword');
                                $data = str_ireplace($keyword, '<span class="hl">' . $keyword . '</span>', $data);
                            }

                            $data = str_replace(PHP_EOL, '<br/>', $data);

                            echo '
                    <div class="line row1">
                      <p class="lang_1b text-with-line text-center">' . $data . '</p>
                    </div>
                    ';
                        }
                    }

                    ?>
                </div>

                <?php

                echo $utilityBar;
                echo $navigationBar;

                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    var pagination_url = '<?php echo site_url($base_url) ?>/';
    var current_url = '<?php echo current_url() ?>';

</script>