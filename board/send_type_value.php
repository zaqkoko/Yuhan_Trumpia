<!-- board_script 파일의 sendtypevalue함수가 실행될때, 현재 리스트에서 전송완료인 건수만 표시해주는 php파일 -->
<?php

include "../db.php";

//유저아이디와 동일하고 send_type이 전송된 메시지 타입(1)만 가져온다.
$q = "SELECT * FROM sms WHERE send_type='1' AND user_id='$name' ORDER BY `sms`.`send_id` DESC";
//r에 연결된 데이터베이스에 쿼리문 q를 실행한 값을 초기화해 가져온다.
$r = mysqli_query($conn, $q);
//mysqli_num_rows()를 통해 행 수를 구해와 출력
$count = mysqli_num_rows($r);


//출력
echo $count;


//Count 방법
//1. $q "SELECT count(*) FROM sms WHERE send_type='1':" 작성해서 쿼리문으로 실행
//- 간단하지만 알 수 없는 오류가 생김
//2. 새로운 변수에 조회한 데이터를 배열로 받아와 count()로 갯수를 출력
//3. mysqli_num_rows()를 통해 행 수를 구해와 출력
