$(function(){
  

  //주소록 인원(명)수 출력
  adselectvalue();


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


      //삭제 버튼을 클릭했을 때 함수 실행
      $("#delete").click(function() {

        //전체 삭제를 원할 때
        //전체체크박스가 true일 때
        if ($("#allCheck").is(":checked")) {
          //removeaddress함수
          removeaddress("delete_addressbook.php", $(".checkbox"), null);
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
              //체크된 체크박스 데이터를 삭제하기 위해(체크박스의 value를 통해 id값으로 찾아 삭제)
              var t = $(this).val();
                //removeaddress함수
              removeaddress("delete_addressbook.php", $(this), t);
            }
          });

          //삭제되었다는 팝업창 생성
          alert("삭제되었습니다.");
        }
        //주소록 인원(명)수를 출력
        adselectvalue();
      });

      //삭제
      //호출할 url,삭제할 data(id),삭제할 요소를 인자로 받는다
      function removeaddress(u, i, t) {
        //삭제한 데이터 확인
        // console.log("삭제하려는 데이터 value:"+t);
        $.ajax({
          //post타입으로 전송
          type: "POST",
          //url호출
          url: "delete_addressbook.php",
          //삭제할 데이터(send_id),전체삭제일 때는 null을 보냄
          data: {
            val: t
          },
          //성공했을 때 함수를 실행
          success: function(data) {
            //테이블에 html 작성(삭제 후 테이블에 재출력)
            $(".dcell").html(data);
          },
          //에러가 생겼을 때 함수 실행
          error: function() {
            //실패라는 팝업창 생성
            alert("실패");
          }
        });
      }

//주소록 인원(명)수 출력 함수
function adselectvalue(){
  //ajax실행
  $.ajax({
    //post타입으로 전송
    type: "POST",
    //url호출
    url: "select_addressbook_value.php",
    //성공했을 때 함수 실행
    success: function(data) {
      //가져온 리턴값이 0,null일 때(전체 삭제 후 함수 출력)이 아닐 때
      if(data !=0 || data !=null){
        //span에 데이터 출력
        $("#dvar").html(
          "<p>주소록 (<span>" + data + "</span>명)</p><hr>"
        );
      }else{
        //span에 0 출력
        $("#dvar").html(
          "<p>주소록 (<span>0</span>명)</p><hr>"
        );
      }
    },
    //error시 함수실행
    error: function() {
      //실패 팝업창
      alert("실패");
    }
  });
}

});
