<!DOCTYPE html>
<?php
if(isset($_POST['send'])){

  $phoneno = $_POST['smstxt'];

 if(empty($smstxt)){
    echo("enter the text");
    exit();
  }
  }else{
    $smstxt = wordwrap($smstxt, 150);
    $header = $from;
    $subject = "from submission";
    $to = $phoneno."@".$message;
    $result = mail($to, $subject, $smstxt, $header);
    echo("message sent to".$to);
    echo("");
  }

?>

