<?php
     //세션이 시작된다
     session_start();
     //toy 데이터 베이스에 연결
     $con=mysqli_connect("localhost", "root", "04540121", "toy") or die("sql접속ㄴㄴ");
     //index.php에서 입력받은 id와 pw를 변수로 저장
     $id = $_POST["id"];
     $pw = $_POST["pw"];
     //id칼럼의 값?데이터?가 $id와 같은 데이터의 전체를 가져오da
     $sql = "select * from user where id='$id'";
     //$sql 쿼리 실행
     $ret = mysqli_query($con, $sql);
     //받은 결과값을 $row에 저장
     $row = mysqli_fetch_array($ret);
     //$row의 pw를 $s_pw로 지정
     $s_pw = $row['pw'];
     //입력받은 id가 $row의 id와 같고, 입력받은 pw가 $s_pw와 비교한 값이 true일 때
     if( ($id==$row['id']) && (password_verify($pw, $s_pw)) )
     {
          //session id, name, mobile 값을 row의 id, name, mobile 값으로 지정
          $_SESSION['id']=$row['id'];
          $_SESSION['name']=$row['name'];
          $_SESSION['mobile']=$row['mobile'];
          //$res변수를 1로 지정
          echo "1";
          exit;
     }
     else if (!( ($id==$row['id']) && (password_verify($pw, $s_pw)) ))
     {
          //$res변수를 2로 지정
          echo "2";
          exit;
     }
