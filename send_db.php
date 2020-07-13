<?php
$conn = mysqli_connect("localhost", "root", "04540121", "send");
$sql = "
  INSERT INTO sms
    (send_time, send_type, send_message, receiver)
    VALUES(
        '{$_POST['send_time']}',
        1,
        '{$_POST['sms_text']}',
        '{$_POST['receiver']}'
    )
";

$result = mysqli_query($conn, $sql); // mysqli_query
if ($result === false) {
    echo '문자 발송에 실패하였습니다. <a href="send.php"> 돌아가기</a>';
} else {
    echo '성공했습니다. <a href="send.php">돌아가기</a>';
}

echo $sql;
