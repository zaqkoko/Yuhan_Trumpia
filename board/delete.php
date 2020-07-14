<!-- 데이터 선택삭제 -->
<?php
  $con=mysqli_connect("localhost", "root", "5022", "exam") or die("실패");
  $t= $_POST['val'];
  $q="DELETE FROM sms WHERE send_id=".$t;
  $r=mysqli_query($con,$q);

  while($row=mysqli_fetch_array($r)){
    echo "<tr><td><input type='checkbox' class='checkbox' name='list' value='".$row[send_id]."'></td><td>"
    .$row[receiver]."</td><td>".$row[send_message]."</td><td>".$row[send_time].
    "</td></tr>";
  }
 ?>
