<!-- Session 로그인 적용 필요 -->
<!-- Session 로그인 적용 필요 -->
<!-- Session 로그인 적용 필요 -->
<!-- Session 로그인 적용 필요 -->
<!-- Session 로그인 적용 필요 -->

<head>
    <style media="screen">
        /* 우측 상단 로그인/로그아웃 */
        #userLine {
            border: 1px;
            float: right;
        }

        /* Left Menu Bar */
        #menuBar {
            position: fixed;
            left: 2.5%;
            top: 25%;
        }

        /* Left Menu Bar */
        .icon {
            width: 20%;
            padding: 10px;
            display: block;
        }

        /* Chat */
        .chat {
            width: 70px;
            display: block;
        }
    </style>
</head>

<!-- title.php는 외부에 있고 send를 비롯 각자 작업중인게 각 디렉토리에 있어서 나중에 손봐야할것같습니다. 아마 send에 맞춰있어서 몇 개는 누락되어있을거에요 -->

<body>
    <!-- 로그아웃 !-->
    <form action="index.php" method="POST">
        <div id="userLine">000님, 환영합니다.
            <input type="submit" name="logout" value="Log Out">
        </div>
    </form>
    <!-- Left Menu Bar !-->
    <div id="menuBar">
        <a href="send.php"><img class="icon" src="../img/sms.png" title="sms_click"></a>
        <a href="../board.php"><img class="icon" src="../img/hi2.png" title="history"></a>
        <a href="../calendar/calendar.html"><img class="icon" src="../img/cal2.png" title="calendar"></a>
        <a href="#"><img class="icon" src="../img/ad2.png" title="addressbook"></a>
    </div>
    <a href="#"><img class="chat" id="chat" src="../img/cht.png" title="chat" style="width: 70 px; right: 2.5%; bottom:2.5%; position:  fixed;"></a>
</body>
</head>