<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>TOY_SIGNUP</title>

    <script src="http://code.jquery.com/jquery-latest.js"></script>

    <style media="screen">
         *
         {background:#fff; margin:0 auto;}
         h1
         {font-size:130px; font-weight:bold; color:#7dabd0; padding-top:100px;}
         table
         {color:#7dabd0; font-weight:bold; font-size:20px; padding-left:15px;}
         table input
         {border:none; background:#7dabd0; color:#fff; font-weight:bold; font-size:20px;}
    </style>

    <script type="text/javascript">
    //아이디 중복확인이 되었는지 확인하는 변수
    var lok = 1;

         function IdCheck()
         {
              var id = document.getElementById("id");
              $.ajax
              ({
                   //php연결
                   url : "signup_idcheck.php",
                   //입력한 id 를 보냄
                   data : {id : $('#id').val(),},
                   type : 'POST'
                   //요청 성공하면
              }).success(function(data)
         {
              if(data == "1")
              {
                   alert("사용 가능한 아이디 입니다");
                   //회원가입 유무 상태 지정
                   lok = 2;
              }
              else if(data == "2")
              {
                   alert("이미 사용중인 아이디 입니다");
                   id.value = "";
                   id.focus();
                   lok = 1;
              }
              else {
                   alert(data);
              }
         })
         }
         //checkform 함수 정의
         function CheckForm()
         {
              if(lok==1)
              {
                   alert("아이디 중복 확인을 해주세요");
              }

              else if(lok==2)
              {
                   var id = document.getElementById("id");
                   var pw = document.getElementById("pw");

                   //id의 내용이 공백이거나 pw의 내용이 공백이라면
                   if(id.value==""||pw.value=="")
                   {
                        //아이디와 비밀번호를 입력하라는 alert
                        alert("아이디/비밀번호를 입력하세양");
                        //false를 반환하여 submit 하지 않는다
                        return false;
                   }
                   //pw의 내용에...............
                   else if(!pw.value.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~,-])|([!,@,#,$,%,^,&,*,?,_,~,-].*[a-zA-Z0-9])/))
                   {
                        //특수문자를 혼용하라는 alert
                        alert("비밀번호는 특수문자를 혼용하여 입력해주세양.");
                        //pw의 내용을 공백으로 만든다
                        pw.value = "";
                        //pw로 초점을 맞춘다
                        pw.focus();
                        //false를 반환하여 submit 하지 않는다
                        return false;
                   }
                   //signup폼을 submit한다
                   else
                   {
                        document.SignUp.submit();
                   }
              }
              //id, pw를 지정

         }
    </script>

  </head>

  <body>
       <center> <h1>0301</h1> </center>
       <form action="signup_check.php" method="post" name="SignUp">
            <table>
                 <tr>
                      <td align="right">ID</td>
                      <td valign="top">
                           <!-- 키를 누르거나 올렸을 때 ' '를 ''로 치환-->
                           <input type="text" name="id" onKeydown="this.value=this.value.replace(' ','');" onKeyup="this.value=this.value.replace(' ','');" maxlength="10" style="height:25px; width:300px;" id="id">
                      </td>
                      <td valign="bottom">
                           <input type="button" id="idcheck" name="idcheck" value="중복확인" style="height:27px;" onclick="IdCheck();">
                      </td>

                 </tr>
                 <tr>
                      <td align="right">PW</td>
                      <td  valign="top">
                           <!-- 키를 누르거나 올렸을 때 ' '를 ''로 치환 -->
                           <input type="password" onKeydown="this.value=this.value.replace(' ','');" onKeyup="this.value=this.value.replace(' ','');" name="pw" maxlength="20" style="height:25px; width:300px;" id="pw">
                      </td>
                      <td rowspan="3" valign="bottom">
                           <!-- 클릭했을때 CheckForm실행 -->
                           <input id="bt" type="button" onclick="CheckForm();" name="signup" value="SIGN UP" style="height:27px;">
                      </td>
                 </tr>
                 <tr>
                      <td align="right">NAME</td>
                      <td  valign="top">
                           <input type="text" name="name" style="height:25px; width:300px;" id="name" maxlength="20">
                      </td>
                 </tr>
                 <tr>
                      <td align="right" valign="bottom">NUMBER</td>
                      <td  valign="top">
                           <!-- 0-9가 아니면 ''로 대체, ' '도 ''로 치환 -->
                           <input type="text" onKeydown="this.value=this.value.replace([^0-9],''),(' ','');" onKeyup="this.value=this.value.replace([^0-9],''),(' ','');"  name="mobile" style="height:25px; width:300px;" id="mibile" maxlength="15">
                      </td>
                 </tr>
            </table>
       </form>
  </body>
</html>
