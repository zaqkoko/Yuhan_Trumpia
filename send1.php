<?php
$conn = mysqli_connect("localhost", "root", "04540121", "send");
$sql = "
  INSERT INTO sender
    (sms_text, sent_date)
    VALUES(
        '{$_POST['sms_text']}',
        NOW()
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
