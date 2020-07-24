// DOM(문서객체모델) 생성 이후 바로 실행
$(document).ready(function() {

  //명세 출력
  print();
  //발송완료, 발송예약 출력
  sendtype();
  //전송완료 건수 출력
  sendtypevalue();
  //체크박스 검사
  check();

  //전체 체크
  //전체 체크박스를 클릭했을 때
  $("#allCheck").click(function() {
    //전체체크박스가 true 상태라면
    if ($("#allCheck").is(":checked")) {
      //하위 체크박스를 반복해서 불러와 함수를 실행
      $(".checkbox").each(function() {
        //현재 하위체크박스 상태를 true로 변경
        $(this).prop("checked", true);
      });
      //전체 체크박스가 false 상태라면
    } else {
      //하위 체크박스를 반복해서 불러와 함수를 실행
      $(".checkbox").each(function() {
        //현재 하위체크박스 상태를 false로 변경
        $(this).prop("checked", false);
      });
    }
  });


  //주의
  //삭제 실행 후 하위체크박스 체크를 했을 때 전체체크박스가 안풀리는 오류가 있음
  //=>body 안에 데이터를 출력하는 테이블 밑에 스크립트를 만들어 옮겼더니 실행됨.
  //새로만들어진 데이터 테이블들이 함수를 못찾음(ajax실행 후에 만들어지는 태그들이라 그런것으로 추측)


  //전체체크 상태에서 하위 체크박스가 하나라도 false일 때 전체 체크박스 상태를 false로 바꿈
  //또한 하위 체크박스를 모두 클릭했을 때 전체 체크박스를 체크
  //하위 체크박스를 클릭했을 때
  // function check()
  //  $(".checkbox").click(function(){
  //   //만약 전체체크박스 상태가 true, 현재 체크한 체크박스의 상태가 false라면
  //   if($("#allCheck").is(":checked") && $(this).is(":checked")==false){
  //     //전체 체크박스 상태를 false로 변경
  //     $("#allCheck").prop("checked",false);
  // 		//체크된 체크박스 수와 전체 하위 체크박스 수가 같다면
  //   }else if($("input[type=checkbox]:checked").length == $(".checkbox").length){
  // 		//전체 체크박스 상태를 true로 변경
  //  		$("#allCheck").prop("checked",true);
  // 	}
  // });


  //삭제 버튼을 클릭했을 때 함수 실행
  $("#delete").click(function() {
    //전체 삭제를 원할 때
    //전체체크박스가 true일 때
    if ($("#allCheck").is(":checked")) {
      //removepost함수
      removepost("delete.php", $(".checkbox"), null);
      //삭제되었다는 팝업창 생성
      alert("삭제되었습니다.");
      //전체 체크박스 체크해제
      $("#allCheck").prop("checked", false);
      //선택 삭제를 원할 때
      //전체체크박스가 false상태 일 때
    } else {
      //하위체크박스 상태를 확인하기위해 함수를 반복실행
      $(".checkbox").each(function() {
        //만약 현재 하위 체크박스가 true라면
        if ($(this).is(":checked")) {
          //체크된 체크박스 데이터를 삭제하기 위해(체크박스의 value를 통해 send_id값으로 찾아 삭제)
          var t = $(this).val();
          //removepost함수
          removepost("delete.php", $(this), t);
        }
      });
      //삭제되었다는 팝업창 생성
      alert("삭제되었습니다.");
    }
    //전송완료 건수변경
    sendtypevalue();
  });





  //검색
  //search버튼을 클릭했을 때 함수실행
  $("#search").click(function search() {
    //text에 inputsearch값을 초기화
    var text = $("#inputsearch").val();
    //combo에 콤보박스중 선택된 값을 넣어줌
    var combo = $("#combo option:selected").val();
    // input 체크의 값이 on이면,
    if($("#inputcheck").val() == 'on'){
      // input 체크박스가 체크 되었을때,
      if($("#inputcheck").is(":checked") == true){
        // text는 2로 바꿔줌
        // send_type 칼럼은 1은 발송완료, 2는 발송예약으로 데이터를 저장하고있음.
        // text가 2일때는 발송 예약, 1일때는 발송완료인 데이터만 가져오겠다는 의미.
        text = 2;
        // input 체크박스가 미체크 되었을때,
      } else if($("#inputcheck").is(":checked") == false){
        // text는 1로 바꿔줌
        text = 1
      }
    }
    //ajax실행
    $.ajax({
      //post타입으로 전송
      type: "POST",
      //search.php호출
      url: "search.php",
      //데이터 전송
      data: {
        kword: text,
        slct: combo
      },
      //성공했을 때 함수 실행
      success: function(data) {
        //테이블에 html 작성(검색결과를 테이블에 재출력)
        $(".dcell").html(data);
        //send_type 발송완료/발송예약으로 출력
        sendtype();
        //발송건수가 출력되있던 자리에 검색건수와 테이블 안에 있는 자식요소 tr 요소 갯수를 출력한다.
        $("#dvar").html("<p>검색 결과 <span>" + $(".dcell").children('tr').length + "</span>건</p><hr>");
      },
      //에러가 생겼을 때 함수 실행
      error: function() {
        //실패라는 팝업창 생성
        alert("실패");
      }
    });
  });

  // 콤보박스 선택한거에 따라 inputsearch의 타입 등을 변경해주기
  $("#combo").change(function(){
    // 콤보박스가 바뀌면 콤보박스 옵션의 값을 변수에 넣어서 if문으로 검사
    let sel = $(this).val();
    // 시간으로 필터링하면
    if(sel == "send_time"){
      // input 검색바의 type을 date로 변경
      $("#inputsearch").prop("type", "date");
      // input 체크는 작동 안할것임 초기화
      $("#inputcheck").prop("type", "hidden");
      $("#inputcheck").prop("value", "off");
      // 검색바의 값과 type hidden인 텍스트를 공백으로 초기화
      $("#inputsearch").prop("value", "");
      $("#box_text").html('');
    }
    // 발송 상태로 필터링하면
    else if (sel == "send_type"){
      // 검색바의 input type을 hidden으로 변경
      $("#inputsearch").prop("type", "hidden");
      // input 체크가 작동할것임 type을 체크박스로 바꾸고 값을 on으로.
      $("#inputcheck").prop("type", "checkbox");
      $("#inputcheck").prop("value", "on");
      // 검색바의 값 공백으로 초기화
      $("#inputsearch").prop("value", "");
      // hidden 텍스트에 설명을 넣음
      $("#box_text").html('예약 = 체크, 완료 = 미체크');
    }
    // 번호, 내용으로 필터링 할때는
    else{
      // input 검색바의 type을 search로 변경
      $("#inputsearch").prop("type", "search");
      // input 체크는 작동 안할것임 초기화
      $("#inputcheck").prop("type", "hidden");
      $("#inputcheck").prop("value", "off");
      // 값과 type hidden인 텍스트를 공백으로 초기화
      $("#inputsearch").prop("value", "");
      $("#box_text").html('');
    }
  })

  //$("#")


//$(document).ready 끝
});


