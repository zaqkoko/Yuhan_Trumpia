<?php

  include "../db.php";

  // 서버에 접속하고 접속값을 변수 con에 반환한다. 접속 실패하면 실패띄워줌
  //$conn = mysqli_connect("localhost", "root", "04540121" , "toy") or die("sql 접속 실패");

  // 데이터를 불러오는 쿼리문(질의). 조건문으로 현재 세션의 아이디와 동일한 테이블에서  send_type이 2인 레코드만 가져옴. (발송 예약)
  $d_sql = "SELECT receiver, send_message, send_time, send_type, user_id FROM sms WHERE user_id = '$name' AND send_type = 2";
  // $conn으로 연결된 객체에  $d_sql쿼리문을 실행시키는 함수.
  $d_result = mysqli_query($conn, $d_sql);

  // 데이터를 불러오는 쿼리문(질의). 조건문으로 현재 세션의 아이디와 동일한 테이블에서  send_type이 1인 레코드만 가져옴 (발송 완료).
  $t_sql = "SELECT receiver, send_message, send_time, send_type, user_id FROM sms WHERE user_id = '$name' AND send_type = 1";
  // $conn으로 연결된 객체에  $t_sql쿼리문을 실행시키는 함수.
  $t_result = mysqli_query($conn, $t_sql);
?>
