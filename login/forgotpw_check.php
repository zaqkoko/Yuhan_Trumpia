<?php

include "../db.php";

if ($_POST["id"] == "" || $_POST["email"] == "") {
    echo '<script> alert("항목을 입력해주세요");</script> <a href="forgotpw.php">뒤로가기</a>';
} else {
    $id = $_POST["id"];
    $email = $_POST["email"];
}
/*
$subject = "비밀번호 재설정";
$contents = "비밀번호 재설정 URL입니다. 버튼을 눌러 비밀번호를 재설정 하세요. <a href='localhost/Yuhan_Trumpia/login/update.php'>비밀번호 재설정</a>";
$headers = "From: zaqkoko@naver.com\r\n";
$header .= "MIME-Version: 1.0";
$header .= "Content-Type: text/html; charset=utf-8";
$header .= "X-Mailer: PHP"; */

$sql = "SELECT * FROM user WHERE id='{$id}' && email='{$email}'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);
$s_pw = $row['pw'];

// email을 사용하기 위해서는 25번 포트가 열려있어야하며, SMTP서버가 설치되어있어야한다. 
// 서버에 SMTP 서버가 구성되어 있지 않으면 PHP자체에 구현되어있는 메일 발송 기능을 사용할 수 없다.
// SMTP로 메일을 발송할 수 있게 도와주는 메일 발송 관련 라이브러리 = PHPMailer
if ($row["id"] == $id) { // mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set() 뜬다.
    // 해결법은 메일발송서버를 깔아야 한다고 함.
    // $log = mail("zaqkoko@naver.com", $subject, $contents, $headers);
    echo "<script> alert('당신의 비밀번호는  {$row['pw']} 입니다');</script> <a href='index.php'>로그인 페이지 가기</a>'";
    // echo '<script> alert("메일로 비밀번호 재설정 URL이 발송되었습니다.");</script> <a href="index.php">로그인 페이지 가기</a>';
    /*if (!$log) {
        $errorMessage = error_get_last()['message'];
        echo $errorMessage;
    }*/
} else {
    echo '<script> alert("없는 계정입니다"); </script> <a href="forgotpw.php">다시 입력하기</a>';
}
