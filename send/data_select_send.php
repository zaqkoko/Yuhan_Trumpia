<?php
//주소록에서 send로 데이터가져오는 파일입니다

  include "../db.php";

$q="SELECT * FROM addressbook WHERE user_id='$name'";
$r = mysqli_query($conn, $q);

while ($row = mysqli_fetch_array($r)) {
  //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
  echo "<tr onclick='dataclick(this);'value='false' >
    <td class='name' width='25%'>" . $row['name'] . "</td>
    <td class='tel' width='35%'>" . $row['receiver_number'] . "</td>
    <td calss='mail' width='50%'>" . $row['receiver_email'] . "</td>
    </tr>";
  }

 ?>
