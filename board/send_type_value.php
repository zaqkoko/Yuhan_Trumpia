<?php
//mysql과 연동
$con=mysqli_connect("localhost", "root", "04540121", "toy");
//연동되었는지 확인용
  // echo var_dump($con);
//send_type이 전송된 메시지 타입(1)만 가져온다.
$q="SELECT * FROM sms WHERE send_type='1'";
//r에 연결된 데이터베이스에 쿼리문 q를 실핸한 값은 r로 가져온다.
$r=mysqli_query($con,$q);

//n을 0으로 초기화하고
$n=0;
// while문으로 가져온 r값 안에 있는 배열을 mysqli_fetch_assoc()를 통해 읽어와서 값을 row에 저장
//-------------------------주의 count() 함수 찾아보기
while($row=mysqli_fetch_assoc($r)){
  //타입(1)을 가져올 때마다 n을 +한다.
  $n++;
}
//출력
echo $n;
 ?>
