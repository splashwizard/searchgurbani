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

$utilityBar = '
        <div class="utility-bar1 text-right">
            <div class="utility_buttons">
			' . anchor_popup(current_url() . '/print-view', '<i class="fa fa-print" title="Print this page"></i>', $atts) . '
		    </div>
        </div>
';

?>
<div class="page-content">
    <div class="container-fluid">
        <?php
        echo $utilityBar;

        echo '<h2 class="no-top">' . $title . '</h2><br />';
        if ($lines != false) {
            foreach ($lines->result() as $line) {
                echo '<div class="line"><p class="lang_1">' . $line->punjabi . '</p>';

                if ($SG_Preferences["share_text_name"] == 'english') {
                    echo '<p class="lang_2">' . $line->english . '</p>';
                } else {
                    echo '<p class="lang_2">' . $line->translit . '</p>';
                }

                echo '<p class="lang_3">' . $line->hindi . '</p>';

                if ($table == 'N01') {
                    if ($name == 'quatrains') {
                        $page_ID = $line->pageID - 63;
                    } else if ($name == 'zindginama') {
                        $page_ID = $line->pageID - 82;
                    } else if ($name == 'ganjnama') {
                        $page_ID = $line->pageID - 124;
                    } else if ($name == 'jot-bikas') {
                        $page_ID = $line->pageID - 158;
                    } else if ($name == 'jot-bikas-persian') {
                        $page_ID = $line->pageID - 143;
                    } else if ($name == 'rahitnama') {
                        $page_ID = $line->pageID - 162;
                    } else if ($name == 'tankahnama') {
                        $page_ID = $line->pageID - 166;
                    } else {
                        $page_ID = $line->pageID;
                    }
                    $line_id = $line->pagelineID;
                    $link = site_url('bhai-nand-lal/' . $name . '/page/' . $page_ID . '/line/' . $line_id);
                    $attributes = 'Page: ' . $page_ID . ', Line: ' . $line_id;
                } else if ($table == 'S01') {
                    $line_id = $line->lineID;
                    $link = site_url('guru-granth-sahib/ang/' . $line->pageID . '/line/' . $line_id);
                    $attributes = 'Ang: ' . $line->pageID . ', Line: ' . $line_id;
                } else {
                    $line_id = $line->pagelineID;
                    $link = site_url('dasam-granth/page/' . $line->pageID . '/line/' . $line_id);
                    $attributes = 'Ang: ' . $line->pageID . ', Line: ' . $line_id;
                }


                echo '<p><a href="' . $link . '"class="btn btn-default">' . $attributes . '</a></p></div>';
            }
        } else {
            echo '<h2>Oops! The data you want to see here is not found</h2>';

            echo '<p><a href="' . site_url() . '"class="btn btn-default">Goto Website</a></p>';
        }

        ?>
    </div>
</div>
