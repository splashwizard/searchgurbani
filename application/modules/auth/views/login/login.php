<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('static/admin/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('static/admin/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <!-- Animate.css -->
    <!--<link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('static/admin/css/custom.min.css') ?>" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <?php
                if(!empty($flash_msg)) {
                    ?>

                    <div class="alert alert-danger"><?php echo $flash_msg ?></div>

                    <?php
                }
                ?>
                <form method="post">
                    <h1><?php echo $login_header ?></h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Email" required="" name="uemail" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="upass" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default submit">Log in</button>

                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <!--<p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                        </p>-->

                        <!--<div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>-->
                    </div>
                </form>
                <a href="<?php echo base_url('admin/forgot-password'); ?>" >Lost your password?</a>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Create Account</h1>
                    <div>
                        <input type="email" class="form-control" placeholder="Email" required="" name="uemail" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" name="upass" />
                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <!--<div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>-->
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>