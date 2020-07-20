<?php

session_start();

// 만약 세션의 name의 값이 ""라면
if ($_SESSION['name'] == "") {
    // $name의 값은 세션 id값으로 지정
    $name = $_SESSION['id'];
} else {
    // $name의 값이 있다면 name은 세션 name값으로 지정
    $name = $_SESSION['name'];
}


// mysqli_connect = php에서 mysql을 연결해주는 함수 (반대는 mysqli_close)
$conn = mysqli_connect("localhost", "root", "04540121", "toy");
