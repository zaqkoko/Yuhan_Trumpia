//주소록 자바스크립트
//2~3초정도 테이블 데이터가 늦게 출력되는데 웨지감자


$(function(){
  alert("/)/) 토끼 귀");

//주소록 인원(명)수를 출력
 callphp("value","null");
 //데이터테이블 출력
 callphp("select","null");





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


//삭제 버튼을 클릭했을 때 함수 실행
$("#delete").click(function() {

  //전체 삭제를 원할 때
        //전체체크박스가 true일 때
        if ($("#allCheck").is(":checked")) {
          console.log("전체삭제루트");
          //전체삭제실행
          callphp("delete","all");

          //삭제되었다는 팝업창 생성
          alert("삭제되었습니다.");
          //전체 체크박스 체크해제
          $("#allCheck").prop("checked", false);

    //선택 삭제를 원할 때
          //전체체크박스가 false상태 일 때
        } else {
          console.log("선택삭제루트");
          //하위체크박스 상태를 확인하기위해 함수를 반복실행
          $(".checkbox").each(function() {
            //만약 현재 하위 체크박스가 true라면
            if ($(this).is(":checked")) {
              //체크된 체크박스 데이터를 삭제하기 위해(체크박스의 value를 통해 id값으로 찾아 삭제)
              var t = $(this).val();
              console.log("선택삭제에서 전달한 id값:"+t);

              //선택삭제실행
              callphp("delete",t);

            }
          });

          //삭제되었다는 팝업창 생성
          alert("삭제되었습니다.");
        }
    //주소록 인원(명)수를 재출력
         callphp("value","null");
    //데이터테이블 재출력
         callphp("select","null");
      });




//$(function()끝
});

//데이터 수정
//테이블 데이터를 클릭했을 때
function onwrite(obj){
  //td를 하나 더 추가해 수정하기 버튼과 수정하는 함수 생성
$(obj).append("<td width='5%' onclick='write();'>수정하기</td>");

}



//callback:수행하고싶은 동작 타입(selete:데이터조회, value:데이터건수,delete: 선택삭제/전체삭제)
//d:삭제하고싶은 요소(null:데이터조회하거나 건수출력,all:전체삭제,[삭제하고싶은 id값]:해당 id를 가진 데이터삭제)
function callphp(calltype,d) {
      $.ajax({
        //post타입으로 전송
        type:"POST",
        //url호출
        url:"db_adrsbook.php",
        //전송하고 싶은 데이터
        //h:수행하고싶은 동작 전송, n:삭제하고시은 요소 전송
        data:{h:calltype, n:d},
        success:function(data){
          console.log("리턴된 데이터:"+data);

          //받아온 데이터의 시작이 문자(대소문자 가리지않음)거나 단어문자가 아닌 문자(%,<...)라면
          //(테이블 출력)
          if(data.match(/^[a-z]gi/)||data.match(/^[\W]/)){
            console.log("문자");
                  //테이블 출력
                  $(".dcell").html(data);
          //받아온 데이터가 숫자라면(숫자를 리턴할 if문은 데이터 조회한 행 갯수 밖에 없음
          //(주소록 명수 출력))
          }else{
            console.log("숫자");
                  //span에 데이터 출력
                  $("#dvar").html(
                    "<p>주소록 (<span>" + data + "</span>명)</p><hr>"
                  );
          }
        },
        error:function() {
          //에러시 실패 팝업
          alert("callphp실패");
        }


      });
    }

//하위 체크박스 체크할 때 마다 전체 하위체크박스 상태를 검사함
function check(){
  $(".checkbox").each(function() {
      //만약 전체체크박스 상태가 true, 현재 체크한 체크박스의 상태가 false라면
      if ($("#allCheck").is(":checked") && $(this).is(":checked") == false) {
        //전체 체크박스 상태를 false로 변경
        $("#allCheck").prop("checked", false);
        //체크된 체크박스 수와 전체 하위 체크박스 수가 같다면
      } else if($("input[type=checkbox]:checked").length == $(".checkbox").length) {
        //전체 체크박스 상태를 true로 변경
        $("#allCheck").prop("checked", true);
      }

  });
}
