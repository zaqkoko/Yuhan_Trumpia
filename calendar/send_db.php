<?php
include "../db.php";

$day = $_POST["id"];

$d_sql = "SELECT receiver_number, send_message, send_time FROM sms WHERE user_id = '$name' AND send_type = 2 AND send_time LIKE '%$day%'";
// $conn으로 연결된 객체에  $d_sql쿼리문을 실행시키는 함수.
$d_result = mysqli_query($conn, $d_sql);

while ($d_row = mysqli_fetch_array($d_result))
{
  //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
  echo "수신 번호 : " . $d_row[0]. "<br>메세지 내용 : " . $d_row[1]. "<br>발신 예정 시간 : " . $d_row[2] . "<br>";
}
 ?>
