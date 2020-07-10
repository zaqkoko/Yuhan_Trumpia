<?php
   $conn = mysqli_connect("localhost", "root", "123456" , "toy");
   $sql = "SELECT send_date, name FROM calendar_table";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
   echo "보낸시간: " . $row["send_date"]. " 이름:" . $row["name"]. "<br>";
   }
   }else{
   echo "테이블에 데이터가 없습니다.";
   }
   mysqli_close($conn); // 디비 접속 닫기 //된다!!!!
?>
