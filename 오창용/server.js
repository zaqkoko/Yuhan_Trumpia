// 웹소켓서버 모듈가져오기
var WebSocketServer = require("websocketserver");
// 모든 서버는 웹소켓 9000번포트로~
var server = new WebSocketServer("all", 9000);
// express 모듈 추가
var app = require("express")();
var url = require("url");
// express에 multer모듈 적용 (for 파일업로드)
var multer = require('multer');
// 저장될 파일의 이름을 관리한다
var storage = multer.diskStorage({
  // 저장될 디렉터리, 이전이랑 그대로
  destination: (req, file, callback) => {
    callback(null, "uploads/");
  },
  // 저장될 이름은 전송자가 보낸 원래 이름 그대로
  filename: (req, file, callback) => {
    callback(null, file.originalname);
  }
});
// 입력한 파일이 storage 객체에서 지정한 대로 올라감
var uploads = multer({ storage:storage });

//루트에 대한 get 요청에 응답 (라우팅)
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

// form을 통해 post방식으로 uploads 경로로 전송되었을때 라우터
// upload.single은 뒤에 펑션보다 먼저 실행되서 req객체에 파일 프로퍼티를 추가함  그래서 로그로 찍으면 정보 쭉나옴
app.post('/uploads', uploads.single('userfile'), function(req, res){
  // 돌아가기 링크 누르면 다시 채팅창으로~
  res.send("<a href='http://localhost:3000'>돌아가기</a>");
  // 콘솔(터미널)을 통해서 req.file Object 내용 확인 가능.
  console.log(req.file);
});


//http 서버 생성
var server = require('http').createServer(app);
server.listen(3000);
// 로컬호스트 3000번포트로 들어가면 채팅창 나온다~
console.log("listening at http://127.0.0.1:3000...");
