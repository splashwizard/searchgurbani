<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <title>Administrator Section - Login</title>
    <link href="<?php echo base_url(); ?>styles/admin.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" style="margin-top:100px;">
    <tr>
        <td width="500" align="center" background="<?php echo base_url(); ?>images/bg.png"><img
                src="<?php echo base_url(); ?>images/logo_mini.png" alt=""/></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#FFFFFF"><h1>Administrator - Login</h1>
            <?php
            echo validation_errors("<div class='error'>", "</div>");
            $error = $this->session->flashdata('error');
            if ($error != "") {
                echo "<div class='error'>" . $error . "</div>";
            }
            $success = $this->session->flashdata('success');
            if ($success != "") {
                echo "<div class='success'>" . $success . "</div>";
            }
            ?>
            <form id="forgotPwd" name="forgotPwd" method="post"
                  action="<?php echo site_url('admin/forgot_password_process'); ?>">
                <table border="0" cellspacing="0" cellpadding="5" style="margin:20px;">
                    <tr>
                        <td>Email Id</td>
                        <td><input type="text" name="emailId"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="sendPassword" value="Send Password"/></td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
</body>
</html>