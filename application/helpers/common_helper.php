<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function get_admin_top_menu()
{
    $CI = &get_instance();
    $top_menu = $CI->config->item('admin_top_menu');

    $menu = '<ul class="nav navbar-nav">';
    foreach ($top_menu as $key => $value) {
        if (is_array($value)) {
            $menu .= '<li class="dropdown">'
                . '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $key . '<span class="caret"></span></a>'
                . '<ul class="dropdown-menu" role="menu">';
            foreach ($value as $sub_key => $sub_val) {
                if (is_array($sub_val)) {
                    $menu .= '<li class="dropdown has-sub-sub-menu-li">'
                        . '<a href="#" class="dropdown-toggle has-sub-sub-menu" data-toggle="dropdown">' . $sub_key . '<span class="caret"></span></a>'
                        . '<ul class="dropdown-menu sub-sub-menu" role="menu">';
                    foreach ($sub_val as $sub_sub_key => $sub_sub_val) {
                        $menu .= '<li><a href="' . base_url($sub_sub_val) . '">' . $sub_sub_key . '</a></li>';
                    }
                    $menu .= '</ul>';
                } else {
                    $menu .= '<li><a href="' . base_url($sub_val) . '">' . $sub_key . '</a></li>';
                }
            }
            $menu .= '</ul>';
        } else {
            $menu .= '<li><a href="' . base_url($value) . '">' . $key . '</a></li>';
        }
    }
    $menu .= '</ul>';
    return $menu;
    ?>
    <?php

}

function get_front_office_top_menu()
{
    $CI = &get_instance();
    $top_menu = $CI->config->item('front_office_top_menu');

    $menu = '<ul class="nav navbar-nav">';
    foreach ($top_menu as $key => $value) {
        if (is_array($value)) {
            $menu .= '<li class="dropdown">'
                . '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $key . '<span class="caret"></span></a>'
                . '<ul class="dropdown-menu" role="menu">';
            foreach ($value as $sub_key => $sub_val) {
                if (is_array($sub_val)) {
                    $menu .= '<li class="dropdown has-sub-sub-menu-li">'
                        . '<a href="#" class="dropdown-toggle has-sub-sub-menu" data-toggle="dropdown">' . $sub_key . '<span class="caret"></span></a>'
                        . '<ul class="dropdown-menu sub-sub-menu" role="menu">';
                    foreach ($sub_val as $sub_sub_key => $sub_sub_val) {
                        $menu .= '<li><a href="' . base_url($sub_sub_val) . '">' . $sub_sub_key . '</a></li>';
                    }
                    $menu .= '</ul>';
                } else {
                    $menu .= '<li><a href="' . base_url($sub_val) . '">' . $sub_key . '</a></li>';
                }
            }
            $menu .= '</ul>';
        } else {
            $menu .= '<li><a href="' . base_url($value) . '">' . $key . '</a></li>';
        }
    }
    $menu .= '</ul>';
    return $menu;
    ?>
    <?php

}

function password_decrypt($password, $hash)
{
    return crypt($password, $hash);
}

function lareevar_button()
{
    $CI = &get_instance();
    global $SG_Preferences;
    $navigationBar = '';
    if ($SG_Preferences['lang_26'] == "yes") {
        $sess_lareevar_assist = $SG_Preferences['lareevar_assist'];
        $sess_lareevar_assist = !empty($sess_lareevar_assist) ? $sess_lareevar_assist : 'off';
        $navigationBar
            .= '<span class="span_lareevar">
            <button type="button" name="lareevar_assist" id="lareevar_assist" class="btn btn-next lareevar-' . $sess_lareevar_assist . '" data-lareevar="' . $sess_lareevar_assist . '" onclick="lareevar_assist(this)" style="background:#F4F4F4;">
                Lareevar
            </button>
        </span>';
    }
    return $navigationBar;
}

function password_encrypt($password)
{
    $cost = 10;
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
    $salt = sprintf("$2a$%02d$", $cost) . $salt;
    $hash = crypt($password, $salt);
    return $hash;
}

function social_sharing_button()
{
    $CI = &get_instance();
    global $SG_Preferences;
    $navigationBar = '';

    $sharing_session_data = $SG_Preferences['allow_share_lines'];
    $sharing_session_data = !empty($sharing_session_data) ? ($sharing_session_data == 'yes' || $sharing_session_data == 'on' ? 'off' : 'on') : 'on';

    $navigationBar = '<span id="social-sharing">
            <button type="button" name="social_sharing" id="social_sharing" class="btn btn-next social-sharing" data-social="' . $sharing_session_data . '" onclick="social_sharing(this)">';
    $navigationBar .= 'Social Sharing ' . ucfirst($sharing_session_data);
    $navigationBar .= '</button>
        </span>';
    return $navigationBar;
}

function min_root_loc()
{
    $CI = &get_instance();

    $min_root_loc = $CI->config->item('min_root_loc');

    return $min_root_loc;
}

