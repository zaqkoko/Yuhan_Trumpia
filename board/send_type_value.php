<?php
//임의로 a라 정함
$id='a';


//mysql과 연동
$con=mysqli_connect("localhost", "root", "5022", "exam");
        //연동되었는지 확인용
          // echo var_dump($con);

//send_type이 전송된 메시지 타입(1)만 가져온다.
$q="SELECT * FROM sms WHERE send_type='1'&& user_id='$id'";
//r에 연결된 데이터베이스에 쿼리문 q를 실행한 값은 r로 가져온다.
$r=mysqli_query($con,$q);

            //배열로 초기화
            $ary=array();

            // while문으로 가져온 r값 안에 있는 배열을 mysqli_fetch_assoc()를 통해 읽어와서 값을 row에 저장
            while($row=mysqli_fetch_assoc($r)){
              $ary=$row;
            }

//출력
            echo count($ary);


//Count 방법
//1. $q "SELECT count(*) FROM sms WHERE send_type='1':" 작성해서 쿼리문으로 실행
//2. 배열에 저장해서 count()로 세기
 ?>
