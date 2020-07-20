<?php
    //db.php를 include하여 sql연결
    include "../db.php";
    //signup.php에서 입력받은 id를 $id로 저장
    $id = $_POST["id"];
    //입력한 id값과 같은 데이터 가져옴
    $sql = "select * from user where id='$id'";
    //쿼리실행
    $ret = mysqli_query($conn, $sql);
    //받은 결과값을 $row에 array로 저장
    $row = mysqli_fetch_array($ret);
    //$row의 값이 null일때 (결과가 없을 때)
    if($row == "")
    {
        //1을 출력
        echo "1";
    }
    //$row의 값이 null이 아닐 때(결과값이 있을 때)
    else
    {
        //2를 출력
        echo "2";
    }
?>
