<?php

class Newsletter extends CI_Controller

{


    function __construct()
    {
        parent::__construct();

        $this->load->model('sample');

    }


    function saveFb()
    {

        $fbarr = array(
            'appId' => '198103326896147',
            'secret' => "ccda64b707bb6451509c039d22755838",
            'cookie' => true,
            'domain' => 'ci2.searchgurbani.com'
        );

        $this->load->library('facebook', $fbarr);

        global $session;
        $session = $this->facebook->getSession();

        if ($session) {
            try {
                $uid = $this->facebook->getUser();
                $me = $this->facebook->api('/me');

            } catch (Exception $e) {

            }
        }


        $sessionid = $session['access_token'];
        $app_id = explode("|", $sessionid);


        if ((!$session) || (!isset($me))) {

            $login_url = $this->facebook->getLoginUrl(array('canvas' => 1, 'fbconnect' => 0, 'req_perms' => 'email,publish_stream,status_update,user_interests,user_status,user_birthday,user_location,offline_access ', "cancel_url" => base_url(), "next_url" => base_url()));

            print "<script type=\"text/javascript\">\ntop.location.href=\"$login_url\";\n</script>\n";
            exit;
        }


        /*echo "<pre>";
        print_r($me);
        echo "</pre>";die();*/
        $param = array(
            'method' => 'users.getinfo',
            'uids' => $me['id'],
            'fields' => 'name,first_name,last_name',
            'callback' => ''
        );


        $userInfo = $this->facebook->api($param);


        $id = $userInfo[0]['uid'];
        $gender = $me['gender'];
        $email = $me['email'];
        $name = $userInfo[0]['name'];
        $first_name = $userInfo[0]['first_name'];
        $last_name = $userInfo[0]['last_name'];


        $this->sample->news($id, $name, $first_name, $last_name, $gender, $email);
        ?><?php /*?>echo "<script>window.location='http://ci2.searchgurbani.com/'</script>";<?php */
        ?><?
        // header('Location: http://ci2.searchgurbani.com/');
        redirect('http://ci2.searchgurbani.com/', 'location');


    }

    function newsletter_form()
    {
        if (isset($_POST['submit'])) {
            $alluser = array();
            $query = $this->db->get('FB');
            foreach ($query->result() as $row) {
                $alluser[] = $row->Email;

            }

            $a = "";
            $title = htmlspecialchars($_POST['title']);


            $message = htmlspecialchars($_POST['content']);

            $from = 'search.gurbani@gmail.com';


            $subject = "Message from Search Gurbani is:" . $title;
            $message = "Message: " . $message;

            $headers = "From: " . $from;
            foreach ($alluser as $userEmail) {
                mail($userEmail, $subject, $message, $headers);
            }
        }
        $arr1['arr'] = $this->sample->allNewsletter();


        $page['theme'] = 'theme_2';
        $page['meta_title'] = 'Newsletter :- Search Gurbani.com';
        $page['meta_description'] = '';
        $page['meta_keywords'] = '';
        $this->load->view('templates/header', $page);
        $this->load->view("forms/newsletter_form", $arr1);
        $this->load->view('templates/footer');


    }

    function newsletter_save()
    {
        if (isset($_POST['saveNewsletter'])) {
            $newsletterData = array(
                "date" => date("Y-m-d H:i:s"),
                "title" => $this->input->post("title"),
                "content" => $this->input->post("content"),
            );
            $newsletterId = $this->sample->saveNewsletter($newsletterData);
            redirect('http://ci2.searchgurbani.com/newsletter/newsletter_form', 'location');
        }


    }

    function newsletter_delete()
    {
        $id = $this->input->get("id");
        echo $id;
        print_r($_REQUEST);
        exit;


        $newsletterId = $this->sample->deleteNewsletter($id);
        redirect('http://ci2.searchgurbani.com/newsletter/newsletter_form', 'location');


    }


}


?>