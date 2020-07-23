$(function(){
  //새로고침
  alert("gd");

});




// 키보드 이벤트가 발생할 때마다 확인 (textarea 스크롤 말고 박스 크기 자체 늘리기)
// receiver 의 onkeyup="resize(this)"가 함수를 부르고 해당 textarea를 obj에 넣음
function resize(obj) {
  // obj의 스타일 중 높이의 값은 1로 한다. // 없으면 계속 늘어난다.
  obj.style.height = "1px";
  // obj의 스타일 중 높이의 값은 12 + 스크롤 높이의 px 값만큼으로 한다.
  obj.style.height = 12 + obj.scrollHeight + "px";
}

// MySql db - DateTime에 넣기 위해 필요한 함수
function send_time() {
  // (참고 : https://c10106.tistory.com/4728 )

  // toISOString는 UTC +0 으로 받아오기 때문에 현재 시간에 계속 -9시간인 시간이 출력되어 +9 시간을 해주어야 했음.
  // toLocaleString(), toString() 등은 시간이 정상적으로 출력이 되지않았음.

  // new Date() - 시간을 받아오는 함수로 인자값이 없으면 현재 시간을 받아온다.
  // getTimezoneOffset() - UTC(협정세계시)와 시스템이 속해있는 지역의 시간의 차이를 분 단위로 리턴함. (서울은 UTC +9시간이므로 -540으로 자동 리턴함)
  // 밀리초값으로 만들어야 하기 때문에 * 60000 을 해줌으로 시간 차이를 밀리값으로 저장함. (이유 : Date.now()가 밀리초값으로 반환되기 때문)
  let timezone = new Date().getTimezoneOffset() * 60000; // 60000 = 60초 = 1분

  // Date.now() - UTC 기준으로 1970년 1월 1일 0시 0분 0초부터 현재까지 경과된 밀리초를 반환
  // 경과된 밀리초에 - timezone을 하고 그 값을 new Date에 인자값으로 넣은 후 timezoneDate에 저장. (-와 -가 만나서 +로 시간 차이만큼 빼지않고 시간을 올림)
  let timezoneDate = new Date(Date.now() - timezone);

  // 'send_time'id값을 가진 요소를 찾아 value값에 접근하여 값을 넣어줌.
  // toISOString() - ISO형식으로 반환(ISO 8601), 반환값은 YYYY:MM-DDTHH:mm:ss.sssz 임. slice로 뒷 5글자 제거(밀리초 + . 포함)
  // 윗 작업으로 나온 밀리초를 ISOString으로 선언하면 -9시간을 빼고 출력됨.
  document.getElementById("send_time").value = timezoneDate
    .toISOString()
    .slice(0, -5);
}

// change() = 함수 요소 값이 바뀔 때 발생함. ※ input, textarea, select 요소로 제한됨 (select, check, radio = 마우스로 선택하면 이벤트 발생, 다른 요소는 포커스에서 벗어나면 발생)
// send_type id값을 가진 요소의 값이 바뀔 때 실행한다.
$("#send_type").change(function () {
  // 변수 state에 id send_type의 선택된 value값을 state에 넣는다.
  let state = $("#send_type option:selected").val();

  // 만약 선택된 값이 1' 이라면
  if (state == "1") {
    // id send_time의 readonly를 활성화
    document.getElementById("send_time").readOnly = true;

    // send_time 함수 호출 (send_time 함수를 호출하지 않으면 SetInterval의 1초간의 딜레이가 생기기 때문에 send_time()함수를 먼저 한 번 부른다.)
    send_time();

    // setInterval - 함수를 몇 초의 딜레이후에 실행하고 싶을 때 사용. (호출 스케줄링) ※ 일정 시간 간격으로 함수가 주기적으로 실행됨.
    // send_time() 함수를 1초마다 실행, millsecond로 1000이 1초임.
    timer = setInterval(function () {
      send_time();
    }, 1000);

    // 만약 선택된 값이 2'라면
  } else if (state == "2") {
    // id send_time의 readonly 비활성화
    document.getElementById("send_time").readOnly = false;

    // SetInterval 종료 (인자값으로 setInterval 을 담은 변수를 넣어주어야 한다)
    clearInterval(timer);

    // 설명 83 ~ 95 참고
    let timezone = new Date().getTimezoneOffset() * 60000;
    let timezoneDate = new Date(Date.now() - timezone);

    // 예약으로 보낼 때는 초까지 선택을 하지 않기 때문에 16 까지 출력함.
    document.getElementById(
      "send_time"
    ).value = timezoneDate.toISOString().slice(0, 16);

    // 그 외라면
  } else {
    // id send_time의 readonly 비활성화
    document.getElementById("send_time").readOnly = true;

    // SetInterval 종료
    clearInterval(timer);

    // 값 삭제
    document.getElementById("send_time").value = "";
  }
});

