<?php
include_once 'MailChimp.php';

if(isset($_POST['email'])) {
    if(!isset($_POST['fname'])) {
        $_POST['fname'] = "";
    }

    if(!isset($_POST['message'])) {
        $_POST['message'] = "";
    }

    $MailChimp = new \Drewm\MailChimp('71713c5c25ae5cff901283697882ea43-us9');
    $result = $MailChimp->call('lists/subscribe', array(
        'id'                => 'd04a8dfa0e',
        'email'             => array('email' => $_POST['email']),
        'merge_vars'        => array('FNAME' => $_POST['fname'], 'MESSAGE' => $_POST['message']),
        'double_optin'      => false,
        'update_existing'   => true,
        'replace_interests' => false,
        'send_welcome'      => false,
    ));

    //print_r($result);
    echo "Thank you for your interest in Access2.ME. We will be in touch shortly.";
}
