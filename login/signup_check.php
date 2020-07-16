<?php
     //toy 에 연결
     $con=mysqli_connect("localhost", "root", "04540121", "send") or die("실패");
     //입력받은 id, pw, name, mobile을 각각 변수로 지정
     $id = $_POST["id"];
     $pw = $_POST["pw"];
     $name = $_POST["name"];
     $mobile = $_POST["mobile"];

     
     //$pw를 암호화하여 $s_pw에 지정
     //ohp에서 지원하는 password_hash 함수에서는 변환시킬때 password_derault와 password_bcrypt 두가지의 알고리즘 형태가 있는데 default는 시간이 지나면 길이와 내용이 변한다. bcrypt는 60자로 결과가 고정된다.
     $s_pw = password_hash($pw, PASSWORD_DEFAULT);
     //입력된 값($pw대신 암호화한 $s_pw)을 user테이블의 id, pw, name, mobile칼럼에 저장
     $sql ="INSERT INTO user (id, pw, name, mobile) VALUES ('".$id."', '".$s_pw."', '".$name."', '".$mobile."')";
     //$sql쿼리를 실행
     $ret = mysqli_query($con, $sql);

     //ret이 실행되었을 때
     if($ret)
     {
          //name이 ''이 아니라면
          if(!$name == "")
          {
               //입력한 name값으로 회원가입 alert
               echo "<script>window.alert('".$name."님 회원가입 되셨어양');</script>";
               //index.php로 이동
               echo "<script>location.href='index.php';</script>";
          }
          else
          {
               //입력한 id값으로 회원가입 alert
               echo "<script>window.alert('".$id."님 회원가입 되셨어양');</script>";
               //index.php로 이동
               echo "<script>location.href='index.php';</script>";
          }
     }
