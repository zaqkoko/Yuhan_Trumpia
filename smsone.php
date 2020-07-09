<!DOCTYPE html>
<?php
if(isset($_POST['send'])){

  $phoneno = $_POST['phoneno'];
  $message = $_POST['message'];

 if(empty($phoneno)){
    echo("enter the phone no");
    exit();
  }else if(empty($message)){
    echo("enter the message");
    exit();
  }else{
    $message = wordwrap($message, 70);
    $header = $from;
    $subject = "from submission";
    $to = $phoneno."@".$carrier;
    $result = mail($to, $subject, $message, $header);
    echo("message sent to".$to);
    echo("");
  }
}
?>

