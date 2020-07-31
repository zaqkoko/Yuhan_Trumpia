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
    width: 350px;
    resize: none;
   }

  span{display:inline-block; }
  .mtext{
    width: auto;
    max-width: 200px;
    word-wrap: break-word;
    border: 2px solid #7dabd0;
    background: white;
    border-radius:5%;
    padding: 3px;
    margin-left: 0;

  }
  .n{
  width: 350px;
  float: left;
  text-align: left;

  }
  .m{
    width: 350px;
    float: right;
    text-align: right;
  }
  .m > td{
    float: right;
  }
  .m> td> p{background-color: #7dabd0; }
  #system{text-align: center; background-color: red; font-size:10px; color: white;}
  .image{
    width: 100px;
    height: 100px;
  }
  image{
    width: 100px;
    height:100px;
  }
</style>
<body>
  <div class="chat-wrap">
    <div class="chat-show">
      <table id="dvMessage">
      </table>
    </div>
    <div class="input">
        <input type="datetime-local" id="time" name="time"  readonly>
        <textarea value="" name="message" id='message' rows="30" cols="30" placeholder="메시지를 입력하세요"></textarea>
        <button type="button" id="btnsend">전송</button>
        <input type="file" name="userfile" id="inputfile">
      </form>
      <button type="button" id="disconnect">disconnect</button>

    </div>
  </div>

 <script type="text/javascript">
     $(document).ready(function(){
       var username=prompt("이름을 입력하세요");
       alert(username+"님 환영합니다.")

         //웹소켓서버 연결
         var ws = new WebSocket("ws://localhost:8080");
         //데이터저장용
         var tag;

         //연결닫기버튼 클릭했을때
         $("#disconnect").click(function(){
           //닫기
           ws.close();
         });

         //전송버튼 클릭했을 때
          $("#btnsend").click(function(){
                var message = $("#message").val();
//제이슨으로 보내려는 밑거름의 흔적
                //replaceAll함수(문자열, 찾을 문자열, 대체할 문자열)
                function replaceAll(str, searchStr, replaceStr) {
                  //문자열에서 특정 문자열을 원하는 문자열로 대체하고 하나로 합쳐줌
                  //split(찾을 문자):찾을 문자를 기준으로 문장을 배열화 시킴
                  //join(구분자):배열을 구분자로 치환해 문자열로 반환
                  //예시) C:/text/text.jpg => split('/'):'C:','text','text.jpg' => join(and):"C:andtextandtext.jpg"
                  return str.split(searchStr).join(replaceStr);
                  }

                  //json이 경로 문자열을 정규표현식(메타문자ex) \n, \t)로 인식했을 때 생기는 오류를 방지
                  //정규식에서 역슬래시는 '\\'를 써야함. 그래서 \=>\\ 로 바꾸기 위해 정규표현식 \\=>\\\\를 사용
                  //var file= 첨부파일 경로
                  var file=replaceAll($("#inputfile").val(),'\\','\\\\');
                  var file=[];
                      file=$("#inputfile").val().split('\\')
                  var refile=file[file-1]; //파일 이름
                  console.log("file:"+refile);




                  //첨부 파일이 없다면
                  if($("#inputfile").val()==null||$("#inputfile").val()==""){
                    //유저네임과 메시지만 전송
                    var msg='{"username": '+'"'+username+'"'+', "message":'+'"'+message+'"'+'}';

                  }else{
                    //첨부파일이 있다면 파일도 같이 전송
                    var msg='{"username": '+'"'+username+'"'+', "message":'+'"'+message+'"'+', "file":'+'"'+refile+'"'+'}';
                  }

                //데이터 수신
                ws.send(msg);

                  //메시지 입력 (textarea값) 비워줌
                 $("#message").prop("value","");
                 //파일 입력 값 비워줌
                 $("#inputfile").prop("value","");
            });


            //서버에 접속했을 때
               ws.onopen=function(evt){
                 $("#dvMessage").append("<p id='system'>서버에 접속하였습니다.</p>");
               };

               //데이터 송신
               ws.onmessage = function(evt){
                 console.log("ect.data:"+evt.data);
                 //문자열 객체화
                 // var test=evt.data;s
                 // console.log("test.file"+test.file);
                 tag=JSON.parse(evt.data);
                 console.log("json file:"+tag.file);

                 //송신받은 메시지가 내가 적은 거라면
                 if(username==tag.username){
                   //메시지 출력
                   $("#dvMessage").append(
                      "<tr class='m'><td><span class='ntext'>"+tag.username+"</span><p class='mtext'>"+tag.message+"</p></td></tr>"
                    );
                            //파일 출력
                            //만약 전송하는 파일이 있다면(객체 key(file)에 value가 있다면)
                              if(!tag.file==null ||!tag.file==""){
                                //태그작성
                                $("#dvMessage").append(
                                  "<tr class='m'><td><img class='image' src='"+tag.file+"'></td></tr>"

                                );
                              }

                    //내가 작성한 메시지가 아닐 때
                 }else{
                   $("#dvMessage").append(
                     "<tr class='n'><td><span class='ntext'>"+tag.username+"</span><p class='mtext'>"+tag.message+"</p></td></tr>"
                   );
                            //파일 출력
                            //만약 전송하는 파일이 있다면(객체 key(file)에 value가 있다면)
                             if(!tag.file==null ||!tag.file==""){
                               //태그작성
                               $("#dvMessage").append(
                                  "<tr class='m'><td><img class='image' src='"+tag.file+"'></td></tr>"

                               );
                             }
                 }
                 console.log("suerver message:"+evt.data.message);
               };

               //서버가 닫히거나 연결 끊겼을 때
               ws.onclose = function(){
                 $("#dvMessage").append("<p id='system'>서버 연결 종료</p>");
               };
               //에러
               ws.onerror = function(evt){
                 tag='<p>Error' + evt.data+ "</p>";
                 $("#dvMessage").append(tag);
               };









     });
 </script>


</body>
