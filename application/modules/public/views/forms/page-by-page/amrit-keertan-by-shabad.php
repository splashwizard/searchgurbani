<?php
    global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;
    
    $atts = array(
        'width'      => '600',
        'height'     => '400',
        'scrollbars' => 'yes',
        'status'     => 'yes',
        'resizable'  => 'yes',
        'screenx'    => '0',
        'screeny'    => '0'
    );
    
    $navigationBar
        = '
<div class="utility-bar2">
   <div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="ang-paginate pull-right">';
    
    $navigationBar .= social_sharing_button();
    
    $navigationBar
        .= '
            </div>
        </div>
	</div>
</div>';
    
    $utilityBar
        = '
        <div class="utility-bar1 text-right">
            <div class="utility_buttons">
			' . anchor_popup(current_url() . '/print-view',
            '<i class="fa fa-print" title="Print this page"></i>', $atts) . '
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

<div class="page-content">
    <div class="container-fluid">
        <div style="background-color:#fceaaa" align="center">
            <h3 class="no-top"><?php echo $shabad_info->shabad_name . '<br />' .
                                          $shabad_info->shabad_punjabi; ?></h3>
            <p>
                <?php echo "
  	<strong>This shabad is by " . $shabad_info->author . " in " . $shabad_info->raag .
                           " on Page " . $shabad_info->pageno . "<br />
	in Section '" . $shabad_info->section_name . "' of Amrit Keertan Gutka.</strong>
  ";
                ?>
            </p>
        </div>
        
        <?php
            echo $utilityBar;
            echo $navigationBar;
    
            if (!empty($youtubeID['youtubeID'])) {
        
                echo '<div class="row">';
                echo '<div class="col-xs-12" style="padding-top: 10px;">';
                echo '<iframe class="shabad-youtube" src="https://www.youtube.com/embed/' .
                     $youtubeID['youtubeID'] .
                     '" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
                echo '</div>';
            }
            
            $printable_languages = get_printable_languages('ak');
            echo '<div class="ang-content">';
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
                    foreach ($lines as $line) {
                        $highlight = ($highlight_line == $line->pagelineno ? ' hl2' : '');
                        //                    $attributes = '<p class="line_info">' . $line->raag . ' ' . $line->author . '</p>';
                        
                        $attributes = '<p class="line_info">' . $line->lattrib . ' <br> ' .
                                      $line->raag . ' ' . $line->author . '
			        </p>';
                        
                        $sharing_data
                            = '<span class="share_icons"><a class="btn btn-default ang_view" href="' .
                              site_url('amrit-keertan/page/' . $line->pageno . '/line/' .
                                       $line->pagelineno) . '"> Page View</a>';
                        if ($SG_Preferences["share_text_name"] == "english") {
                            $share_data['text'] = $line->punjabi . ' - ' . $line->english;
                        } else {
                            $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
                        }
                        $share_data['link'] = site_url('shared/amrit-keertan-shabad/shabad/' .
                                                       $shabad_info->shabad_id .
                                                       '/shabad-text/line/' . $line->pagelineno);
                        $share_data['whatsapp_sharelink']
                            = site_url('amrit-keertan-shabad/shabad/' . $shabad_info->shabad_id .
                                       '/shabad-text/line/' . $line->pagelineno);
                        $sharing_data .= $this->load->viewPartial('components/share-this',
                            $share_data, true);
                        $sharing_data .= '</span>';
                        
                        echo '<div class="content-block row row' . $alt_row . $highlight . '">';
                        echo '<div class="col-md-10 col-sm-12">';
                        echo '<div class="row">';
                        echo '<div class="col-md-9 col-sm-12">';
                        
                        foreach ($printable_languages as $printable_language) {
                            if ($printable_language['lang_name'] == 'Punctuations Gurmukhi') {
                                $printable_language['lang_name'] = 'Gurmukhi';
                                $printable_language[0] = 'lang_1';
                                $printable_language[1] = 'punjabi';
                            }
                            echo print_line($printable_language, $line, $keywords);//$keywords
                        }
                        echo get_data_by_preferences($attributes, 'show_attributes');
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        
                        echo '<div class="col-md-2 col-sm-12 sharediv share' . $share_row . '">';
                        echo $sharing_data;
                        echo '</div>';
                        echo '<br class="clearer" />' .
                             '</div>';
                        $alt_row = -$alt_row;
                        $share_row = -$share_row;
                    }

            }
            else {
            /** Page by Page **/
            foreach ($lines as $line) {
                $i = 0;
                $highlight = ($highlight_line == $line->pagelineno ? ' hl2' : '');
                foreach ($printable_languages as $printable_language) {
                    $printable_languages[$i]['data'] .= print_line($printable_language, $line,
                        $keywords, $highlight);//$keywords
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
            echo '</div>';
        ?>
    </div>
</div>
