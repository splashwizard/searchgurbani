
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel="stylesheet" type="text/css">
<style type="text/css">
    .formbox { width:400px; height:auto;margin: 0px auto;padding: 20px;border: 1px solid #e5e5e5;box-shadow: rgba(200,200,200,0.7) 0 4px 10px -1px;margin-top:140px;}
</style>

<?php // p($this->session); ?>

<div class="page-content">
    <div class="container-fluid">
        <div class="contents">
            <h3 class="top-heading no-top">Send us your valuable feedback </h3>
            <div class="row">

                <div class="col-md-6 ">
                    <?php

                    if(validation_errors()){
                        echo '<div class="alert alert-danger">';
                        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo validation_errors();
                        echo '</div>';
                    }
                    if ($this->session->flashdata('response'))
                    {
                        echo '<div class="alert alert-success">';
                        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                        echo  $this->session->flashdata('response');
                        echo '</div>';

                    }
                    if($this->session->flashdata('captchaFailed')) {
                        echo '<div class="alert alert-danger">';
                        echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';

                        echo $this->session->flashdata('captchaFailed');

                        echo '</div>';
                    }

                    ?>
                    <form action="<?php echo site_url('feedback/send'); ?>" method="post">
                        <p>Name:
                            <small>*</small>
                            <br>
                            <input name="name" class="form-control" maxlength="30"
                                   value="<?php echo set_value('name'); ?>" type="text">
                        </p>
                        <p>Email ID:
                            <small>*</small>
                            <br>
                            <input name="emailid" class="form-control" maxlength="100"
                                   value="<?php echo set_value('emailid'); ?>" type="text">
                        </p>
                        <p>Subject:
                            <small>*</small>
                            <br>
                            <select name="subject" class="form-control">
                                <option value="Search Gurbani Feedback">Search Gurbani Feedback
                                </option>
                            </select>
                        </p>
                        <p>Message:
                            <small>*</small>
                            <br>
                            <textarea name="message" class="form-control" cols="80" rows="4"
                                      style="font-family:Tahoma,Arial; font-size:12px;">
                                <?php echo set_value('message'); ?>
                            </textarea>
                        </p>
                        <p>Captcha:
                            <small>*</small>
                            <br>
                        
                            <?php
                                echo $this->recaptcha->getWidget();
                            ?>

                        <p>
                            <label><input name="send_copy" value="yes" type="checkbox"> Send me a
                                copy of this mail</label>
                        </p>
                        <p>
                            <input name="submit" class="btn btn-success" value="Send Message" type="submit">
                            <br>
                            <small>* All fields are mandatory</small>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .page-content ends -->
<!-- Latest compiled and minified JavaScript -->
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->