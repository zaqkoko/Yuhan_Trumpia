<?php
//메인 홈페이지

// 세션 시작
session_start();
//$_session[name]이 공백일 때
if ($_SESSION['name'] == "") {
    //$name은 $_session[id]로 지정
    $name = $_SESSION['id'];
} else {
    //$name은 $_session[name]으로 지정
    $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html lang="kr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>TOY_MAIN</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <style media="screen">
        * {
            background: #fff;
            margin: 0 auto;
        }

        #menu {
            text-align: center;
            padding-top: 150px;
        }

        #chat {
            width: 50px;
            height: 50px;
            position: fixed;
            right: 50px;
            bottom: 50px;
        }

        #menu img {
            width: 200px;
            padding: 30px;
        }

        #hi {
            position: fixed;
            top: 10px;
            right: 100px;
            color: #7dabd0;
            font-weight: bold;
            font-size: 15px;
        }

        input {
            border: none;
            background: #7dabd0;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
            position: fixed;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>
    <div id="menu">
        <a href="../send/send.php"> <img src="../img/main_sms.png"> </a>
        <a href="../board/board.php"> <img src="../img/main_history.png"> </a>
        <a href="../calendar/calendar.php"> <img src="../img/main_calendar.png"> </a>
        <a href="#"> <img src="../img/main_address.png"></a>
    </div>
    <a href="#"> <img id="chat" src="../img/cht.png"> </a>
    <!-- php변수 $name을 밑의 형식으로 불러옴 -->
    <p id="hi">안녕하세요 <?php echo $name; ?>님</p>
    <!-- submit하면 logout.php로 전송 -->
    <form action="../logout.php" method="post">
        <input type="submit" name="logout" value="LOGOUT">
    </form>
</body>

</html>