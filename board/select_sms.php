<!-- board의 테이블에 명세를 출력하는 php파일 -->
<?php

include "../db.php";

//sms 테이블에서 사용자(user_id) 데이터만 조회하는 쿼리문 작성 // pk 내림차순으로 정렬 
$q = "SELECT * FROM sms WHERE user_id='$name' ORDER BY `sms`.`send_id` DESC";
//연결한 서버에 작성한 쿼리문 실행
//$r = mysqli_query($conn, $q);
// 조회한 데이터를 출력하는 php
include "print_table.php";
