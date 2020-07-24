<?
$captcha = $_POST['g-recaptcha-response'];
$secretKey = '6LdScbUZAAAAAE9y1-2XN4HO1GS3_jy7Ma8snJYl';
$ip = $_SERVER['REMOTE_ADDR'];

$data = array(
  'secret' => $secretKey,
  'response' => $captcha,
  'ip' => $ip
);
$parameter = http_build_query($data);
$url = "https://www.google.com/recaptcha/api/siteverify?".$parameter;

$response = file_get_contents($url);
$responseKeys = json_decode($response, true);

if ($responseKeys["success"]) {
	echo "1";
} else {
  	echo '<script>
			alert("가입실패");
			history.go(-1);
		  </script>';
}
?>