<?php
//addressbook.php에서 데이터를 추가합니다.

  include "../db.php";
//테이블에 데이터 삽입
 $q="INSERT INTO addressbook (name,receiver_number, receiver_email,user_id)
 VALUES(
   '{$_POST['name']}',
   '{$_POST['receiver_number']}',
   '{$_POST['receiver_email']}',
   '$name'
 )";
//쿼리문 실행
 $r-mysqli_query($conn,$q);

 if($r===false){
   //실패
   echo "<script>console.log('실패');</script>";
 }else{
   //성공
   echo "<script>console.log('연락처를 추가했습니다.');</script>";
 }
echo $q;

 ?>
