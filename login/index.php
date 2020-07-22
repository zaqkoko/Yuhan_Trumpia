<!DOCTYPE html>
<html lang="kr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>TOY_INDEX</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <style media="screen">
        * {
            background: #7dabd0;
            margin: 0 auto;
        }

        h1 {
            font-size: 130px;
            font-weight: bold;
            color: #fff;
            padding-top: 100px;
        }

        table {
            color: #fff;
            font-weight: bold;
            font-size: 20px;
            padding-left: 15px;
        }

        table input {
            border: none;
            background: #fff;
            color: #7dabd0;
            font-weight: bold;
            font-size: 20px;
        }

        a {
            color: #fff;
        }
    </style>
    <script type="text/javascript" src="index.js"></script>
</head>
<center>
    <h1>TOY</h1>
</center>
<form action="login.php" method="post" name="login">
    <table>
        <tr>
            <td align="right">ID</td>
            <td valign="top">
                <input type="text" name="id" style="height:25px; width:300px;" id="id" autocomplete="off">
            </td>
            <td rowspan="2" valign="bottom">
                <input type="button" name="login" value="LOGIN" style="height:60px;" id="bt" onclick="LogIn();">
            </td>
        </tr>

        <tr>
            <td align="right">PW</td>
            <td valign="top">
                <!-- 엔터 keydown이 먹히지않는다. 왜일까 -->
                <input type="password" name="pw" style="height:25px; width:300px;" id="pw" autocomplete="off" onkeydown="if(event.keycode==13)LogIn()">
            </td>
        </tr>

        <tr>
            <td></td>
            <td valign="top" style="font-size: 15px;">
                <input type="checkbox" id="saveid" name="saveid"> 아이디 기억하기
            </td>
            <td><a href="signup.php">회원가입</a></td>
        </tr>

        <tr>
            <td></td>
            <td style="font-size: 12px; padding-top: 10px;"><a href="forgotid.php">아이디를 잊어버리셨나요?</a></td>

        </tr>
        <tr>
            <td></td>
            <td style="font-size: 12px;"><a href="forgotpw.php">비밀번호를 잊어버리셨나요?</a></td>
        </tr>
    </table>
</form>

</body>

</html>