<?php
$id='a';


$con=mysqli_connect("localhost", "root", "5022", "exam");

$q="SELECT * FROM sms WHERE send_type='1' AND user_id='$id'";
$r=mysqli_query($con,$q);


              $count=mysqli_num_rows($r);

            while(mysqli_fetch_array($r)){

            }

            echo $count;

 ?>
