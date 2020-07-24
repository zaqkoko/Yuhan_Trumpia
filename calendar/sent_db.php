<?php
include "../db.php";

$day = $_POST["id"];

$t_sql = "SELECT receiver_number, send_message, send_time FROM sms WHERE user_id = '$name' AND send_type = 1 AND send_time LIKE '%$day%'";
// $conn으로 연결된 객체에  $d_sql쿼리문을 실행시키는 함수.
$t_result = mysqli_query($conn, $t_sql);

while ($t_row = mysqli_fetch_array($t_result))
{
  //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
  echo "수신 번호 : " . $t_row[0]. "<br>메세지 내용 : " . $t_row[1]. "<br>발신 시간 : " . $t_row[2] . "<br>";
}
 ?>
