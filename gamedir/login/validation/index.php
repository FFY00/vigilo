<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>...</title>
		<!-- Meta TAGs -->
			<?php require_once("../../../config/cfg.php"); ?>
			<?php googleanalytics($google_ua_id); ?>
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<meta charset="UTF-8">
			<?php 
				echo '<link rel="icon" href="'.$root_remotepath.'/res/favicon.ico" type="image/x-icon"/>';
				echo '<link rel="shortcut icon" href="'.$root_remotepath.'/res/favicon.ico">';
				echo '<link rel="stylesheet" type="text/css" href="'.$root_remotepath.'/res/main.css">';
				echo '<link href="'.$root_remotepath.'/res/bootstrap/css/bootstrap.css" rel="stylesheet">';
				echo '<link href="'.$root_remotepath.'/res/bootstrap/css/bootstrap.min.css" rel="stylesheet">';
				echo '<script src="'.$root_remotepath.'/res/bootstrap/js/bootstrap.min.js"></script>';
				echo '<script src="'.$root_remotepath.'/res/smoothscroll/smoothscroll.js"></script>';
				echo '<script src="'.$root_remotepath.'/res/jquery/jquery.js"></script>';
				echo '<script src="'.$root_remotepath.'/res/jquery/jquery-2.1.3.min.js"></script>';
				echo '<link rel="stylesheet" type="text/css" href="'.$root_remotepath.'/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.css"/>';
				echo '<script src="'.$root_remotepath.'/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.js"></script>';
				echo '<script src="'.$root_remotepath.'/res/vigilo-js/index.js"></script>';
			 ?>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src='https://www.google.com/recaptcha/api.js'></script>
			<noscript>
				Your browser does not support JavaScript or it is disabled!
			</noscript>
	</head>
	<body>
	<div id="wrapper">
<div class="container">
<div class="row">

<?php 
	$usr = $_POST["usr"];
	$passwd = $_POST["passwd"];
	$checkbox = $_POST["checkbox"];
	$captcharesponse = $_POST["g-recaptcha-response"];

//extract data from the post

//set POST variables
$url = 'https://www.google.com/recaptcha/api/siteverify';
$fields = array(
	'secret' => urlencode($captchakey),
	'response' => urlencode($captcharesponse)
);
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//connect
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


$captcha_response_body = curl_exec($ch);
curl_close($ch);


$json_parse = json_decode($captcha_response_body, true);
if($json_parse['success'])
{
	$captcha_response_json_success="true";
}
else
{
	$captcha_response_json_success="false";
}

$json_parse_array = json_decode($captcha_response_body, true);
$captcha_response_json_error_codes = $json_parse_array->{'error-codes'};

if ($captcha_response_json_success == "false"){
	echo <<<CAPTCHA
<div id="header">
	<center><h1>Wrong captcha, try again!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
<div id="footer">
	<center>
		<h6>
			<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
		</h6>
	</center>
</div>
</div>
</body>
</html>

CAPTCHA;
    exit;
}

$query = "SELECT * FROM users WHERE username='" . $usr . "'";
if(!($usr == NULL)){
if(!($db->query($query)->fetchColumn()) > 0){
    echo <<<USER
<div id="header">
	<center><h1>Wrong Username!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>
USER;
    exit;
}
}

	if ($usr ==NULL)
	{
		echo <<<USEREMPTY
<div id="header">
	<center><h1>Empty Username!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
<div id="footer">
	<center>
		<h6>
			<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
		</h6>
	</center>
</div>
</div>
</body>
</html>
USEREMPTY;
	exit;
	}

	if ($passwd ==NULL)
	{
		echo <<<PASSWORDEMPTY
<div id="header">
	<center><h1>Empty password!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
<div id="footer">
	<center>
		<h6>
			<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
		</h6>
	</center>
</div>
</div>
</body>
</html>
PASSWORDEMPTY;
	exit;
	}

		//Generate password in sha512
	$generated_passwd = hash('sha512', $passwd);


	//read mysql database
$query = "SELECT * FROM users WHERE email='" . $email . "' and password='".$passwd."'";
if(($db->query($query)->fetchColumn()) > 0){
    echo <<<LOGIN
<div id="header">
	<center><h1>Login successfully!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>
LOGIN;
    exit;
}

?>
<div id="footer">
	<center>
		<h6>
			<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
		</h6>
	</center>
</div>
</div>
</body>
</html>
