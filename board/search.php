<?php

include "../db.php";


//$_POST로 가져온 데아터가 null이 아닐때 (선택삭제일 때)
if ($_POST['kword'] != null) {
  //kword를 가져온 데이터로 초기화
  $kword = $_POST['kword'];
  //kword가 포함되고 유저아이디와 동일한 테이터를 조회
  $q = "SELECT * FROM sms WHERE send_message LIKE '%$kword%' AND user_id='$name'";
  //쿼리문 실행
  $r = mysqli_query($conn, $q);

  //while문을 통해 조회한 데이터를 가져온다.
  while ($row = mysqli_fetch_array($r)) {
    //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
    echo "<tr>
    <td width='5%'><input type='checkbox' class='checkbox' onclick='check();' value='" . $row['send_id'] . "'></td>
    <td width='20%'>" . $row['receiver'] . "</td>
    <td width='40%'>" . $row['send_message'] . "</td>
    <td width='20%'>" . $row['send_time'] . "</td>
    <td width='10%' class='type'>" . $row['send_type'] . "</td>
    </tr>";
  }
}
