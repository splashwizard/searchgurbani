<style>
    .lareevar-on {
        color: red;
    }

    .lareevar-off {
        color: #000;
    }
</style>

<?php
global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;


    $navigationBar
            = '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-6 col-sm-6">
			<div class="ang-search ang-paginate">
			<form name="goto_page" id="goto_page" action="" method="post" onsubmit="return gotoPage(this);">
				Goto Pauri <input type="text" name="page_no" id="page_no" class="form-control" style="width: 15%" maxlength="5" value="' . $current_pauri . '" />
				<input type="submit" name="Submit" value="Go" class="btn btn-next">
			</form>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 text-right">
		    <div class="ang-paginate"><a class="btn btn-next" href="' . site_url('public/'.$SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/vaar-index/' . $current_vaar) . '" class="button">Vaar Index</a>';

    $navigationBar .= lareevar_button();

    $navigationBar .= social_sharing_button();

    if ($current_pauri > 1) {
        $start_pauri = 1 ;
        $navigationBar .= '<button onclick="loadPage_bhai_gurdas(\'' . $current_vaar.'\',\''.$start_pauri.'\')" href="javascript:void(0);" class="btn btn-next">Begin</button> ';
        if ($current_pauri + 1 > 1) {
            $navigationBar .= '<button onclick="loadPage_bhai_gurdas(\'' . $current_vaar.'\',\''.($current_pauri - 1).'\')" href="javascript:void(0);" class="btn btn-next">Back</button> ';
        }
    }

    if ($current_pauri < $pauri_count) {
        $navigationBar .= '<button onclick="loadPage_bhai_gurdas(\'' . $current_vaar.'\',\''.($current_pauri + 1).'\')" href="javascript:void(0);" class="btn btn-next">Next</button> ';
        if ($current_pauri - 1 < $pauri_count) {
            $navigationBar .= '<button onclick="loadPage_bhai_gurdas(\'' . $current_vaar.'\',\''.$pauri_count.'\')" href="javascript:void(0);" class="btn btn-next">Last</button> ';
        }
    }

    $navigationBar .='
			</div>
		</div>
	</div>	
	<div class="row">
            <div class="col-md-4 col-xs-4"></div>
            <div class="col-md-4 col-xs-4 center">
                <div class="ang-count bold">Displaying Vaar ' . $current_vaar . ', Pauri ' . $current_pauri . ' of ' . $pauri_count . '</span></div>
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
                ' . anchor_popup(site_url($SG_ScriptureTypes[$scripture]['controller_name_dash'] . '/vaar/' . $current_vaar .'/pauri/' . $current_pauri .'/print-view'), '<i class="fa fa-print" title="Print this page"></i>', $atts) . '
                <a href="#" class="remember_this" onclick="remember_this_bgv();"><i class="fa fa-star" title="Remember this page"></i></a>&nbsp;&nbsp;
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
echo '<h3 class="no-top">' . $SG_ScriptureTypes[$scripture][1] . '</h3>';
echo '<div class="row">';
echo '<div class="col-md-4 col-sm-4"></div>';
echo '<div class="col-md-4 col-sm-4" style="text-align: center">';

echo '<h3>';
if (isset($pauri_info->pauri_name_roman)) {
    echo $pauri_info->pauri_name_roman . "<br />";
}
if (isset($pauri_info->pauri_name_roman)) {
    echo $pauri_info->pauri_name_punjabi;
}
echo '</h3>';
echo '</div>';
echo '<div class="col-md-4 col-sm-4"></div>';
echo '</div>';
echo $utilityBar;
echo $navigationBar;

$printable_languages = get_printable_languages('bgv');

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
        /** Line by Line **/
        echo '<div class="ang-content">';
        foreach ($lines->result() as $line) {
            $highlight = ($highlight_line == $line->pauri_lineno ? ' hl2' : '');

            $attributes = '<p class="line_info"> ' . $line->lattrib . '</p>';

            $sharing_data = '<span class="share_icons">';
            if($SG_Preferences["share_text_name"] == "english"){
                $share_data['text'] = $line->punjabi . ' - '.$line->english;
            }else{
                $share_data['text'] = $line->punjabi . ' - '.$line->translit;
            }
            $share_data['link'] = site_url('shared/bhai-gurdas-vaaran/vaar/' . $current_vaar . '/pauri/' . $current_pauri . '/line/' . $line->pauri_lineno);
            $share_data['whatsapp_sharelink'] = site_url('bhai-gurdas-vaaran/vaar/' . $current_vaar . '/pauri/' . $current_pauri . '/line/' . $line->pauri_lineno);
            $sharing_data .= $this->load->viewPartial('components/share-this', $share_data, true);
            $sharing_data .= '</span>';

            echo '<div class="content-block row row' . $alt_row . $highlight . '">';
            echo '<div class="col-md-10 col-sm-12">';
            foreach ($printable_languages as $printable_language) {
                echo print_line($printable_language, $line, $keywords);//$keywords
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

    } else {
        /** Page by Page **/
        foreach ($lines->result() as $line) {
            $i = 0;
            $highlight = ($highlight_line == $line->pauri_lineno ? ' hl2' : '');
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
    var current_page = '<?php echo $current_pauri ?>';
    var current_vaar ='<?php echo $current_vaar ?>'
</script>