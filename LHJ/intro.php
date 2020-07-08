<!DOCTYPE html>
<html lang="kr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
        * {background : #7dabd0; margin : 0 auto;}
        h1 {font-size:130px; font-weight: bold; color : #fff; padding-top: 100px;}
        table tr, td{color : #fff; font-weight : bold; font-size : 20px;
          padding-left: 15px;}
        table input {border: none; background: #fff; color: #7dabd0; font-weight: bold;}
        #bt {font-size: 20px;}

    </style>
  </head>
  <body>

    <center> <h1>TOY</h1> </center>
<form action="main.php" method="post">

    <table>
        <tr>
            <td align="right" valign="bottom">ID</td>
            <td  valign="top">
                <input type="text" name="id" style="height:25px; width:300px;" padding>
            </td>
            <td rowspan="2" valign="bottom">
                <input id="bt" type="submit" name="login" value="LOGIN" style="height : 62px;" >
            </td>
        </tr>

        <tr>
            <td align="right" valign="bottom">PW</td>
            <td  valign="top">
                <input type="password" name="pw" style="height:25px; width:300px;">
            </td>
        </tr>
    </table>

</form>
    </div>

  </body>
</html>
