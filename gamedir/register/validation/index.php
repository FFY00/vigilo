<?php require("../../../config/cfg.php"); ?>
<!DOCTYPE HTML>
<noscript>Your browser does not support JavaScript or it is disabled!</noscript>
<html>
<head>
	<title>Account Created</title>
		<!-- Meta TAGs -->
	<meta charset="UTF-8">
	<link rel="icon" href="/res/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/res/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/res/favicon.ico?v=2">
	<link rel="stylesheet" type="text/css" href="/res/style.css">
	<link rel="stylesheet" type="text/css" href="/res/main.css">
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<?php googleanalytics(); ?>
	</head>
	<body>
	<div id="wrapper">
<div class="container">
<div class="row">

<?php 

//Import libraries
include_once('../../libs/php/HttpRequest.php');
include_once('../../libs/php/vigilolibrary.php');

$usr = $_POST["usr"];
$email = $_POST["email"];
$confemail = $_POST["confemail"];
$passwd = $_POST["passwd"];
$confpasswd = $_POST["confpasswd"];
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
	echo '
<div id="header">
	<center><h1>Wrong captcha, try again!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>';
    exit;
}

if(!($email == $confemail))
{
	echo '
<div class="container">
<div class="row">
<div id="header">
	<center><h1>Your email confirmation is wrong!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>>';
	exit;
}


if(!($passwd == $confpasswd))
{
	echo '
<div id="header">
	<center><h1>Your password confirmation is wrong!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>';
	exit;
}

$query = mysqli_query($mysqli, "SELECT * FROM users WHERE username='" . $usr . "'");
if(!($usr == NULL)){
if(mysqli_num_rows($query) > 0){
    echo '
<div id="header">
	<center><h1>This username is already exists!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>
';
    exit;
}
}

$query = mysqli_query($mysqli, "SELECT * FROM users WHERE email='" . $email . "'");
if(!($usr == NULL)){
if(mysqli_num_rows($query) > 0){
    echo '
<div id="header">
	<center><h1>This email is already exists!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>
';
    exit;
}
}

if($usr == NULL)
{
	echo '
<div id="header">
	<center><h1>Wrong username!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>';
    exit;
}

if($passwd == NULL)
{
echo '
<div id="header">
	<center><h1>Blank password!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>';
    exit;
}

if(strlen($passwd) < 8)
{
echo '
<div id="header">
	<center><h1>Insert minimum 8 characters in your password!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>';
    exit;
}

if($email == NULL)
{
	echo '<div id="header">
	<center><h1>Wrong email!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>';
    exit;
}

if($username == $email)
{
	echo '<div id="header">
	<center><h1>We dont allow username equal email!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>';
    exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo '
<div id="header">
	<center><h1>Invalid email address!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>';
    exit;
}
/*
	// create a new cURL resource
	$ch = curl_init();

	$api_ipv4_remotepath = $api_remotepath."/ipv4/";
	// set URL and other appropriate options
	curl_setopt($ch, CURLOPT_URL, $api_ipv4_remotepath);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	// grab URL and pass it to the browser
	$generated_gameip = curl_exec($ch);
	
	// close cURL resource, and free up system resources
	curl_close($ch);*/

while(1) {
//try generate ip address
$random_ip = rand(1, 255).".".rand(1, 255).".".rand(1, 255).".".rand(1, 255);

$query = mysqli_query($mysqli, "SELECT * FROM users WHERE gameip='" . $random_ip . "'");
	if(mysqli_num_rows($query) > 0)
	{
		$ipv4 = "1";
	}
	else
	{
		$ipv4 = "0";
	}
//break if not exist
if($ipv4 == 0) { break; }
}

//save in var a generated ip address
$generated_gameip = $random_ip;

//Generate password in sha512
$generated_passwd = hash('sha512', $passwd);
//Generate email key confirmation
$generated_key=emailkey();

//write in mysqli database
$conn = mysqli_query($mysqli, "INSERT INTO users (username, password, email, gameip, confirmkey) VALUES ('$usr', '$generated_passwd', '$email', '$generated_gameip', '$generated_key');");

if (!$conn) {
    echo "Failed to run query: (" . $mysqli->errno . ") " . $mysqli->error;
}

$subject = "Vigilo: Email Confirmation";
$msg= 'Hi '. $usr .',

Welcome to vigilo! We need you to confirm this email address in order to get started with your vigilo account. Email confirmation is simple and fast, just visit the below link to complete this process.
https://vigilo.cf/register/confirmation/?key='. $generated_key .'

Sincerely,
The Vigilo Team';

//headers
$headers   = array();
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/plain; charset=iso-8859-1";
$headers[] = "From: Vigilo <noreply@vigilo.cf>";
$headers[] = "Bcc: Vigilo <bcc@vigilo.cf>";
$headers[] = "Reply-To: ".$usr." <".$email.">";
$headers[] = "X-Mailer: PHP/".phpversion();

// Send
mail($email, $subject ,$msg , implode("\r\n", $headers));


$mysqli->close();

echo '
<div id="header">
	<center><h1>User successfully registered!</h1><br>
</div>
<div id="content">
<center>
<p>Now you need to confirm your email. To access your account go to login page in this <a href="/login">link</a>. NOTE: Check SPAM email Box with email named: noreply@vigilo.cf !</p>
</center>
</div>
</div>
';
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
