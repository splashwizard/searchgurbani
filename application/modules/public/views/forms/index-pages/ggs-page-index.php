<!--start-->

<table width="100%" cellspacing="1" cellpadding="5" border="0">
    <tbody>
    <tr>
        <td colspan="2"><h2>Guru Granth Sahib Jee - Gurbani Index</h2></td>
    </tr>
    <tr class="psrwhite">
        <td width="426" bgcolor="#f6b906"><strong>Writer/Bani</strong></td>
        <td width="101" bgcolor="#f6b906"><strong>Page </strong></td>
    </tr>

    <?php


    foreach ($chapters->result() as $chapter) {
        if ($chapter->page_id == 0) {
            echo '
<tr bgcolor="#f6b906">
  <td class="bodycopy" colspan="2">' . $chapter->chapter_name . '</td>
</tr>
		';
        } else {
            echo '
<tr>
  <td class="bodycopy">' . $chapter->chapter_name . '</td>
  <td class="subhead"><a href="' . site_url('public/guru-granth-sahib/ang/' . $chapter->page_id) . '">' . $chapter->page_id . '</a></td>
</tr>
		';
        }

    }


    ?>
    </tbody>
</table>
<!--end-->
