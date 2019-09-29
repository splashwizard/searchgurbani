<?php
global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;

$atts = array(
    'width' => '600',
    'height' => '400',
    'scrollbars' => 'yes',
    'status' => 'yes',
    'resizable' => 'yes',
    'screenx' => '0',
    'screeny' => '0'
);
$navigationBar = '<div class="utility-bar2">
                       <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="ang-paginate pull-right">';
$navigationBar .= social_sharing_button();
$navigationBar .= '            </div>
                            </div>
                       </div>
                  </div>
';

$utilityBar = '
        <div class="utility-bar1 text-right">
             <div class="utility_buttons">
                ' . anchor_popup(current_url() . '/print-view', '<i class="fa fa-print" title="Print this page"></i>', $atts) . '&nbsp;
            </div>
        </div>
';
?>
<script src="<?php echo base_url(min_root_loc()); ?>static/js/jquery.dimensions.js" type="text/javascript"></script>
<script src="<?php echo base_url(min_root_loc()); ?>static/js/jquery.tooltip.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.tt').tooltip({
            track: true,
            delay: 0,
            showURL: false,
            showBody: " - ",
            fade: 0
        });
    });

</script>
<?php
/*echo "</pre>";
print_r($shabad_info);
echo "<pre>";*/
?>
<div class="page-content">
    <div class="container-fluid">

        <div style="background-color:#fceaaa" align="center">

            <p>
                <?php
                $first_line = '<div style="text-align: -webkit-center">';
                foreach ($lines->result() as $line) {

                    if ($highlight_line == $line->shabadlineno) {

                        $first_line .= '<h3>' . $line->punjabi . '</h3></div>';
                        echo $first_line;
                    }
                }
                echo "
            <strong>This shabad is on page " . $shabad_info[0]->pageID . "   of Bhai Nand Lal.</strong>
          ";
                ?>
                <br>
                <br>

            </p>
        </div>

        <?php
        echo $utilityBar;
        echo $navigationBar;

        $printable_languages = get_printable_languages('jot_bikas_persian');

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
                //        $first_line ='<div style="text-align: -webkit-center">';
                //        $first_row = '';
                //        $rest_row = '';
                foreach ($lines->result() as $line) {


                    $highlight = ($highlight_line == $line->shabadlineno ? ' hl2' : '');
                    $attributes = '<a href="' . site_url('bhai-nand-lal/jot-bikas-persian/page/' . ($line->pageID - 143) . '/line/' . $line->pagelineID) . '">page:' . ($line->pageID - 143) . ' Line: ' . $line->pagelineID . '</a>
                      </p>';

                    $sharing_data = '<span class="share_icons"><a class="btn btn-default ang_view" href="' . site_url('bhai-nand-lal/jot-bikas-persian/page/' . ($line->pageID - 143) . '/line/' . $line->pagelineID) . '">Page View</a>';

                    $sharing_data .= '<a class="btn btn-default verse_view" href="' . site_url('bhai-nand-lal/ganjnama/verse/' . $line->verseID) . '"> Verse View</a>';

                    if ($SG_Preferences["share_text_name"] == "english") {
                        $share_data['text'] = $line->punjabi . ' - ' . $line->english;
                    } else {
                        $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
                    }

                    $share_data['link'] = site_url('shared/bhai-nand-lal-shabad/jot-bikas-persian/shabad/' . $line->shabadID . '/line/' . $line->shabadlineID);
                    $share_data['whatsapp_sharelink'] = site_url('bhai-nand-lal-shabad/jot-bikas-persian/shabad/' . $line->shabadID . '/line/' . $line->shabadlineID);

                    $sharing_data .= $this->load->viewPartial('components/share-this', $share_data, true);
                    $sharing_data .= '</span>';

                    echo '<div class="content-block row row' . $alt_row . $highlight . '">';
                    echo '<div class="col-md-10 col-sm-12">';
                    foreach ($printable_languages as $printable_language) {
                        echo print_line($printable_language, $line, $keywords);//$keywords
                    }
                    echo '</div>';

                    echo '<div class="col-md-2 col-sm-12 sharediv share' . $share_row . '">';
                    echo $sharing_data;
                    echo '</div>';
                    echo '<br class="clearer" />' .
                        '</div>';
                    $alt_row = -$alt_row;
                    $share_row = -$share_row;
                }
            } else {
                /** Page by Page **/
                foreach ($lines->result() as $line) {
                    $i = 0;
                    $highlight = ($highlight_line == $line->pagelineID ? ' hl2' : '');
                    foreach ($printable_languages as $printable_language) {
                        $printable_languages[$i]['data'] .= print_line($printable_language, $line, $keywords, $highlight);//$keywords
                        $i++;
                    }
                    $alt_row = -$alt_row;
                }

                foreach ($printable_languages as $printable_language) {
                    echo '<p><strong>In ' . $printable_language['lang_name'] . '</strong></p>';
                    echo '<div class="line row' . $alt_row . '">';
                    echo $printable_language['data'];
                    echo '</div>';
                    $alt_row = -$alt_row;
                }
            }

        }

        echo $utilityBar;
        echo $navigationBar;
        ?>
    </div>
</div>
