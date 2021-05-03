<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set('Etc/UTC');
header('Content-Type: text/html; charset=utf-8');

require_once('class.Mysqli.php');

require 'phpmailer2/Exception.php';
    require 'phpmailer2/PHPMailer.php';
    require 'phpmailer2/SMTP.php';
$user_id	             = $_SESSION['USERID'];
global $db;
$db = new dbClass();

$address 			= $_REQUEST['address'];
$cc_address 		= $_REQUEST['cc_address'];
$bcc_address 		= $_REQUEST['bcc_address'];
$subject 	 		= $_REQUEST['subject'];
$body 	 			= $_REQUEST['body'];

if($body == ''){
    $body = ' ';
}
$address = explode(",", $_REQUEST['address']);

$all_address = '';
for($i = 0; $i < count($address); $i++) {
    $add = $address[$i];
    
    $mail->addAddress($add);
    
    if ($all_address == '') {
        $all_address.=$add;
    }else{
        $all_address.=','.$add;
    }
    
}

if ($cc_address != '') {
    $mail->AddCC($cc_address);
}
if ($bcc_address != '') {
    $mail->AddBCC($bcc_address);
}

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = false;
$mail->SMTPAuth = false; 
$mail->CharSet = 'UTF-8';
$mail->SMTPSecure = false;
$mail->SMTPAutoTLS = false;
$mail->Debugoutput = 'html';
$mail->Host = 'localhost';
$mail->Port = 25;

$mail->setFrom('info@rda.gov.ge');

$mail->Subject = $subject;
$mail->msgHTML($body);

//send the message, check for errors
if (!$mail->send()) {
}
echo json_encode($data);