<!-- board_js 파일의 search 버튼을 클릭했을때, 요청받은 조건의 검색결과를 가져올 php파일 -->
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
  //쿼리문 실행
  $r = mysqli_query($conn, $q);
  //while문을 통해 조회한 데이터를 가져온다.
  while ($row = mysqli_fetch_array($r)) {
    //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
    echo "<tr>
    <td width='5%'><input type='checkbox' class='checkbox' onclick='check();' value='" . $row['send_id'] . "'></td>
    <td width='20%'>" . $row['receiver_number'] . "</td>
    <td width='40%'>" . $row['send_message'] . "</td>
    <td width='20%'>" . $row['send_time'] . "</td>
    <td width='10%' class='type'>" . $row['send_type'] . "</td>
    </tr>";
  }
}
// $_POST로 가져온 데이터가 NULL이면 (아무것도 입력없이 검색 했을때)
else {
  //sms 테이블에서 사용자(user_id) 데이터만 조회하는 쿼리문 작성
  $q = "SELECT * FROM sms WHERE user_id='$name'";
  //연결한 서버에 작성한 쿼리문 실행
  $r = mysqli_query($conn, $q);
  //while문을 통해 조회한 데이터를 가져온다.
  while ($row = mysqli_fetch_array($r)) {
    //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
    echo "<tr>
      <td width='5%'><input type='checkbox' class='checkbox'  onclick='check();' value='" . $row['send_id'] . "'></td>
      <td width='20%'>" . $row['receiver_number'] . "</td>
      <td width='40%'>" . $row['send_message'] . "</td>
      <td width='20%'>" . $row['send_time'] . "</td>
      <td width='10%' class='type'>" . $row['send_type'] . "</td>
      </tr>";
  }
}
