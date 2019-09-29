<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends My_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model('sample');
    }


    function saveFb()
    {

        /* $fbarr=array(
            'appId'  => '127235423987422',
            'secret' => "d85d017f4019dd83cee5863401afa7c4",
            'cookie' => true,
        );

        $this->load->library('facebook', $fbarr);   
       
        global $session;
        //$session = $this->facebook->getSession();
       $uid = $this->facebook->getUser();

        if ($uid) {
            try{
               // $uid = $this->facebook->getUser();
                $me = $this->facebook->api('/me');
           
            }catch(Exception $e){
                           
            }
        }*/


        /*$sessionid = $session['access_token'];
        $app_id=explode("|",$sessionid);
      
       
        if ((!$session) || (!isset($me))) {
       
            $login_url = $this->facebook->getLoginUrl(array('canvas' => 1,'fbconnect' => 0, 'req_perms' => 'email,publish_stream,status_update,user_interests,user_status,user_birthday,user_location,offline_access ', "cancel_url"=>base_url(), "next_url"=>base_url()));
              
            print "<script type=\"text/javascript\">\ntop.location.href=\"$login_url\";\n</script>\n";
            exit;
        }
		*/

        /*echo "<pre>";
        print_r($_REQUEST);
        echo "</pre>";die();
         $param  =   array(
                'method'  => 'users.getinfo',
                'uids'    => $me['id'],
                'fields'  => 'name,first_name,last_name',
                'callback'=> ''
            );
            $userInfo   =   $this->facebook->api($param);*/
        $userInfo = $_REQUEST['resp'];
        $id = $userInfo['id'];
        $gender = $userInfo['gender'];
        $email = $userInfo['email'];
        $name = $userInfo['name'];
        $first_name = $userInfo['first_name'];
        $last_name = $userInfo['last_name'];


        echo $this->sample->news($id, $name, $first_name, $last_name, $gender, $email);

        ?><?php /*?>echo "<script>window.location='http://ci2.searchgurbani.com/'</script>";<?php */
        ?><?php
        // header('Location: http://ci2.searchgurbani.com/');
        //print_r(base_url());exit;
        //redirect(base_url());


    }

    function newsletter_form($id = 0)
    {
        $arr1['arr1'] = $this->sample->allNewsletter();
        $totalRows = count($arr1['arr1']);
        $this->load->library('pagination');
        $config = array('base_url' => site_url('newsletter/newsletter_form/'),
            'total_rows' => $totalRows,
            'per_page' => '10'
        );
        $this->pagination->initialize($config);
        $page['arr'] = $this->sample->pagelist($config['per_page'], $id);
        $page['pagination_links'] = $this->pagination->create_links();

        $page['theme'] = 'theme_2';
        $page['meta_title'] = 'Newsletter :- Search Gurbani.com';
        $page['meta_description'] = '';
        $page['meta_keywords'] = '';
        $this->load->view("forms/newsletter-form", $page);


    }

    function newsletter_save()
    {
        if (isset($_POST['saveNewsletter'])) {
            $newsletterData = array(
                "date" => date("Y-m-d H:i:s"),
                "title" => addslashes($this->input->post("title")),
                "content" => addslashes($this->input->post("content"))
            );
            $newsletterId = $this->sample->saveNewsletter($newsletterData);
            redirect('newsletter/newsletter_form');
        }
    }

    function newsletter_delete($id)
    {
        $newsletterId = $this->sample->deleteNewsletter($id);
        redirect('newsletter/newsletter_form');
    }

    function sendMail()
    {
        $arrNews = array();
        if (isset($_POST['name'])) {
            foreach ($this->input->post("name") as $key => $newsDeatil) {
                $id = $key;
                $arrNews[] = $this->sample->getAllNewsletter($id);
            }
        }
        $countNews = count($arrNews);
        if ($countNews > 0) {
            foreach ($arrNews as $content) {
                $mailId = $this->sample->getAllMails();
                foreach ($mailId as $mail) {
                    $title = htmlspecialchars($content->title);
                    $message = htmlspecialchars($content->content);
                    $from = 'search.gurbani@gmail.com';
                    $subject = "Message from Search Gurbani is:" . $title;
                    $message = "Message: " . $message;
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    $headers .= "From: " . $from;
                    mail($mail, $subject, $message, $headers);
                }
            }
            redirect('newsletter/newsletter_form');

        }

    }

    function newsletter_edit($id)
    {
        $page['arr'] = $this->sample->editNewsletter($id);


        $page['theme'] = 'theme_2';
        $page['meta_title'] = 'Newsletter :- Search Gurbani.com';
        $page['meta_description'] = '';
        $page['meta_keywords'] = '';
        $this->load->view("forms/newsletter-update", $page);


    }

    function newsletter_update()
    {
        if (isset($_POST['updateNewsletter'])) {
            $newsletterData = array(
                "id" => $this->input->post("newsId"),
                "date" => date("Y-m-d H:i:s"),
                "title" => $this->input->post("title"),
                "content" => $this->input->post("content"),
            );
            $newsletterId = $this->sample->updateNewsletter($newsletterData);
            redirect('newsletter/newsletter_form');
        }
    }


}