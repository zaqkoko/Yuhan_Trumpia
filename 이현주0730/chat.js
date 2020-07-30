//wsUri에 웹소컷의 로컬호스트 주소 지정
var wsUri = "ws://localhost:8100/";
//사용자의 이름을 받는 prompt
let name = prompt("너이름이뭐야", "이름쳐봐");
//가장 먼저 호출되는 메소드
function init()
{
    chat = document.getElementById("chat");
    //testWebSocket 실행
    testWebSocket();
}

//send 버튼을 눌렀을 때 실행되는 함수
function pressBt()
{
    //채팅창에 친 내용을 받아와서 dosend한다, 내용을 비워준다
    var chatt = document.getElementById("text");
    var chatting = $('#text').val();
    doSend(name + " : " + chatting);
    chatt.value = "";
}
//나가는 버튼을 눌렀을 때 실행되는 함수
function out()
{
    //연결이 해제되었다는 메세지를 띄우고 웹소켓 연결 해제
    writeToScreen('<span style="color : #fff; font-weight : bold;">연결이 해제 되었읍니다.</span>');
    websocket.close();
}

function testWebSocket()
{
    //wsUri에 입력한 로컬호스트로 웹소켓서버 연결 시도하고 open, message, error함를 연결
    websocket = new WebSocket(wsUri);
    websocket.onopen = function(evt) {onOpen(evt)};
    websocket.onmessage = function(evt) {onMessage(evt)};
    websocket.onerror = function(evt) {onError(evt)};
}

function onOpen(evt)
{
    //접속했을때 연결되었다는 텍스트를 띄우고, 이름과 접속했다는 데이터를 dosend함
    writeToScreen('<span style="color : #fff; font-weight : bold;">연결 되었읍니다.</span>');
    doSend(name + " 님이 접속하셨읍니다.");
}
function onMessage(evt)
{
    //받아온 데이터를 화면에 띄운다
    writeToScreen('<span style="color : #fff; font-weight : bold;">' + evt.data + '</span>');
}
function doSend(message)
{
    //웹소켓서버에 내용을 보냄
    websocket.send(message);
}

//화면에 띄우는 함수
function writeToScreen(message)
{
    //p요소를 만들고 message에 들어오는 내용을 innerHTML해서 chat(위에서 지정)안에 자식객체로 넣는다
    var pre = document.createElement("p");
    pre.style.wordWrap = "break-word";
    pre.innerHTML = message;
    chat.appendChild(pre);
}

//에러내용을 화면에 띄우는 함수
function onError(evt)
{
    writeToScreen('<span style="color : red;"> 에러 : </span> ' + evt.data);
}

//로드되엇을 때 가장 먼저 실행할 메소드 지정
window.addEventListener("load", init, false);
