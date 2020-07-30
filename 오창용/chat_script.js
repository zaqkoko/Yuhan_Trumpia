// 웹소켓 전역 객체 생성
var ws = new WebSocket("ws://localhost:9000/");

// 연결이 되면 안내문을 출력
ws.onopen = function(event) {
  console.log("CONNECT OPEN");
  // writeToScreen에 매개변수 두개를 보내서 안내문 출력하게함
  writeToScreen("안내", "채팅이 연결 되었습니다.");
}

// 서버로부터 메시지를 수신한다
ws.onmessage = function(event) {
  //console.log("Server message: ", event.data);
  // writeToScreen("낮선상대", event.data);
  // 파싱왜안대콘솔에찍어
  console.log(event.data);

  // 수신받은 JSON을 파싱해서 오브젝트로 분해
  var msg = JSON.parse(event.data);
  // 오브젝트로 분해된것들을 함수에 매개변수로 줘서 각각 출력하게함
  writeToScreen(msg.name, msg.text);
}

// 에러나면 콘솔에 찍기
ws.onerror = function(event) {
  console.log("Server error message: ", event.data);

  writeToScreen("안내", "오류가 발생했습니다.");
}

ws.onclose = function(event) {
  console.log("CONNECT CLOSE");

  writeToScreen("안내", "채팅이 종료 되었습니다.");
}

// 화면에 이름과 메세지 출력 함수
function writeToScreen(name, message) {
  // 채팅을 보여줄 list DOM에서 id 찾아서 연결
  var list = document.getElementById("list");

  // description term 만들고
  var dt = document.createElement("dt");
  // 거따가 인수로 받은 name 넣고
  dt.innerHTML = name;
  // list에다가 자식으로 넣기
  list.appendChild(dt);

  // description 만들고
  var dd = document.createElement("dd");
  // 거따가 인수로받은 message 넣고
  dd.innerHTML = message;
  // list에다가 자식으로 넣기
  list.appendChild(dd);

  // 출력해주고 스크롤 맨 아래로 내림
  list.scrollTop = list.scrollHeight;
}

// 채팅 보내는 함수
function doSend() {
  // JSON으로 보낼거임
  var msg = {
    name: document.getElementById("name").value,
    text: document.getElementById("message").value
  };
  // msg 문자열로 바꿔서 보내구
  ws.send(JSON.stringify(msg));
  // 찍어봐
  console.log(msg);

  // 메세지 쓰는 칸 비워주기
  document.getElementById("message").value = "";
}
