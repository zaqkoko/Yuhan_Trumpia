<?php

<<<<<<< HEAD
$conn=mysqli_connect("localhost", "root", "04540121", "toy") or die("sql접속ㄴㄴ");

session_start();

$name = $_SESSION['id'];

    ?>
=======
session_start();

$name = $_SESSION['id'];

// mysqli_connect = php에서 mysql을 연결해주는 함수 (반대는 mysqli_close)
$conn = mysqli_connect("localhost", "root", "04540121", "toy");
>>>>>>> ac16f38c511ab70b33216a3cb7a785b2669a4f45
