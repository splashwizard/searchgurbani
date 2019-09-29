<?php
global $SG_SearchTypes, $SG_SearchLanguage;
$sess_search_parameters = $this->session->userdata('search_parameters');
?>
<div id="page_body">
<div class="page-content">
    <div class="container-fluid">
        
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr>
                <td width="100%" valign="top" bgcolor="#333333" align="left"></td>
            </tr>
            <tr>
                <td width="100%" valign="top" bgcolor="#ffffff" align="left">
                    <table cellspacing="10" cellpadding="5" border="0">
                        <tbody>
                        <tr>
                            <td>
                                <form action="megasrch.php?Param=hindi" id="form" name="form" method="post">
                                    <?php
                                    if ($sess_search_parameters['individual_search'] != 1) {
                                        echo '<font class="subhead"><b>Scripture:</b></font>';
                                        $this->load->viewPartial('forms/search-results-scripture-combo', array('this_page' => 'bgv'));
                                    }
                                    ?>

                                    <?php
                                    $output = '
                        Find Results : ' . $sess_search_parameters['search_text'] . ' (' . $SG_SearchTypes[$sess_search_parameters['search_type']] . ')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Language : ' . $sess_search_parameters['search_language'];
                                    echo $output;

                                    if ($sess_search_parameters['individual_search'] == 1) {
                                        echo ' <input type="button" value="Goto Advanced Search" class="button" onclick="document.location.href=\'' . site_url('public/bhai-gurdas-vaaran/search') . '\'">';
                                    } else {
                                        echo ' <input type="button" value="Goto Megasearch" class="button" onclick="document.location.href=\'' . site_url('public/scriptures/search') . '\'">';
                                    }
                                    ?>

                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <table width="100%" cellspacing="0" cellpadding="2" border="0">
                        <tbody>
                        <tr>
                            <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="center" class="pageheadergreen"> Bhai
                                Gurdas Vaaran
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="left" class="subhead">
                                <strong>&nbsp;
                                <?php
                                $output = 'Displaying Records ' . $search_results_info['showing_from'] . ' to ' . $search_results_info['showing_to'] . ' of ' . $search_results_info['total_results'] . '.';
                                echo $output;
                                ?>
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" nowrap="" bgcolor="#fceaaa" align="right"></td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            </tbody>
        </table>
        <div class="ang-content">
        <?php

        if ($search_results === false) {
            echo '
            <div class="line row1">
              <p class="english">No lines found</p>
            </div>
            ';
        } else {
            $alt_row = 1;
            $i = 0;
            foreach ($search_results->result() as $line) {
                $i++;

                $attributes = '<a href="' . site_url('bhai-gurdas-vaaran/vaar/' . $line->vaarno . '/pauri/' . $line->paurino . '/line/' . $line->pauri_lineno) . '">
                        Vaar ' . $line->vaarno . ' Pauri ' . $line->paurino . ' Line ' . $line->pauri_lineno . ' ' . $line->pauri_name_roman . '
                    </a>';

                echo '
                <div class="line row' . $alt_row . '">
                    <p class="subhead"><strong>' . $i . '. ' . $attributes . '</strong></p>
                    <p class="lang_1">' . highlight_keywords($sess_search_parameters['search_text'], $line->punjabi, $sess_search_parameters['search_type']) . '</p>
                    <p class="lang_2">' . highlight_keywords($sess_search_parameters['search_text'], $line->translit, $sess_search_parameters['search_type']) . '</p>
                    <p class="lang_3">' . highlight_keywords($sess_search_parameters['search_text'], $line->hindi, $sess_search_parameters['search_type']) . '</p>
                    <p class="lang_4">' . highlight_keywords($sess_search_parameters['search_text'], $line->english, $sess_search_parameters['search_type']) . '</p>
                </div>
                ';

                $alt_row = -$alt_row;
            }
        }

        ?>
        </div>
        <table width="100%" cellspacing="0" cellpadding="2" border="0">
            <tbody>

            <tr>
                <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="left" class="subhead">
                    <strong>&nbsp;
                    <?php
                    $output = 'Displaying Records ' . $search_results_info['showing_from'] . ' to ' . $search_results_info['showing_to'] . ' of ' . $search_results_info['total_results'] . '.';
                    echo $output;
                    ?>
                    </strong>
                </td>
            </tr>

            </tbody>
        </table>
                <br>
        <p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>
        <?php
            echo '</div>';
            echo '</div>';
        ?>
    </div>
</div>
<script type="text/javascript">

    var pagination_url = '<?php echo site_url($base_url) ?>/';
    var current_url = '<?php echo current_url() ?>';

</script>
