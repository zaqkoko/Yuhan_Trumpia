<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ToySend</title>
    <style media="screen"> /* CSS */

        #userLine /* 우측 상단 로그인/로그아웃 */
      {
        border:1px;
        float:right; 
      }
      #time{ /* 날짜 영역 */
          display:flex;
          justify-content: center;
          align-items: center;
          padding-bottom: 10px;
          border:3px;
      }
      #menuBar{ /* Left Menu Bar */
          position:fixed;
          left:2.5%;
          top:25%;
      }
      .icon{ 
          width:20%;
          padding-left:10px;
          padding-bottom: 30px;
          display: block;
      }
      #chat{ /* Chat */
          position: absolute;
          right: 0px;
          bottom: 0px;
      }
      </style>
</head>

<body> 
      <form action="index.php" method="POST"> <!-- 로그아웃 !-->
          <div id="userLine">000님, 환영합니다.
             <input type="submit" name="logout" value="Log Out">
        </div>
      </form>

      <div id="menuBar"> <!-- Left Menu Bar !-->
        <a href="#"><img class="icon" src="img/sms.png" title="sms_click"></a> 
        <a href="#"><img class="icon" src="img/hi2.png" title="history"></a> 
        <a href="#"><img class="icon" src="img/cal2.png" title="calendar"></a>
        <a href="#"><img class="icon" src="img/ad2.png" title="addressbook"></a>
      </div>
      <a href="#"><div id="chat" style="width: 20%;" src="img/cht.png"> </div></a> 

    <form action="send_db.php" method="POST"> <!-- 메세지 보내기 !-->
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

            <textarea name="sms_text" cols="50" rows="30" placeholder="메세지를 입력하세요" style="text-align:left;"></textarea>
            <div style="font-size: 12px; padding-top: 3px; padding-bottom: 10px;">
                <span class="bold">글자 수 제한</span>&nbsp;0/150
            </div>

            <input type="submit" value="보내기" />

          </center>
      </div>
    </form>

    <script> /* Java Script */
        function send_time() { // send_time 함수 실행
            document.getElementById('send_time').value = new Date().toLocaleString(); // 'send_time' id값을 가진 요소를 찾아 value값 지정. new Date() 함수는 시간을 받아오는 함수로 인자값이 없으면 현재 시간을 받아온다.
            replace(/T/, ' '); // T대신 공백              tolocaleString() - 사용자의 문화권에 맞는 시간표기법으로 년,월,일,시간을 문자열로 리턴함.
        }

        function change() {
            var type = document.getElementById('send_type');
        }

        // 현재 시간을 1초마다 받아와 출력하는 스크립트
        var clockTarget = document.getElementById("clock");

        function clock() {
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
            clockTarget.innerText = `현재 시각 : ${month+1}월 ${clockDate}일 ${week[day]}요일 ` +

                `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes }`  : minutes }:${seconds < 10 ? `0${seconds }`  : seconds }`;

            // 월은 0부터 1월이기때문에 +1일을 해주고 
            // 시간 분 초는 한자리수이면 시계가 어색해? 10보다 작으면 앞에 0을 붙혀주는 작업을 3항 연산으로 진행함.
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