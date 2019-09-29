<?php

global $SG_Preferences;

foreach ($SG_Preferences as $pref_key => $pref_val) {
    if (get_cookie($pref_key) != false) {
        $SG_Preferences[$pref_key] = get_cookie($pref_key);
    }
}

//flood_check();
function flood_check()
{
    $CI =& get_instance();

    // In the following line write the full path to temporary directory in which
    // you want to store flood counters. It is good idea to create such folder
    // somewhere outside your documents directory, to make it unaccessable from Web.
    // Don't forget that the directory must have permissions to write files in it.
    // IMPORTANT!
    // All files in this folder (except those that start with dot, e.g.'.htaccess')
    // will be deleted by FloodBlocker, so don't keep anything there.
    $params = array('logs_path' => $CI->config->item('base_path') . 'flood/',
        'ip' => '');
    //echo $params['logs_path'];
    $CI->load->library('floodblocker', $params);

    // Create as many rules as you want...
    $CI->floodblocker->rules = array(
        10 => 10,    // rule 1 - maximum 10 requests in 10 secs
        60 => 30,    // rule 2 - maximum 30 requests in 60 secs
        300 => 50,   // rule 3 - maximum 50 requests in 300 secs
        3600 => 200  // rule 4 - maximum 200 requests in 3600 secs
    );

    // At last call CheckFlood(), it will return FALSE if flood detected on any
    // of specified rules.

    if (!$CI->floodblocker->CheckFlood())
        die ('Too many requests! Please try later.');

}

function flood_check_old()
{
    $CI =& get_instance();
    $CI->load->library('session');

    $flood_interval = 5; //seconds
    $max_flood_attempts = 5; //times

    $last_activity = 0 + $CI->session->userdata('fl_la');
    if ((time() - ($last_activity)) < $flood_interval) {
        $flood_attempt = 0 + $CI->session->userdata('flood_attempt');
        if ($flood_attempt >= $max_flood_attempts) {
            $CI->session->set_userdata('flood_attempt', $flood_attempt + 5);
            echo "Too many requests! Please hold on!";
            exit();
        } else {
            $CI->session->set_userdata('flood_attempt', $flood_attempt + 1);
        }
    } else {
        $CI->session->set_userdata('flood_attempt', 0);
    }
    $CI->session->set_userdata('fl_la', time());

    /*echo "Time: ".time()."<br />
    Last Activity: ".$CI->session->userdata('fl_la')."<br />
    Flood Attempt: ".$CI->session->userdata('flood_attempt');*/
}

?>