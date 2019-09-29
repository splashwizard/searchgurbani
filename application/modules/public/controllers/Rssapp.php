<?php
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rssapp extends My_Controller
{

    function __construct()
    {

        parent::__construct();

        parse_str($_SERVER['QUERY_STRING'], $_GET);

        global $fb_appId, $fb_appSecret, $tw_consumer_key, $tw_consumer_secret, $tw_oAuthToken, $tw_oAuthSecret, $canvas_page, $defRssLink, $defNoItems, $defTitle, $defShowTitle;

        $autoPost_api = $this->config->item('autoPost_api');
        $tw_consumer_key = $autoPost_api['twitter']['consumer_key'];
        $tw_consumer_secret = $autoPost_api['twitter']['consumer_secret'];

        $tw_oAuthToken = $autoPost_api['twitter']['oAuthToken'];
        $tw_oAuthSecret = $autoPost_api['twitter']['oAuthSecret'];

        $fb_appId = $autoPost_api['facebook']['appId'];
        $fb_appSecret = $autoPost_api['facebook']['appSecret'];

        $this->load->helper('form');

        $fbarr = array(
            'appId' => $fb_appId,
            'secret' => $fb_appSecret,
            'cookie' => true,
        );

        $this->load->library('social/facebook', $fbarr);
        $this->load->library('social/rss_php');
        $this->load->model('public/rssapp_model');

    }

    function index()
    {
        // if(!$this->input->is_cli_request())
        // {
        //     echo "This script can only be accessed via the command line" . PHP_EOL;
        //     return;
        // }

        global $fb_appId, $fb_appSecret, $canvas_page, $rootpath, $consumer_key, $consumer_secret;

        $linkarr = array();
        $linkfeed = base_url() . 'public/hukum/rss';

        $facebook_details = $this->config->item('facebook_details');

        $page_id = $facebook_details['page_id'];
        
        //$arr = array('id' => $page_id,'fields' => 'access_token');
        
        //$newAccessToken = $this->facebook->api("/" . $page_id . "/feed", "post", $arr);
    
      $this->facebook->setAccessToken($facebook_details['access_token']);

        $this->rss_php->load($linkfeed);
        $top_items_basic = $this->rss_php->getItems(false, '');

        for ($i = 0; $i < 1; $i++) {
            $title = $top_items_basic[$i]['title'];
            $description = $top_items_basic[$i]['description'];
            $link = $top_items_basic[$i]['link'];

            $args = array(
                'message' => $title,
                'link' => $link,
                'description' => $description
            );
            $guid = $top_items_basic[$i]['link'];

            $guid_arr = $this->rssapp_model->getFeedsGuid($page_id, $guid);
            if (count($guid_arr) <= 0) {
                $info = array('pageId' => $page_id, 'guid' => $guid);
                try {
                    $post_id = $this->facebook->api("/" . $page_id . "/feed", "post", $args);

                    $guid_arr = $this->rssapp_model->saveFeedsGuid($info);

                    $this->twitterCron($page_id, $args['message'], $args['link']);

                    echo "Saved And Posted to fb fan page<br/>";
                } catch (FacebookApiException $e) {
                    p($e);
                }
            } else {
                echo $i . "=> ";
                echo "Already posted to fanpage";
                echo "<br/>";
            }

        }

    }

    function twitterCron($page_id, $msg, $link)
    {
        // if(!$this->input->is_cli_request())
        // {
        //     echo "This script can only be accessed via the command line" . PHP_EOL;
        //     return;
        // }

        global $tw_consumer_key, $tw_consumer_secret, $tw_oAuthToken, $tw_oAuthSecret;

        require_once(APPPATH . 'third_party/twitter/tmhOAuth.php');
        require_once(APPPATH . 'third_party/twitter/tmhUtilities.php');


        $tmhOAuth = new tmhOAuth(array(
            'consumer_key' => $tw_consumer_key,
            'consumer_secret' => $tw_consumer_secret,
            'user_token' => $tw_oAuthToken,
            'user_secret' => $tw_oAuthSecret    ,
        ));

        $message = $msg . " " . $link;
        $code = $tmhOAuth->request(
            'POST',
            'https://api.twitter.com/1.1/statuses/update.json',
            array(
                'status' => $message
            ),
            true, // use auth
            false  // multipart
        );

        //print_r($code);
        if ($code == 200) {
            return $data = 'Posted to twitter';
            echo $data;

        } else {
            return $data = 'Not Posted';
            echo $data;
        }

    }
}
