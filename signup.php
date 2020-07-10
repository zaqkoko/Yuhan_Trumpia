<!DOCTYPE html>
<html lang="kr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TOY</title>

    <style media="screen">
        * {background : #fff; margin : 0 auto;}
        h1 {font-size:130px; font-weight: bold; color : #7dabd0; padding-top: 100px;}
        table tr, td{color : #7dabd0; font-weight : bold; font-size : 20px;
          padding-left: 15px;}
        table input {border: none; background: #7dabd0; color: #fff; font-weight: bold;}
        #bt {font-size: 20px;}
    </style>

    <script type="text/javascript">

        function CheckForm()
        {
          var id = document.getElementById("id");
          var pw = document.getElementById("pw");
          alert("아이걸못했네");

          if(id.value=="" || pw.value=="")
          {
            alert("아이디/비밀번호를 입력하세야");
            return false;
          }
          else if(!pw.value.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~,-])|([!,@,#,$,%,^,&,*,?,_,~,-].*[a-zA-Z0-9])/))
          {
            alert("비밀번호는 영문,숫자,특수문자를 혼용하여 입력해주세요.");
            pw.value = "";
            pw.focus();
            return false;
          }
          else{document.SignUp.submit();}

        }

    </script>


  </head>
  <body>

    <center> <h1>TOY</h1> </center>
<form id="SignUp" name="SignUp" action="signup_check.php" method="post">

    <table>
        <tr>
            <td align="right" valign="bottom">ID</td>
            <td  valign="top">
                <input type="text" name="id" onKeydown="this.value=this.value.replace(' ','');" onKeyup="this.value=this.value.replace(' ','');" maxlength="10" style="height:25px; width:300px;" id="id">
            </td>
            <td rowspan="4" valign="bottom">
                <input id="bt" type="button" onclick="CheckForm();" name="signup" value="SIGN UP" style="height:27px;">
            </td>
        </tr>

        <tr>
            <td align="right" valign="bottom">PW</td>
            <td  valign="top">
                <input type="password" onKeydown="this.value=this.value.replace(' ','');" onKeyup="this.value=this.value.replace(' ','');" name="pw" maxlength="20" style="height:25px; width:300px;" id="pw">
            </td>
        </tr>

        <tr>
            <td align="right" valign="bottom">NAME</td>
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
