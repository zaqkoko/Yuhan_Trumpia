<?php

include "../db.php";

// INSERT = 테이블에 레코드를 삽입하기 위해 사용하는 구문.
$sql =

    // sms 테이블의 (컬럼명)의 값을 post로 받아온 값을 컬럼명 순서대로 값을 넣음.
    " INSERT INTO sms (send_time, send_type, send_message,receiver_number,receiver_email,file,user_id)
    VALUES(

        '{$_POST['send_time']}',
        '{$_POST['send_type']}',
        '{$_POST['sms_text']}',
        '{$_POST['receiver_number']}',
        '{$_POST['receiver_email']}',
        -- 우선 데이터에 파일 임시경로를 저장하는데 나중에 다운로드를 어떻게 받는거지
        '{$_FILES['file']['tmp_name']}',
        '$name'

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
