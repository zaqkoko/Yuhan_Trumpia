<?php
//session으로 아이디값을 가져옮
session_start();
$id = $_SESSION['id'];


include "../db.php";
// //mysql과 연동
//   $con=mysqli_connect("localhost", "root", "5022", "toy") or die("실패");
//   //연동되었는지 확인용
//   // echo var_dump($con);

//post형식으로 val값을 가져와 t에 초기화(val는 가져온 체크박스 value or null)
$t = $_POST['val'];

//post로 받은 값이 null일 때 (null=전체삭제)
if ($_POST['val'] == null) {

  //sms테이블의 유저 데이터를 모두 삭제하는 쿼리문 작성
  $q = "DELETE FROM sms WHERE user_id='" . $id . "'";
  //작성한 쿼리문을 연결한 서버에서 쿼리실행
  $r = mysqli_query($con, $q);
  //post로 받은 값이 null이 아닐때(null !=선택삭제)
} else {
  //t를 통해 원하는 데이터를 삭제하는 쿼리문 작성
  $q = "DELETE FROM sms WHERE send_id=" . $t;
  //가져온 쿼리문을 연결한 데이터베이스에서 실행
  $r = mysqli_query($con, $q);
}

//sms 테이블에서 사용자(user_id) 데이터만 조회하는 쿼리문 작성
$q = "SELECT * FROM sms WHERE user_id='$id'";
//연결한 서버에 작성한 쿼리문 실행
$r = mysqli_query($con, $q);


//while문을 통해 조회한 데이터를 가져온다.
while ($row = mysqli_fetch_array($r)) {
  //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
  echo "<tr>
      <td width='5%'><input type='checkbox' class='checkbox' name='list' value='" . $row['send_id'] . "'></td>
      <td width='20%'>" . $row['receiver'] . "</td>
      <td width='40%'>" . $row['send_message'] . "</td>
      <td width='20%'>" . $row['send_time'] . "</td>
      <td width='10%' class='type'>" . $row['send_type'] . "</td>
      </tr>";
}
