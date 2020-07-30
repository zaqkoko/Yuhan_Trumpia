// 웹소켓서버 모듈가져오기
var WebSocketServer = require("websocketserver");
// 모든 서버는 웹소켓 9000번포트로~
var server = new WebSocketServer("all", 9000);
