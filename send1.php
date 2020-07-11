<?php
$conn = mysqli_connect("localhost", "root", "04540121", "send");
$sql = "
  INSERT INTO sms
    (send_time, send_type, send_message, receiver)
    VALUES(
        NOW(), 
        1,
        '{$_POST['sms_text']}',
        01033339573
    )
";

$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo "저장하는 과정에서 문제가 생겼습니다.";
    error_log(mysqli_error($conn));
} else {
    echo '성공했습니다. <a href="send.php">돌아가기</a>';
}

echo $sql;
