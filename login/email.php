<?php
require "PHPMailer/PHPMailerAutoload.php";

function mailer($to, $from, $from_name, $subject, $body)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'tls'; // smtp 보안 tls, ssl
    $mail->Host = 'smtp.naver.com'; // smtp host url
    $mail->Port = 587; // smtp host port
    $mail->Username = 'yuhantrum'; // naver ID
    $mail->Password = 'xmfjavldk123'; // naver PW 트럼피아123

    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8'; // utf-8 안하면 한글깨짐
    $mail->From = "yuhantrum@naver.com";
    $mail->FromName = $from_name; // 보내는 사람 메일
    $mail->Sender = $from; // 보내는 사람 메일
    $mail->AddReplyTo($from, $from_name); // 보내는 이름
    $mail->Subject = $subject; // 제목
    $mail->Body = $body; // 본문
    $mail->AddAddress($to); // 받는 이

    if ($mail->Send()) {
        // 메일 보내지면 홈페이지 즉시이동
        echo "<script> location.href='index.html'; </script>";
    } else {
    }
}
