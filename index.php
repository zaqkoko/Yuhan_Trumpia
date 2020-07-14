<!DOCTYPE html>
<html lang="kr" dir="ltr">

<head>
     <meta charset="utf-8">
     <title>TOY_LOGIN</title>

     <style media="screen">
          * {
               background: #7dabd0;
               margin: 0 auto;
          }

          h1 {
               font-size: 130px;
               font-weight: bold;
               color: #fff;
               padding-top: 100px;
          }

          table {
               color: #fff;
               font-weight: bold;
               font-size: 20px;
               padding-left: 15px;
          }

          table input {
               border: none;
               background: #fff;
               color: #7dabd0;
               font-weight: bold;
               font-size: 20px;
          }

          a {
               color: #fff;
          }
     </style>
</head>

<body>
     <center>
          <h1>T</h1>
     </center>
     <form action="login.php" method="post">
          <table>
               <tr>
                    <td align="right">ID</td>
                    <td valign="top">
                         <input type="text" name="id" style="height:25px; width:300px;">
                    </td>
                    <td rowspan="2" valign="bottom">
                         <input type="submit" name="login" value="LOGIN" style="height:60px;" id="bt">
                    </td>
               </tr>
               <tr>
                    <td align="right">PW</td>
                    <td valign="top">
                         <input type="password" name="pw" style="height:25px; width:300px;">
                    </td>
               </tr>
               <tr>
                    <td></td>
                    <td></td>
                    <td><a href="signup.php">SIGN UP</a></td>
               </tr>
          </table>
     </form>
</body>

</html>