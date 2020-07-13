<?php
session_start();
$name = $_SESSION['name'];
$id = $_SESSION['id'];
//$name에 $_SESSION['name'] 저장?입력?... 지정..?
 ?>

<!DOCTYPE html>
<html lang="kr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
         * {background:#fff; margin:0 auto;}
         #menu {text-align:center; padding-top:150px;}
         #chat {width:50px; height:50px; position:fixed; right:50px; bottom:50px;}
         .icon {width:200px; padding:30px;}
         #hi {position:fixed; top:10px; right:10px; color:#7dabd0; font-weight:bold; font-size:15px;}
    </style>
  </head>
  <body>
       <div id="menu">
            <a href="#"> <img class="icon" src="icon/main_sms.png" alt=""> </a>
            <a href="#"> <img class="icon" src="icon/main_history.png" alt=""> </a>
            <a href="#"> <img class="icon" src="icon/main_calendar.png" alt=""> </a>
            <a href="#"> <img class="icon" src="icon/main_address.png" alt=""></a>
       </div>
       <a href="#"> <img id="chat" src="icon/chat.png" alt=""> </a>
       <p id="hi">안녕 <?php echo $name; ?> 님</p>
  </body>
</html>
