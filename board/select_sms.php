<!-- board의 테이블에 명세를 출력하는 php파일 -->
<?php

include "../db.php";

//$_POST로 가져온 데이터가 null이면
if ($_POST['pgNum'] == null) {
  //sms 테이블에서 사용자(user_id) 데이터만 조회하는 쿼리문 작성 // pk 내림차순으로 정렬. 0번째부터 15개의 데이터 출력.
  $q = "SELECT * FROM sms WHERE user_id='$name' ORDER BY `sms`.`send_id` DESC LIMIT 0, 15";
  // 조회한 데이터를 출력하는 php
  include "print_table.php";
} else {
  $num = $_POST['pgNum'];
  $cntNum = $num * 15;
  //sms 테이블에서 사용자(user_id) 데이터만 조회하는 쿼리문 작성 // pk 내림차순으로 정렬. cntNum번째부터 15개의 데이터 출력.
  $q = "SELECT * FROM sms WHERE user_id='$name' ORDER BY `sms`.`send_id` DESC LIMIT $cntNum, 15";
  // 조회한 데이터를 출력하는 php
  include "print_table.php";
}
