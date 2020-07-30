//websocketserver 모듈 사용
var WebSocketServer = require('websocketserver');
//8100에서 실행되는 웹소켓서버 생성, sendmethod는 모든 서버연결에 보내는 'all'사용
var server = new WebSocketServer("all", 8100);
