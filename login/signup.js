//아이디 중복확인이 완료되었는지 확인하는 변수 lok 선언, lok가 2일때 회원가입 가능
var lok = 1;
//OnlyN함수 정의(입력창에 숫자만 입력 가능하게 하는 함수)
function OnlyN(k) {
  //키 올라갈때
  $(k).keyup(function () {
    //숫자 이외의 값(^\d)을 입력하면 공백으로 치환
    $(this).val($(this).val().replace(/[^\d]/, ""));
  });
}
//NotS()함수 정의(입력창에 띄어쓰기가 불가능하게 하는 함수)
function NotS(k) {
  //키 올라갈때
  $(k).keyup(function () {
    //" "를 입력하면 공백으로 치환
    $(this).val($(this).val().replace(" ", ""));
  });
}
//IdCheck()함수 정의(중복된 ID가 있는지 확인하는 함수)
function IdCheck() {
  //id값이 id인 요소를 id로 선언
  var id = document.getElementById("id");
  $.ajax({
    //signup_idcheck.php에 연결
    url: "signup_idcheck.php",
    //id가 id인 값이 data
    data: {
      id: $("#id").val(),
    },
    //post메소드를 이용하여 url에 요청
    type: "POST",
    //ajax요청이 완료되면
  }).success(function (data) {
    //받은 데이텅의 값이 1일 때
    if (data == "1") {
      //아이디가 사용 가능하다는 alert
      alert("사용 가능한 아이디 입니다");
      //lok 변수를 2로 지정 - 회원가입 가능
      lok = 2;
    }
    //받은 데이터의 값이 2일 때
    else if (data == "2") {
      //아이디가 중복되었다는 alert
      alert("이미 사용중인 아이디 입니다");
      //id칸을 공백으로
      id.value = "";
      //초점을 id칸으로
      id.focus();
      //lok 변수를 1로 지정 - 회원가입 불가능
      lok = 1;
    }
    //받은 데이터의 값이 1,2가 아닐 때
    else {
      //받은 데이터의 값이 무엇인지 alert
      alert(data);
    }
  });
}
//checkform 함수 정의
function CheckForm() {
  //lok가 1이여서 중복확인이 필요한 경우
  if (lok == 1) {
    //중복확인을 해달라는 alert
    alert("아이디 중복 확인을 해주세요");
  }
  //lok가 2여서 회원가입이 가능한 경우
  else if (lok == 2) {
    //id가 id, pw인 요소를 id, pw로 선언
    var id = document.getElementById("id");
    var pw = document.getElementById("pw");
    var email = document.getElementById("email");
    var name = document.getElementById("name");
    //id의 내용이 공백이거나 pw & email 내용이 공백이라면
    if (
      id.value == "" ||
      pw.value == "" ||
      email.value == "" ||
      name.value == ""
    ) {
      //아이디와 비밀번호와 이메일을입력하라는 alert
      alert("입력란을 확인하세요");
      //false를 반환하여 submit 하지 않는다
      return false;
    }
    //pw의 내용에 모든문자/숫자+특수문자 조합의 문자열이 존재하지 않거나 특수문자+모든문자/숫자의 조합이 존재하지 않을때
    else if (
      !pw.value.match(
        /([/\w\d/][!,@,#,$,%,^,&,*,?,_,~,-])|([!,@,#,$,%,^,&,*,?,_,~,-][/\w\d/])/
      )
    ) {
      //특수문자를 혼용하라는 alert
      alert("비밀번호는 특수문자를 혼용하여 입력해주세요");
      //pw의 내용을 공백으로 만든다
      pw.value = "";
      //pw로 초점을 맞춘다
      pw.focus();
      //false를 반환하여 submit 하지 않는다
      return false;
    }
    // email의 정규표현식                   / = 정규표현식 시작
    // ^[0-9a-zA-Z]                         = 첫 글자는 숫자 또는 대소문자
    // [-_.]?[0-9a-zA-Z])*@                 = @ 앞에는 - _ . 이 0~1번, 그 뒤의 숫자 또는 대소문자는 한번 또는 여러번
    // @ 뒤에는 숫자 또는 대소문자
    // [-_.]?[0-9a-zA-Z])*.                 = . 앞에는 - _ . 이 0~1번, 그 뒤의 숫자 또는 대소문자는 한번 또는 여러번
    // [a-zA-Z]{2,3}$/i                     = . 뒤 마지막 문자열은 영문자 2~3개
    else if (
      !email.value.match(
        /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i
      )
    ) {
      alert("알맞은 이메일 형식으로 작성해 주세요");
      email.value = "";
      email.focus();
      return false;
    }
    //그 외의 경우
    else {
      //signup폼을 submit한다
      document.SignUp.submit();
    }
  }
}
