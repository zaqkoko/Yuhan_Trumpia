<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
  </head>
  <body>
    <p>메세지 보내기</p>
    <br />
    <form action="send1.php" method="POST">
      <textarea
        name="sms_text"
        cols="40"
        rows="30"
        placeholder="메세지를 입력하세요"
      ></textarea>
      <div style="font-size: 12px; padding-top: 3px; padding-bottom: 10px;">
        <span class="bold">글자 수 제한</span>&nbsp;0/150
      </div>
      <input type="submit" />
    </form>
  </body>
</html>
