<?php
$con=mysqli_connect("localhost", "root", "5022", "exam") or die("실패");

// mysqli_query("SET NAMES UTF8");
$q="SELECT * FROM sms";
$r=mysqli_query($con,$q);

$num=0;
while($row=mysqli_fetch_array($r)){
 $num ++;
  echo "<tr><td><input type='checkbox' class='checkbox' value='".n."'></td><td>"
  .$row[receiver]."</td><td>".$row[send_message]."</td><td>".$row[send_time].
  "</td></tr>";
}


// $result=array();
// while ($row=mysqli_fetch_array($r)) {
//   array_push($result,array('id'=>$row[id],'text'=>$row[text]));
// }
// echo json_encode($result,JSON_UNESCAPED_UNICODE);
// $list=json_decode($result);

//include "파일이름"; // import같은 기능

// while($row=mysqli_fetch_array($r)){
//   echo $row[id],$row[text];
// }


 ?>
