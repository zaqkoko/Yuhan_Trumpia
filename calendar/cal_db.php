<?php

  include "../db.php";

  $day = $_POST["id"];

  echo $day;

  //데이터를 불러오는 쿼리문(질의). 조건문으로 현재 세션의 아이디와 동일한 테이블에서  send_type이 2인 레코드만 가져옴. (발송 예약)
  $d_sql = "SELECT receiver_number, send_message, send_time, send_type, user_id FROM sms WHERE user_id = '$name' AND send_type = 2 AND send_time LIKE '%$day%'";
  // $conn으로 연결된 객체에  $d_sql쿼리문을 실행시키는 함수.
  $d_result = mysqli_query($conn, $d_sql);
  $d_row = mysqli_fetch_array($d_result);



  // 데이터를 불러오는 쿼리문(질의). 조건문으로 현재 세션의 아이디와 동일한 테이블에서  send_type이 1인 레코드만 가져옴 (발송 완료).
  $t_sql = "SELECT receiver_number, send_message, send_time, send_type, user_id FROM sms WHERE user_id = '$name' AND send_type = 1 AND send_time LIKE '%$day%'";
  // $conn으로 연결된 객체에  $t_sql쿼리문을 실행시키는 함수.
  $t_result = mysqli_query($conn, $t_sql);
  $t_row = mysqli_fetch_array($t_result);


?>