// jQuery.
// $(function() { }); == $(documet).ready(function() {}); 와 동일한 의미이다. 간편하게 $(function() {}); 로 많이 사용한다.
// TextArea 글자 수 제한 함수 + 실시간 타이핑 함수
$(document).ready(function () {
  // keyup(function(e)) -> e 쓰는 이유 : keyup 발생 시 'e'라는 keyup handler를 쓰는 callback 함수를 만들기 위해 사용
  // id sms_text에 keyup 이벤트가 발생했을 때에 대한 정보를 'e' 에 담는다.
  $("#sms_text").keyup(function (e) {
    // content 라는 변수에 sms text 의 keyup이 발생했을 때에 대한 값을 content에 저장한다. this = 콘솔 로그 찍으니 textarea id=sms_text ~ 구문 나옴.
    let content = $(this).val();

    // counter 라는 element 요소의 내용을 counter.length + /150 으로 바꾼다.
    // $.html = id counter의 요소 안의 내용을 지우고 새로운 내용을 넣음.       ### -> counter의 길이값 + '/150'  // 참고 링크 : https://www.codingfactory.net/10324
    $("#counter").html(content.length + "/150");
  });

  // 입력하지 않았어도 키업이 발생했다고 함수를 선언. 안 그러면 기존값인 ###이 나오고 입력하기 시작해야 ~/150 이 출력되기 때문.
  $("#sms_text").keyup();
});

// 수신자 몇명인지 체크
$(document).ready(function () {
  // receiver id값의 키버튼이 눌리면
  $("#receiver").keyup(function (e) {
    // 변수 receiver에 해당 id값을 넣고
    let receiver = $("#receiver").val();

  //숫자와 ','빼고 입력금지
    //만약 수신자텍스트에 숫자 이외의 문자가 들어가게된다면
    if(receiver.match(/[^0-9,.,]/)){
      //숫자만 입력해달라는 팝업생성
      alert("숫자만 입력해주세요");
      receiver="";

      //숫자 외 문자열을 공백으로 바꿔서 텍스트를 비워주고싶은데 replace나 val,text()를 써도 안됌
      //나중에 다시 시도해봄


    }
 //수신자 명수 출력
    // receiver의 모든 문자열의 공백을 ""로 치환했을 때 문자열의 길이가 0이면
    if (receiver.replace(/\s|/gi, "").length == 0) {
      // num id값에 0 출력
      $("#num").html(0);
    } else {
      // split(특정 문자열로 구분하여 배열로 바꾸어 줌)
      // 변수 receivers에 해당 값에 "," 와 "\n"이 있을 때마다 배열로 바꾸고 해당 길이의 값을 넣는다. (-1 하는 이유 : 처음에 2명으로 체크가 되어서)
      let receivers =
        receiver.split(",").length + receiver.split("\n").length - 1; // || 이 먹히질 않음. 왜그러지

      // num id값에 receivers의 값으로 변경
      $("#num").html(receivers);
    }
  });
});

// JQuery. 모든 jQuery는 $(document).ready(function() { }); 로 시작이 된다.
// $(document).ready(function(){ == JS onload와 같은 기능.    $(function() {}) 와 동일구문이다.
// 문서객체모델이라고 하는 DOM이 모두 로딩된 다음 $(document).ready()을 실행하게끔 해주는 구문이다.

