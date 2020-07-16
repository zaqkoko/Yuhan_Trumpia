<?php
//임의로 a라 정함
$id='a';

//mysql과 연동
  $con=mysqli_connect("localhost", "root", "04540121", "toy") or die("실패");
  //연동되었는지 확인용
  // echo var_dump($con);
  //post형식으로 val값을 가져와 t에 넣음(val는 가져온 체크박스 value값임)
  $t= $_POST['val'];
  //t를 통해 원하는 데이터를 삭제하는 쿼리문 작성
  $q="DELETE FROM sms WHERE send_id=".$t;
  //가져온 쿼리문을 연결한 데이터베이스에서 실행
  $r=mysqli_query($con,$q);
  //while문을 통해 선택한 데이터 삭제 이후의 테이블 데이터를 가져온다

//수정중
  // while($row=mysqli_fetch_array($r)){
  //   //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
  //   echo "<tr><td><input type='checkbox' class='checkbox' name='list' value='".$row[send_id]."'></td><td>"
  //   .$row[receiver]."</td><td>".$row[send_message]."</td><td>".$row[send_time]."</td><td>".$row[send_type].
  //   "</td></tr>";
  // };
 ?>
