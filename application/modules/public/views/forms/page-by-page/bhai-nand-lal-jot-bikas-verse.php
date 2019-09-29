<?php
global $SG_Preferences;

$atts = array(
    'width' => '600',
    'height' => '400',
    'scrollbars' => 'yes',
    'status' => 'yes',
    'resizable' => 'yes',
    'screenx' => '0',
    'screeny' => '0'
);

$navigationBar = '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="ang-paginate text-right">';

$navigationBar .= social_sharing_button();
if($current_page > $start_page && $current_page != $start_page){

    $navigationBar .= '<button onclick="loadPage(\'' . ($current_page - 1) . '\')" href="javascript:void(0);" class="btn btn-next">Previous</button> ';
}
if($current_page >= $start_page && $current_page != $end_page){

    $navigationBar .= '<button onclick="loadPage(\'' . ($current_page + 1) . '\')" href="javascript:void(0);" class="btn btn-next">Next</button> ';
}
$navigationBar .= '
            </div>
        </div>
	</div>
</div>';

$utilityBar = '
        <div class="utility-bar1 text-right">
            <div class="utility_buttons">
			' . anchor_popup(base_url('bhai-nand-lal/jot-bikas/verse/'. $current_page) . '/print-view', '<i class="fa fa-print" title="Print this page"></i>', $atts) . '
		    </div>
        </div>
';


?>
<div id="page_body">
<div class="page-content">
    <div class="container-fluid">
        <?php
        echo '<h2 class="no-top">' . $meta_title . '</h2>';
        echo $utilityBar;
        echo $navigationBar;


        if ($data === false) {
            echo '
            <div class="line row1">
              <p class="english">No lines found</p>
            </div>
            ';
        } else {

            $alt_row = 1;
            $share_row = 1;

            foreach ($data as $data) {
                echo '<div class="content-block row row' . $alt_row .'">';
                echo '<div class="col-md-10 col-sm-12">';

                echo '<p class="line"><p class="lang_1">' . $data['punjabi'] . '</p></p>';

                if ($SG_Preferences["share_text_name"] == 'english') {
                    echo '<p class="lang_2">' . $data['english'] . '</p>';
                } else {
                    echo '<p class="lang_2">' . $data['translit'] . '</p>';
                }

                echo '<p class="lang_3">' . $data['hindi'] . '</p>';
                echo '</div>';

                $sharing_data = '<span class="share_icons">';
                
                $sharing_data .= '<a class="btn btn-default ang_view" href="' . site_url('bhai-nand-lal/jot-bikas/page/' . ($data['pageID'] - 158) . '/line/' . $data['pagelineID']) . '">Page View</a>';
                
                $sharing_data .= '<a class="btn btn-default shabad_view" href="'.site_url('bhai-nand-lal/jot-bikas/shabad/'. $data['shabadID'] . '/line/' . $data['shabadlineID']).'">Shabad View</a>';

                if ($SG_Preferences["share_text_name"] == "english") {
                    $share_data['text'] = $data['punjabi'] . ' - ' . $data['english'];
                } else {
                    $share_data['text'] = $data['punjabi'] . ' - ' . $data['translit'];
                }

                $share_data['link'] = site_url('shared/bhai-nand-lal/jot-bikas/verse/' . $data['verseID']);
                $share_data['whatsapp_sharelink'] = site_url('bhai-nand-lal/jot-bikas/verse/' . $data['verseID']);

                $sharing_data .= $this->load->viewPartial('components/share-this', $share_data, true);
                $sharing_data .= '</span>';

                echo '<div class="col-md-2 col-sm-12 sharediv share' . $share_row . '">';
                echo $sharing_data;
                echo '</div>';
                echo '<br class="clearer" />' . '</div>';
                $alt_row = -$alt_row;
                $share_row = -$share_row;
            }
        }


        ?>
    </div>
</div>
</div>

<script type="text/javascript">
    var pagination_url = '<?php echo site_url($base_url) ?>/';
</script>