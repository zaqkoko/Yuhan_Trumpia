<head>
    <!-- id & name 세션으로 받아옴 -->
    <?php
    session_start();

    if ($_SESSION['name'] == "") {
        $name = $_SESSION['id'];
    } else {
        $name = $_SESSION['name'];
    }
    ?>

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

<body>
    <!-- 로그아웃 !-->
    <form action="../index.php" method="POST">
        <div id="userLine">
            안녕하세요 <?php echo $name; ?> 님
            <input type="submit" name="logout" value="Log Out">
        </div>
    </form>
    <!-- Left Menu Bar, Chat !-->
    <div id="menuBar">

        <!-- 상대경로 -->
        <a href="../send/send.php"><img class="icon" src="../img/sms.png" title="sms_click"></a>
        <a href="../board/board.php"><img class="icon" src="../img/hi2.png" title="history"></a>
        <a href="../calendar/calendar.php"><img class="icon" src="../img/cal2.png" title="calendar"></a>
        <a href="#"><img class="icon" src="../img/ad2.png" title="addressbook"></a>
    </div>
    <a href="#"><img class="chat" id="chat" src="../img/cht.png" title="chat" style="width: 70 px; right: 2.5%; bottom:2.5%; position:  fixed;"></a>
</body>
</head>