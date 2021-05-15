<?php 
    ini_set('display_errors',1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");

    $address =  $_REQUEST["address"];
    $msg =      $_REQUEST["body"];
    $fullname = $_REQUEST["subject"];

    require "../../../plugins/PHPMailer/src/PHPMailer.php";
    require "../../../plugins/PHPMailer/src/SMTP.php";
    require "../../../plugins/PHPMailer/src/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer();
	$mail->SMTPDebug = 4;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = "true";
    $mail->SMTPSecure = "tls";
    $mail->Port = "587";
    $mail->Username = "vulventempel@gmail.com";
    $mail->Password = "vulventempel123";
    $mail->Subject = "vulventempel message FROM: " . $address . ", Full Name: " . $fullname;
    $mail->setFrom("vulventempel@gmail.com");
    $mail->isHTML(true);
    $mail->Body = $msg;
    $mail->addAddress("vulventempel@gmail.com");
    if(!$mail->send()){
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    else{
        echo "good";
    }
    $mail->smtpClose();




























//     $mail_address = $_REQUEST["mail_address"];
//     $subject = $_REQUEST["subject"];
//     $mail_text = $_REQUEST["mail_text"];
//     $sender = 
// 
//     $getter = "ucha1bokeria@gmail.com";
//     $defmail = "dachi.xucishvili8@gmail.com";
    
    // $mail = new PHPMailer();
    // $mail->isSMTP();
    // $mail->SMTPAuth = true;
    // $mail->SMTPSecure = 'ssl';
    // $mail->Host = 'smtp.hostinger.com';
    // $mail->Port = '587';
    // $mail->isHTML();
    // $mail->Username = 'test@vulventempel.de';
    // $mail->Password = 'Test1234';
    // $mail->SetFrom('no-reply@gmail.com');
    // $mail->Subject = "test";
    // $mail->Body = "test sccuess";
    // $mail->AddAddress("dachi.xucishvili8@gmail.com");
    // $mail->Send();
    // if($mail->send()){
    //     echo "good";
    // }
    // else{echo "bad";}
//     $to = "test@vulventempel.de";
//     $subject = " this is a subject ";
//     $message = " this is a message ";
//     $host = "From: test@vulventempel.de";
// 
//     $headers = "From: test@vulventempel.de\r\n";
//     $headers .= "CC: test@vulventempel.de\r\n";
//     $headers .= "MIME-Version: 1.0\r\n";
//     $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // if(mail($to,$subject,$message,$host)){echo "good";}
    // else{echo "bad";}