<?php

function check_captcha($input = '', $session_var_name = 'usiscaptcha', $key = 'k387d')
{
    $CI = &get_instance();
    $enc_value = $CI->session->userdata($session_var_name);

    //echo $enc_value."<br />".md5($input).$key;
    if (md5($input) . $key == $enc_value)
        return true;
    else
        return false;
}