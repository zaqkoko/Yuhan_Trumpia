<<<<<<< HEAD
<?php
$id='a';


$con=mysqli_connect("localhost", "root", "5022", "exam");

$q="SELECT * FROM sms WHERE send_type='1' AND user_id='$id'";
$r=mysqli_query($con,$q);


              $count=mysqli_num_rows($r);

            while(mysqli_fetch_array($r)){

            }

            echo $count;

 ?>
=======
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>board</title>

  <link rel="stylesheet" href="board/board_css.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
  //가장 마지막에 실행 (위에서부터 아래로 html 태그들이 실행된 후 document.ready()를 실행)
  $(document).ready(function(){
    //새로고침 확인
    alert("&&?");

    //type클래스를 가진 태그를 반복해서 가져와 함수를 실행
    $(".type").each(function(){
      //가져오는 값 확인용
      console.log($(this).text());
      //현재 반복문으로 가져온 태그의 값(text)가 1이라면
      if($(this).text()==1){
        //가져온 태그에 html추가
        $(this).html(
          //발송완료태그로 바꿔줌
          "<p>발송완료</p>"
        );
        //1이 아니라면(값이 2라면)
      }else{
        //가져온 태그에 html추가
        $(this).html(
          //발송 예약 태그로 바꿔준다
          "<p>발송예약</p>"
        );
      }
    });


    //전송내역 건수 출력
    $("span").append(
      //건수를 출력하는 php파일 include
        <?php include "board/send_type_value.php"; ?>
    );



    //전체 체크박스를 클릭했을 때
    $("#allCheck").click(function(){
      //전체체크박스가 true 상태라면
      if($("#allCheck").is(":checked")){
        //하위 체크박스를 반복해서 불러와 함수를 실행
        $(".checkbox").each(function(){
          //현재 하위체크박스 상태를 true로 변경
          $(this).prop("checked",true);
        });
        //전체 체크박스가 false 상태라면
      }else{
        //하위 체크박스를 반복해서 불러와 함수를 실행
        $(".checkbox").each(function(i,checkbox){
          //현재 하위체크박스 상태를 false로 변경
          $(this).prop("checked",false);
        });
      }
    });

//주의
//전체체크 상태에서 하위 체크박스가 하나라도 false일 때 전체 체크박스 상태를 false로 바꿈
    //하위 체크박스를 클릭했을 때
      $(".checkbox").click(function() {
        //만약 전체체크박스 상태가 true이고 체크한 체크박스가 false라면
        if($("#allCheck").is(":checked") && $(this).is("checked")==false){
					console.log(this);
          //전체 체크박스 상태를 false로 변경
          $("#allCheck").prop("checked",false);
        }
      });



      //삭제 버튼을 클릭했을 때 함수 실행
      $("#delete").click(function(){

//전체 삭제를 원할 때
        //전체체크박스가 true일 때
        if($("#allCheck").is(":checked")){
        $.ajax({
          //post방식으로 전송 (get,post 둘다 상관없음)
          type:"POST",
          //AllDelete.php를 호출
          url:"board/AllDelete.php",
          //성공했을 때 함수 실행
          success:function(data){

            //체크박스 상위요소 tr태그를 지움
            $(".checkbox").parents("tr").remove();
          },
          //에러가 생겼을 때 함수를 실행
          error:function(){
            //실패 팝업
            alert("실패");
          }
        });
        //삭제 팝업
        alert("삭제되었습니다.");


//선택 삭제를 원할 때
      //전체체크박스가 false상태 일 때
      }else{
        //현재 체크된 체크박스 확인용 콘솔
        console.log("현재 체크된 체크박스: "+$("input:checkbox[class='chekbox']:checked").length);
        //하위체크박스 상태를 확인하기위해 함수를 반복실행
        $(".checkbox").each(function() {
          //만약 현재 반복되고있는 하위 체크박스가 true라면
//선택된 체크박스 삭제
          if($(this).is(":checked")){
            //t를 반복된 현재 체크박스 값으로 초기화
            var t=$(this).val();
            //체크된 체크박스 값 확인용
            console.log(t);

            //t를 이용해 delete.php를 호출해서 삭제
            $.ajax({
              //post방식으로 전송 (get,post 둘다 상관없음)
              type:"POST",
              //delete.php를 호출
              url:"board/delete.php",
              //t값을 가진 val이라는 데이터를 전송
              data: {val:t},
              //성공했을 때 함수실행
              success:function(data){

                //t값을 가진 체크박스 상위요소 tr 태그를 지움
                $("input:checkbox[value="+t+"]").parents("tr").remove();
              },
              //에러가 생겼을 때 함수를 실행
              error:function(){
                //실패 팝업
                alert("실패");
              }
            });
            // if끝
          }
          // each끝
        });
        //삭제 팝업
        alert("삭제되었습니다.");
      }
    });





  });


  </script>

</head>
<body>
	<div class="userI">
		<button>Logout</button>
	<p>안녕하세요 user_name님2</p>

		<hr>
	</div>


<!-- 문제 -->
	<div class="tt">
		<button id="delete">삭제</button>
		<div id="dvar">
			<p>전송내역 <span><?php include "send_type_value.php";?></span>건</p>
			<hr>
		</div>
	</div>
	<!-- 문제 -->


  <!-- 테이블 세로 1000픽셀에 셀 패딩이 10% -->
		<table class="table" cellpadding="10%">
      <!-- 전체 체크박스 -->
			<th width="5%"><input type="checkbox" id="allCheck"></td>
			<th width="20%"><p>번호</p></th>
			<th width="40%"><p>내용</p></th>
			<th width="20%"><p>시간</p></th>
      <th width="10%"><p>발송상태</p></th>
			<tr id="dcell">
        	<!-- 데이터 출력 -->
            <?php include "board/select_sms.php"; ?>



			</tr>

		</table>
		<!-- 메뉴바 -->
	<div class="menu">
		<img src="img/sms2.png">
		<img src="img/cal2.png">
		<img src="img/hi.png">
		<img src="img/ad2.png">
	</div>
	<img id="cht" src="img/cht.png">


</body>

</html>
>>>>>>> 93a674a9e16afa0b945c6df254f146601f5b448d
