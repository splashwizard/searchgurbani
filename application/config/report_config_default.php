<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!isset($config)) {
    $config = array();
}

$config = array_merge($config, array(
    'guestbook_listing_headers' => array(
        'Name' => array(
            'jsonField' => 'name',
            'width' => '20%'
        ),
        'Email' => array(
            'jsonField' => 'email',
            'width' => '25%'
        ),
        'Message' => array(
            'jsonField' => 'message',
            'width' => '30%',
        ),
        'Created' => array(
            'jsonField' => 'created',
            'width' => '10%'
        ),
        'Updated' => array(
            'jsonField' => 'updated',
            'width' => '10%'
        ),
        'action' => array(
            'isSortable' => FALSE,
            'systemDefaults' => TRUE,
            'isLink' => TRUE,
            'width' => '5%',
            'align' => 'center',
            'type' => array(
                'EDIT_ICON',
                'ENABLE_ICON',
            ),
            'linkParams' => array(
                'EDIT_ICON' => 'id',
                'ENABLE_ICON' => 'id',
            ),
            'linkTarget' => array(
                'EDIT_ICON' => 'admin/guestbook/edit/%d',
                'ENABLE_ICON' => '',
            ),
            'linkAtts' => array(
                'data-status' => ['type' => 'dynamic', 'field' => 'status']
            )
        )
    ),
'users_listing_headers' => array(
        'Display Name' => array(
            'jsonField' => 'displayName',
            'width' => '20%'
        ),
        'First Name' => array(
            'jsonField' => 'firstName',
            'width' => '20%'
        ),
        'Last Name' => array(
            'jsonField' => 'lastName',
            'width' => '20%'
        ),
        'Email' => array(
            'jsonField' => 'email',
            'width' => '10%'
        ),
        'News Letter Subscribed' => array(
            'jsonField' => 'newsletterSubscribed',
            'width' => '10%'
        ),
        'Created' => array(
            'jsonField' => 'created',
            'width' => '10%'
        ),
        'Updated' => array(
            'jsonField' => 'modified',
            'width' => '10%'
        ),

    )
));
