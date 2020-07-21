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

  // 질의를 해서 result에 받아온 레코드의 갯수를 카운트해서  1개 이상 있으면
  //if (mysqli_num_rows($result) > 0)
  //{
    // mysqli_fetch = result에 저장된 질의 결과를 배열로 반환함. fetch뒤에 붙이는 row는 배열 번호, assoc은 필드명, array는 둘 모두로  요소를 호출할 수 있다.
    //while($row = mysqli_fetch_array($result))
    //{
      //echo "보낸 시간: " . $row[0]. " 보낸 사람:" . $row[1]. "<br>";
      /*
        echo "보낸 시간: " . $row["send_time"]. " 보낸 사람:" . $row[user_id]. "<br>";
      */
    //}
    //$row = mysqli_fetch_array($result);
  //}
  // 레코드가 하나도 없으면.
  //else
  //
    //echo "테이블에 데이터가 없습니다.";
  //}
  // $row = mysqli_fetch_array($result)
  // if문 주석처리하고 그냥 $row에 넣은 배열을  js에서 사용할 수 있는 방법이 없을까...
  //mysqli_close($conn);
?>
