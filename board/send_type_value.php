<?php
$con=mysqli_connect("localhost", "root", "5022", "exam") or die("실패");
//send_type이 전송된 메시지 타입(1)만 가져온다.
$q="SELECT * FROM sms WHERE send_type='1'";
$r=mysqli_query($con,$q);

$n=0;
// while문으로 갯수세기
while($row=mysqli_fetch_array($r)){
  $n++;
}
echo $n;
 ?>
