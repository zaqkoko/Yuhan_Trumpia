<!-- body에 include를 하니 title의 session부분이 가장 먼저 실행이 안되어 오류가 생겼던 것으로 추측
그래서 가장 상단으로 옮겨놓음 -->
<?php include "../title.php"; ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>board</title>
 <!-- 화이팅 -->

	<link rel="stylesheet" href="board_css.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="board_js.js"></script>

</head>

<body>
	<!-- 메뉴바,유저정보 -->

	<!-- 문제 -->
	<div class="tt">
		<button id="delete">삭제</button>
		<select id="combo" name="select">
			<!-- <option value="" selected disabled>필터</option> -->
			<option value="receiver" selected>번호</option>
			<option value="send_message">내용</option>
			<option value="send_time">시간</option>
			<option value="send_type">발송상태</option>
		</select>
		<label for="inputsearch" id="box_text"></label>
		<input type="search" id="inputsearch">
		<input type="hidden" id="inputcheck">
		<button id="search" type="button" name="button">search</button>
		<div id="dvar">
			<p>전송내역 <span></span>건</p>
			<hr>
		</div>
	</div>
	<!-- 문제 -->


	<!-- 테이블 세로 1000픽셀에 셀 패딩이 10% -->
	<table class="table" cellpadding="10%">
		<!-- 전체 체크박스 -->
		<th width="5%"><input type="checkbox" id="allCheck"></th>
		<th width="20%">
			<p>번호</p>
		</th>
		<th width="40%">
			<p>내용</p>
		</th>
		<th width="20%">
			<p>시간</p>
		</th>
		<th width="10%">
			<p>발송상태</p>
		</th>
		<table class="dcell">

			<!-- 데이터 출력 -->
			<?php include "select_sms.php"; ?>
		</table>
		<script>
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
		</script>
	</table>


	<!-- //가장 마지막에 실행 (위에서부터 아래로 html 태그들이 실행된 후 document.ready()를 실행)
	//$(function(){}); 약어로도 사용가능
	//-제이쿼리-$(window).load(function(){} -자바스크립트-window.onload = function(){};
	// DOM생성 후 이미지같은 리소스 요소들 랜더링 후 실행
	//-제이쿼리-$(document).ready(function(){}
	//DOM생성 후 실행 -->






</body>

</html>
