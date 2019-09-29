<?php
    
    $config = array(
        'autoPost_api' => array(
            'facebook' => array(
                'appId'     => '127235423987422',
                'appSecret' => '27f6b84d4496cf1feb50a205e12c0d47'
            ),
            'twitter'  => array(
                'consumer_key'    => 'ThKYLv11rDzcbCx0GpBMIPzy7',
                'consumer_secret' => 'iXS2d0ycsxvVSAJxdGk0VZB7JuX9lpyDUrX3igjgYhI5EJFrqa',
                'oAuthToken'      => '65218719-5KJdICp0RP7CzJqfpib2aQTkQIDMWbTYLvA00W9j5',
                'oAuthSecret'     => 'TECBtjtus3bx4mEgPtaSQXSIfyxJSMQWFpqLmMlFUcbOi',
            ),
        ),
        'hybridauth'   => array(
            // "base_url" the url that point to HybridAuth Endpoint (where the index.php and config.php are found)
            "base_url" => "/hauth/endpoint/",
            
            "providers" => array(
                
                // facebook
                "Facebook" => array( // 'id' is your facebook application id
                                     "enabled" => true,
                                     "keys"    => array(
                                         //searchgurbani - test
                                         "id"     => "127235423987422",
                                         "secret" => "27f6b84d4496cf1feb50a205e12c0d47"
                                     ),
                                     "scope"   => "email, user_about_me, user_birthday"
                ),
                
                
                "Google" => array(
                    "enabled"         => true,
                    "keys"            => array(
                        "id"     => "660615532117-42luuhjp7nn8ue3indrhf9jprbf8ost3.apps.googleusercontent.com",
                        "secret" => "7Lt-wXkaIrdZazQk4c-uPsTG"
                    ),
                    "scope"           => "https://www.googleapis.com/auth/userinfo.profile " .
                                         "https://www.googleapis.com/auth/userinfo.email",
                    "access_type"     => "offline",
                    "approval_prompt" => "force",
                ),
                
                
                "LinkedIn" => array(
                    "enabled" => true,
                    "keys"    => array("id" => "776m9q1qs80vbo", "secret" => "9lQmQmdsyxlaPdwd"),
                ),
                
                // twitter
                //            "Twitter"  => array( // 'key' is your twitter application consumer key
                //                "enabled" => true,
                //                "keys"    => array(
                //                    "key"    => "R3pYuvpyiK0L5dGZmqy0E0gQZ",
                //                    "secret" => "FnJT931paLDgHvOeZE9GKqIwMh4sSoLMAuXFTWqyPWLgSUxARQ"
                //                )
                //            ),
                
                "debug_mode" => false,
                
                // to enable logging, set 'debug_mode' to true, then provide here a path of a writable file
                "debug_file" => "",
            )
        ),
        'addthis_widget' => array(
            'html' => '<div class="addthis_inline_follow_toolbox pull-right" style="display: inline-block;"></div>',
            'js' => '<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-566970c0aa06a11a"></script>'
        ),
        'facebook_details' => array(
            'page_id' => '151450731557387',
            'access_token' => 'EAABzuE4ZC5t4BALl4vDc5XdsNwJ09R9opyIDLyMGwcjDGiMjJaRZAvb93N1dd4bgL91qf53wpZAaNLqqlGbbtGZB63ugLcZC8HrNvZA8fc6a9JUm49i0GhAl9DKS55jMc32HZBXOj2U9R2DH5QPtzMbVbvcmVlh78zw8BCom1payAZDZD'
        )
    );
    
    $config['MailChimp'] = 'a8795276149d6571d9afc3e60372b7c9-us16';
    $config['MailChimp_list'] = '7596b7c273';
    
    // To use reCAPTCHA, you need to sign up for an API key pair for your site.
    // link: http://www.google.com/recaptcha/admin
    $config['recaptcha_site_key'] = '6Lc4xiYUAAAAADN2imDLDA3MXokYTZz9s7AOC80N';
    $config['recaptcha_secret_key'] = '6Lc4xiYUAAAAAHfVjbrouu6kAWJiC-eQakFKF7NK';
    
    // reCAPTCHA supported 40+ languages listed here:
    // https://developers.google.com/recaptcha/docs/language
    $config['recaptcha_lang'] = 'en';
    
    //assest min root loc
//    $config['min_root_loc'] = '/min/?f=';
    $config['min_root_loc'] = '';
    
    /* End of file recaptcha.php */
    /* Location: ./application/config/recaptcha.php */