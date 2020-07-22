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
