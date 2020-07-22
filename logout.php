<?php
     //세션을 불러와서
     session_start();
     //삭제
     session_destroy();
     //로그아웃 되었다는 alert
     echo "<script>window.alert('로그아웃 되셨어요');</script>";
     //index.php로 이동
     echo "<script>location.href='login/index.html';</script>";
