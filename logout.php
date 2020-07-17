<?php
     //세션을 불러와서
     session_start();
     //삭제
     session_destroy();
     //로그아웃 되었다는 alert
     echo "<script>window.alert('로그아웃 되셧아야');</script>";
     //로그인 페이지로 이동
     echo "<script>location.href='login/index.php';</script>";
 ?>
