
//모듈
// var wss = require('websocket').server;
// var webSocketServer = require('ws').Server;
var webSocket = require('ws');
// var fs = require('fs');
// var http = require('http');

//5.나혼자 채팅에 클라이언트 foreach문 썼음 되긴되는데...
var wss=new webSocket.Server({port:8080});

//원래 ip값 받아온거 저장소를 하려했으나 아직 미사용중
// var clientlist= [];

wss.on('connection', function(ws,req){
  console.log("connect");
  // console.log('ws'+ws+'\n');
  // console.log('req:'+req);
  //ip에 주소값 초기화
  // var ip=req.socket.remoteAddress;
  //현재 연결된 ip들 값이 다 같음 다 1이던데? 웨지감자
  // console.log("연결된 ip:"+ip);
  // console.log("ws:"+ws);

  ws.on('message', function(data){
    //json 연습중
    // // console.log(JSON.stringify(data)+'\n');
    // console.log("username:"+data.username+"\n"+"message:"+data.message);

    //웹소켓서버 클라이언트만큼 반복
    wss.clients.forEach(function (client){

      //readyState는 unsigned과 short 둘 중 하나를 반환하는데 OPEN(연결이 열려있고 통신준비끝)상태라면 1을 반환
      //websocket.OPEN은 상수 1값을 가짐
      //연결된 클라이언트 현재 상태와 서버 오픈상태가 같다면
      if(client.readyState===ws.OPEN){
        //콘솔은 출려되는 값 확인용
        // console.log("클라이언트.레디스테이트:"+client.readyState);
        // console.log("웹소켓.오픈:"+ws.OPEN);
        //현재 연결된 클라이언트에 데이터를 전송
        client.send(data);
      }
    });

  });
//서버 닫힘
  ws.on('close', function(){
    console.log("close server");
  })

});










//3. 멀티채팅되는데 한글깨지고 메소드 이해안감 찾아도안보임
//써본적없지만 socket io랑 비슷한느낌인 것 같아서 우선 보류
// var WebSocketServer = require("websocketserver");
//
// //모든 사용자에게 수신된 메시지 출력
// var server = new WebSocketServer("all", 8080);
//
// //연결된 유저리스트
// var userList = [];
//
// server.on("connection", function(id) {
//
//     //유저리스트에 연결된 클라이언트 추가
//     userList.push(id);
//     console.log("id:"+id);
//     server.sendMessage("one", "Welcome to the server!", id);
//     //현재 연결된 유저 출력
//     userList.forEach(element => console.log(element));
// });
//
// server.on("message", function(data, id) {
//     var mes = server.unmaskMessage(data);
//     if (mes.opcode == 130) {
//         var packagedMessage = server.packageMessage(mes.opcode, mes.message);
//         server.sendMessage('all', packagedMessage);
//     }
//     var str = server.convertToString(mes.message);
//     console.log(str);
// });
//
// server.on("closedconnection", function(id) {
//     console.log("Connection " + id + " has left the server");
// });



//1.나혼자 채팅인데 수신안됌

// var server=http.createServer(function(req,rep){
//   console.log(req.url);
//   rep.writeHead(404);
//   rep.end();
// }).listen(8080,function(){console.log("server running...");});
//
// webs=new wss({
//  httpServer: server,
//  autoAcceptConnections: false
// });
//
//
// webs.on('request', function(req){
//   // var user=req.resourceURL.query.user;
//   var socket=req.accept();
//   socket.on('message', function (message) {
//     if(message.type==='utf8'){
//       console.log('message(utf8): '+message.utf8Data+'\n');
//     }
//
//           // console.log('message:' + message + '\n');
//           //보내는거 ㅐ[object Object] 이렇게 보내짐..
//           socket.sendUTF(message);
//       });
//   socket.on('close', function (c, d) {
//           console.log('Disconnect ' + c + ' -- ' + d);
//       });
// });

//2.걍 나혼자 채팅

//웹소켓의 인스턴스를 정의하고 포트 9060를 등록
// var wss = new webSocketServer({ port: 8080 });
//
// //서버와 연결되었을 때
// wss.on('connection', function (socket) {
//         console.log(socket+"\n");
//         console.log("connected");
//
//     socket.on('message', function (message) {
//         console.log('message:' + message + '\n');
//
//         socket.send(message);
//     });
//
//     socket.on('close', function (c, d) {
//         console.log('Disconnect ' + c + ' -- ' + d);
//     });
// });
