<?php

$conn=mysqli_connect("localhost", "root", "04540121", "toy") or die("sql접속ㄴㄴ");

session_start();

$name = $_SESSION['id'];

//제가 임시로 바꿔논거라서 로그인해서 쓰실거면 삭제해도됩니다.
$name= 'a';
