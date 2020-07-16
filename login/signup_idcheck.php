<?php
$con=mysqli_connect("localhost", "root", "04540121", "send") or die("실패");
$id = $_POST["id"];
//입력한 id값과 같은 데이터 가져동
$sql = "select * from user where id='$id'";
//쿼리실행
$ret = mysqli_query($con, $sql);
//결과값을 row로
$row = mysqli_fetch_array($ret);


if($row >= 1)
{
     echo "2";
}
else
{
     echo "1";
}
