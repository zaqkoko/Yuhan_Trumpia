<?php
// 비밀번호 찾기 db 체크

include "../db.php";
include "email.php";

// 입력받은 id와 email의 값이 둘 중 하나라도 공백이면
if ($_POST["id"] == "" || $_POST["email"] == "") {
    echo '<script> alert("항목을 입력해주세요"); location.href="forgotpw.html"; </script>';
} else {
    // 변수 id에는 입력받은 id값, email에는 입력받은 email값 넣기
    $id = $_POST["id"];
    $email = $_POST["email"];
}

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
    $_SESSION['email'] = $row['email'];

    // Node.js

    // 이용자가 도메인에 접속(서버컴에 접속)하면 이용자는 노드가 안 깔려 있어도 메일 전송이 가능하다. (이용자 -> 도메인 -> DNS -> IP -> 서버 컴퓨터)
    // 개발자끼리 로컬에서 개발한다면 각자 Node를 깔아야 함. 그래서 원래 프로젝트 진행하기 전에 개발자끼리 합의 후에 서로 설치한다고 하심. 

    // shell_exec = 쉘 명령어 실행해서 결과를 웹브라우저에서 확인이 가능하다.    system = 바로 실행.
    system("node nodemail.js");
    echo '<script> alert("안녕하세요. TOY입니다. 비밀번호 재설정 URL이 발송되었습니다."); location.href="index.html"; </script>';

    // JS
    // echo '<script> alert("안녕하세요. TOY입니다. 비밀번호 재설정 URL이 발송되었습니다."); </script>';
    // echo '<script> location.href="email.html"; </script>';

    // PHP
    /*echo '<script> alert("안녕하세요. TOY입니다. 비밀번호 재설정 URL이 발송되었습니다."); </script>';
    mailer("$email", "yuhantrum@naver.com", "TOY", "TOY 비밀번호 변경 URL을 알려드립니다", "<p>아래의 링크를 클릭해주세요<p> <a href='http://localhost/Yuhan_Trumpia/login/update.php'>인증하기</a>");
    echo '<script> location.href="index.php"; </script>';*/


    // 알림창 이후 update.php로 즉시이동
    // echo "<script> alert('비밀번호를 재설정합니다'); location.href = 'update.php'; </script>";

    // 암호화 PW 알려줌
    // echo "<script> alert('당신의 비밀번호는  {$row['pw']} 입니다');  location.href = 'index.php'; </script>";

} else {

    // 입력 다시하라는 알람창 이후 forgotpw.html 즉시이동
    echo '<script> alert("입력을 다시 확인해주세요"); location.href = "forgotpw.html"; </script>';
}
