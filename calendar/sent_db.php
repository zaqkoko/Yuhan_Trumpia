<?php
include "../db.php";
//id라고 받아온 값을 $day로 지정
$day = $_POST["id"];
//$t_sql은 user_id가 $name과 같고,  send_type이 1이고 send_time에 받아온 $daay값이 포함되는 데이터를 가져옴
$t_sql = "SELECT receiver_number, send_message, send_time FROM sms WHERE user_id = '$name' AND send_type = 1 AND send_time LIKE '%$day%'";
// $conn으로 연결된 객체에  $t_sql쿼리문을 실행시키는 함수.
$t_result = mysqli_query($conn, $t_sql);
//while문을 통해 조회된 데이터를 가져온다
while ($t_row = mysqli_fetch_array($t_result))
{
  echo "<br><span id='listspan'>수신 번호</span> : " . $t_row[0]. "<br><span id='listspan'>메세지 내용</span> : " . $t_row[1]. "<br><span id='listspan'>발신 시간</span> : " . $t_row[2] . "<br><span id='listspan'>----------------------------------</span><br>";
}
 ?>
