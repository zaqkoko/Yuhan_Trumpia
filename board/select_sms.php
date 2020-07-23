<!-- board의 테이블에 명세를 출력하는 php파일 -->
<?php

include "../db.php";

//sms 테이블에서 사용자(user_id) 데이터만 조회하는 쿼리문 작성
$q = "SELECT * FROM sms WHERE user_id='$name'";
//연결한 서버에 작성한 쿼리문 실행
$r = mysqli_query($conn, $q);
//while문을 통해 조회한 데이터를 가져온다.
while ($row = mysqli_fetch_array($r)) {
  //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
  echo "<tr>
    <td width='5%'><input type='checkbox' class='checkbox'  onclick='check();' value='" . $row['send_id'] . "'></td>
    <td width='20%'>" . $row['receiver'] . "</td>
    <td width='40%'>" . $row['send_message'] . "</td>
    <td width='20%'>" . $row['send_time'] . "</td>
    <td width='10%' class='type'>" . $row['send_type'] . "</td>
    </tr>";
}