// 번호나 이메일 둘중 하나가 비어있고 본문 공백이면 입력하라고 알려줌 + 과거시간이면 발송 불가
$(document).ready(function () {
  // subButton id값을 가진 요소를 클릭 했을 때. (submit)
  $("#subButton").click(function () {
    // 수신 번호 칸에 입력이 안 되어 있을 때 입력하라고 알려줌.

    //번호
    let receive = $("#receiver").val();
    //메일
    let receive_e=$("#receiver_e").val();
    console.log(receive_e.length);
    // 번호란의 문자길이가 0이거나 메일란의 문자길이가 0이라면
    //위에 숫자외문자입력시 문자 삭제만 작동하면 replace안쓰고 그냥 length만 써도됌
    if (!(receive_e.length > 0) ) {
      alert("수신자를 입력해주세요");

      // receiver id값에 포커스 얻기(입력상태 만들어주기)
      $("#receiver").focus();

      // 반환 false
      return false;
    }

    // 메세지 입력 칸이 비어있으면 입력하라고 알려줌.

    let text = $("#sms_text").val();

    // 만약 sms_text의 값이 공백이라면
    // replace(a, b) == 문자열의 a를 b로 바꿈.
    // 정규표현식: / (정규표현식 시작), \s (공백 or Tab),  | (or),  g (문자열 모든 문자검색), i(대소문자 무시)
    // 문자열의 모든 문자를 대소문자를 무시하고 검색하고 모든 공백을 ""로 치환했을 때 문자열의 길이가 0이라면
    if (text.replace(/\s| /gi, "").length == 0) {
      // 알림창 출력
      alert("메세지를 입력해주세요");

      // sms_text에 입력상태 만들어주기
      $("#sms_text").focus();

      // 반환 false
      return false;
    }

    // 발송 시간이 현재나 과거면 예약메세지 제한됨.

    // OTC와 한국시간의 차이를 구하고
    let nowtimezone = new Date().getTimezoneOffset() * 60000;
    let nowtimezoneDate = new Date(Date.now() - nowtimezone);

    // send_time id값에 입력된 시간이 현재 시간과 같거나 작으면
    if ($("#send_time").val() <= nowtimezoneDate.toISOString().slice(0, 16)) {
      // 알림창 출력
      alert("현재나 과거 시간으로 예약메세지를 보낼 수 없습니다!");

      // send_time에 입력상태로 만들어줌
      $("#send_time").focus();

      // 반환 false
      return false;
    }
  });
});


// 주소록 모달형식

// phonebookopen id값을 가진 버튼을 클릭했을 때 phonebook fadein효과 (jQeury)
$("#phonebookopen").click(function () {
  $("#phonebook").fadeIn();
});

// phonebookclose id값을 가진 버튼을 클릭했을 때 phonebook fadeout효과 (jQuery)
$("#phonebookclose").click(function () {
  $("#phonebook").fadeOut();
});

// 번호 추가하기
function insertAddress() {
  // 이름과 번호의 value를 가져옴.
  let name = $("#insname").val();
  let tel = $("#instel").val();

  // 만약 이름이나 번호가 공백이면
  if (name == null || name == "" || tel == null || tel == "") {
    // 알림창 띄우고 이름입력칸에 포커싱 잡아주기
    alert("이름과 번호를 확인해주세요");
    $("#insname").focus();
    return;
  }

  /*$.ajax({
                url: API.CREATE,
                method: ACTION_METHODS.create;
                data: {
                    name: name,
                    tel: tel
                }
            }).done(function(response) {

            })*/
}

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

/* 공부

        DOM = HTML 문서에 대한 인터페이스. (참고 링크 : https://developer.mozilla.org/ko/docs/Web/API/Document_Object_Model/%EC%86%8C%EA%B0%9C)

        첫 째. 뷰 포트에 무엇을 렌더링할지 결정하기 위해 사용됨
        둘 째. 페이지의 콘텐츠 및 구조, 그리고 스타일이 자바스크립트에 의해 수정되기 위해 사용된다.
               (문서의 구조화된 표현을 제공하여 프로그래밍 언어가 DOM구조에 접근할 수 있는 방법을 제공하여 그들이 문서 구조, 스타일, 내용 등을 변경할 수 있게 돕는다.)

        DOM은 원본 HTML 문서 형태와 비슷하지만 차이점이 있다.
           1. 항상 유효한 HTML 형식
            2. 자바스크립트에 수정될 수 있는 동적 모델이여야 함
            3. 가상 요소를 포함하지않음 (ex ::after)
            4. 보이지 않는 요소를 포함 (ex display:none)


        var, let, const 차이점 (참고 : https://velog.io/@bathingape/JavaScript-var-let-const-%EC%B0%A8%EC%9D%B4%EC%A0%90)

        var : 유연한 변수 선언. 변수를 중복 선언해도 에러가 나오지 않고 각기 다른 값이 출력된다.
        let : 변수 재선언 했을 경우 이미 해당 변수명이 선언되었다고 에러 메세지가 출력된다. 하지만 재할당은 가능하다. let name = "111";  name="222";
        const : let과 같지만 재할당 또한 불가능하다.

        변수를 사용할 때 웬만하면 const를 사용하고 재할당이 필요한 경우에 한해서 let을 사용하자.

        호이스팅 : var 선언문이나 function 선언문 등을 해당 스코프의 선두로 옮긴 것처럼 동작하는 특성.
                  자바스크립트는 var, let, const 등을 포함한 function 등 모든 선언을 호이스팅한다.
                  하지만 var로 선언된 변수와는 달리 let 으로 선언된 변수를 선언문 이전에 참조하면 에러가 발생한다. ex) console.log(name), let name="111"; = ERROR
        */
