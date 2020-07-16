

<?php
//mysql과 연동
$con=mysqli_connect("localhost", "root", "5022", "exam") or die("실패");
//연동되었는지 확인용
// echo var_dump($con);

//user_id 값을 기져온다
$t=
// $t='a';


//sms 테이블에서 사용자 데이터만 조회하는 쿼리문 작성
$q="SELECT * FROM sms WHERE user_id='".$t."'";
//연결한 서버에 작성한 쿼리문 실행
$r=mysqli_query($con,$q);
//while문을 통해 조회한 데이터를 가져온다.
while($row=mysqli_fetch_array($r)){
  //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성

  //---------------------사용자의 정보만 출력해야함 주의
  //사용자의 정보(user_id)와 session으로 가져온 user_id를 비교하고 일치하는 것만 출력
  echo "<tr>
  <td><input type='checkbox' class='checkbox' name='list' value='".$row[send_id]."'></td>
  <td>".$row[receiver]."</td>
  <td>".$row[send_message]."</td>
  <td>".$row[send_time]."</td>
  <td class='type'>".$row[send_type]."</td>
  </tr>";
}

?>
