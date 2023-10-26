<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'smtp.gmail.com', 
    'smtp_port' => 465,
    'smtp_user' => 'support@instalitapp.com',
    'smtp_pass' => 'InstaLit123^%$',
    'smtp_crypto' => 'ssl', 
    'mailtype' => 'html',
    'smtp_timeout' => '1',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
); 

// $config = array(
//     'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
//     'smtp_host' => 'mail.anaxanet.com', 
//     'smtp_port' => 465,
//     'smtp_user' => 'johnbosco@dciconsulting.co',
//     'smtp_pass' => 'Qwerty123$#@',
//     'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
//     'mailtype' => 'html', //plaintext 'text' mails or 'html'
//     'smtp_timeout' => '1', //in seconds
//     'charset' => 'iso-8859-1',
//     'wordwrap' => TRUE
// );

?>