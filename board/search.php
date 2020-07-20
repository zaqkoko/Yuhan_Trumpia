<?php

include "../db.php";

// //mysql과 연동
$con=mysqli_connect("localhost", "root", "5022", "toy") or die("실패");
//       //연동되었는지 확인용
//       // echo var_dump($con);

//$_POST로 가져온 데아터가 null이 아닐때 (선택삭제일 때)
if($_POST['kword'] != null){
  //kword를 가져온 데이터로 초기화
  $kword=$_POST['kword'];
  //수신자나 보낸 메시지 내용에 kword가 포함되고 유저아이디와 동일한 테이터를 조회
  $q="SELECT * FROM sms WHERE send_message LIKE '%$kword%' OR receiver LIKE '%$kword%' AND user_id='$name'";
  //쿼리문 실행
  $r=mysqli_query($con,$q);

//while문을 통해 mysqli_fetch_array로 가져온 데이터를 테이블 구성에 맞게 출력
  while($row=mysqli_fetch_array($r)){
    //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
    echo "<tr>
    <td width='5%'><input type='checkbox' class='checkbox' onclick='check();' value='".$row[send_id]."'></td>
    <td width='20%'>".$row[receiver]."</td>
    <td width='40%'>".$row[send_message]."</td>
    <td width='20%'>".$row[send_time]."</td>
    <td width='10%' class='type'>".$row[send_type]."</td>
    </tr>";
  }
}

?>
