<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <link href="<?php echo base_url(); ?>styles/admin.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url(); ?>scripts/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">
        var timeout = 500;
        var closetimer = 0;
        var ddmenuitem = 0;

        function jsddm_open() {
            jsddm_canceltimer();
            jsddm_close();
            ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');
        }

        function jsddm_close() {
            if (ddmenuitem) ddmenuitem.css('visibility', 'hidden');
        }

        function jsddm_timer() {
            closetimer = window.setTimeout(jsddm_close, timeout);
        }

        function jsddm_canceltimer() {
            if (closetimer) {
                window.clearTimeout(closetimer);
                closetimer = null;
            }
        }

        $(document).ready(function () {
            $('#jsddm > li').bind('mouseover', jsddm_open);
            $('#jsddm > li').bind('mouseout', jsddm_timer);
        });
        document.onclick = jsddm_close;
    </script>
    <title>Administrator Section</title>
</head>
<body>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#cccccc">
    <tr>
        <td align="left" background="<?php echo base_url(); ?>images/bg.png">
            <a href="<?php echo site_url('admin/home/welcome'); ?>"><img src="<?php echo base_url(); ?>images/logo.jpg"
                                                                         alt="" border="0"/></a>
        </td>
    </tr>
    <tr>
        <td bgcolor="#CCCCCC">
            <ul id="jsddm">
                <li><a href="<?php echo site_url('admin/guestbook') ?>">Guest Book</a></li>
                <li><a href="<?php echo site_url('admin/home/logout'); ?> ">Logout</a></li>
            </ul>
            <div class="clear"></div>
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff">
            <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#FFFFFF">
                <tr>
                    <td height="195" valign="middle"><!-- Content starts here -->
