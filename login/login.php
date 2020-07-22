<?php
//로그인 접속 db 체크

//세션시작                   
session_start();
//toy 데이터 베이스에 연결
include "../db.php";
//index.php에서 입력받은 id와 pw를 $id, $pw로 저장
$id = $_POST["id"];
$pw = $_POST["pw"];
//id칼럼에 $id와 같은 값이 있는 데이터 전체를 가져온다
$sql = "select * from user where id='$id'";
//$sql 쿼리 실행
$ret = mysqli_query($conn, $sql);
//받은 결과값을 $row에 array로 저장
$row = mysqli_fetch_array($ret);
//$row의 pw를 $s_pw로 지정
$s_pw = $row['pw'];
//입력받은 id가 $row의 id와 같고, 입력받은 pw가 $s_pw와 비교한 값이 true일 때
if (($id == $row['id']) && (password_verify($pw, $s_pw))) {
    //session id, name, mobile 값을 row의 id, name, mobile 값으로 지정
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mobile'] = $row['mobile'];
    //1을 출력
    echo "1";
    exit;
} else if (!(($id == $row['id']) && (password_verify($pw, $s_pw)))) {
    //2를 출력
    echo "2";
    exit;
}
