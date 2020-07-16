<?php
//임의로 a라 정함
$id='a';


//mysql과 연동
  $con=mysqli_connect("localhost", "root", "5022", "exam") or die("실패");
  //연동되었는지 확인용
  // echo var_dump($con);
  //sms테이블의 유저 데이터를 모두 삭제하는 쿼리문 작성
  $q="DELETE FROM sms WHERE user_id='".$id."'";
  //작성한 쿼리문을 연결한 서버에서 쿼리실행
  $r=mysqli_query($con,$q);
  //whlre문으로 삭제된 이후의 테이블 데이터를 가져온다

//수정중

  // while($row=mysqli_fetch_array($r)){
  //   //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
  //   echo "<tr><td><input type='checkbox' class='checkbox' name='list' value='".$row[send_id]."'></td><td>"
  //   .$row[receiver]."</td><td>".$row[send_message]."</td><td>".$row[send_time]."</td><td>".$row[send_type].
  //   "</td></tr>";
  // }
?>
