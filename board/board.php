<!-- body에 include를 하니 title의 session부분이 가장 먼저 실행이 안되어 오류가 생겼던 것으로 추측
그래서 가장 상단으로 옮겨놓음 -->
<?php include "../title.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>board</title>
		<link rel="stylesheet" href="board_style.css">
	</head>
	<body>
		<div class="tt">
			<button id="delete">삭제</button>
			<select id="combo" name="select">
				<option value="receiver_number" selected>번호</option>
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
		<!-- 테이블 세로 1000픽셀에 셀 패딩이 10% -->
		<table class="table" cellpadding="10%">
		<br>
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
			<div id="pageNum">
				<button type="button" name="leftbutton"><</button>
				<span>1</span>
				<span>2</span>
				<span>3</span>
				<span>4</span>
				<span>5</span>
				<button type="button" name="rightbutton">></button>
				<button type="button" name="endbutton">>></button>
			</div>
		</table>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="board_script.js"></script>
	</body>
</html>
