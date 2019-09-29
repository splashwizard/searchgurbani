<?php

$navigationBar = '
<div class="utility_bar">
	<span class="col_33_percent">
		<div class="goto_form">
			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">
				Goto Page
				<input name="page_no" id="page_no" type="text" size="5" maxlength="5" value="' . $page_no . '">
				<input type="submit" name="Submit" value="Go">
			</form>
		</div>
	</span>
	<span class="col_33_percent align_center">
		<div class="displaying_page_info">
			Displaying Page ' . $page_no . ' of ' . $lines_count . '
		</div>
	</span>
	<span class="col_33_percent align_right col_float_right"> 
		<span class="navigation_links">
			<a href="' . site_url('music/page/1') . '" class="button">Book Index</a> ';

if ($page_no > 1) {
    $navigationBar .= '<a href="' . site_url('music/page/1') . '" class="button">Begin</a> ';
    if ($page_no + 1 > 1) {
        $navigationBar .= '<a href="' . site_url('music/page/' . ($page_no - 1)) . '" class="button">Back</a> ';
    }
}

if ($page_no < $lines_count) {
    $navigationBar .= '<a href="' . site_url('music/page/' . ($page_no + 1)) . '" class="button">Next</a> ';
    if ($page_no - 1 < $lines_count) {
        $navigationBar .= '<a href="' . site_url('music/page/' . $lines_count) . '" class="button">Last</a> ';
    }
}
$navigationBar .= '
	  </span> </span> <br class="clearer" />
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
<div class="utility_bar">
	<span class="col_float_right">
		<div class="utility_buttons">
			' . anchor_popup(current_url() . '/print_view', '<img src="' . base_url() . 'images/icons/print.gif" border="0" title="Print this page" />', $atts) . '&nbsp;&nbsp;&nbsp;
			' . anchor_popup(current_url() . '/pdf_view', '<img src="' . base_url() . 'images/icons/pdf.gif" border="0" title="Save page as PDF" />', $atts) . '
			
		</div>
	</span>
	<br class="clearer" />
</div>
';


?>

<h2>Indian Classical Music and Sikh Kirtan</h2>

<?php

echo $utilityBar . "<br />";
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

<?php

echo $utilityBar . "<br />";
echo $navigationBar;

?>

<script type="text/javascript">
    function gotoPage(formobj) {
        var page_no = formobj.page_no.value;
        document.location.href = '<?php echo site_url('music/page'); ?>/' + page_no;
        return false;
    }

    $('.save_as_pdf').click(function () {
        var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
        window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
        return false;
    });

</script>