<?php

// //basename 참고
// $path = "/testweb/home.php";
//
// //Show filename
// echo basename($path) ."<br/>";
// =>출력 home.php
// //Show filename, but cut off file extension for ".php" files
// echo basename($path,".php");
// =>출력 home


echo "파일명: ".$_FILES['file']['name'];
echo "<br>파일 저장 임시 경로:".$_FILES['file']['tmp_name'];
echo "<br>파일 타입: ".$_FILES['file']['type'];
echo "<br>파일 크기: ".$_FILES['file']['size'];

$dest="uploads/".$_FILES['file']['name'];

if(is_uploaded_file($_FILES['file']['tmp_name'])){
  if(move_uploaded_file($_FILES['file']['tmp_name'], $dest)){
    echo "<br>파일을 지정한 디렉토리에 저장했습니다.";
  }else{
    echo "<br>파일을 지정한 디렉토리에 저장하는데 실패했습니다.";
    echo "<script>alert(move_uploaded_file($_FILES['file']['tmp_name'], $dest));</script>";
  }

}

$file

 ?>
 <!DOCTYPE html>
 <html lang="ko" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <script type="text/javascript">
     </script>
   </head>
   <body>
     <a href="<?php echo $_FILES['file']['tmp_name']; ?>"download>다운로드1</a>
     <a href="<?php echo $dest; ?>"download>다운로드2</a>
   </body>
 </html>
