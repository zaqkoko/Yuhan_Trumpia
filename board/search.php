<!-- board_script 파일의 search 버튼을 클릭했을때, 요청받은 조건의 검색결과를 가져올 php파일 -->
<?php

include "../db.php";

//$_POST로 가져온 데이터가 null이 아닐때
if ($_POST['kword'] != null) {
  //kword를 가져온 데이터로 초기화
  $kword = $_POST['kword'];
  //slct를 포스트받은거로 넣어줌
  $slct = $_POST['slct'];
  //kword가 포함되고 유저아이디와 동일한 테이터를 조회. // 셀렉트박스로 선택한 필터에 해당하는($slct) 컬럼에서만 검색
  $q = "SELECT * FROM sms WHERE $slct LIKE '%$kword%' AND user_id='$name'";
  // 조회한 데이터를 출력하는 php
  include "print_table.php";
}
// $_POST로 가져온 데이터가 NULL이면 (아무것도 입력없이 검색 했을때)
else {
  //sms 테이블에서 사용자(user_id) 데이터만 조회하는 쿼리문 작성
  $q = "SELECT * FROM sms WHERE user_id='$name'";
  // 조회한 데이터를 출력하는 php
  include "print_table.php";
}
