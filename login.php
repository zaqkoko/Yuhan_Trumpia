<?php
session_start();
//세션 시작
$con=mysqli_connect("localhost", "root", "04540121", "toy") or die("sql접속ㄴㄴ");
//sql 접속

$id = $_POST["id"];
$pw = $_POST["pw"];
//입력값을 id와 pw로 가져옴
//test

$sql = "select * from user where id='$id'";
//id칼럼의 내용이 $인 모든 데이터를 user테이블에서 호..출?
$ret = mysqli_query($con, $sql);
//쿼리 실행
$row = mysqli_fetch_array($ret);
//result를 통해 얻은 값을 배열로 리턴?하여 row로 정의?저장?
$s_pw = $row['pw'];
//가져온 pw값을 s_pw라고 정의


if( ($id==$row['id']) && (password_verify($pw, $s_pw)) )
//입력한 id가 row의 id와 같고 $pw와 $s_pw를 비교한 값이 true일 때
{
   $_SESSION['id']=$row['id'];
   $_SESSION['name']=$row['name'];
   $_SESSION['mobile']=$row['mobile'];
   //session id, name, mobile에 row의 값 저장
   echo "<script>window.alert('".$_SESSION['name']."님이 로그인 하였습니다.');</script>";
   echo "<script>location.href='main.php';</script>";
   //메인 화면으로 이동
}
else
{
   echo "<script>window.alert('아이디/비번 확인 바라양');</script>";
   echo "<script>location.href='index.php';</script>";
}

mysqli_close($con);

 ?>
