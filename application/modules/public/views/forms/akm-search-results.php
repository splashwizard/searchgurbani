<?php
global $SG_SearchTypes, $SG_SearchLanguage;
$sess_search_parameters = $this->session->userdata('search_parameters');
?>
<link href="<?= base_url() ?>Mobile/css/default.css" rel="stylesheet" type="text/css"/>
<link href="<?= base_url() ?>Mobile/css/iphone.css" rel="stylesheet" type="text/css"/>

<div id="wrapper">
    <div class="content">
        <h1>Amrit Keertan <span class="right"><a href="<?= base_url() ?>scriptures/" style="margin-right:10px;">Home</a><a
                    href="<?= base_url() ?>scriptures/search_form">back</a></span></h1>
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
                                <?php /*?><td><form action="megasrch.php?Param=hindi" id="form" name="form" method="post">
              
			  <?php 
			  if($sess_search_parameters['individual_search'] != 1)
			  {
			  	echo '<font class="subhead"><b>Scripture:</b></font>';
			  	$this->load->view('forms/search-results-scripture-combo',array('this_page'=>'ak'));
			  }
			  
			  ?><br>
				<?php 
				$output = '
				Find Results : '.$sess_search_parameters['search_text'].' ('.$SG_SearchTypes[$sess_search_parameters['search_type']].')&nbsp;&nbsp;Language : '.$sess_search_parameters['search_language'];
				
				if($sess_search_parameters['individual_search'] == 1)
					$output .= "&nbsp;&nbsp;Author: " . $sess_search_parameters['search_author']. "&nbsp;&nbsp;Raag: " .$sess_search_parameters['search_raag'] ;
				
				echo $output;
				
				
				if($sess_search_parameters['individual_search'] == 1)
				{
					echo ' <input type="button" value="Goto Advanced Search" class="button" onclick="document.location.href=\''.site_url('amrit-keertan/search').'\'">';
				}
				else
				{
					echo ' <input type="button" value="Goto Megasearch" class="button" onclick="document.location.href=\''.site_url('scriptures/search').'\'">';
				}
				
				
				?>
                  
                </form></td><?php */ ?>
                            </tr>
                            </tbody>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="2" border="0">
                            <tbody>
                            <tr>
                                <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="center"
                                    class="pageheadergreen"> Amrit Keertan
                                </td>
                            </tr>
                            <tr>
                                <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="left" class="subhead">
                                    <?php
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
                        <p class="pagination_links"><?php echo $pagination_links; ?>&nbsp;</p>
                    </td>
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
                    $url_shabad_name = url_title($line->shabad_name, 'underscore', TRUE);

                    $attributes = '<a href="' . site_url('scriptures/page/' . $line->pageno . '/line/' . $line->pagelineno) . '">Page ' . $line->pageno . ' Line ' . $line->pagelineno . '  ' . $line->raag . ': ' . $line->author . '</a><br />';

                    $lines = display_lines_of('ak', $line);

                    echo '<div class="line row' . $alt_row . '"><p class="subhead"> ' . $i . '. ' .
                        $attributes .
                        '
					<a href="' . site_url('scriptures/m_shabad/' . $line->shabad_id . '/' . $url_shabad_name . '/line/' . $line->pagelineno) . '">Shabad :' . $line->shabad_id . ' - ' . $line->shabad_name . '</a>
			    </p>
				<p class="punjabi">' . highlight_keywords($sess_search_parameters['search_text'], $line->punjabi, $sess_search_parameters['search_type']) . '</p>
				<p class="translit">' . highlight_keywords($sess_search_parameters['search_text'], $line->translit, $sess_search_parameters['search_type']) . '</p>
				<p class="hindi">' . highlight_keywords($sess_search_parameters['search_text'], $line->hindi, $sess_search_parameters['search_type']) . '</p>
				<p class="english">' . highlight_keywords($sess_search_parameters['search_text'], $line->english, $sess_search_parameters['search_type']) . '</p>
				</div>';

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
                    <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="left" class="subhead">
                        <?php
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