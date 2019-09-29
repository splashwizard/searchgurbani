<style type="text/css">

    .lareevar-on {
        color: red;
    }

    .lareevar-off {
        color: #000;
</style>

<?php
global $SG_BNL, $SG_SearchTypes, $SG_SearchLanguage, $SG_Preferences;

$navigationBar
    = '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-6 col-sm-6">
			<div class="ang-search ang-paginate">
			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">
				Goto Ang <input type="text" name="page_no" id="page_no" class="form-control" style="width: 15%" maxlength="5" value="' . $current_page . '" />
				<input type="submit" name="Submit" value="Go" class="btn btn-next">
			</form>
			</div>
		</div>
		
		<div class="col-md-6 col-sm-6 text-right">
		    <div class="ang-paginate">';

$navigationBar .= lareevar_button();

$navigationBar .= social_sharing_button();

if ($current_page > $SG_BNL[$scripture]['page_from']) {
    $navigationBar .= '<button onclick="loadPage(\'' . $SG_BNL[$scripture]['page_from'] . '\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
    if ($current_page + 1 > $SG_BNL[$scripture]['page_from']) {
        $navigationBar .= '<button onclick="loadPage(\'' . ($current_page - 1) . '\')" href="javascript:void(0);" class="btn btn-next">Back</button> ';
    }
}

if ($current_page < $SG_BNL[$scripture]['page_to']) {
    $navigationBar .= '<button onclick="loadPage(\'' . ($current_page + 1) . '\')" href="javascript:void(0);" class="btn btn-next">Next</button> ';
    if ($current_page - 1 < $SG_BNL[$scripture]['page_to']) {
        $navigationBar .= '<button onclick="loadPage(\'' . $SG_BNL[$scripture]['page_to'] . '\')" href="javascript:void(0);" class="btn btn-next">Last</button> ';
    }
}

$navigationBar .= '
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-xs-4"></div>
		<div class="col-md-4 col-xs-4 center">
			<div class="ang-count bold">Displaying Page ' . $current_page . ' <span> of ' . $SG_BNL[$scripture]['page_to'] . '</span></div>
		</div>
		<div class="col-md-4 col-xs-4"></div>	
	</div>	
</div>';


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
             <div class="utility_buttons">
                ' . anchor_popup(site_url($SG_BNL[$scripture]['controller_name_dash'] . '/page/' . $current_page . '/print-view'), '<i class="fa fa-print" title="Print this page"></i>', $atts) . '
                <a href="#" class="remember_this" onclick="remember_this();"><i class="fa fa-star" title="Remember this page"></i></a>&nbsp;&nbsp;&nbsp;
             </div>
        </div>
    ';
?>

<script type="text/javascript">
    $(function () {
        $('.tt').tooltip({
            track: true,
            delay: 0,
            showURL: false,
            showBody: " - ",
            fade: 0,
            width: 100,
            height: 30
        });
    });
</script>

<?php
echo '<div id="page_body">';
echo '<div class="page-content">';
echo '<div class="container-fluid">';
echo '<h3 class="no-top">Bhai Nand Lal -Divan-e-Goya: Ghazals</h3>';


echo $utilityBar;
echo $navigationBar;

$printable_languages = get_printable_languages('ghazal');

if ($lines === false) {
    echo '
	<div class="line row1">
	  <p class="english">No lines found</p>
	</div>
	';
} else {
    $alt_row = 1;
    $share_row = 1;

    if ($SG_Preferences['text_type'] == 'line_by_line') {
        echo '<div class="ang-content">';
        /** Line by Line **/
        foreach ($lines->result() as $line) {

            $highlight = ($highlight_line == $line->lineno ? ' hl2' : '');
            $attributes = '<p class="line_info">' . $line->attrib . '  <br> </p>';
            //$url_shabad_name = url_title($line->shabad_name, 'underscore', TRUE);

            $sharing_data = '<span class="share_icons"><a class="btn btn-default shabad_view" href="' . site_url('bhai-nand-lal/ghazal/shabad/' . $line->shabadID . '/line/' . $line->shabadlineID) . '">Shabad View</a>';

            $sharing_data .= '<a class="btn btn-default verse_view" href="' . site_url('bhai-nand-lal/ghazal/verse/' . $line->verseID) . '">Verse View</a>';

            if ($SG_Preferences["share_text_name"] == "english") {
                $share_data['text'] = $line->punjabi . ' - ' . $line->english;
            } else {
                $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
            }

            $share_data['link'] = site_url('public/shared/bhai-nand-lal/ghazal/page/' . $current_page . '/line/' . $line->lineno);
            $share_data['whatsapp_sharelink'] = site_url('public/bhai-nand-lal/ghazal/page/' . $current_page . '/line/' . $line->lineno);

            $sharing_data .= $this->load->viewPartial('components/share-this', $share_data, true);
            $sharing_data .= '</span>';

            echo '<div class="content-block row row' . $alt_row . $highlight . '">';
            echo '<div class="col-md-10 col-sm-12">';
            foreach ($printable_languages as $printable_language) {
                echo print_line($printable_language, $line, $keywords);//
            }
            echo get_data_by_preferences($attributes, 'show_attributes');
            echo '</div>';

            echo '<div class="col-md-2 col-sm-12 sharediv share' . $share_row . '">';
            echo $sharing_data;
            echo '</div>';
            echo '<br class="clearer" />' .
                '</div>';
            $alt_row = -$alt_row;
            $share_row = -$share_row;
        }
            echo '</div>';
            
        }
else {
    /** Page by Page **/
    foreach ($lines->result() as $line) {
        $i = 0;
        $highlight = ($highlight_line == $line->lineno ? ' hl2' : '');
        foreach ($printable_languages as $printable_language) {
            $printable_languages[$i]['data'] .= print_line($printable_language, $line, $keywords, $highlight);//$keywords
            $i++;
        }
        $alt_row = -$alt_row;
    }

    foreach ($printable_languages as $printable_language) {
        echo '<div class="clearfix"></div>';
        echo '<h6 class="bold">In ' . $printable_language['lang_name'] . '</h6>';
        echo '<div class="line row' . $alt_row . '">';
        echo $printable_language['data'];
        echo '</div>';
        $alt_row = -$alt_row;
    }
}


}

echo $utilityBar;
echo $navigationBar;
echo '</div>';
echo '</div>';
echo '</div>';

?>

<script type="text/javascript">
    var remember_me_url = '<?php echo site_url($remember_me_url); ?>/';
    var pagination_url = '<?php echo site_url($base_url) ?>/';
    var current_url = '<?php echo current_url() ?>';
    var current_page = '<?php echo $current_page ?>';

</script>