<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ToySend</title>
    <script src="//code.jquery.com/jquery-3.3.1.min.js"></script>

    <style media="screen">
        /* 날짜 영역 */
        #time {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-bottom: 10px;
            border: 3px;
        }
    </style>
</head>

<body>
    <!-- http://localhost/Yuhan_Trumpia/title.php 작동 되지않음 -->
    <!-- $_SERVER['DOCUMENT_ROOT'] 작동 되지않음 -->
    <?php include "../title.php" ?>

    <!-- 메세지 보내기 !-->
    <form action="send_db.php" method="POST">
        <div>
            <center>
                <!-- 보류
                    <p id="clock" style="text-align:left; width:300px; margin:0 auto;">00:00</p>
                -->

                <h4>발송 선택에서 현재, 예약 중 선택 후 날짜를 입력해 주세요.</h4>

                <div id="time">
                    <!-- 현재, 예약인지 선택. Select Box -->
                    <label for="send_type" style="padding-right: 5px;">발송 : </label>
                    <select name="send_type" id="send_type">
                        <option value="" selected="selected">선택</option>
                        <option value="1'">현재</option>
                        <option value="2'">예약</option>
                    </select>

                    <label style="padding-right: 10px;">날짜 설정</label>

                    <!-- 날짜, 시간 불러오기 -->
                    <input type="datetime-local" id="send_time" name="send_time" readonly>

                </div>

                <!-- 수신 번호 입력 -->
                <input type="text" id="receiver" name="receiver" placeholder="수신 번호를 입력하세요" style="text-align: center;">
                <br> <br>

                <!-- 본문 입력 -->
                <textarea name="sms_text" placeholder="메세지를 입력하세요. 150자까지 입력이 가능합니다." id="sms_text" value="" maxlength="150" style="text-align:left; width:400px; height:300px;"></textarea> <br>
                <span id="counter">###</span> <br> <br>

                <!-- 발송 -->
                <input type="submit" value="메세지 보내기" id="subButton" />
            </center>
        </div>
    </form>

    <!-- Java Script -->
    <script>
        // 시간 테스트용 (참고 : https://c10106.tistory.com/4728 )
        var a = new Date(Date.now());
        var b = new Date().getTimezoneOffset() * 60000;
        var c = new Date(Date.now() - b);
        console.log(a); /* 출력 값 : 당시 1594794969278 */
        console.log(b); /* 출력 값 : 당시 -32400000 */
        console.log(c); /* 출력 값 : 당시 Thu Jul 16 2020 00:37:13 GMT+0900 (대한민국 표준시) */
        console.log(a.toISOString().slice(0, -5));
        console.log(c.toISOString().slice(0, -5)); /* 출력 값 : 당시 2020-07-15T15:37:13 (ISO는 UTC를 0으로 받아오기 때문에 -9시간하면 현재 시간이 나온다.) */


        // MySql db - DateTime에 넣기 위해 필요한 함수
        function send_time() {

            // toISOString는 UTC +0 으로 받아오기 때문에 현재 시간에 계속 -9시간인 시간이 출력되어 +9 시간을 해주어야 했음.
            // toLocaleString(), toString() 등은 시간이 정상적으로 출력이 되지않았음.

            // new Date() - 시간을 받아오는 함수로 인자값이 없으면 현재 시간을 받아온다.
            // getTimezoneOffset() - UTC(협정세계시)와 시스템이 속해있는 지역의 시간의 차이를 분 단위로 리턴함. (서울은 UTC +9시간이므로 -540으로 자동 리턴함)
            // 밀리초값으로 만들어야 하기 때문에 * 60000 을 해줌으로 시간 차이를 밀리값으로 저장함. (이유 : Date.now()가 밀리초값으로 반환되기 때문)
            var timezone = new Date().getTimezoneOffset() * 60000; // 60000 = 60초 = 1분

            // Date.now() - UTC 기준으로 1970년 1월 1일 0시 0분 0초부터 현재까지 경과된 밀리초를 반환
            // 경과된 밀리초에 - timezone을 하고 그 값을 new Date에 인자값으로 넣은 후 timezoneDate에 저장. (-와 -가 만나서 +로 시간 차이만큼 빼지않고 시간을 올림)
            var timezoneDate = new Date(Date.now() - timezone);

            // 'send_time'id값을 가진 요소를 찾아 value값에 접근하여 값을 넣어줌.
            // toISOString() - ISO형식으로 반환(ISO 8601), 반환값은 YYYY:MM-DDTHH:mm:ss.sssz 임. slice로 뒷 5글자 제거(밀리초 + . 포함)
            // 윗 작업으로 나온 밀리초를 ISOString으로 선언하면 -9시간을 빼고 출력됨.
            document.getElementById('send_time').value = timezoneDate.toISOString().slice(0, -5);

        }

        // change() = 함수 요소 값이 바뀔 때 발생함. ※ input, textarea, select 요소로 제한됨 (select, check, radio = 마우스로 선택하면 이벤트 발생, 다른 요소는 포커스에서 벗어나면 발생)
        // send_type id값을 가진 요소의 값이 바뀔 때 실행한다.
        $('#send_type').change(function() {

            // 변수 state에 id send_type의 선택된 value값을 state에 넣는다.
            var state = $('#send_type option:selected').val();

            // 만약 선택된 값이 1' 이라면
            if (state == "1'") {

                // id send_time의 readonly를 활성화
                document.getElementById('send_time').readOnly = true;

                // send_time 함수 호출 (send_time 함수를 호출하지 않으면 SetInterval의 1초간의 딜레이가 생기기 때문에 send_time()함수를 먼저 한 번 부른다.)
                send_time();

                // setInterval - 함수를 몇 초의 딜레이후에 실행하고 싶을 때 사용. (호출 스케줄링) ※ 일정 시간 간격으로 함수가 주기적으로 실행됨.
                // send_time() 함수를 1초마다 실행, millsecond로 1000이 1초임.
                timer = setInterval(function() {
                    send_time();
                }, 1000);


                // 만약 선택된 값이 2'라면
            } else if (state == "2'") {

                // id send_time의 readonly 비활성화
                document.getElementById('send_time').readOnly = false;

                // SetInterval 종료 (인자값으로 setInterval 을 담은 변수를 넣어주어야 한다)
                clearInterval(timer);

                // 설명 83 ~ 95 참고
                var timezone = new Date().getTimezoneOffset() * 60000;
                var timezoneDate = new Date(Date.now() - timezone);

                // 예약으로 보낼 때는 초까지 선택을 하지 않기 때문에 16 까지 출력함.
                document.getElementById('send_time').value = timezoneDate.toISOString().slice(0, 16);


                // 그 외라면
            } else {

                // id send_time의 readonly 비활성화
                document.getElementById('send_time').readOnly = true;

                // SetInterval 종료
                clearInterval(timer);

                // 값 삭제
                document.getElementById('send_time').value = "";

            }
        });


        // jQuery.
        // TextArea 글자 수 제한 함수 + 실시간 타이핑 함수
        // $(function() { }); == $(documet).ready(function() {}); 와 동일한 의미이다. 간편하게 $(function() {}); 로 많이 사용한다.
        $(function() {

            // keyup(function(e)) -> e 쓰는 이유 : keyup 발생 시 'e'라는 keyup handler를 쓰는 callback 함수를 만들기 위해 사용
            // id sms_text에 keyup 이벤트가 발생했을 때에 대한 정보를 'e' 에 담는다.
            $('#sms_text').keyup(function(e) {

                // content 라는 변수에 sms text 의 keyup이 발생했을 때에 대한 값을 content에 저장한다. this = 콘솔 로그 찍으니 textarea id=sms_text ~ 구문 나옴.
                var content = $(this).val();

                // counter 라는 element 요소의 내용을 counter.length + /150 으로 바꾼다.
                // $.html = id counter의 요소 안의 내용을 지우고 새로운 내용을 넣음.       ### -> counter의 길이값 + '/150'  // 참고 링크 : https://www.codingfactory.net/10324
                $('#counter').html(content.length + '/150');
            });

            // 입력하지 않았어도 키업이 발생했다고 함수를 선언. 안 그러면 기존값인 ###이 나오고 입력하기 시작해야 ~/150 이 출력되기 때문.
            $('#sms_text').keyup();
        });


        /* DOM = HTML 문서에 대한 인터페이스. (참고 링크 : https://developer.mozilla.org/ko/docs/Web/API/Document_Object_Model/%EC%86%8C%EA%B0%9C)

         첫 째. 뷰 포트에 무엇을 렌더링할지 결정하기 위해 사용됨
         둘 째. 페이지의 콘텐츠 및 구조, 그리고 스타일이 자바스크립트에 의해 수정되기 위해 사용된다.
               (문서의 구조화된 표현을 제공하여 프로그래밍 언어가 DOM구조에 접근할 수 있는 방법을 제공하여 그들이 문서 구조, 스타일, 내용 등을 변경할 수 있게 돕는다.)

         DOM은 원본 HTML 문서 형태와 비슷하지만 차이점이 있다.
            1. 항상 유효한 HTML 형식
            2. 자바스크립트에 수정될 수 있는 동적 모델이여야 함
            3. 가상 요소를 포함하지않음 (ex ::after)
            4. 보이지 않는 요소를 포함 (ex display:none) 
         */

        // $(document).ready(function() {}) 와 동일 구문
        // subButton id값을 가진 요소를 클릭했을때
        $(function() {
            $("#subButton").click(function() {

                // 만약 sms_text의 값이 ""라면
                if ($("#sms_text").val() == "") {

                    // 알림창 출력
                    alert("메세지를 입력해주세요");

                    // sms_text에 입력상태 만들어주기
                    $("#sms_text").focus();

                    // 반환 false
                    return false;
                }
            })
        })

        // JQuery. 모든 jQuery는 $(document).ready(function() { }); 로 시작이 된다.
        // 수신 번호 칸에 입력이 안 되어 있을 때 입력하라고 알려주는 함수.
        // $(document).ready(function(){ == JS onload와 같은 기능.
        // 문서객체모델이라고 하는 DOM이 모두 로딩된 다음 $(document).ready()을 실행하게끔 해주는 구문이다.
        $(document).ready(function() {

            // subButton id값을 가진 요소를 클릭 했을 때.
            $("#subButton").click(function() {

                // receiver id값의 ""이면 경고창 띄우기.
                if ($("#receiver").val() == "") {
                    alert("번호를 입력해주세요")

                    // receiver id값에 포커스 얻기(입력상태 만들어주기)
                    $("#receiver").focus();

                    // 반환 false
                    return false;
                }
            })
        });

        /* 보류(Clock) 

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
                // 월은 0부터 1월이기때문에 +1일을 해준다. // 시간 분 초는 한자리수이면 시계가 어색해? 10보다 작으면 앞에 0을 붙혀주는 작업을 진행함.
                clockTarget.innerText = `현재 시각 : ${month + 1}월 ${clockDate}일 ${week[day]}요일 ` +
                    `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 10 ? `0${seconds}` : seconds}`;

            }

            function init() {
                // 함수 clock() 실행  -   clock() 함수를 먼저 부르지 않으면 1초간의 딜레이 후 clock()함수가 불러지기 때문에
                clock();
                // setInterval - 함수를 몇 초의 딜레이후에 실행하고 싶을 때 사용. (호출 스케줄링) ※ 일정 시간 간격으로 함수가 주기적으로 실행됨. 중지 = clearInterval([인터벌 변수]) clockTarget
                // setInterval(func clock, 1000) 1000 - millisecond로 1000 = 1초.
                setInterval(clock, 1000);
            }

            // 최초 init() 실행
            init();

        */
    </script>
</body>

</html>