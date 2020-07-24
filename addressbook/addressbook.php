<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="addressbook_css.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="addressbook_js.js"></script>
    <script type="text/javascript">
    </script>
  </head>
  <body>
    <?php include '../title.php'; ?>
    <div class="create" style="background:pink;">
      <form action="create_db.php" method="post" style="border:1px solid black;">
        <h4>연락처 추가</h4>
        <textarea name="name"  placeholder="이름" rows="2" cols="25"></textarea>
        <textarea name="receiver_number" placeholder="전화번호"rows="2" cols="25"></textarea>
        <textarea name="receiver_email" placeholder="이메일"rows="2" cols="25"></textarea>
        <input type="submit" name="" value="추가">

      </form>
    </div>
    <div class="tt">
      	<button id="delete">삭제</button>
        <button id="create">추가</button>
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

      <!-- 데이터 출력 -->
    </table>

  </body>
</html>
