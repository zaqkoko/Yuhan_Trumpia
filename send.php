<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ToySend</title>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- CSS !-->
    <style media="screen">
        /* 우측 상단 로그인/로그아웃 */
        #userLine {
            border: 1px;
            float: right;
        }

        /* 날짜 영역 */
        #time {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 10px;
            border: 3px;
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
    <form action="index.php" method="POST">
        <div id="userLine">000님, 환영합니다.
            <input type="submit" name="logout" value="Log Out">
        </div>
    </form>

    <!-- Left Menu Bar !-->
    <div id="menuBar">
        <a href="#"><img class="icon" src="img/sms.png" title="sms_click"></a>
        <a href="#"><img class="icon" src="img/hi2.png" title="history"></a>
        <a href="#"><img class="icon" src="img/cal2.png" title="calendar"></a>
        <a href="#"><img class="icon" src="img/ad2.png" title="addressbook"></a>
    </div>
    <a href="#"><img class="chat" id="chat" src="img/cht.png" title="chat" style="width: 70 px; right: 2.5%; bottom:2.5%; position:  fixed;"></a>

    <!-- 메세지 보내기 !-->
    <form action="send_db.php" method="POST">
        <div>
            <center>
                <p id="clock" style="text-align:left; width:300px; margin:0 auto;">00:00</p>
                <h4>예약 버튼을 누르지 않으면 현재 시간으로 발송됩니다</h4>

                <div id="time">
                    <label style="padding-right: 10px;">날짜 설정</label>
                    <input type="datetime-local" id="send_time" name="send_time">
                    <input type="button" name="send_type" id="send_type" value="예약" onclick="change()"></input>
                </div>

                <input type="text" id="receiver" name="receiver" placeholder="수신 번호를 입력하세요" style="text-align: center;"> <br> <br>

                <textarea name="sms_text" placeholder="메세지를 입력하세요. 150자까지 입력이 가능합니다." id="sms_text" maxlength="150" style="text-align:left; width:400px; height:300px;"></textarea> <br>
                <span id="counter">###</span> <br> <br>

                <input type="submit" value="메세지 보내기" />
            </center>
        </div>
    </form>

    <!-- Java Script -->
    <script>
        // MySql db - DateTime에 넣기 위해 필요한 함수
        // send_time 함수 실행
        function send_time() {

            // 'send_time' id값을 가진 요소를 찾아 value값 지정.    new Date() 함수는 시간을 받아오는 함수로 인자값이 없으면 현재 시간을 받아온다.
            document.getElementById('send_time').value = new Date().toLocaleString(); //  tolocaleString() - 사용자의 문화권에 맞는 시간표기법으로 년,월,일,시간을 문자열로 리턴함.

            // T대신 공백값 넣기.
            replace(/T/, ' ');
        }

        function change() {
            var type = document.getElementById('send_type');
        }

        // TextArea 글자 수 제한 함수
        $(function() {
            // 'sms_text' 라는 id값을 찾아서 
            $('#sms_text').keyup(function(e) {
                var content = $(this).val();
                $('#counter').html(content.length + '/150');
            });
            $('#sms_text').keyup();
        });


        // 현재 시간을 1초마다 받아와 출력하는 스크립트
        // 변수 clockTarget에 'clock' id값을 가지고 있는 값을 넣는다.
        var clockTarget = document.getElementById("clock");

        function clock() {

            // 변수 date에 현재 시간을 받아오는 new Date()의 값을 넣었다. ※ 인자값이 없으면
            var date = new Date();

            // date Object를 받아온다.
            var month = date.getMonth();

            // 달(Month)을 받아온다.
            var clockDate = date.getDate();

            // 일(day)을 받아온다.
            var day = date.getDay();

            // 요일을 받아온다.
            // 요일은 숫자형태로 리턴되기때문에 미리 배열을 만들어야한다.
            var week = ['일', '월', '화', '수', '목', '금', '토'];

            // 시간(hours)을 받아온다.
            var hours = date.getHours();

            // 분(minutes)을 받아온다.
            var minutes = date.getMinutes();

            // 초(seconds)을 받아온다.
            var seconds = date.getSeconds();

            // 각 시간을 텍스트화 한다. 문자열을 그대로 리턴함.
            // 월은 0부터 1월이기때문에 +1일을 해주고 // 시간 분 초는 한자리수이면 시계가 어색해? 10보다 작으면 앞에 0을 붙혀주는 작업을 3항 연산으로 진행함.
            clockTarget.innerText = `현재 시각 : ${month+1}월 ${clockDate}일 ${week[day]}요일 ` +
                `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes }` : minutes }:${seconds < 10 ? `0${seconds }` : seconds }`;

        }

        function init() {
            // 최초 함수 clock() 실행
            clock();
            // setInterval - Clock()함수를 1000(1초)마다 다시 부른다.
            setInterval(clock, 1000);
        }
        // init() 실행
        init();
    </script>
</body>

</html>