<?php
global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;

?>

<center>
    <?php

    $printable_languages = get_printable_languages('ak');

    if ($lines === false) {
        echo '
	<div class="line row1">
	  <p class="english">No lines found</p>
	</div>
	';
    } else {
        $alt_row = 1;

        if ($SG_Preferences['text_type'] == 'line_by_line') {
            /** Line by Line **/
            foreach ($lines->result() as $line) {
                $highlight = ($highlight_line == $line->pagelineno ? ' hl2' : '');

                $url_shabad_name = url_title($line->shabad_name, 'underscore', TRUE);

                $attributes = '<p class="line_info">' . $line->lineno . '   ' . $line->pagelineno . ' ' . $line->lattrib . ' <br> 
			   <a href="' . site_url('public/amrit-keertan/shabad/' . $line->shabad_id . '/' . $url_shabad_name) . '" target="_blank">Shabad: ' . $line->shabad_name . '</a>
			  <br>' . $line->raag . ' ' . $line->author . '</p><br>';

                $sharing_data = '<span class="share_icons">';
                $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
                //$share_data['link'] = site_url('shared/amrit-keertan/page/'.$current_page.'/line/'.$line->pagelineno);
                $share_data['link'] = site_url('public/amrit-keertan/shabad/' . $line->shabad_id . '/' . $url_shabad_name);
                $sharing_data .= $this->load->viewPartial('templates/share_this', $share_data, true);
                $sharing_data .= '</span>';

                echo '<div class="line row' . $alt_row . $highlight . '">';
                foreach ($printable_languages as $printable_language) {
                    echo print_line($printable_language, $line, $keywords);//
                }
                echo get_data_by_preferences($attributes, 'show_attributes');
                echo get_data_by_preferences($sharing_data, 'allow_share_lines');

                echo '<br class="clearer" /></div>';
                $alt_row = -$alt_row;
            }

        } else {
            /** Page by Page **/
            foreach ($lines->result() as $line) {
                $i = 0;
                $highlight = ($highlight_line == $line->pagelineno ? ' hl2' : '');
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
    ?>
</center>