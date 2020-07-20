<?php

    $con=mysqli_connect("localhost", "root", "04540121", "toy") or die("sql접속ㄴㄴ");

    session_start();

    $name = $_SESSION['id'];

    // mysqli_connect = php에서 mysql을 연결해주는 함수 (반대는 mysqli_close)
    $conn = mysqli_connect("localhost", "root", "04540121", "toy");

?>
