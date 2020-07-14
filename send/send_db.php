<?php
// mysqli_connect = php에서 mysql을 연결해주는 함수 (반대는 mysqli_close)
$conn = mysqli_connect("localhost", "root", "04540121", "send");

// INSERT = 테이블에 레코드를 삽입하기 위해 사용하는 구문.
$sql =

    " INSERT INTO sms (send_time, send_type, send_message, receiver)
    VALUES(
        '{$_POST['send_time']}',
        1,
        '{$_POST['sms_text']}',
        '{$_POST['receiver']}'
    )
";

// mysqli_query = mysqli_connect를 통해 연결된 객체를 이용하며 mysql 쿼리를 실행시키는 함수
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo '문자 발송에 실패하였습니다. <a href="send.php"> 돌아가기</a>'; // 실패 메세지
} else {
    echo '성공했습니다. <a href="send.php">돌아가기</a>'; // 성공 메세지
}

echo $sql;
