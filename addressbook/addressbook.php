<?php include 'title.php'; ?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="addressbook_css.css">
  </head>
  <body>
    <div class="tt">
    <button id="delete">삭제</button>
    <p>연락처 <span></span>명</p>
    <hr>
    </div>
    <table class="table" cellpadding="10%">
      <tr>
        <th width="5%"><input type="checkbox" id="allcheckbox"></th>
        <th width="30%">이름</th>
        <th width="50%">번호</th>
      </tr>
      <table class="dcell">
        <!-- 주소록 데이터 가져오는 테이블 -->
        <tr>
          <td width="5%"><input type="checkbox"></td>
          <td width="30%">sa</td>
          <td width="50%">01000000000</td>
        </tr>
      </table>
    </table>
  </body>
</html>
