<?php
include '../db.php';


$q = "SELECT * FROM addressbook WHERE user_id='$name'";

// $q = "SELECT * FROM addressbook";
// addressbook 테이블의 전체 데이터를 조회
$r = mysqli_query($conn, $q);
//while문을 통해 조회한 데이터를 가져온다.
while ($row = mysqli_fetch_array($r)) {
  //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
  echo "<tr>
    <td width='5%'><input type='checkbox' class='checkbox' onclick='check();' value='" . $row['id'] . "'></td>
    <td width='25%'>" . $row['name'] . "</td>
    <td width='35%'>" . $row['receiver_number'] . "</td>
    <td width='50%'>" . $row['receiver_email'] . "</td>
    </tr>";
}
?>
