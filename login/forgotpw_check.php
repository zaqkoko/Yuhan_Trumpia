<?php
// 비밀번호 찾기 db 체크

include "../db.php";

// 입력받은 id와 email의 값이 둘 중 하나라도 공백이면
if ($_POST["id"] == "" || $_POST["email"] == "") {
    echo '<script> alert("항목을 입력해주세요");</script> <a href="forgotpw.html">뒤로가기</a>';
} else {
    // 변수 id에는 입력받은 id값, email에는 입력받은 email값 넣기
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

// email을 사용하기 위해서는 25번 포트가 열려있어야하며, SMTP서버가 설치되어있어야한다. 
// 서버에 SMTP 서버가 구성되어 있지 않으면 PHP자체에 구현되어있는 메일 발송 기능을 사용할 수 없다.
// SMTP로 메일을 발송할 수 있게 도와주는 메일 발송 관련 라이브러리 = PHPMailer
// mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set() 뜬다.

// 해결법은 메일발송서버를 깔아야 한다고 함.
// $log = mail("zaqkoko@naver.com", $subject, $contents, $headers);


// echo '<script> alert("메일로 비밀번호 재설정 URL이 발송되었습니다.");</script> <a href="index.php">로그인 페이지 가기</a>';
/*
if (!$log) {
        $errorMessage = error_get_last()['message'];
        echo $errorMessage;
    }
*/

// user 테이블의 모든 컬럼을 조회. 조건 : 컬럼명 id가 입력받은 id이고 컬럼명 email이 입력받은 email일 때.
$sql = "SELECT * FROM user WHERE id='{$id}' && email='{$email}'";

// mysqli_query = mysqli_connect를 통해 연결된 객체를 이용하며 mysql 쿼리를 실행시키는 함수
$res = mysqli_query($conn, $sql);

// mysqli_fetch_array = mysqli_query를 통해 얻은 값($res)에서 데이터를 한 개씩 리턴해주는 함수
$row = mysqli_fetch_array($res);

$s_pw = $row['pw'];

// 만약 입력받은 id값이 데이터에 존재하면
if ($row["id"] == $id) {

    // 세션['uid']에 해당 id값 저장
    $_SESSION['uid'] = $row['id'];

    // 알림창 이후 update.php로 즉시이동
    echo "<script> alert('비밀번호를 재설정합니다'); location.href = 'update.php'; </script>";

    // echo "<script> alert('당신의 비밀번호는  {$row['pw']} 입니다');  location.href = 'index.php'; </script>";

} else {

    // 입력 다시하라는 알람창 이후 forgotpw.html 즉시이동
    echo '<script> alert("입력을 다시 확인해주세요"); location.href = "forgotpw.html"; </script>';
}
