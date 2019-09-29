<?php

$navigationBar = '
<div class="utility-bar2">
    <div class="row">
		<div class="col-md-4 col-sm-4">
            <div class="ang-search">
                <form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPagee(this);">
                    Goto Page
                    <input name="page_no" id="page_no" type="text" class="form-control" maxlength="5" value="' . $page_no . '">
                    <input type="submit" name="Submit" value="Go" class="btn btn-go">
                </form>
            </div>
		</div>
	
	    <div class="col-md-8 text-right">
			<div class="ang-paginate">
			    <a href="' . site_url('music/page/1') . '" class="btn btn-next">Book Index</a> ';

if ($page_no > 1) {
    $navigationBar .= '<a href="' . site_url('music/page/1') . '" class="btn btn-next">Begin</a> ';
    if ($page_no + 1 > 1) {
        $navigationBar .= '<a href="' . site_url('music/page/' . ($page_no - 1)) . '" class="btn btn-next">Back</a> ';
    }
}

if ($page_no < $lines_count) {
    $navigationBar .= '<a href="' . site_url('music/page/' . ($page_no + 1)) . '" class="btn btn-next">Next</a> ';
    if ($page_no - 1 < $lines_count) {
        $navigationBar .= '<a href="' . site_url('music/page/' . $lines_count) . '" class="btn btn-next">Last</a> ';
    }
}
$navigationBar .= '
	    </div> 
	</div> 
	<div class="row">
        <div class="col-md-12 ">
            
            <div class="center">
                <strong>Displaying Page ' . $page_no . ' of ' . $lines_count . '</strong>
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
			' . anchor_popup(current_url() . '/print_view', '<i class="fa fa-print" title="Print this page"></i>', $atts) . '&nbsp;&nbsp;&nbsp;
			' . anchor_popup(current_url() . '/pdf_view', '<i class="fa fa-file-pdf-o" title=""></i>', $atts) . '
    </div>
';


?>
<div class="page-content">
    <div class="container-fluid">
        <div class="contents">
            <h3 class="top-heading no-top">Indian Classical Music and Sikh Kirtan</h3>

            <?php

            echo $utilityBar;
            echo $navigationBar;

            ?>

            <div class="page">
                <?php

                if ($lines === false) {
                    echo '
                <div class="line row1">
                  <p class="lang_1">No lines found</p>
                </div>
                ';
                } else {
                    foreach ($lines->result() as $line) {
                        $data = str_replace('{', '<strong>', $line->text);
                        $data = str_replace('}', '</strong>', $data);
                        /*
                        if($highlight == true)
                        {
                            $keyword = $this->session->userdata('book_1_keyword');
                            $data= str_ireplace($keyword,'<span class="hl">'.$keyword.'</span>',$data);
                        }*/

                        echo '
                    <div class="page_data">
                      <p class="blue">' . nl2br($data) . '</p>
                    </div>
                    ';
                    }
                }

                ?>
            </div>
        </div>
    </div>

            <?php

            echo $utilityBar;
            echo $navigationBar;

            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    function gotoPagee(formobj) {
        var page_no = formobj.page_no.value;
        document.location.href = '<?php echo site_url('music/page'); ?>/' + page_no;
        return false;
    }

</script>