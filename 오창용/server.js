// 웹소켓서버 모듈가져오기
var WebSocketServer = require("websocketserver");
// 모든 서버는 웹소켓 9000번포트로~
var server = new WebSocketServer("all", 9000);

var app = require("express")();
var url = require("url");
//루트에 대한 get 요청에 응답
app.get("/", function(req, res) {
  console.log("get:chat.html");
  //최초 루트 get 요청에 대해, 서버에 존재하는 chat.html 파일 전송
  res.sendFile("chat.html", {
    root: __dirname
  });
});

//기타 웹 리소스 요청에 응답
app.use(function(req, res) {
  var fileName = url.parse(req.url).pathname.replace("/", "");
  res.sendFile(fileName, {
    root: __dirname
  });
  console.log("use:", fileName);
});

//http 서버 생성
var server = require('http').createServer(app);
server.listen(3000);
console.log("listening at http://127.0.0.1:3000...");
