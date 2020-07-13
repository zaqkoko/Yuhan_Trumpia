<?php

$con=mysqli_connect("localhost", "root", "04540121", "toy") or die("실패");
//sql 연결

$id = $_POST["id"];
$pw = $_POST["pw"];
$name = $_POST["name"];
$mobile = $_POST["mobile"];
//input에서 입력한 값을 id, pw, name, mobile로 가져옴


$s_pw = password_hash($pw, PASSWORD_DEFAULT);
//pw를 암호화하여 s_pw에 저장

$sql ="INSERT INTO user (id, pw, name, mobile) VALUES ('".$id."', '".$s_pw."', '".$name."', '".$mobile."')";
//id, pw, name, mobile 칼럽에 $id, $s_pw, $name, $mobile 저장

$ret = mysqli_query($con, $sql);
//$sql쿼리 실행





if($ret) //실행된다면
{
  if(!$name == "")
  {
     echo "<script>window.alert('".$name."님 회원가입 되셨어양');</script>";
     //회원가입 확인 창이 뜸
     echo "<script>location.href='index.php';</script>";
     //index.php로 이동
  }
  else
  {
     echo "<script>window.alert('".$id."님 회원가입 되셨어양');</script>";
      //회원가입 확인 창이 뜸
     echo "<script>location.href='index.php';</script>";
      //index.php로 이동
  }

}


mysqli_close($con);
 ?>
