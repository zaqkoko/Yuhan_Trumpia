<!-- board_script 파일의 removepost 함수가 실행될때, 요청받은 요소를 삭제하고 명세를 제출력하는 php파일 -->
<?php

include "../db.php";

//post형식으로 val값을 가져와 t에 초기화(val는 가져온 체크박스 value or null)
$t = $_POST['val'];

//post로 받은 값이 null일 때 (null=전체삭제)
if ($_POST['val'] == null) {

  //sms테이블의 유저 데이터를 모두 삭제하는 쿼리문 작성
  $q = "DELETE FROM sms WHERE user_id='" . $name . "'";
  //작성한 쿼리문을 연결한 서버에서 쿼리실행
  $r = mysqli_query($conn, $q);
  //post로 받은 값이 null이 아닐때(null !=선택삭제)
} else {
  //t를 통해 원하는 데이터를 삭제하는 쿼리문 작성
  $q = "DELETE FROM sms WHERE send_id=" . $t;
  //가져온 쿼리문을 연결한 데이터베이스에서 실행
  $r = mysqli_query($conn, $q);
}

//sms 테이블에서 사용자(user_id) 데이터만 조회하는 쿼리문 작성
$q = "SELECT * FROM sms WHERE user_id='$name'";
// 조회한 데이터를 출력하는 php
include "print_table.php";
