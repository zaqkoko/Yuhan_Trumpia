<?php
$conn = mysqli_connect("localhost", "root", "04540121", "send");
$sql = "
  INSERT INTO sender
    (name, mobile, send_num, sms_text, sent_date, send_date)
    VALUES(
        '정석원',
        01029933875, 
        01033339573,
        '{$_POST['sms_text']}',
        NOW(),
        NULL,
    )
";

$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo "저장하는 과정에서 문제가 생겼습니다.";
    error_log(mysqli_error($conn));
} else {
    echo '성공했습니다. <a href="send.php">돌아가기</a>';
}
mysqli_query($conn, $sql);
echo $sql;
