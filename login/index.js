//LOGIN()함수 정의
function LogIn() {
  $.ajax({
    // login.php에 연결
    url: "login.php",
    //id가 id인 값과 id 가 pw인 값이 data
    data: {
      id: $("#id").val(),
      pw: $("#pw").val(),
    },
    //post메소드를 이용하여 url에 요청
    type: "POST",
    //ajax요청이 완료되면
  }).success(function (data) {
    //받은 데이터의 값이 1일 때
    if (data == "1") {
      //로그인이 되었다는 alert
      alert($("#id").val() + "님 로그인되었습니다");
      //main.php로 이동한다
      location.href = "main.php";
    }
    //받은 데이터의 값이 2일 때
    else if (data == "2") {
      //다시 입력하라는 alert
      alert("아이디/비밀번호를 다시 입력해주세요");
      //index.php로 이동한다
      location.href = "index.php";
    }
    //받은 데이터의 값이 1,2가 아닐 때
    else {
      //받은 데이터의 값이 무엇인지 alert
      alert(data);
    }
  });
}

$(document).ready(function () {
  // userID에 저장된 쿠키값을 가져와서 id값에 넣어준다.
  let userID = getCookie("userID");
  $("#id").val(userID);

  if ($("#id").val() != "") {
    // 그 전에 ID를 저장해서 첫 페이지 로딩 시 ID 입력 칸에 저장된 ID가 입력된 상태라면
    $("#saveid").attr("checked", true); // 아이디 기억하기를 체크표시로 유지하기. (attr = 속성을 가져오거나 추가함)
  }

  // saveid 값 (체크박스)에 변화가 생기면 함수 실행
  $("#saveid").change(function () {
    // 아이디 기억하기를 클릭했을 때
    if ($("#saveid").is(":checked")) {
      // id값의 값을 userID라는 이름으로 쿠키를 14일간 저장
      setCookie("userID", $("#id").val(), 14);
    } else {
      deleteCookie("userID"); // userID 쿠키삭제
    }
  });
});

// 쿠키란? 브라우저에 저장되는 작은 크기의 문자열이다. 쿠키는 주로 웹서버에서 만들어짐. 서버가 SetCookie에 내용을 넣어 전달하면 브라우저는 이 내용을 자체적으로 브라우저에 저장한다.
// 쿠키 저장 (쿠키이름, 값, 일)
function setCookie(cookieName, value, days) {
  // nowdate 변수에 현재 시간 저장
  var nowDate = new Date();

  // nowdate에 저장된 일(date)을 반환하고(getDate()) +days(14)만큼 더한 후 날짜를 설정(setDate)
  nowDate.setDate(nowDate.getDate() + days);

  // id값을 escape에 넣고 + days가 null이면 "" 넣고 아니면 ; expires=" + nowdate.toGMTString()"으로 만들고 지정해준다.
  // escape(id); expires=nowdate.toGMTString();

  // escape - URL로 데이터를 전달하기 위해서 문자열을 인코딩 (웹을 통해서 데이터를 전송할 때 특정 문자들은 escape을 통해 전송해주어야한다. ex) 한글이나 & 같은 문자열(& => %로 변환해서 전송))
  // escape - 한글 때문에 사용
  // expires = 만료기간설정. nowdate에 셋팅한 값을 GMTString으로 변환 후 값을 넣어준다.
  // 만약 days == null이여서 ""으로 저장되면 브라우저가 종료될 때 삭제된다.
  var cookieValue =
    escape(value) + (days == null ? "" : "; expires=" + nowDate.toGMTString());

  // console.log(cookieValue);   =>  ; expires=Wed, 05 Aug 2020 07:17:43 GMT

  // document.cookie = 브라우저에서 쿠키로 접근이 가능함.
  // UserID=escape(value); expires=nowdate.toGMTString();
  document.cookie = cookieName + "=" + cookieValue;
}

// 쿠키 삭제(쿠키이름)
function deleteCookie(cookieName) {
  // expireDate 변수에 현재시각 저장
  var expireDate = new Date();

  // expireDate에 저장된 일(date)을 반환하고(getDate -1을 해준 후 날짜를 설정한다(setDate), -1 하는이유 : 보존기간을 과거로 하기 위해서
  expireDate.setDate(expireDate.getDate() - 1);

  // document.cookie = userID=escape(value); expires=expireDate.toGMTString();
  document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

// 쿠키 가져옴
function getCookie(cookieName) {
  cookieName = cookieName + "=";
  var cookieData = document.cookie;
  var start = cookieData.indexOf(cookieName);
  var cookieValue = "";
  if (start != -1) {
    start += cookieName.length;
    var end = cookieData.indexOf(";", start);
    if (end == -1) end = cookieData.length;
    cookieValue = cookieData.substring(start, end);
  }
  return unescape(cookieValue);
}
