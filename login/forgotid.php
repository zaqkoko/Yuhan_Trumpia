<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>TOY_FORGOT</title>
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
    <form action="forgot_check.php" method="post" name="forgot">
        <table>
            <tr>
                <td align="right">NAME</td>
                <td valign="top">
                    <input type="text" name="NAME" style="height:25px; width:300px; font-size: 15px;" id="id" placeholder=" 가입했던 이름을 입력해주세요">
                </td>

                <td rowspan="2" valign="bottom">
                    <input type="submit" value="찾기" id="subButton" style="height:61px;">
                </td>
            </tr>

            <tr>
                <td align=" right">EMAIL</td>
                <td valign="top">
                    <input type="text" name="email" style="height: 25px; width:300px; font-size:15px;" id="email" placeholder=" 가입했던 이메일을 입력해주세요">
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