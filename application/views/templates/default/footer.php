<footer>
    <div class="container-fluid">
        <div class="main-footer">
            <ul class="inline-block">
                <li><a href="<?php echo site_url('public/home'); ?>">Home</a></li>
                <li><a href="<?php echo site_url('preferences'); ?>">Site Preferences</a></li>
                <li><a href="<?php echo site_url('unicode'); ?>">Unicode Fonts</a></li>
                <li><a href="<?php echo site_url('guestbook/index') ?>">Guestbook</a></li>
                <li><a href="<?php echo site_url('feedback'); ?>">Feedback</a></li>
                <li><a href="<?php echo site_url('sitemap'); ?>">Sitemap</a></li>
                <li class="last"><b><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=RN6N7BTG9T5NE">Donate to SearchGurbani</a></b></li>
            </ul>
        </div>
    </div>
</footer>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('hauth/login') ?>" method="post"
                  class="form-horizontal" role="form" id="userLoginForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Uemail"
                                   placeholder="Please enter your email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="Upass"
                                   placeholder="Please enter your password" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-6">
                        <div class="col-xs-3">
                            <a class="btn btn-sm btn-block btn-facebook"
                               style="height: 30px;width: 35px"
                               href="<?php echo base_url('hauth/facebook') ?>">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a class="btn btn-sm btn-block btn-google"
                               style="height: 30px;width: 35px"
                               href="<?php echo base_url('hauth/googleplus') ?>">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a class="btn btn-sm btn-block btn-linkedin"
                               style="height: 30px;width: 35px"
                               href="<?php echo base_url('hauth/linkedin') ?>">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('hauth/register') ?>" method="post"
                  class="form-horizontal" role="form" id="userRegisterForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Register</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Ufname"
                                   placeholder="Please enter your first name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Ulname"
                                   placeholder="Please enter your last name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="Uemail"
                                   placeholder="Please enter your email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="Upass" id="Upass"
                                   placeholder="Please enter your password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="Uconfpass"
                                   placeholder="Please enter the password again" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-6">
                        <div class="col-xs-3">
                            <a class="btn btn-sm btn-block btn-facebook"
                               style="height: 30px;width: 35px"
                               href="<?php echo base_url('hauth/facebook') ?>">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a class="btn btn-sm btn-block btn-google"
                               style="height: 30px;width: 35px"
                               href="<?php echo base_url('hauth/googleplus') ?>">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                        <div class="col-xs-3">
                            <a class="btn btn-sm btn-block btn-linkedin"
                               style="height: 30px;width: 35px"
                               href="<?php echo base_url('hauth/linkedin') ?>">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->