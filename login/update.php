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
                    <input type="password" name="pw" id="pw" onKeydown="NotS(this);" style="height:25px; width:300px; font-size: 15px;" placeholder=" 비밀번호를 입력해주세요">
                </td>

                <td valign="bottom">
                    <input type="button" value="변경" id="subButton" onclick="Check();" style="height:25px;">
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
                //" "를 입력하면 공백으로 치환
                $(this).val($(this).val().replace(" ", ""));
            });
        }

        function Check() {
            let pwcheck = document.getElementById("pw");
            if (!pwcheck.value.match(
                    /([/\w\d/][!,@,#,$,%,^,&,*,?,_,~,-])|([!,@,#,$,%,^,&,*,?,_,~,-][/\w\d/])/
                )) {
                //특수문자를 혼용하라는 alert
                alert("비밀번호는 특수문자를 혼용하여 입력해주세요");
                //pw의 내용을 공백으로 만든다
                pw.value = "";
                //pw로 초점을 맞춘다
                pw.focus();
                //false를 반환하여 submit 하지 않는다
                return false;
            } else {
                document.updater.submit();
            }
        }
    </script>
</body>

</html>