<script type="text/javascript"
        src="<?= base_url() ?>static/js/jquery.min.js"></script>
<script type="text/javascript"
        src="<?= base_url() ?>static/js/jquery.validate.js"></script>


<script type="text/javascript">

    $(document).ready(function () {
        $("#contact_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            }
        });

    });

</script>

<div class="page-content">
    <div class="container-fluid">
        <div class="contents">
            <div id="wrapper">
                <div class="content">
                    <h3 class="top-heading no-top">Contact Us
                    </h3>

                        <?php

                            if(validation_errors()){
                                echo '<div class="alert alert-danger">';
                                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                echo validation_errors();
                                echo '</div>';
                            }
                            
                            if ($this->session->userdata('checkmail') == 'true')
                            {
                                $show_value = 1;
                                echo '<div class="alert alert-success">';
                                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                echo '<strong>Your message has been sent. </strong>we will get back to you shortly';
                                echo '</div>';
                                $array_items = array('checkmail' => 'true');
                                $this->session->unset_userdata($array_items);

                            }
                            else if ($this->session->userdata('checkmail') == 'false')
                            {
                                echo '<div class="alert alert-danger">';
                                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                echo "<strong>Please fill the form details correctly </strong>".$err;
                                echo '</div>';

                                $array_items = array('checkmail' => 'false');
                                $this->session->unset_userdata($array_items);
                            }
                            else if($this->session->flashdata('captchaFailed')) {
                                echo '<div class="alert alert-danger">';
                                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';

                                echo $this->session->flashdata('captchaFailed');

                                echo '</div>';
                            }

                        ?>

                    <p>Send us your feedback.</p>
                    <div class="row">
                        <div class="col-md-6 ">
                            <form id="contact_form"
                                  name="contact_form"
                                  method="post"
                                  action="">
                                <p>Name:
                                    <small>*</small>
                                    <br>
                                    <input name="name" class="form-control required" id="name" maxlength="30"
                                            type="text" value="<?php echo (!empty($show_value) && $show_value == 1) ? '' :  set_value('name'); ?>">
                                </p>

                                <p>Email ID:
                                    <small>*</small>
                                    <br>
                                    <input name="emailid" id="email" class="form-control required" maxlength="100"
                                            type="text" value="<?php echo (!empty($show_value) && $show_value == 1)? '' : set_value('emailid'); ?>">
                                </p>
                                <p>Website:
                                    <small>*</small>
                                    <br>
                                    <input name="website" id="website" class="form-control required" maxlength="100"
                                            type="text" value="<?php echo (!empty($show_value) && $show_value == 1)? '' : set_value('website'); ?>">
                                </p>

                                <p>Message:
                                    <small>*</small>
                                    <br>
                                    <textarea name="message" id="message" class="form-control required"  rows="4">
                                        <?php echo (!empty($show_value) && $show_value == 1)? '' : set_value('message'); ?>
                                    </textarea>
                                </p>
                                <p>
                                    <?php
                                        echo $this->recaptcha->getWidget();
                                    ?>
                                </p>
                                <p>
                                    <input name="submit" id="send" class="btn btn-success" value="Send Message" type="submit">
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