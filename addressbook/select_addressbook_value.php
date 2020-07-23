<?php
include '../db.php';

//회원가입 돌아가면 다시 수정할 예정
$a = "SELECT * FROM addressbook WHERE user_id='$name'";
// $q = "SELECT * FROM addressbook";
// addressbook 테이블의 전체 데이터를 조회
$r = mysqli_query($conn, $q);
//조회한 데이터의 행 갯수를 출력
echo  mysqli_num_rows($r);
 ?>
