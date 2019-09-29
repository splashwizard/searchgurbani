<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo">
                    <img src="<?php echo base_url('static/images/logo.jpg') ?>"
                         class="img-responsive"/>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-right">
                    <div class="header-top row">

                        <div class="col-xs-4 text-right" style="margin-top: 8px; padding: 0;">
                            <?php
                                $addthis_widget = $this->config->item("addthis_widget");
                                echo $addthis_widget['html'];
                            ?>
                            <span class="pull-right"
                                  style="vertical-align: top; font-size: 12px; line-height: 20px; padding-right: 10px;">Follow Us</span>
                        </div>

                        <div class="col-xs-5">
                            <div class="header-social-share-page pull-right"
                                 style="padding-right: 0;display: inline-block"
                                 data-share-url="<?php echo current_url() ?>"
                                 data-share-text="Searchgurbani.com"></div>
                            <span class="pull-right"
                                  style="display: inline-block; vertical-align: top; font-size: 12px; line-height: 34px; padding-right: 10px;">Share </span>
                        </div>
                        
                        <?php
                            if (!isset($template_authdata['auth']) ||
                                empty($template_authdata['auth']['id'])
                            ) {
                                ?>
                                <div class="col-xs-3 header-social-login pull-right"
                                     style="padding-left: 0;">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <button type="button"
                                                    class="btn btn-primary btn-xs pull-right"
                                                    data-toggle="modal" data-target="#loginModal"
                                                    style="margin-left: 10px;">
                                                Login
                                            </button>
                                            <button type="button"
                                                    class="btn btn-success btn-xs pull-right"
                                                    data-toggle="modal" data-target="#registerModal"
                                                    style="">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="col-xs-3 header-social-login">
                                    <div class="row">
                                        <!--<div class="col-xs-6">
                                        <p class="label label-info" style="line-height: 35px; margin: 0;">
                                            Welcome, <?php /*echo substr($template_authdata['auth']['firstName'], 0, 10) */ ?></p>
                                    </div>-->
                                        
                                        <?php
                                            
                                            if ($template_authdata['auth']['provider'] ==
                                                'LinkedIn'
                                            ) { ?>
                                                <div class="col-xs-12 pull-right">
                                                    <a class="btn btn-xs btn-block btn-social btn-linkedin pull-right"
                                                       style="width: 81%"
                                                       href="<?php echo base_url('hauth/logout') ?>">
                                                        <span class="fa fa-linkedin"></span>
                                                        Log Out <?php echo substr($template_authdata['auth']['firstName'], 0, 10) ?>
                                                    </a>
                                                </div>
                                            <?php } else if ($template_authdata['auth']['provider'] ==
                                                             'Facebook'
                                            ) { ?>
                                                <div class="col-xs-12 pull-right">
                                                    <a class="btn btn-xs btn-block btn-social btn-facebook pull-right"
                                                       style="width: 81%"
                                                       href="<?php echo base_url('hauth/logout') ?>">
                                                        <span class="fa fa-facebook"></span>
                                                        Log Out <?php echo substr($template_authdata['auth']['firstName'], 0, 10) ?>
                                                    </a>
                                                </div>
                                            <?php } else if ($template_authdata['auth']['provider'] ==
                                                             'Google'
                                            ) { ?>
                                                <div class="col-xs-12 pull-right">
                                                    <a class="btn btn-xs btn-block btn-social btn-google pull-right"
                                                       style="width: 81%"
                                                       href="<?php echo base_url('hauth/logout') ?>">
                                                        <span class="fa fa-google-plus"></span>
                                                        Log Out <?php echo substr($template_authdata['auth']['firstName'], 0, 10) ?>
                                                    </a>
                                                </div>
                                                <?php
                                            } else {
                                                ?>
                                                <div class="col-xs-12 pull-right">
                                                    <a class="btn btn-danger btn-xs pull-right"
                                                       style="width: 81%"
                                                       href="<?php echo base_url('hauth/logout') ?>">
                                                        Logout
                                                    </a>
                                                </div>
                                                <?php
                                            } ?>

                                    </div>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                    <?php
                        $login_msg = $this->session->flashdata('social_login_msg');
                        if (!empty($login_msg)) {
                            ?>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="alert alert-info">
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;
                                        </button>
                                        <?php echo $login_msg ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="header-bottom hidden-xs row">
                        <div class="col-xs-12">
                            <ul class="inline-block top-menu text-right">
                                <li><a href="<?php echo site_url('/'); ?>">Home</a></li>
                                <li><a href="<?php echo site_url('preferences'); ?>">Site Preferences</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('guestbook/index') ?>">Guestbook</a>
                                </li>
                                <li><a href="<?php echo site_url('feedback'); ?>">Feedback</a></li>
                                <li><a href="<?php echo site_url('sitemap'); ?>">Sitemap</a></li>
                                <li class="last"><a href="<?php echo site_url('hukum'); ?>">Today's Hukumnama</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php echo $template_header_menu; ?>

<?php echo $template_header_banner; ?>

<div class="row show_while_print">
    <div class="col-md-12" style="padding-top: 10px;">
        <div style="display: inline-block; padding-left: 50px;" class="col-md-2">
            <a class="btn btn-default print-button" href="javascript:window.print();">
                <i class="fa fa-print" title="Print this page"></i>
                Print Page
            </a>
        </div>
        <div class="col-md-2 pull-right" style="padding-top: 10px;">SearchGurbani.com</div>
    </div>
</div>
