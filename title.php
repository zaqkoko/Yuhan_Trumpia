<head>
    <!-- id & name 세션으로 받아옴 -->
    <?php

    // session = 웹 사이트의 여러 페이지에 걸쳐 사용되는 사용자 정보를 저장하는 방법을 의미한다. 사용자가 브라우저를 닫아 서버와의 연결을 끝내는 시점까지를 세션이라고 함.
    // session은 키값만을 클라이언트측에 남겨두고 서버측에 데이터를 저장함. 브라우저는 필요할 때마다 키값을 이용하여 저장된 데이터를 사용함. 보안에 취약한 쿠키를 보완해주는 역할을 함.

    // 세션 초기화. id가 하나 발급됨.
    session_start();

    // 만약 세션의 name의 값이 ""라면
    if ($_SESSION['name'] == "") {
        // $name의 값은 세션 id값으로 지정
        $name = $_SESSION['id'];
    } else {
        // $name의 값이 있다면 name은 세션 name값으로 지정
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

        <!-- 절대 경로 -->
        <a href="http://localhost/Yuhan_Trumpia/send/send.php"><img class="icon" src="http://localhost/Yuhan_Trumpia/img/sms2.png" title="sms_click" id="sms"></a>
        <a href="http://localhost/Yuhan_Trumpia/board/board.php"><img class="icon" src="http://localhost/Yuhan_Trumpia/img/hi2.png" title="board" id="board"></a>
        <a href="http://localhost/Yuhan_Trumpia/calendar/calendar.php"><img class="icon" src="http://localhost/Yuhan_Trumpia/img/cal2.png" title="calendar" id="calendar"></a>
        <a href="#"><img class="icon" src="http://localhost/Yuhan_Trumpia/img/ad2.png" title="addressbook" id="address"></a>
    </div>
    <a href="#"><img class="chat" id="chat" src="http://localhost/Yuhan_Trumpia/img/cht.png" title="chat" style="width: 70 px; right: 2.5%; bottom:2.5%; position:  fixed;"></a>

    <script>
        // 변수 filename에 문서 URL(String)의 특정 부분(substring)을 확인하는 메소드. url의 길이에서 반대방향으로부터 찾기시작하여 /을 찾고 +1을 해줌. (현재 파일명 및 확장자 확인 용도)
        // str.lastIndexOf(searchValue[, fromIndex]) - searchofValue - 찾고자하는 것. fromIndex - 반대방향으로부터 찾음.
        var filename = document.URL.substring(document.URL.lastIndexOf("/") + 1, document.URL.length);

        if (filename == "send.php") {
            // 만약 현재 페이지가 send.php면 id sms의 아이콘 이미지를 sms으로 변경 (sms2 -> sms)
            document.getElementById("sms").src = "http://localhost/Yuhan_Trumpia/img/sms.png";

            // 만약 현재 페이지가 board.php면 id board의 아이콘 이미지를 board으로 변경 (hi2 -> hi)
        } else if (filename == "board.php") {
            document.getElementById("board").src = "http://localhost/Yuhan_Trumpia/img/hi.png";

            // 이하 동일
        } else if (filename == "calendar.php") {
            document.getElementById("calendar").src = "http://localhost/Yuhan_Trumpia/img/cal.png";

        } else if (filename == "#.php") {
            document.getElementById("address").src = "http://localhost/Yuhan_Trumpia/img/ad.png";
        }
    </script>
</body>
</head>