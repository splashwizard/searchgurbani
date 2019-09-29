<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>success</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('static/admin/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('static/admin/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- Animate.css -->
    <!--    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('static/admin/css/custom.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('static/admin/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body class="login">
<div>


    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">


                <form method="post" id="forgot_password">
                    <p style="color: limegreen;font-size: 25px"><?php echo $login_header; ?></p>
                    <h4>*Please Check your email and click the given link to change your Password.</h4>

                    <div class="clearfix"></div>

                    <div class="separator"></div>
                </form>
                <a class="btn btn-default" href="<?php echo base_url('admin/login'); ?>"><span style="font-size: 15px">Login</span></a>
            </section>
        </div>

    </div>
</div>
</body>
</html>