<?php

include "../db.php";

// password_hash = 비밀번호 암호화
// password_hash(string $password, PASSWORD_DEFAULT & PASSWORD_BCRYPT)
$userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

// user 테이블에서 받아온 id값의 pw 컬럼값을 입력받은 pw값으로 변경한다.
$sql = "UPDATE user SET pw='" . $userpw . "' where id = '" . $_SESSION['uid'] . "'";
mysqli_query($conn, $sql);

session_destroy();

echo "<script> alert('비밀번호가 변경되었습니다'); location.href='index.php'; </script>";
