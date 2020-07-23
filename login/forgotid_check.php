<?php
// 아이디 찾기 db 체크

include "../db.php";

// 입력받은 name과 email의 값이 둘 중 하나라도 공백이면
if ($_POST["name"] == "" || $_POST["email"] == "") {

    // alert로 알림창 띄우고 홈페이지 즉시 이동(location.href = "주소")
    echo '<script> alert("항목을 입력해주세요"); location.href = "forgotid.html"; </script>';
} else {
    // 변수 name에는 입력받은 name값, email에는 입력받은 email값 넣기
    $name = $_POST["name"];
    $email = $_POST["email"];
}

// user 테이블의 모든 컬럼을 조회. 조건 : 컬럼명 name이 입력받은 name이고 컬럼명 email이 입력받은 email일 때.
$sql = "SELECT * FROM user WHERE name='{$name}' && email='{$email}'";

// mysqli_query = mysqli_connect를 통해 연결된 객체를 이용하며 mysql 쿼리를 실행시키는 함수
$res = mysqli_query($conn, $sql);

// mysqli_fetch_array = mysqli_query를 통해 얻은 값($res)에서 데이터를 한 개씩 리턴해주는 함수
$row = mysqli_fetch_array($res);

// 만약 입력받은 name값이 데이터에 존재하면
if ($row["name"] == $name) {

    // 해당 name의 id값을 알림창으로 알려주고 홈페이지 즉시이동
    echo "<script> alert('당신의 아이디는  {$row["id"]} 입니다'); location.href = 'index.html'; </script>";
} else {
    // 입력 다시하라는 알람창 이후 홈페이지 즉시이동
    echo '<script> alert("입력을 다시 확인해주세요"); location.href = "forgotid.html"; </script>';
}
