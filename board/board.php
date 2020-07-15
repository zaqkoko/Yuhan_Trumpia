<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>board</title>
	 <!-- board.css파일을 링크한다 -->
	<link rel="stylesheet" type="text/css" href="board_css.css">
	<!-- 스크립트에 제이쿼리 파일 url을 연결 -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>

	<script type="text/javascript">
	//가장 마지막에 실행 (위에서부터 아래로 html 태그들이 실행된 후 document.reday()를 실행)
	$(document).ready(function() {
		//새로고침 확인용
		alert("ㅠddsdad");

		//전송내역 출력
		$("span").append(
			//인클루드로 sned_type_value.php 파일을 가져온다
			<?php include "send_type_value.php"; ?>
		);


		//체크박스 전체선택
		//전체체크박스를 클릭했을 때
		$("#allCheck").click(function(){
			//전체체크박스 값이 트루일 때
			if($("#allCheck").is(":checked")){
				//하위체크박스를 트루로 바꿈
				$(".checkbox").prop("checked",true);
				//전체체크박스 값이 false일 떄
			}else{
				//하위 체크박스를 false로 바꿔줌
				$(".checkbox").prop("checked",false);
			}
		});
		//하위 체크박스를 클릭했을 떄
		$(".checkbox").click(function(){
			//하위 체크박스가 ture인 길이값을 가져왔을 뗴
		    if(($(".checked").is(":checked")).length){
					//전체 체크박스 값을 트루로 가져온다.
		        $("#allCheck").prop("checked", true);
						//아니라면
        	}else{
						//전체 체크박스 체크를 false로 바꾼다
            $("#allCheck").prop("checked", false);
        	}
		    });

		//	삭제버튼 클릭 했을 때
		$("#delete").click(function () {
			//전체 체크박스값이 트루일 때
			if($("#allCheck").is(":checked")){
				//ajax를 실행한다.
				$.ajax({
					//post방식으로 전송
					type:"POST",
					//AllDelete.php 호출
					url:"Alldelete.php",
					//성공했을 때 함수를 실행한다.
					success:function(data){
						//어떤 형식으로 가져오는지 확인용
						alert(data);
						//게시판 테이블에 append로 가져온 데이터를 가져온다
							$("#dcell").append(data);
					},
					//에러가 생겼을 때 함수를 실행한다.
					error:function(){
						//실패창을 띄움
						alert("실패");
					}
				});
				 //데이터를 삭제하고 새로고침

			}else{
				//선택삭제
				//선택된 체크박스 수 콘솔로 출력
				//콘솔 로그에 클래스가checkbox인 체크된 체크박스 수를 출력
				console.log("length:"+$("input:checkbox[class='checkbox']:checked").length);
				//checkbox클래스명을 가진 하위 체크박스들을 불러와 함수실행 i는 index, item은 현재 가져온 체크박스 값
				$(".checkbox").each(function(i, item){
					//만약 현재 가져온 체크박스가 체크되어있다면
					if($(item).is(":checked")){
						//t에 현재가져온 체크박스 value를 넣는다..
						var t=$(item).val();
						//선택된 체크박스 value값을 콘솔로 출력한다.
						console.log(t);
						//ajax를 실행
						$.ajax({
							//post방식으로 전송 get과 post 중 어떤것이든 상관 없지만 (url을 공유할 일이 없을 것 같아서) url에 정보를 출력하는 것이 보안에 취약할 것 같아서 선택
							type:"POST",
							//delete.php 호출
							url:"delete.php",
							//전송할 데이터 val에 t(체크박스 value값)을 넣는다.
							data: {val:t},
							//성공했다면 함수를 실행한다.
							success:function(data){
								//테이블에 retrun한 값(echo)를 가져와 추가한다.
								$(".table").append(data);
							},
							//에러 확인
							error:function(){
								//에러가 일어나면 콘솔창에 실패를 출력
							console.log("실패");
							}
						});


				}
			});
			//데이터를 삭제하고 새로고침용으로 썼으나 지금은 ajax를 사용하려고 주석처리함
			// window.location.reload();
			}



		});

	});
}
	</script>

</head>
<body>
	<!-- 유저 창 나중에 success나 insert혹은 link를 통해 하나로 통일할 예정 -->
	<div class="userI">
		<button>Logout</button>
		<p>User Name 님 환영합니다.</p>
		<hr>
	</div>
<!-- 전송내역과 삭제 버튼이 있는 div -->
	<div class="tt">
		<!-- 삭제버튼 -->
			<input type="button" id="delete" value="delete" >
		<div id="dvar">
			<!-- span안에 현재 전송된 데이터값을 출력함 -->
			<p>전송내역 <span></span>건</p>
		<hr>
	</div>
	</div>
	<!-- 테이블 세로 1000픽셀에 셀 패딩이 10% -->
		<table class="table" width="1000px" cellpadding="10%">
			<!-- 전체 체크박스 -->
			<th><input type="checkbox" id="allCheck"></td>
				<!-- 전체 테이블에 30%를 차지하는 th태그 -->
			<th width="30%"><p>번호</p></th>
			<!-- 전체테이블에 50%를 차지하는 th태그 -->
			<th width="50%"><p>내용</p></th>
			<!-- 전체 태그에 30%를 차지하는 th태그 -->
			<th width="30%"><p>시간</p></th>
			<!-- 데이터를 가져와 출력할 tr -->
			<tr id="dcell">
				<!-- 데이터 출력 -->
				<?php
				include "select_sms.php";
				?>

			</tr>
		</table>
		<!-- 메뉴바 -->
	<div class="menu">
		<img src="../img/sms2.png">
		<img src="../img/cal2.png">
		<img src="../img/hi.png">
		<img src="../img/ad2.png">
	</div>
	<img id="cht" src="../img/cht.png">
	<!-- php -->

	<div class="test">
	</div>


</body>

</html>
