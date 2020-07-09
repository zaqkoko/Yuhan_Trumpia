<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <form action="smsone.php" method="POST">
      <table align="center">
        <tr>
          <td>Phone Number:</td>
          <td>
            <input type="text" name="phoneno" placeholder="phoneNumber" />
          </td>
          <br />
        </tr>
        <tr>
          <td>Message:</td>
          <td><input type="text" name="message"></td>
          <br />
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="send" name="send" /></td>
        </tr>
      </table>
    </form>
  </body>
</html>