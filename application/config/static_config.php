<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


$config['default_css'] = array(
    'bootstrap.min.css' => array('name' => 'static/css/bootstrap.min.css'),
    'stylesheet.css' => array('name' => 'static/css/stylesheet.css'),
    'font-awesome.min.css' => array('name' => 'static/css/font-awesome.min.css'),
    'fontface.css' => array('name' => 'static/css/fontface.css'),
    'languages.css' => array('name' => 'static/css/languages.css'),
    'print.css' => array(
        'name' => 'static/css/print.css',
        'media-print' => true
    ),
    'jssocials.css' => array('name' => 'static/bower_components/jssocials/dist/jssocials.css'),
    'jssocials-theme-flat.css' => array('name' => 'static/bower_components/jssocials/dist/jssocials-theme-flat.css'),
    'bootstrap-social.css' => array('name' => 'static/bower_components/bootstrap-social/bootstrap-social.css'),
    'bootstrap-datepicker' => array('name' => 'static/css/bootstrap-datepicker.css'),
);

$config['default_js'] = array(
    'blockUI.js' => array('name' => 'static/js/jquery.blockUI.js'),
    'main.js' => array('name' => 'static/js/main.js'),
    'jssocials.min.js' => array('name' => 'static/bower_components/jssocials/dist/jssocials.min.js'),

    'jquery.form.js' => array('name' => 'static/js/jquery.form.js'),
    'jquery.validate.js' => array('name' => 'static/admin/js/jquery-validate/jquery.validate.js'),
    'additional-methods.min.js' => array('name' => 'static/admin/js/jquery-validate/additional-methods.js'),
    'bootstrap-datepicker' => array('name' => 'static/js/bootstrap-datepicker.js'),
);

$config['admin_default_css'] = array(
    'bootstrap.min.css' => array('name' => 'static/admin/vendors/bootstrap/dist/css/bootstrap.min.css'),
    'font-awesome.min.css' => array('name' => 'static/admin/vendors/font-awesome/css/font-awesome.min.css'),
    'custom.min.css' => array('name' => 'static/admin/css/custom.css'),
);

$config['admin_default_js'] = array(
    'jquery.min.js' => array('name' => 'static/admin/vendors/jquery/dist/jquery.min.js'),
    'bootstrap.min.js' => array('name' => 'static/admin/vendors/bootstrap/dist/js/bootstrap.min.js'),
    'fastclick.js' => array('name' => 'static/admin/vendors/fastclick/lib/fastclick.js'),
    'nprogress.js' => array('name' => 'static/admin/vendors/nprogress/nprogress.js'),
    'custom.min.js' => array('name' => 'static/admin/js/custom.min.js'),
    'password-check' => array('name' => 'static/admin/js/password-check.js'),

    'jquery.validate.js' => array('name' => 'static/admin/js/jquery-validate/jquery.validate.js'),
    'additional-methods.min.js' => array('name' => 'static/admin/js/jquery-validate/additional-methods.js'),

);

$config['css_arr'] = array(
    'dataTables.css' => array('name' => 'static/admin/vendors/datatables/css/jquery.dataTables.css'),
    'dataTables.responsive.css' => array('name' => 'static/admin/vendors/datatables/css/responsive.dataTables.css'),
    'dataTables.bootstrap.css' => array('name' => 'static/admin/vendors/datatables/css/dataTables.bootstrap.css'),
);

$config['js_arr'] = array(
    'jquery.dataTables' => array('name' => 'static/admin/vendors/datatables/js/jquery.dataTables.js',),
    'jquery.dataTables.responsive' => array('name' => 'static/admin/vendors/datatables/js/dataTables.responsive.js',),
    'dataTables.bootstrap' => array('name' => 'static/admin/vendors/datatables/js/dataTables.bootstrap.js'),
    'dataTables.fnFilterOnReturn' => array('name' => 'static/admin/vendors/datatables/js/dataTables.fnFilterOnReturn.js'),
    'dataTables.fnSortUSDate' => array('name' => 'static/admin/vendors/datatables/js/dataTables.fnSortUSDate.js'),
    'dataTables-main.min' => array('name' => 'static/admin/vendors/datatables/js/dataTables-main.js'),
);
