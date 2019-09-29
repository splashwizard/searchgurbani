<?php
if (get_last_segment() == 'gurmukhi')
    $this->session->set_userdata('book_lang', 'gurmukhi');
if (get_last_segment() == 'hindi')
    $this->session->set_userdata('book_lang', 'hindi');

if ($this->session->userdata('book_lang') == '' or $this->session->userdata('book_lang') == 'gurmukhi') {
    $lang_button = '<a href="' . site_url('faridkot-wala-teeka/page/' . $page_no . '/hindi') . '" class="button">View in Hindi</a>';
    $display_lang_field = 'text';
} else {
    $lang_button = '<a href="' . site_url('faridkot-wala-teeka/page/' . $page_no . '/gurmukhi') . '" class="button">View in Gurmukhi</a>';
    $display_lang_field = 'hindi';
}

$navigationBar = '
<div class="utility_bar">
	<span class="col_float_left" style="float: left; margin-right: 20px;">
		<div class="goto_form">
			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">
				Goto Page
				<input name="page_no" id="page_no" type="text" size="5" maxlength="5" value="' . $page_no . '">
				<input type="submit" name="Submit" value="Go">
			</form>
		</div>
	</span>
	<span class="col_float_left" style="padding-top: 4px;">
		<div class="displaying_page_info">
			Displaying Page ' . $page_no . ' of ' . $lines_count . ($volume_id != 0 ? ' from Volume ' . $volume_id : '') . '
		</div>
	</span>
	<span class="align_right col_float_right"> 
		<span class="navigation_links">
			' . $lang_button . '
			<a href="' . site_url('faridkot-wala-teeka/') . '" class="button">Search Page</a> 
			<a href="' . site_url('faridkot-wala-teeka/chapters/' . $volume_id) . '" class="button">Chapter Index</a> ';

if ($page_no > 1) {
    $navigationBar .= '<a href="' . site_url('faridkot-wala-teeka/page/1') . '" class="button">Begin</a> ';
    if ($page_no + 1 > 1) {
        $navigationBar .= '<a href="' . site_url('faridkot-wala-teeka/page/' . ($page_no - 1)) . '" class="button">Back</a> ';
    }
}

if ($page_no < $lines_count) {
    $navigationBar .= '<a href="' . site_url('faridkot-wala-teeka/page/' . ($page_no + 1)) . '" class="button">Next</a> ';
    if ($page_no - 1 < $lines_count) {
        $navigationBar .= '<a href="' . site_url('faridkot-wala-teeka/page/' . $lines_count) . '" class="button">Last</a> ';
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

<h2>Faridkot Wala Teeka</h2>

<?php

echo $utilityBar . "<br />";
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
                $keyword = $this->session->userdata('book_3_keyword');
                $data = str_ireplace($keyword, '<span class="hl">' . $keyword . '</span>', $data);
            }

            echo '
		<div class="line row1">
		  <p><pre class="lang_1b">' . $data . '</pre></p>
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
        document.location.href = '<?php echo site_url('faridkot-wala-teeka/page'); ?>/' + page_no;
        return false;
    }

    $('.save_as_pdf').click(function () {
        var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=<?php echo current_url(); ?>&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
        window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
        return false;
    });

</script>