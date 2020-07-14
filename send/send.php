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
        <a href="send.php"><img class="icon" src="../img/sms.png" title="sms_click"></a>
        <a href="../board.php"><img class="icon" src="../img/hi2.png" title="history"></a>
        <a href="../calendar/calendar.html"><img class="icon" src="../img/cal2.png" title="calendar"></a>
        <a href="#"><img class="icon" src="../img/ad2.png" title="addressbook"></a>
    </div>
    <a href="#"><img class="chat" id="chat" src="../img/cht.png" title="chat" style="width: 70 px; right: 2.5%; bottom:2.5%; position:  fixed;"></a>

    <!-- 메세지 보내기 !-->
    <form action="send_db.php" method="POST">
        <div>
            <center>
                <p id="clock" style="text-align:left; width:300px; margin:0 auto;">00:00</p>
                <h4>예약 버튼을 누르지 않으면 현재 시간으로 발송됩니다</h4>

                <div id="time">

                    <!-- 현재, 예약인지 -->
                    <label for="send_type" style="padding-right: 5px;">발송 : </label>
                    <select name="send_type" id="send_type">
                        <option value="1'">현재</option>
                        <option value="2'">예약</option>
                    </select>

                    <label style="padding-right: 10px;">날짜 설정</label>

                    <!-- 날짜, 시간 불러오기 -->
                    <input type="datetime-local" id="send_time" name="send_time">

                </div>

                <input type="text" id="receiver" name="receiver" placeholder="수신 번호를 입력하세요" style="text-align: center;">
                <br> <br>

                <textarea name="sms_text" placeholder="메세지를 입력하세요. 150자까지 입력이 가능합니다." id="sms_text" maxlength="150" style="text-align:left; width:400px; height:300px;"></textarea> <br>
                <span id="counter">###</span> <br> <br>

                <input type="submit" value="메세지 보내기" id="subButton" />
            </center>
        </div>
    </form>

    <!-- Java Script -->
    <script>
        // MySql db - DateTime에 넣기 위해 필요한 함수
        // send_time 함수 실행
        function send_time() {

            // 'send_time'id값을 가진 요소를 찾아 value값에 접근하여 값을 넣어줌.    new Date() 함수는 시간을 받아오는 함수로 인자값이 없으면 현재 시간을 받아온다.
            document.getElementById('send_time').value = new Date().toLocaleString(); //  tolocaleString() - 사용자의 문화권에 맞는 시간표기법으로 년,월,일,시간을 문자열로 리턴함.

            // T대신 공백값 넣기.
            replace(/T/, ' ');
        }

        function change() {
            var type = document.getElementById('send_type');
        }

        // jQuery.
        // TextArea 글자 수 제한 함수.
        $(function() {
            // sms_text 라는 element 요소에 keyup이 발생했을 때에 대한 정보를 저장한다. 
            // keyup(function(e)) -> e 쓰는 이유 : keyup 발생 시 'e'라는 keyup handler를 쓰는 callback 함수를 만들기 위해 사용
            // keyup이 발생시 'e'가 sms_text에 keyup이 발생했을 때 대한 정보를 e에 담는다.
            $('#sms_text').keyup(function(e) {

                // content 라는 변수에 keyup이 발생했을 때에 대한 값을 content에 저장한다.
                var content = $(this).val();
                // counter 라는 element 요소의 내용을 counter.length + /150 으로 바꾼다.
                $('#counter').html(content.length + '/150');
            });
            $('#sms_text').keyup();
        });

        // JQuery.
        // 수신 번호 칸에 입력이 안 되어 있을 때 입력하라고 알려주는 함수.
        // $(document).ready(function(){ == JS onload와 같은 기능.   // 문서객체모델이라고 하는 DOM이 모두 로딩된 다음 $(document).ready()을 실행하게끔 해주는 구문이다.
        $(document).ready(function() {
            // subButton id값을 가진 요소를 클릭 했을 때.
            $("#subButton").click(function() {
                var Check = 0;
                // receiver id값의 ""이면 경고창 띄우기.
                if ($("#receiver").val() == "") {
                    alert("번호를 입력해주세요")

                    // receiver id값에 포커스 얻기(입력상태 만들어주기)
                    $("receiver").focus();
                    return false;
                }
            })
        });

        // 현재 시간을 1초마다 받아와 출력하는 스크립트
        // 'clock'이라는 id값을 가지고 있는 요소를 찾아 변수 clockTarget에 저장한다.
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

            // 각 시간을 텍스트화 한다. 문자열을 그대로 리턴한다.
            // 월은 0부터 1월이기때문에 +1일을 해준다. // 시간 분 초는 한자리수이면 시계가 어색해? 10보다 작으면 앞에 0을 붙혀주는 작업을 3항 연산으로 진행함.
            clockTarget.innerText = `현재 시각 : ${month + 1}월 ${clockDate}일 ${week[day]}요일 ` +
                `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 10 ? `0${seconds}` : seconds}`;

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