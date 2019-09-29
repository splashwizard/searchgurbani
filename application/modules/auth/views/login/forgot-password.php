<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forgot Password | </title>

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
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <div id="errorContainer">
                    <p>Please correct the following errors and try again:</p>
                    <ul></ul>
                </div>
                <?php
                if (!empty($flash_msg)) {
                    ?>

                    <div class="alert alert-danger"><?php echo $flash_msg ?></div>

                    <?php
                }

                if(!empty($validation_errors)) {
                    ?>
                    <div class="alert alert-danger"><?php echo $validation_errors ?></div>
                    <?php
                }

                ?>
                <form method="post" id="forgot_password">
                    <h1><?php echo $login_header; ?></h1>

                    <div>
                        <input type="text" class="form-control" placeholder="Email" required="" name="email" value="<?php echo $this->input->post('email');?>"
                               required data-msg-required="Please enter your email"/>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-default submit">Submit</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator"></div>
                </form>
                <a href="<?php echo base_url('admin/login'); ?>"><span style="font-size: 25px">Login</span></a>
            </section>
        </div>

    </div>
</div>
</body>
</html>

<script type="text/javascript" src="<?php echo base_url() ?>static/admin/vendors/jquery/dist/jquery.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>static/admin/js/jquery-validate/jquery.validate.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>static/admin/js/jquery-validate/additional-methods.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {

        $("#forgot_password").validate({
            ignore: [],
            errorContainer: $('#errorContainer'),
            errorLabelContainer: $('#errorContainer ul'),
            wrapper: 'li',
            onfocusout: false,
            highlight: function (element, errorClass) {
                $(element).addClass(errorClass);
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            rules: {
                email: {
                    required: true,
                    email: true
                }

            },
            submitHandler: function (form) {
                form.submit();
            }
        });

    });

</script>