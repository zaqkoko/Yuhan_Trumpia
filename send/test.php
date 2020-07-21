<?php

//
// $_FILES['uploadFile']['name'] : 클라이언트에서 올린 원래 이름
//
// $_FILES['uploadFile']['type'] : 파일의 종류. "image/gif" 이런식으로 구성
//
// $_FILES['uploadFile']['size'] : 업로드한 파일의 크기. 단위는 byte
//
// $_FILES['uploadFile']['tmp_name'] : 파일의 임시 이름. 현재 서버에 업로드되어있는 위치.
//
// $_FILES['uploadFile']['error'] : 에러코드. (참고 : 에러코드 레퍼런스)
//
//
// 출처: https://unikys.tistory.com/251 [All-round programmer]

ini_set("display_errors","1");

$uploaddir = 'C:\Bitnami\wampstack-7.4.8-0\apache2\htdocs\Yuhan_Trumpia\send\uploads\\';

$uploadfile=$uploaddir.basename($_FILES['file']['name']);

// echo "파일명: ".$_FILES['file']['name']."<br>";
// echo "파일 종류: ".$_FILES['file']['type']."<br>";
// echo "파일 크기: ".$_FILES['file']['size']."<br>";
// echo "파일 임시 이름: ".$_FILES['file']['tmp_name']."<br>";
// echo "파일 에러코드: ".$_FILES['file']['error']."<br>";

if(move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)
{
  echo "성공";
}else{
  echo "실패";}


?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="<?php echo $_FILES['file']['tmp_name']; ?>" download>다운로드</a>
  </body>
</html>
