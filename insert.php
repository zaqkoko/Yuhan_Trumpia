<?php

$conn = mysqli_connect("localhost", "root", "04540121", "send");
$sql = "SELECT id, title FROM sender";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row["id"], $row["title"];
}

mysqli_close($conn); // 디비 접속 닫기 //된다!!!!
