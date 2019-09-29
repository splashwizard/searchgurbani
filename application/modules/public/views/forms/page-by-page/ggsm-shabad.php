<?php

global $SG_SearchTypes, $SG_ScriptureTypes, $SG_SearchLanguage, $SG_Preferences;
?>
<link href="<?= base_url() ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="http://ci2.searchgurbani.com/scripts/jquery.min.js"></script>
<style>
    .content_inner {

        margin: 0 auto;
        padding: 0 10px 0 0;
        width: 100%;
    }

</style>
<div id="wrapper">
    <div class="content">
        <h1>Sri Guru Granth Sahib<span class="right"><a href="<?= base_url() ?>scriptures/" style="margin-right:10px;">Home</a><?php if (isset($_SERVER['HTTP_REFERER'])) { ?>
                    <a href="<?= $_SERVER['HTTP_REFERER'] ?>">back</a><?php } ?></span></h1>
        <div class="content_inner">
            <?php

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
		</div>
	</span>
	<br class="clearer" />
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


            <div style="background-color:#fceaaa" align="center">
                <h2><?php echo $shabad_info[0]->translit . '<br />' . $shabad_info[0]->punjabi; ?></h2>
                <p>
                    <?php echo "
  	<strong>This shabad is by " . $shabad_info[0]->author . " in " . $shabad_info[0]->raag . " on Ang " . $shabad_info[0]->pageno . "<br />
	 of Guru Granth Sahib.</strong>
  ";
                    ?>
                </p>
            </div>

            <?php
            echo $utilityBar;

            $printable_languages = get_printable_languages('ggs');

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
                        /*echo "<pre>";
                        print_r($line);
                        echo "</pre>";*/
                        $highlight = ($highlight_line == $line->shabadlineno ? ' hl2' : '');
                        $attributes = '<p class="line_info">' . $line->shabadlineno . ' ' . $line->pattrib . ' <br> ' . $line->raag . ' ' . $line->author . ' 
			  <a href="' . site_url('scriptures/ang/' . $line->pageno) . '">Page:' . $line->pageno . ' Line: ' . $line->pagelineno . '</a>  
			  </p>';

                        $sharing_data = '<span class="share_icons">';
                        $share_data['text'] = $line->punjabi . ' - ' . $line->translit;
                        $share_data['link'] = site_url('shared/guru-granth-sahib/shabad/' . $shabad_info[0]->shabad_id . '/line/' . $line->shabadlineno);
                        $share_data['whatsapp_sharelink'] = site_url('guru-granth-sahib/shabad/' . $shabad_info[0]->shabad_id . '/line/' . $line->shabadlineno);
                        $sharing_data .= $this->load->view('templates/share-this', $share_data, true);
                        $sharing_data .= '</span>';

                        echo '<div class="line row' . $alt_row . $highlight . '">';
                        foreach ($printable_languages as $printable_language) {
                            echo print_line($printable_language, $line, $keywords);//$keywords
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

            echo $utilityBar;
            ?>
        </div>
    </div>
</div>