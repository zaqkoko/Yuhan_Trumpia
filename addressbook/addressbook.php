<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
      <?php include 'select_addressbook.php'; ?>
      <!-- 데이터 출력 -->
    </table>

  </body>
</html>
