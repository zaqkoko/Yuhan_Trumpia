<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../board/board_css.css">
    <link rel="stylesheet" href="addressbook_css.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="addressbook_js.js"></script>
    <script type="text/javascript">
      $(function() {
        $(".datacell").hover(function(){



        });

      });
    </script>
  </head>
  <body>
    <?php include '../title.php'; ?>
    <div class="tt">
      	<button id="delete">삭제</button>
        <div id="dvar">
    			<p>주소록(<span></span>명)</p>
    			<hr>
    		</div>
    </div>
    <table class="table" cellpadding="10%">
      <tr>
        <th width="5%"><input type="checkbox" id="allCheck"></th>
        <th width="25%">이름</th>
        <th width="35%">번호</th>
        <th width="50%">메일</th>

      </tr>
    </table>
    <table class="dcell" cellpadding="10%">
<<<<<<< HEAD
      <!-- <tr class="edit">
        <p id='edittext'>수정하기</p>
      </tr> -->
=======
      <tr class="">
        <p>수정하기</p>
      </tr>
>>>>>>> b310790d51c7978a40ceae040df7316b4630a81a
      <?php include 'select_addressbook.php'; ?>
      <!-- 데이터 출력 -->
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
  </body>
</html>
