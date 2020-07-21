<?php

include "../db.php";

$id = $_POST["id"];
$email = $_POST["email"];

$sql = "SELECT * FROM user WHERE id='$id' and email='$email'";

$res = mysqli_query($conn, $sql);
