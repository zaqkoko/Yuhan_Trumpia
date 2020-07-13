<?php
  $con=mysqli_connect("localhost", "root", "5022", "exam") or die("실패");
  $q="TRUNCATE sms";
  $r=mysqli_query($con,$q);
 ?>
 alert("삭제되었습니다.");
