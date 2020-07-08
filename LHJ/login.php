<?php

$con=mysqli_connect("localhost", "root", "04540121", "login") or die("실패");

$id = $_POST["id"];
$pw = $_POST["pw"];

$sql ="INSERT INTO user VALUES ('".$id."', '".$pw."')";
$ret = mysqli_query($con, $sql);
if($ret) {echo "입력됨";}

mysqli_close($con);

 ?>
