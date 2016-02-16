<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php 
session_name("VigiloID");
session_start(); ?>
<?php 
if (isset($_SESSION["s_usr"]) && isset($_SESSION["s_pw"])){
	header("Location: /panel");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
	<?php 
			require_once("../../../config/cfg.php"); 
			require_once("../../../res/vigilolibrary.php");
			$vigiloHTML5 = new vigiloHTML5()
			$vigiloHTML5->head_default("...", $root_remotepath, $google_ua_id, $bg=0, $redirect=NULL); ?>
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
	<div id="center"><h1>Wrong captcha, try again!</h1><br></div>
</div>
<div id="content">
<div id="center">
<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</div>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
CAPTCHA;
$vigiloHTML5->footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link);
	echo '
			</div>
		</body>
	</html>';
    exit;
}

$query = "SELECT * FROM users WHERE username='" . $usr . "'";
if(!($usr == NULL)){
if(!($db->query($query)->rowCount()) > 0){
    echo <<<USER
<div id="header">
	<div id="center"><h1>Wrong Username!</h1><br></div>
</div>
<div id="content">
<div id="center">
<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</div>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
USER;
$vigiloHTML5->footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link);
	echo '
			</div>
		</body>
	</html>';
    exit;
}
}

	if ($usr ==NULL)
	{
		echo <<<USEREMPTY
<div id="header">
	<div id="center"><h1>Empty Username!</h1><br></div>
</div>
<div id="content">
<div id="center">
<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</div>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
USEREMPTY;
$vigiloHTML5->footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link);
	echo '
			</div>
		</body>
	</html>';
	exit;
	}

	if ($passwd ==NULL)
	{
		echo <<<PASSWORDEMPTY
<div id="header">
	<div id="center"><h1>Empty password!</h1><br></div>
</div>
<div id="content">
<div id="center">
<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</div>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
PASSWORDEMPTY;
$vigiloHTML5->footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link);
	echo '
			</div>
		</body>
	</html>';
	exit;
	}

		//Generate password in sha512
	$generated_passwd = hash('sha512', $passwd);


	//read mysql database
$query = "SELECT * FROM users WHERE confirmed='1' AND ( username='" . $usr . "' AND password='".$generated_passwd."' )";
if(($db->query($query)->rowCount()) > 0){
    echo <<<LOGIN
<div id="header">
	<div id="center"><h1>Login successfully!</h1><br></div>
</div>
<div id="content">
<div id="center">
<p>If you are not redirected automatically, follow the <a href="/panel">link</a>.</p>
</div>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/panel'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/panel">
</div>
</div>
LOGIN;
$_SESSION["s_usr"] = $usr;
$_SESSION["s_pw"] = $generated_passwd;
}
else{
	echo <<<LOGINERRORCONFIRM
<div id="header">
	<div id="center"><h1>Something is wrong!</h1><br></div>
</div>
<div id="content">
<div id="center">
<p>Your password is wrong or you don't confirm your email! If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</div>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
LOGINERRORCONFIRM;
}

$vigiloHTML5->footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link);
?>
</div>
</body>
</html>
