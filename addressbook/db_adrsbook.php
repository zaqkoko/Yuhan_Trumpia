<?php
//주소록(addressbook.php) 데이터 가져오는 파일입니다.
// while문에서 어떻게하면 html태그를 분리할 수 있을까........................................

  include '../db.php';

  //행 갯수 출력 외 나머지는 while문으로 테이블 출력을 위해 $run으로 구분함
  //테이블 출력을 전달하고싶을 때는 ture; 아닐 때는 false;


//주소록 명수 출력
  if($_POST['h']=="value" && $_POST['n'] == "null"){

    $q = "SELECT * FROM addressbook WHERE user_id='$name'";
    // addressbook 테이블의 데이터를 조회
    $r = mysqli_query($conn, $q);
    //조회한 주소록 행 갯수를 출력
    echo mysqli_num_rows($r);
    //테이블 출력 하지 않음
    // $run=false;

//테이블 조회
}
else if($_POST['h']=='select' && $_POST['n'] == "null"){

    $q = "SELECT * FROM addressbook WHERE user_id='$name'";

    $run=true;

//전체삭제(delete를 요청하고 원하는 삭제가 전체삭제all일때)
}else if($_POST['h'] == "delete" && $_POST['n'] == "all") {

      //sms테이블의 유저 데이터를 모두 삭제하는 쿼리문 작성
      $q = "DELETE FROM addressbook WHERE user_id='" . $name . "'";

      $run=true;

//선택삭제(delete를 요청하고 원하는 삭제가 선택삭제(삭제요소 'd')일 때)
} else{
      //d를 통해 원하는 데이터를 삭제하는 쿼리문 작성
      $q = "DELETE FROM addressbook WHERE id=" . $_POST['n'];
      //가져온 쿼리문을 연결한 데이터베이스에서 실행

      $run=true;
    }

  if($run==true){
    //쿼리문 실행
    $r = mysqli_query($conn, $q);
      while ($row = mysqli_fetch_array($r)) {
        //echo로 html 테이블 태그를 포함한 문자열과 출력할 데이터를 문자열로 작성
        echo "<tr>
          <td width='5%'><input type='checkbox' class='checkbox' onclick='check();' value='" . $row['id'] . "'></td>
          <td width='25%'>" . $row['name'] . "</td>
          <td width='35%'>" . $row['receiver_number'] . "</td>
          <td width='50%'>" . $row['receiver_email'] . "</td>
          </tr>";
        }
    }

 ?>
