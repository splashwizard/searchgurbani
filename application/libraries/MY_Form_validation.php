<?php

/*
 * Contributor - Suraj Gupta
 * Email - suraj.gupta.489@gmail.com
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{

    public function __construct($rules = array())
    {
        parent::__construct($rules);
        $this->CI->lang->load('MY_form_validation');
    }

    function password_encryption($password)
    {
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2a$%02d$", $cost) . $salt;
        $hash = crypt($password, $salt);
        return $hash;
    }

    public function is_unique_modified($str, $field)
    {
        list($table, $field, $id, $idVal) = explode('.', $field);
        $query = $this->CI->db->limit(1)->get_where($table, array($field => $str, "$id !=" => $idVal));

        return $query->num_rows() === 0;
    }

    public function is_equal($subject, $str)
    {
        return $subject == $this->CI->input->post($str);
    }

    public function alpha_dash_mod($subject)
    {
        $pattern = '/^(?=.{6,20}$)(?![_.\d])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/';
        preg_match($pattern, $subject, $matches);
        return !empty($matches);
    }

    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    public function valid_date_time($date)
    {
        $d = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        return $d && $d->format('Y-m-d H:i:s') === $date;
    }

    public function check_password($psw,$check_password){
        if($psw == $check_password){
            return true;
        }else{
            return false;
        }
    }
}
