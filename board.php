<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>board</title>

	<link rel="stylesheet" type="text/css" href="board_css.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>

	<script type="text/javascript">
	$(document).ready(function() {
		alert("^^77~");

		//전체선택
		$("#allCheck").click(function(){
			if($("#allCheck").is(":checked")){
				$(".checkbox").prop("checked",true);
			}else{
				$(".checkbox").prop("checked",false);
			}
		});
		//전체선택 중 일부 체크박스 선택 해제 시
		$(".checkbox").click(function(){
		    if(($(".checked").is(":checked")).length){
		        $("#allCheck").prop("checked", true);
        	}else{
            $("#allCheck").prop("checked", false);
        	}
		    });

	//	삭제버튼 클릭
		$("#delete").click(function () {
			alert("클릭!");
			// //전체삭제
			// if($("#allCheck").is(":checked")){
			// 	// include delete.php
			// 	//  alert("삭제되었습니다.");
			// 	//  	window.location.reload();
			// }else{
			// 	//선택삭제
			// 	for(var i=0;i<($("input:checkbox:checked").length);i++;){
			// 		// if($("input:checkbox[value='"+i+"']:checked")){
			// 		// 	$(".test").append(
			// 		// 		"<p>삭제"+i+"</p>"
			// 		// 	);
			// 		$(".test").append(
			// 			"<p>".$("input:checkbox:checked").length."</p>"
			// 		);
			// 		}
			// 	}


		});

	});
	</script>

</head>
<body>
	<div class="userI">
		<button>Logout</button>
		<p>User Name 님 환영합니다.</p>
		<hr>
	</div>

	<div class="tt">
		<button id="delete">삭제</button>
		<div id="dvar">
			<p>전송내역 <span>0</span>건</p>
		<hr>
	</div>
	</div>
		<table class="table" width="1000px" cellpadding="10%">
			<th><input type="checkbox" id="allCheck"></td>
			<th width="30%"><p>번호</p></th>
			<th width="50%"><p>내용</p></th>
			<th width="30%"><p>시간</p></th>
			<tr id="dcell">
				<?php
				include "sql.php";
				?>
				<!-- 임시 -->
			</tr>
		</table>
		<!-- 메뉴바 -->
	<div class="menu">
		<img src="img/sms.png">
		<img src="img/cal.png">
		<img src="img/hi2.png">
		<img src="img/ad.png">
	</div>
	<img id="cht" src="img/cht.png">
	<!-- php -->
	<div class="test">
		<p>삭제^^~</p>

	</div>


</body>

</html>
