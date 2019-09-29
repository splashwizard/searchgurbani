<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Admin</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Change Password</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="errorContainer">
                            <p>Please correct the following errors and try again:</p>
                            <ul></ul>
                        </div>
                        <?php if (!empty($old_password_check)) {
                            ?>
                            <div class="col-sm-12">
                                <div
                                    class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3 alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <?php
                                    echo $old_password_check; ?>
                                </div>
                            </div>
                            <?php
                        } ?>

                        <?php
                        $validation_errors = validation_errors();
                        if (!empty($validation_errors)) {
                            ?>
                            <div class="col-sm-12">
                                <div
                                    class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3 alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    <?php echo $validation_errors; ?>

                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <?php echo form_open_multipart(current_url(), array("name" => 'change_password', "id" => 'change_password', "class" => "form-horizontal form-label-left")); ?>

                        <div class="form-group">
                            <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Old password
                                <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="text" name="old_psw" required data-msg-required="Please enter old password"
                                       value="<?php echo $this->input->post('old_psw'); ?>" autocomplete="off"
                                       class="form-control" id="old_psw"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">New Password
                                <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="password" name="new_psw" autocomplete="off"
                                       required data-msg-required="Please enter new password"
                                       class="form-control" id="new_psw"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Re-enter Password
                                <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="password" name="re_enter_password" autocomplete="off"
                                       required data-msg-required="Please re-enter new password"
                                       class="form-control" id="re_enter_password"/>
                            </div>
                        </div>


                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>