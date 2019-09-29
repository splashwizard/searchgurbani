<script type="text/javascript"
        src="<?= base_url() ?>static/js/jquery.min.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>static/js/jquery.validate.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="contents">
            <div id="wrapper">
                <div class="content">
                    <h3 class="top-heading no-top">Guestbook Post
                    </h3>
                    <?php
                    if(validation_errors()){
                        echo '<div class="alert alert-danger">';
                        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo validation_errors();
                        echo '</div>';
                    }else if($this->session->flashdata('captchaFailed')) {
                        echo '<div class="alert alert-danger">';
                        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';

                        echo $this->session->flashdata('captchaFailed');

                        echo '</div>';
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-6 ">
                            <form id="contact_form"
                                  name="contact_form"
                                  method="post"
                                  action="<?php echo site_url('guestbook/post'); ?>">
                                <p>Name:
                                    <small>*</small>
                                    <br>
                                    <input name="name" class="form-control required" id="name" maxlength="30"
                                           type="text" value="<?php echo set_value('name'); ?>">
                                </p>

                                <p>Email ID:
                                    <small>*</small>
                                    <br>
                                    <input name="email" id="email" class="form-control required" maxlength="100"
                                           type="text" value="<?php echo set_value('email');?>">
                                </p>
                                <p>Message:
                                    <small>*</small>
                                    <br>
                                    <textarea name="message" id="message" class="form-control required"  rows="4">
                                        <?php echo set_value('message'); ?>
                                    </textarea>
                                </p>
                                <p>
                                    <?php
                                    echo $this->recaptcha->getWidget();
                                    ?>
                                </p>
                                <p>
                                    <input name="submit" id="send" class="btn btn-success" value="Submit To Guestbook" type="submit">
                                    <br>
                                    <small>* All fields are mandatory</small>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>