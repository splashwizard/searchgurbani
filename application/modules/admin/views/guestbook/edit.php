<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Guestbook</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit comment of - <?php echo $gb->name ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php
                        $validation_errors = validation_errors();
                        if (!empty($validation_errors)) {
                            ?>
                            <div class="col-sm-12">
                                <div
                                    class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 col-sm-offset-3 alert alert-danger">
                                    <?php echo $validation_errors; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <?php echo form_open_multipart('admin/guestbook/edit/'.$gb->id, array("class" => "form-horizontal form-label-left")); ?>

                        <div class="form-group">
                            <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name
                                <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="name"
                                       value="<?php echo($this->input->post('name') ? $this->input->post('name') : $gb->name); ?>"
                                       class="form-control" id="name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email
                                <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="email"
                                       value="<?php echo($this->input->post('email') ? $this->input->post('email') : $gb->email); ?>"
                                       class="form-control" id="email" disabled/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message" class="control-label col-md-3 col-sm-3 col-xs-12">Message
                                <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea  name="message"
                                       class="form-control" cols="80" rows="4" id="message"><?php echo($this->input->post('message') ? $this->input->post('message') : $gb->message); ?></textarea>
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