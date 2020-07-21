<?php

include "../db.php";

if ($_POST["name"] == "" || $_POST["email"] == "") {
    echo '<script> alert("항목을 입력해주세요");</script> <a href="forgotid.php">뒤로가기</a>';
} else {
    $name = $_POST["name"];
    $email = $_POST["email"];
}

/*$subject = "비밀번호 재설정";
$contents = "비밀번호 재설정 URL입니다. 버튼을 눌러 비밀번호를 재설정 하세요. <a href='localhost/Yuhan_Trumpia/login/update.php'>비밀번호 재설정</a>";
$headers = "From: zaqkoko@naver.com\r\n";
$header .= "MIME-Version: 1.0";
$header .= "Content-Type: text/html; charset=utf-8";
$header .= "X-Mailer: PHP";*/

$sql = "SELECT * FROM user WHERE name='{$name}' && email='{$email}'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);


if ($row["name"] == $name) {
    echo '<script> alert("당신의 아이디는 $row["id"] 입니다"); </script> <a href="index.php">로그인 페이지 가기</a>';
} else {
    echo '<script> alert("없는 계정입니다"); </script> <a href="forgotid.php">다시 입력하기</a>';
}
