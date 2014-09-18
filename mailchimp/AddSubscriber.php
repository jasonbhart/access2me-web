<?php
include_once 'MailChimp.php';

print_r($POST);

if(isset($POST['email'])) {
    if(!isset($POST['fname'])) {
        $POST['fname'] = "";
    }

    if(!isset($POST['message'])) {
        $POST['message'] = "";
    }

    $MailChimp = new \Drewm\MailChimp('71713c5c25ae5cff901283697882ea43-us9');
    $result = $MailChimp->call('lists/subscribe', array(
        'id'                => 'd04a8dfa0e',
        'email'             => array('email' => $POST['email']),
        'merge_vars'        => array('FNAME' => $POST['fname'], 'MESSAGE' => $POST['message']),
        'double_optin'      => false,
        'update_existing'   => true,
        'replace_interests' => false,
        'send_welcome'      => false,
    ));

    print_r($result);
}
