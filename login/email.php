<?php
require "PHPMailer/PHPMailerAutoload.php";

function mailer($to, $from, $from_name, $subject, $body)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.naver.com';
    $mail->Port = 587;
    $mail->Username = 'yuhantrum';
    $mail->Password = 'xmfjavldk123'; // 트럼피아123

    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->From = "yuhantrum@naver.com";
    $mail->FromName = $from_name;
    $mail->Sender = $from;
    $mail->AddReplyTo($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);

    if ($mail->Send()) {
        echo "<script> location.href='index.html'; </script>";
    } else {
    }
}
