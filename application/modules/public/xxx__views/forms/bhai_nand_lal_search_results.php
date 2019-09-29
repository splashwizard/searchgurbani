<?php
global $SG_SearchTypes, $SG_SearchLanguage;
$sess_search_parameters = $this->session->userdata('search_parameters');
   
    echo '<div id="bnl_search_page">';
    echo '<div class="abc">';


?>

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
                                $this->load->viewPartial('forms/search_results_scripture_combo', array('this_page' => 'bnl'));
                            }
                            ?>
                            <br>
                            <?php
                            $output = '
				Find Results : ' . $sess_search_parameters['search_text'] . ' (' . $SG_SearchTypes[$sess_search_parameters['search_type']] . ')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Language : ' . $sess_search_parameters['search_language'];
                            echo $output;

                            if ($sess_search_parameters['individual_search'] == 1) {
                                echo ' <input type="button" value="Goto Advanced Search" class="button" onclick="document.location.href=\'' . site_url('bhai_nand_lal/search_bhai_nand_lal/search_form') . '\'">';
                            } else {
                                echo ' <input type="button" value="Goto Megasearch" class="button" onclick="document.location.href=\'' . site_url('scriptures/search') . '\'">';
                            }
                            ?>

                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
            <table width="100%" cellspacing="0" cellpadding="2" border="0">
                <tbody>
                <tr>
                    <td width="100%" nowrap="nowrap" bgcolor="#fceaaa" align="center" class="pageheadergreen"> Bhai Nand
                        Lal
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
        /*echo "<pre>";
        print_r($line);*/

        if ($line->name == 'Ghazal') {
            $controller = 'ghazal';
            $pageno = $line->no;
            $lineno = $line->lineno;

            $attributes = '<a href="' . site_url('bhai-nand-lal/' . $controller . '/page/' . $pageno . '/line/' . $lineno) . '">
			 	 ' . $line->attrib . '</a>';
        } elseif ($line->name == 'Rubaaee') {
            //exit;
            $controller = 'quatrains';
            $pageno = $line->no - $bnl_constant['quatrains']['db_start_pageID'] + 1;
            $lineno = $line->lineno;

            $attributes = '<a href="' . site_url('bhai-nand-lal/' . $controller . '/page/' . $pageno . '/line/' . $lineno) . '">
			 	 ' . $line->attrib . '</a>';

        } elseif($line->name == 'Zindginama') {
            $controller = 'zindginama';
            $pageno = $line->no - $bnl_constant['zindginama']['db_start_pageID'] + 1;
            $lineno = $line->lineno;
            $attributes = '<a href="' . site_url('bhai-nand-lal/' . $controller . '/page/' . $pageno . '/line/' . $lineno) . '">
			 	 ' . $line->attrib . '</a>';

        } elseif($line->name == 'Ganjnaama') {

            $controller = 'ganjnama';
            $pageno = $line->no - $bnl_constant['ganjnama']['db_start_pageID'] + 1;
            $lineno = $line->lineno;
            $attributes = '<a href="' . site_url('bhai-nand-lal/' . $controller . '/page/' . $pageno . '/line/' . $lineno) . '">
			 	 ' . $line->attrib . '</a>';

        } elseif($line->name == 'Jot Bigaas Persian') {
            $controller = 'jot-bikas-persian';
            $pageno = $line->no - $bnl_constant['jot_bikas_persian']['db_start_pageID'] + 1;
            $lineno = $line->lineno;
            $attributes = '<a href="' . site_url('bhai-nand-lal/' . $controller . '/page/' . $pageno . '/line/' . $lineno) . '">
			 	 ' . $line->attrib . '</a>';

        } elseif($line->name == 'Jot Bigaas Punjabi') {
            $controller = 'jot-bikas';
            $pageno = $line->no - $bnl_constant['jot_bikas']['db_start_pageID'] + 1;
            $lineno = $line->lineno;
            $attributes = '<a href="' . site_url('bhai-nand-lal/' . $controller . '/page/' . $pageno . '/line/' . $lineno) . '">
			 	 ' . $line->attrib . '</a>';
        } elseif($line->name == 'Rahitnama') {
            $controller = 'rahitnama';
            $pageno = $line->no - $bnl_constant['rahitnama']['db_start_pageID'] + 1;
            $lineno = $line->lineno;
            $attributes = '<a href="' . site_url('bhai-nand-lal/' . $controller . '/page/' . $pageno . '/line/' . $lineno) . '">
			 	 ' . $line->attrib . '</a>';
        } elseif($line->name == 'Tankahnama') {
            $controller = 'tankahnama';
            $pageno = $line->no - $bnl_constant['tankahnama']['db_start_pageID'] + 1;
            $lineno = $line->lineno;
            $attributes = '<a href="' . site_url('bhai-nand-lal/' . $controller . '/page/' . $pageno . '/line/' . $lineno) . '">
			 	 ' . $line->attrib . '</a>';
        }
        $i++;
        
        echo '
		<div class="line row' . $alt_row . '">
			<p class="subhead">' . $i . '. ' . $attributes . '</p>
		
			<p class="punjabi">' . highlight_keywords($sess_search_parameters['search_text'], $line->punjabi, $sess_search_parameters['search_type']) . '</p>
			<p class="translit">' . highlight_keywords($sess_search_parameters['search_text'], $line->translit, $sess_search_parameters['search_type']) . '</p>
			<p class="hindi">' . highlight_keywords($sess_search_parameters['search_text'], $line->hindi, $sess_search_parameters['search_type']) . '</p>
			<p class="english">' . highlight_keywords($sess_search_parameters['search_text'], $line->english, $sess_search_parameters['search_type']) . '</p>
		</div>
		';
        //echo $attributes;

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
<?php
    echo '</div>';
    echo '</div>';
?>




<script type="text/javascript">

    function loadPage(index) {
        $.blockUI();
        if (index == undefined) {
            index = 0;
        }
       
        $.ajax({
            url: '<?php echo site_url($base_url); ?>/' + index + '/ajax',
            success: function (data) {
                $('.abc').remove();
                $('#bnl_search_page').html(data);
                
            }
        }).always(function (data){
            $.unblockUI();
        });;

    }

</script>
