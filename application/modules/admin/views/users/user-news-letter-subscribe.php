<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Users New Letter Subscribe </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <?php
                        if(!empty($flash_message)) {
                            ?>
                            <div class="col-sm-12">
                                <div
                                    class="row alert alert-info">
                                    <?php echo $flash_message; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <a href="<?php echo site_url('admin/users/newssubscribe') ?>" class="btn btn-default">Click to Subscribe New Letter for all existing users</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
