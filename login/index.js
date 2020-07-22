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

//
function setCookie(cookieName, value, exdays) {
  var exdate = new Date();
  exdate.setDate(exdate.getDate() + exdays);
  var cookieValue =
    escape(value) + (exdays == null ? "" : "; expires=" + exdate.toGMTString());
  document.cookie = cookieName + "=" + cookieValue;
}

function deleteCookie(cookieName) {
  var expireDate = new Date();
  expireDate.setDate(expireDate.getDate() - 1);
  document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

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
