<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TOY_SIGNUP</title>

    <style media="screen">
         * {background:#fff; margin:0 auto;}
         h1 {font-size:130px; font-weight:bold; color:#7dabd0; padding-top:100px;}
         table {color:#7dabd0; font-weight:bold; font-size:20px; padding-left:15px;}
         table input {border:none; background:#7dabd0; color:#fff; font-weight:bold; font-size:20px;}
    </style>


    <script type="text/javascript">



         function CheckForm()
         //CheckForm 함수 정의
         {
              var id = document.getElementById("id");
              //id변수를 id가 id인 것으로 정의
              var pw = document.getElementById("pw");
              //pw는 id가 pw인 것으로 정의

              alert("이거는>??");

              if(id.value==""||pw.value=="")
              //만약 id의 내용이 공백이거나 pw의 내용이 공백일때
              {
               alert("아이디/비밀번호를 입력하세양");
               //아이디와 비밀번호를 입력하라는 창이 뜸
               return false;
               //signup_check.php로 post하지 않는다
              }

              else if(!pw.value.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~,-])|([!,@,#,$,%,^,&,*,?,_,~,-].*[a-zA-Z0-9])/))
              //만약 pw의 내용이 [영문,숫자]뒤에 특수문자가 있거나 특수문자 뒤에 영문,숫자가 있지 않다면
              {
                   alert("비밀번호는 특수문자를 혼용하여 입력해주세양.");
                   //특수문자, 영문, 숫자를 혼용하라는 창이 뜸
                   pw.value = "";
                   //비밀번호 입력 칸이 비워지고
                   pw.focus();
                   //비밀번호 입력 칸으로 초점 이동(커서 이동)
                   return false;
              }
              else{document.SignUp.submit();}
              //SignUp 폼을 전송
         }
    </script>
  </head>

  <body>
       <center> <h1>TOY</h1> </center>
       <form action="signup_check.php" method="post" name="SignUp">
            <table>
                 <tr>
                      <td align="right">ID</td>
                      <td valign="top">
                           <input type="text" name="id" onKeydown="this.value=this.value.replace(' ','');" onKeyup="this.value=this.value.replace(' ','');" maxlength="10" style="height:25px; width:300px;" id="id">
                      </td>
                      <td valign="bottom">
                           <input type="button" onclick="IdCheck();" name="idcheck" value="중복확인" style="height:27px;">
                      </td>

                 </tr>
                 <tr>
                      <td align="right">PW</td>
                      <td  valign="top">
                           <input type="password" onKeydown="this.value=this.value.replace(' ','');" onKeyup="this.value=this.value.replace(' ','');" name="pw" maxlength="20" style="height:25px; width:300px;" id="pw">
                      </td>
                      <td rowspan="3" valign="bottom">
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
                           <input type="text" onKeydown="this.value=this.value.replace(/[^0-9]/g,''),(' ','');" onKeyup="this.value=this.value.replace(/[^0-9]/g,''),(' ','');"  name="mobile" style="height:25px; width:300px;" id="mibile" maxlength="15">
                      </td>
                 </tr>
            </table>
       </form>
  </body>
</html>
