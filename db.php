<?php


$conn=mysqli_connect("localhost", "root", "04540121", "toy") or die("sql접속ㄴㄴ");

session_start();

$name = $_SESSION['id'];

?>
