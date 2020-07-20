<?php
//---------------테스트페이지입니다-------------------
//-------------삭제할 예정입니다-----------------

$id='a';


$con=mysqli_connect("localhost", "root", "5022", "toy")or die("실패");

// $q="SELECT count(*) FROM sms WHERE send_type='1' AND user_id='$id'";
// $r=mysqli_query($con,$q);
//
// $count=$r;

// echo $count;

echo "<script>window.alert('hello??');</script>";
//Count 방법
//1. $q "SELECT count(*) FROM sms WHERE send_type='1':" 작성해서 쿼리문으로 실행
//- 간단하지만 알 수 없는 오류가 생김
//2. 새로운 변수에 조회한 데이터를 배열로 받아와 count()로 갯수를 출력
//3. mysqli_num_row
 ?>
