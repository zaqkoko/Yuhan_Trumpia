<?php

include "../db.php";

// 입력받은 name id와 email의 값이 둘 중 하나라도 공백이면
if ($_POST["name"] == "" || $_POST["email"] == "") {

    // alert로 알림창 띄우고 홈페이지 즉시 이동(location.href = "주소")
    echo '<script> alert("항목을 입력해주세요"); location.href = "forgotid.php"; </script>';
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
    echo "<script> alert('당신의 아이디는  {$row["id"]} 입니다'); location.href = 'index.php'; </script>";
} else {
    echo '<script> alert("입력을 다시 확인해주세요"); location.href = "forgotid.php"; </script>';
}
