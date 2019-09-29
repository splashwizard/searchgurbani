<?php
$ar_status = array(1 => "Display", 0 => "Hide");
?>
<h1>Guest Book - Edit</h1>
<form action="<?php echo site_url('admin/guestbook/update'); ?>" method="post">
    <table border="0" cellspacing="0" cellpadding="3" class="tbData">
        <tr class="trRow-1">
            <td>ID#</td>
            <td><input name="id" type="hidden" value="<?php echo $comment->id; ?>"/><?php echo $comment->id; ?></td>
        </tr>
        <tr class="trRow1">
            <td>Name</td>
            <td><input name="name" type="text" value="<?php echo $comment->name; ?>" maxlength="30"/></td>
        </tr>
        <tr class="trRow1">
            <td>Email ID</td>
            <td><input name="emailid" type="text" value="<?php echo $comment->emailid; ?>" maxlength="100"/></td>
        </tr>
        <tr class="trRow1">
            <td>Message</td>
            <td><textarea name="message" rows="3" cols="40"><?php echo $comment->message; ?></textarea></td>
        </tr>
        <tr class="trRow-1">
            <td>Status</td>
            <td><?php echo form_dropdown('status', $ar_status, $comment->status); ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input name="submit" type="submit" value="Update Changes"/>
                <a href="<?php echo site_url('admin/guestbook'); ?>">Cancel</a></td>
        </tr>
    </table>
</form>
<p>&nbsp;</p>