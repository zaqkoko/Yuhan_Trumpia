
<?php
session_start();
//세션 시작
$con=mysqli_connect("localhost", "root", "04540121", "toy") or die("sql접속ㄴㄴ");
//sql 접속

$id = $_POST["id"];
$pw = $_POST["pw"];
//입력값을 가져옴

$query = "select * from user where id='$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$s_pw = $row['pw'];


if( ($id==$row['id']) && (password_verify($pw, $s_pw)) ) //입력한 id가 row의 id와 같고
{
   $_SESSION['id']=$row['id'];
   $_SESSION['name']=$row['name'];
   $_SESSION['mobile']=$row['mobile'];
   echo "<script>window.alert('".$_SESSION['name']."님이 로그인 하였습니다.');</script>";
   echo "<script>location.href='main.php';</script>";

}else{
   echo "<script>window.alert('아이디/비번 확인 바라양');</script>";
   echo "<script>location.href='index.php';</script>";

}



mysqli_close($con);

 ?>
