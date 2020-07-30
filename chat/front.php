<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<style media="screen">
  *{margin:0 auto;
  padding:0;
  }

  textarea{
    width: 300px;
    height: 70px;
    resize:none;
    word-wrap: break-word;
  }
  #btnsend{
    width:50px;
    height:72px;
    float:right;
    position: absolute;
  }
  .input{
    width: 350px;

  }
  .chat-wrap{
    background-color: pink;
    width:350px;
    height:500px;
  }
  .chat-show{
    background-color:white;
    /* border: 1px solid black; */
    width:370px;
    height:420px;
    overflow-y: scroll;

  }
  #time{
    display: none;
  }
  table{
    max-width: 350px;
    height: 400px;
    resize: none;
   }
  /* .ntext{
    width: 25px;

  }
  .mtext{
    width: auto;
    max-width: 200px;
    word-wrap: break-word;
    border: 1px solid #7dabd0;
    background: white;
    border-radius: 3%;
    padding: 3px;
  }
  .ttext{ width: 20px;font-size: 5px;}
  .m >.mtext{background-color: #7dabd0;}
  tr{width: 350px;text-align:left; float: left; display:block;}
  .m{width: 350px;text-align:right; float: right;} */

</style>
<body>
  <div class="chat-wrap">
    <div >
      <table id="dvMessage">

      </table>
    </div>
    <div class="input">
      <input type="datetime-local" id="time" name="time"  readonly>
      <textarea value="zz"; name="message" id='message' rows="30" cols="30" placeholder="메시지를 입력하세요"></textarea>
      <button type="button" id="btnsend">전송</button>
      <button type="button" id="disconnect">disconnect</button>
    </div>
  </div>

 <script type="text/javascript">
     $(document).ready(function(){
       var username=prompt("이름을 입력하세요");

         //웹소켓서버 연결
         var ws = new WebSocket("ws://localhost:8080");
         var tag;

         //연결닫기버튼 클릭했을때
         $("#disconnect").click(function(){
           //닫기
           ws.close();
         });

         //전송버튼 클릭했을 때
          $("#btnsend").click(function(){
                var message = $("#message").val();
                //제이슨으로 보낼 수 잇을 것 같은데 파싱이 문제인 듯 아직 이것저것 수정중
                // var msg='{"username": '+'"'+username+'"'+', "message":'+'"'+message+'"'+'}';
                // var test=JSON.parse(msg);

                //데이터 송신
                ws.send(message);
                  // ws.send(username+":"+message);

                  //메시지 입력 (textarea값) 비워줌
                 $("#message").prop("value","");
            });


            //서버에 접속했을 때
               ws.onopen=function(evt){
                 $("#dvMessage").html("<p>서버에 접속하였습니다.</p>");
               };

               //데이터 송신
               ws.onmessage = function(evt){
                 tag="<p>"+evt.data+"</p>"
                 $("#dvMessage").append(tag);
                 // console.log("suerver message:"+evt.data.message);
               };
               //서버가 닫히거나 연결 끊겼을 때
               ws.onclose = function(){
                 $("#dvMessage").html("<p>서버 연결 종료</p>");
               };
               //에러
               ws.onerror = function(evt){
                 tag='<p>Error' + evt.data+ "</p>";
                 $("#dvMessage").append(tag);
               };









     });
 </script>


</body>
