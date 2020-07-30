<!-- HTML -->

<!DOCTYPE html>
<html lang="kr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>채팅</title>

        <style media="screen">
            * {margin : 0; padding : 0;text-align: left;background:blue;}
            .chat_wrap {width: 100%;}
            .title {height: 20px; font-size: 15px; color: #fff; font-weight: bold;}
            #chat {height: 400px;}
            .write {height: 50px;}
            .write textarea {width: 60%; float: left; color: #fff; font-weight: bold; border: none;}
            .write input {width: 10%; float: left; border : none; background: blue; color: #fff; font-weight: bold;}
        </style>
    </head>
    <body>
        <div class="chat_wrap">
            <div class="title">
                <span>고독한 채팅방 '-'/</span>
            </div>
            <div id="chat">
            </div>
            <div class="write">
                <textarea id="text" name="text" placeholder="입력해주세야"></textarea>
                <input id="bt" type="button" onclick="pressBt();" name="bt" value="SEND"/>
                <input id="bt2" type="button" onclick="out();" name="bt" value="나가기"/>
            </div>
        </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    </body>
</html>
