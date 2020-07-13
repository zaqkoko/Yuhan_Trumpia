<!DOCTYPE html>
<html lang="ko" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<?php
		//
		// $host="localhost";
		// $user="root";
		// $pw="5022";
		// $name="exam";
		// $con=mysqli_connect($host,$user,$pw,$name);
		// if(mysqli_connect_error($con)){
		// 	echo "mysql 접속 실패","<br>";
		// 	echo "오류:", mysqli_connect_error();
		// }
		// echo "mysql 접속 성공";
		// mysqli_close($con);
		//
		// $result=mysqli_query($db,'SELECT VERSION() as VERSION');
		// $data=mysqli_fetch_assoc($result);
		// echo $data['VERSION'];

		$con=mysqli_connect("localhost", "root", "5022", "exam") or die("실패");

		// mysqli_query($con, "INSERT INTO test1 VALUES(4,'test4')");


		// $sql="SELECT * FROM test1";
		//
		// $sql="SELECT COUNT(*) as id FROM test1";
		// $res=mysqli_query($sql,$con);
		// $data=mysqli_fetch_assoc($res);
		// echo $data['id'];
		// echo "??";



		// var_dump($res); //NULL??

$q="SELECT * FROM test1";
$r=mysqli_query($con,$q);
if($r!=NULL){
	while($row=mysqli_fetch_array($r)){
		echo "id<br>".$row[id]."text<br>".$row[text];
	}
}



		?>

	</body>
</html>
