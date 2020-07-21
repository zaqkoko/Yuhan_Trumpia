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
    <script type="text/javascript">
        //LOGIN()함수 정의
        function LogIn() {
            $.ajax({
                // login.php에 연결
                url: "login.php",
                //id가 id인 값과 id 가 pw인 값이 data
                data: {
                    id: $('#id').val(),
                    pw: $('#pw').val(),
                },
                //post메소드를 이용하여 url에 요청
                type: 'POST',
                //ajax요청이 완료되면
<<<<<<< HEAD
                }).success(function(data)
                {
                    //받은 데이터의 값이 1일 때
                    if(data == "1")
                    {
                        //로그인이 되었다는 alert
                        alert($('#id').val() + "님 로그인되어씀미다하핳");
                        //main.php로 이동한다
                        location.href='main.php';
                    }
                    //받은 데이터의 값이 2일 때
                    else if (data == "2")
                    {
                        //다시 입력하라는 alert
                        alert("아이디/비밀번호를 다시 입력해주세야");
                        //index.php로 이동한다
                        location.href='index.php';
                    }
                    //받은 데이터의 값이 1,2가 아닐 때
                    else
                    {
                        //받은 데이터의 값이 무엇인지 alert
                        alert(data);
                    }
                })
            }
        </script>
    </head>
    <body>
        <center> <h1>0341</h1> </center>
        <form action="login.php" method="post" name="login">
            <table>
                <tr>
                    <td align="right">ID</td>
                    <td valign="top">
                        <input type="text" name="id" style="height:25px; width:300px;" id="id">
                    </td>
                    <td rowspan="2" valign="bottom">
                        <input type="button" name="login" value="LOGIN" style="height:60px;" id="bt" onclick="LogIn();">
                    </td>
                </tr>
                <tr>
                    <td align="right">PW</td>
                    <td valign="top">
                        <input type="password" name="pw" style="height:25px; width:300px;" id="pw">
                    </td>
                </tr>
                <tr>
                    <td></td><td></td>
                    <td><a href="signup.php">SIGN UP</a></td>
                </tr>
            </table>
        </form>
    </body>
</html>
=======
            }).success(function(data) {
                //받은 데이터의 값이 1일 때
                if (data == "1") {
                    //로그인이 되었다는 alert
                    alert($('#id').val() + "님 로그인되었습니다");
                    //main.php로 이동한다
                    location.href = 'main.php';
                }
                //받은 데이터의 값이 2일 때
                else if (data == "2") {
                    //다시 입력하라는 alert
                    alert("아이디/비밀번호를 다시 입력해주세요");
                    //index.php로 이동한다
                    location.href = 'index.php';
                }
                //받은 데이터의 값이 1,2가 아닐 때
                else {
                    //받은 데이터의 값이 무엇인지 alert
                    alert(data);
                }
            })
        }
    </script>
</head>

<body>
    <center>
        <h1>TOY</h1>
    </center>
    <form action="login.php" method="post" name="login">
        <table>
            <tr>
                <td align="right">ID</td>
                <td valign="top">
                    <input type="text" name="id" style="height:25px; width:300px;" id="id">
                </td>
                <td rowspan="2" valign="bottom">
                    <input type="button" name="login" value="LOGIN" style="height:60px;" id="bt" onclick="LogIn();">
                </td>
            </tr>
            <tr>
                <td align="right">PW</td>
                <td valign="top">
                    <input type="password" name="pw" style="height:25px; width:300px;" id="pw">
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="font-size: 12px;"><a href="forgotid.php">아이디를 잊어버리셨나요?</a></td>
                <td><a href="signup.php">SIGN UP</a></td>
            </tr>
            <tr>
                <td></td>
                <td style="font-size: 12px;"><a href="forgotpw.php">비밀번호를 잊어버리셨나요?</a></td>
            </tr>
        </table>
    </form>
</body>

</html>
>>>>>>> 0918e7a58fb4fa693dc4e6b4a1af1b8f6a6cea9b
