<?php

global $SG_SearchTypes, $SG_SearchLanguage;

$sess_search_parameters = $this->session->userdata('search_parameters');

?>
<link href="http://ci2.searchgurbani.com/Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="http://ci2.searchgurbani.com/Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>
<style>
    .content_inner {
        margin: 0 auto;
        overflow-x: hidden;
        overflow-y: scroll;
        padding: 0 10px 0 0;
        width: 98%;
    }
</style>
<div id="wrapper">
    <div class="content">
        <h1>Sri Guru Granth Sahib<span class="right"><a onclick="switchPage('extra0', 'index')"
                                                        href="http://ci2.searchgurbani.com/scriptures/main_mob">back</a></span>
        </h1>
        <div class="content_inner">


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

                                            $this->load->view('forms/search-results-scripture-combo', array('this_page' => 'ggs'));

                                        }

                                        ?>

                                        <br>


                                    </form>
                                </td>

                            </tr>

                            </tbody>

                        </table>

                        <table width="100%" cellspacing="0" cellpadding="2" border="0">

                            <tbody>

                            <tr>

                                <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="center"
                                    class="pageheadergreen"> Sri Guru Granth Sahib
                                </td>

                            </tr>

                            <tr>

                                <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="left" class="subhead"><?php

                                    $output = 'Displaying Records ' . $search_results_info['showing_from'] . ' to ' . $search_results_info['showing_to'] . ' of ' . $search_results_info['total_results'] . '.';

                                    echo $output;

                                    ?>

                                </td>

                            </tr>

                            <tr>

                                <td width="100%" nowrap="" bgcolor="#fceaaa" align="right"></td>

                            </tr>

                            </tbody>

                        </table>

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


                    /*?><p class="subhead">'.$i.'. '.get_data_by_preferences($attributes, 'show_attributes').'</p><?php */


                    echo '

		<div class="line row' . $alt_row . '">

		

			<p class="punjabi">' . highlight_keywords($sess_search_parameters['search_text'], $line->punjabi, $sess_search_parameters['search_type']) . '</p>

			<p class="translit">' . highlight_keywords($sess_search_parameters['search_text'], $line->translit, $sess_search_parameters['search_type']) . '</p>

			<p class="hindi">' . highlight_keywords($sess_search_parameters['search_text'], $line->hindi, $sess_search_parameters['search_type']) . '</p>

			<p class="english">' . highlight_keywords($sess_search_parameters['search_text'], $line->english, $sess_search_parameters['search_type']) . '</p>

		</div>

		';


                    $alt_row = -$alt_row;

                }

            }


            ?>

            <table width="100%" cellspacing="0" cellpadding="2" border="0">

                <tbody>

                <tr>

                    <td></td>

                </tr>

                <tr></tr>

                <tr>

                    <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="left" class="subhead"><?php

                        $output = 'Displaying Records ' . $search_results_info['showing_from'] . ' to ' . $search_results_info['showing_to'] . ' of ' . $search_results_info['total_results'] . '.';

                        echo $output;

                        ?>

                    </td>

                </tr>

                <tr>

                    <td></td>

                    <td width="100%" nowrap="" bgcolor="#fceaaa" align="right"></td>

                </tr>

                </tbody>

            </table>

            <p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>
        </div>
    </div>
</div>

