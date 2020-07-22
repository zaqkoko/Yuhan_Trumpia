<?php
include "../db.php";
if (isset($_SESSION['uid'])) {
    echo "{$_SESSION['uid']} 비밀번호 변경";
} else {
    echo "<script> alert('잘못된 접근입니다'); history.back(); </script>";
}
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>TOY_비밀번호 변경</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <style media="screen">
        * {
            background: #fff;
            margin: 0 auto;
        }

        h1 {
            font-size: 130px;
            font-weight: bold;
            color: #7dabd0;
            padding-top: 100px;
        }

        table {
            color: #7dabd0;
            font-weight: bold;
            font-size: 20px;
            padding-left: 15px;
        }

        table input {
            border: none;
            background: #7dabd0;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <center>
        <h1>TOY</h1>
    </center>

    <form action="updater.php" method="post" name="updater">
        <table>
            <tr>
                <td align="right">PW</td>
                <td valign="top">
                    <input type="password" name="pw" id="pw" onKeydown="NotS(this);" style="height:25px; width:300px; font-size: 15px;" placeholder=" 원하시는 비밀번호를 입력해주세요">
                </td>

                <td rowspan="2" valign="bottom">
                    <input type="button" value="변경" id="subButton" onclick="Check();" style="height:60px;">
                </td>
            </tr>

            <tr>
                <td></td>
                <td valign="top">
                    <input type="password" name="pw2" id="pw2" style="height:25px; width:300px; font-size: 15px;" placeholder=" 한번 더 입력해주세요">
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="font-size: 12px;"><a href="index.php">돌아가기</a></td>
            </tr>

        </table>
    </form>
    <script>
        function NotS(k) {

            //키 올라갈때
            $(k).keyup(function() {

                // 공백 입력시, 지우기
                $(this).val($(this).val().replace(" ", ""));
            });
        }

        function Check() {
            // pw, pw2의 id값을 받아와 변수에 저장
            let pwcheck = document.getElementById("pw");
            let pw2check = document.getElementById("pw2");

            if (!pwcheck.value.match(
                    /([/\w\d/][!,@,#,$,%,^,&,*,?,_,~,-])|([!,@,#,$,%,^,&,*,?,_,~,-][/\w\d/])/
                )) {
                //특수문자 혼용 alert
                alert("비밀번호는 특수문자를 혼용하여 입력해주세요");

                //pw의 내용을 공백으로 만든다
                pw.value = "";

                //pw 칸을 입력상태로 만들어 줌
                pw.focus();

                // 반환 false
                return false;

                // 비밀번호가 서로 같으면
            } else if (pwcheck.value == pw2check.value) {
                // updater form submit
                document.updater.submit();

            } else {
                // 비밀번호가 서로 같지않으면 알림
                alert("비밀번호가 서로 일치하지 않습니다");
            }
        }
    </script>
</body>

</html>