//삭제
//호출할 url,삭제할 data(send_id),삭제할 요소를 인자로 받는다
function removepost(u, cr, t) {
  //삭제한 데이터 확인
  // console.log("삭제하려는 데이터 value:"+t);
  $.ajax({
    //post타입으로 전송
    type: "POST",
    //인자로 받은 url호출
    url: u,
    //삭제할 데이터(send_id),전체삭제일 때는 null을 보냄
    data: {
      val: t
    },
    //성공했을 때 함수를 실행
    success: function(data) {
      //테이블에 html 작성(삭제 후 테이블에 재출력)
      $(".dcell").html(data);
      //발송완료/예약 출력
      sendtype();
    },
    //에러가 생겼을 때 함수 실행
    error: function() {
      //실패라는 팝업창 생성
      alert("실패");
    }
  });
}


//발생완료,발생예약 출력 함수
function sendtype() {
  //type값(1 or 2)에 따라 발송완료와 발송예약을 표시
  //type클래스를 가진 태그를 반복해서 가져와 함수를 실행
  $(".type").each(function() {
    //현재 반복문으로 가져온 태그의 값(text)가 1이라면
    if ($(this).text() == 1) {
      //가져온 태그에 html추가
      $(this).html(
        //발송완료태그로 바꿔줌
        "<p>완료</p>"
      );
      //1이 아니라면(값이 2라면)
    } else {
      //가져온 태그에 html추가
      $(this).html(
        //발송 예약 태그로 바꿔준다
        "<p>예약</p>"
      );
    }
  });
}

//전송건수 재출력 함수
function sendtypevalue() {
  $.ajax({
    //post타입으로 전송
    type: "POST",
    //url호출
    url: "send_type_value.php",
    //성공했을 때 함수 실행
    success: function(data) {
      //span에 데이터 출력
      $("#dvar").html(
        "<p>발송 완료 <span>" + data + "</span>건</p><hr>"
      );
    },
    //error시 함수실행
    error: function() {
      //실패 팝업창
      alert("실패");
    }
  });
}

// 전체 체크박스 검사하는 함수
function check() {
  //만약 전체체크박스 상태가 true, 현재 체크한 체크박스의 상태가 false라면
  if ($("#allCheck").is(":checked") && $(this).is(":checked") == false) {
    //전체 체크박스 상태를 false로 변경
    $("#allCheck").prop("checked", false);
    //체크된 체크박스 수와 전체 하위 체크박스 수가 같다면
  } else if ($("input[type=checkbox]:checked").length == $(".checkbox").length) {
    //전체 체크박스 상태를 true로 변경
    $("#allCheck").prop("checked", true);
  }
}

// 기본 명세 출력하는 함수
function print(n) {
  $.ajax({
    type: "POST",
    url: "select_sms.php",
    data: {
      num: n
    },
    //성공했을 때 함수 실행
    success: function(data) {
      //테이블에 html 작성(검색결과를 테이블에 재출력)
      $(".dcell").html(data);
      //send_type 발송완료/발송예약으로 출력
      sendtype();
      //발송건수가 출력되있던 자리에 검색건수와 테이블 안에 있는 자식요소 tr 요소 갯수를 출력한다.
      $("#dvar").html("<p>검색 결과 <span>" + $(".dcell").children('tr').length + "</span>건</p><hr>");
    },
    //에러가 생겼을 때 함수 실행
    error: function() {
      //실패라는 팝업창 생성
      alert("실패");
    }
  });
}
