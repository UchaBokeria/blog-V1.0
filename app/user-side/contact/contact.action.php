<?php 
    require_once("../../../plugins/Stmt/PHPMailerAutoload.php");

    $mail_address = $_REQUEST["mail_address"];
    $subject = $_REQUEST["subject"];
    $mail_text = $_REQUEST["mail_text"];

    $getter = "ucha1bokeria@gmail.com";
    $defmail = "dachi.xucishvili8@gmail.com";

    if($mail_address != "" && $mail_name != "" && $mail_text != ""){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'ragaca@gmail.com';
        $mail->Password = "";
        //$mail->SetFrom('no-reply@gmail.com');
        $mail->Subject = "test";
        $mail->Body = "test sccuess";
        $mail->AddAddress($getter);

        if($mail->send()){
            echo "good";
        }
    }

