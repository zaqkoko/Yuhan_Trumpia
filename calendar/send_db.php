<?php
include "../db.php";
//id라고 받아온 값을 $day로 지정
$day = $_POST["id"];
//$d_sql은 user_id가 $name과 같고,  send_type이 2이고 send_time에 받아온 $daay값이 포함되는 데이터를 가져옴
$d_sql = "SELECT receiver_number, send_message, send_time FROM sms WHERE user_id = '$name' AND send_type = 2 AND send_time LIKE '%$day%'";
// $conn으로 연결된 객체에  $d_sql쿼리문을 실행시키는 함수.
$d_result = mysqli_query($conn, $d_sql);
//while문을 통해 조회된 데이터를 가져온다
while ($d_row = mysqli_fetch_array($d_result))
{
  echo "<br><span id='listspan'>수신 번호</span> : " . $d_row[0]. "<br><span id='listspan'>메세지 내용</span> : " . $d_row[1]. "<br><span id='listspan'>발신 예정 시간</span> : " . $d_row[2] . "<br><span id='listspan'>----------------------------------</span><br>";
}
 ?>
