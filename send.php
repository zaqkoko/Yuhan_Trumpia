<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ToySend</title>
</head>

<body>

    <form action="send_db.php" method="POST">

        <p id="clock">00:00</p>
        <p>예약 버튼을 누르지 않으면 현재 시간으로 발송됩니다</p>

        <input type="button" name="reserve" id="reserve" value="예약">
        <label>날짜 설정 :</label>
        <input type="datetime-local" id="send_time" name="send_time">
        <div style="text-align: center;"></div>

        <script>
            function send_time() {
                document.getElementById('send_time').value = new Date().tolocaleString();
                replace(/T/, ' '). // T대신 공백
                setInterval(send_time, 1000);
            }
            send_time();
        </script>

        <textarea name="sms_text" cols="40" rows="30" placeholder="메세지를 입력하세요"></textarea>
        <div style="font-size: 12px; padding-top: 3px; padding-bottom: 10px;">
            <span class="bold">글자 수 제한</span>&nbsp;0/150
        </div>
        <input type="submit" />

    </form>

    <script>
        var clockTarget = document.getElementById("clock");

        function clock() {
            var date = new Date();

            // date Object를 받아오고 
            var month = date.getMonth();

            // 달을 받아옵니다 
            var clockDate = date.getDate();

            // 몇일인지 받아옵니다 
            var day = date.getDay();

            // 요일을 받아옵니다. 
            var week = ['일', '월', '화', '수', '목', '금', '토'];

            // 요일은 숫자형태로 리턴되기때문에 미리 배열을 만듭니다. 
            var hours = date.getHours();

            // 시간을 받아오고 
            var minutes = date.getMinutes();

            // 분도 받아옵니다.
            var seconds = date.getSeconds();

            // 초까지 받아온후 
            clockTarget.innerText = `현재 시각 : ${month+1}월 ${clockDate}일 ${week[day]}요일 ` +

                `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes }`  : minutes }:${seconds < 10 ? `0${seconds }`  : seconds }`;

            // 월은 0부터 1월이기때문에 +1일을 해주고 

            // 시간 분 초는 한자리수이면 시계가 어색해보일까봐 10보다 작으면 앞에0을 붙혀주는 작업을 3항연산으로 했습니다. 
        }



        function init() {

            clock();

            // 최초에 함수를 한번 실행시켜주고 
            setInterval(clock, 1000);

            // setInterval이라는 함수로 매초마다 실행을 해줍니다.

            // setInterval은 첫번째 파라메터는 함수이고 두번째는 시간인데 밀리초단위로 받습니다. 1000 = 1초 

        }



        init();
    </script>

</body>

</html>