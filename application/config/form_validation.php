<?php

$config = array(
    'login' => array(
        array(
            'field' => 'username',
            'label' => 'Username is required',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'passsword is required',
            'rules' => 'required'

        )
    ),
    'feedback' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|min_length[3]|max_length[30]',
        ),
        array(
            'field' => 'emailid',
            'label' => 'Email ID',
            'rules' => 'required|valid_email',
        ),
        array(
            'field' => 'subject',
            'label' => 'Subject',
            'rules' => 'required',
        ),
        array(
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required|min_length[10]|max_length[800]',
        ),
        array(
            'field' => 'g-recaptcha-response',
            'label' => 'recaptcha validation',
            'rules' => 'required'
        )
    ),
    'contact-us' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|min_length[3]|max_length[30]'
        ),
        array(
            'field' => 'emailid',
            'label' => 'Email ID',
            'rules' => 'required|valid_email'
        ),
        array(
            'field' => 'website',
            'label' => 'Website',
            'rules' => 'required'
        ),
        array(
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required|min_length[10]|max_length[800]'
        ),
        array(
            'field' => 'g-recaptcha-response',
            'label' => 'recaptcha validation',
            'rules' => 'required'
        )
    ),
    'guestbook' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|min_length[3]|max_length[100]',
        ),
        array(
            'field' => 'email',
            'label' => 'Email ID',
            'rules' => 'required|valid_email|max_length[255]',
        ),
        array(
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required|min_length[10]|max_length[500]',
        ), array(
            'field' => 'g-recaptcha-response',
            'label' => 'recaptcha validation',
            'rules' => 'required'
        )
    ),
    'guestbook_admin' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required|min_length[3]|max_length[100]',
        ),
        array(
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required|min_length[10]|max_length[500]',
        ),
    )
);
?>