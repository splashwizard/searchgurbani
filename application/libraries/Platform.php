<?php

/**
 * CodeIgniter Library to check windows/ mobile platform
 *
 * Author: Upneet Kaur
 *
 * VERSION: 1.0 (2011-03-01)
 * LICENSE: GNU GENERAL PUBLIC LICENSE - Version 1, June 2011
 *
 **/
class Platform
{

    public $http_user_agent;
    public $mobile_agents;
    public $http_accept;
    public $http_profile;
    public $http_x_wap_profile;
    public $all_http;

    public function Platform()
    {
        $this->http_user_agent = $_SERVER['HTTP_USER_AGENT'];
        $this->http_accept = $_SERVER['HTTP_ACCEPT'];
        $this->mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'oper', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda', 'xda-'
        );
    }

    public function check_platform()
    {
        $mobile_browser = 0;
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($this->http_user_agent))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($this->http_accept), 'application/vnd.wap.xhtml+xml') > 0)) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr($this->http_user_agent, 0, 4));

        if (in_array($mobile_ua, $this->mobile_agents)) {
            $mobile_browser++;
        }


        if (strpos(strtolower($this->http_user_agent), 'windows') > 0) {
            $mobile_browser = 0;
        }

        if ($mobile_browser > 0) {
            $platform = 'mobile';
        } else {
            $platform = 'windows';
        }

        return $platform;
    }

}