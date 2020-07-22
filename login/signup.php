<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>TOY_SIGNUP</title>
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

        a {
            color: #7dabd0;
        }
    </style>
    <script type="text/javascript" src="signup.js"></script>
</head>

<body>
    <center>
        <h1>TOY</h1>
    </center>
    <form action="signup_check.php" method="post" name="SignUp">
        <table>
            <tr>
                <!-- ID -->
                <td align="right">★ ID</td>
                <td valign="top">
                    <!-- 키를 누르면 NotS()함수 실행 -->
                    <input type="text" name="id" onKeydown="NotS(this);" maxlength="10" style="height:25px; width:300px;" id="id" autocomplete="off">
                </td>

                <!-- ID Check -->
                <td valign="bottom">
                    <!-- 누르면 IdCheck함수 실행 -->
                    <input type="button" id="idcheck" name="idcheck" value="중복확인" style="height:27px;" onclick="IdCheck();">
                </td>
            </tr>

            <tr>
                <!-- PW -->
                <td align="right">★ PW</td>
                <td valign="top">
                    <!-- 키를 누르면 NotS()함수 실행 -->
                    <input type="password" onKeydown="NotS(this);" name="pw" maxlength="20" style="height:25px; width:300px;" id="pw" autocomplete="off">
                </td>
            </tr>

            <tr>
                <!-- EMAIL -->
                <td align="right">★ EMAIL</td>
                <td valign="top">
                    <input type="text" name="email" style="height: 25px; width:300px;" id="email" maxlength="30" autocomplete="off">
                </td>
            </tr>

            <tr>
                <!-- NAME -->
                <td align="right">★ NAME</td>
                <td valign="top">
                    <input type="text" name="name" style="height:25px; width:300px;" id="name" maxlength="20" autocomplete="off">
                </td>
            </tr>

            <tr>
                <!-- NUMBER -->
                <td align="right" valign="bottom">NUMBER</td>
                <td valign="top">
                    <!-- 누르면 OnlyN()함수와 NotS()함수 실행 -->
                    <input type="text" onKeydown="OnlyN(this), NotS(this);" name="mobile" style="height:25px; width:300px;" id="mibile" maxlength="15" autocomplete="off">
                </td>

                <!-- Signup -->
                <td valign="bottom">
                    <!-- 클릭했을때 CheckForm실행 -->
                    <input id="bt" type="button" onclick="CheckForm();" name="signup" value="SIGN UP" style="height:27px;">
                </td>

            </tr>

            <tr>
                <td></td>
                <td style="font-size: 12px;"><a href="index.php">돌아가기</a></td>
            </tr>

        </table>
    </form>

</body>

</html>