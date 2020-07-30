//websocketserver 모듈 사용
var WebSocketServer = require('websocketserver');
//8100에서 실행되는 웹소켓서버 생성, sendmethod는 나 외에 모든 서버연결에 보내는 'others'사용
var server = new WebSocketServer("others", 8100);
