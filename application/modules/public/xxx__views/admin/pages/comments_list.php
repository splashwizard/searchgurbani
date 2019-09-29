<h1>Guest Book</h1>
<?php

echo $this->session->flashdata('response');

?>
<table border="0" cellspacing="1" cellpadding="3" class="tbData">
    <tr class="trHead">
        <td>#</td>
        <td>Date</td>
        <td width="50">Name</td>
        <td>Email ID</td>
        <td>Message</td>
        <td>Action</td>
    </tr>
    <?php
    if ($comments != false) {
        foreach ($comments as $comment) {
            $status = $comment->status;
            $class = ($status != 1 ? ' error' : '');
            ?>
            <tr class="trRow1<?php echo $class; ?>">
                <td align="center"><?php echo $comment->id; ?></td>
                <td><?php echo date("d-M-Y", strtotime($comment->datetime)); ?></td>
                <td><?php echo $comment->name; ?></td>
                <td><?php echo $comment->emailid; ?></td>
                <td><?php echo $comment->message; ?></td>
                <td align="center">
                    <?php
                    if ($status == 1) {
                        echo '<a href="' . site_url('admin/guestbook/disable/' . $comment->id) . '"><img src="' . base_url() . "images/icons/disable.png" . '" border="0" /></a>';
                    } else {
                        echo '<a href="' . site_url('admin/guestbook/enable/' . $comment->id) . '"><img src="' . base_url() . "images/icons/tic_icon.jpg" . '" border="0" /></a>';
                    }
                    ?>
                    <a href="<?php echo site_url('admin/guestbook/edit/' . $comment->id); ?>"><img
                            src="<?php echo base_url() . "images/icons/edit.png"; ?>" border="0"/></a>

                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr class="trRow1">
            <td colspan="6">No comments found</td>
        </tr>
        <?php
    }
    ?>
</table>
<p>&nbsp;</p>