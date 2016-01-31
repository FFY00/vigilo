<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<!DOCTYPE html>
<html lang="en">
<head>
<!--[if IE]>
			<meta content="true" name="MSSmartTagsPreventParsing">
    		<meta content="false" http-equiv="imagetoolbar">
    	<![endif]-->

		<!--[if lt IE 7]>
			<style type="text/css">
				#wrapper { height:100%; }
				#footer {
				position:fixed;
				bottom:0; }
			</style>
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="res/reveal-js/lib/js/html5shiv.js"></script>
			<script src="http://html5shiv-printshiv.googlecode.com/svn/trunk/html5shiv-printshiv.js"></script>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
		<![endif]-->

	<title>Vigilo • ...</title>
		<!-- Meta TAG's -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
				<!-- Apple Phones Optimization -->
			<meta name="apple-mobile-web-app-capable" content="yes">
			<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
			<meta name="description" content="Web-Based Hacking simulation game">
			<meta content="hacking, hack, vigilo, vigiloproject, game, simulator, web-based game" name="keywords">
			<meta name="author" content="Vigilo">
			<meta name="referrer" content="origin">
			<meta charset="UTF-8">

			<?php 
				require_once("../../../config/cfg.php"); 
				require_once("../../../res/vigilolibrary.php");

				echo '
					<link rel="icon" href="'.$root_remotepath.'/res/favicon.ico" type="image/x-icon"/>
					<link rel="shortcut icon" href="'.$root_remotepath.'/res/favicon.ico" type="image/x-icon"/>
					<link rel="shortcut icon" href="'.$root_remotepath.'/res/favicon.ico">

					<link rel="stylesheet" type="text/css" href="'.$root_remotepath.'/res/style.css">
					<!--<link rel="stylesheet" type="text/css" href="'.$root_remotepath.'/res/background.css">-->

					<script src="'.$root_remotepath.'/res/jquery/jquery-1.12.0.min.js"></script>
					<!-- <script src="'.$root_remotepath.'/res/jquery/jquery-2.2.0.min.js"></script> -->

					<script src="https://www.google.com/recaptcha/api.js"></script>

					<link rel="stylesheet" type="text/css" href="'.$root_remotepath.'/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.css"/>
					<script src="'.$root_remotepath.'/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.js"></script>

					<link href="'.$root_remotepath.'/res/bootstrap/css/bootstrap.css" rel="stylesheet">
					<link href="'.$root_remotepath.'/res/bootstrap/css/bootstrap.min.css" rel="stylesheet">
					<link type="text/css" href="'.$root_remotepath.'/res/normalize/normalize.css" rel="stylesheet">
					<script src="'.$root_remotepath.'/res/bootstrap/js/bootstrap.min.js"></script>
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
					<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
					<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

					<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

					<script src="'.$root_remotepath.'/res/vigilo-js/index.js"></script>
				';

				googleanalytics($google_ua_id);
			?>

			<noscript>
				<div class="alert alert-danger">
            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            		<span><strong>Notice: </strong> Sorry, but Vigilo does not work if you do not have Javascript enabled. Your browser does not support JavaScript or it is disabled! <a href="http://enable-javascript.com/" class="alert-link">Please Enable JavaScript Safley</a>.</span>
        		</div>
			</noscript>
	</head>
	<body>
	<div id="wrapper">
<div class="container">
<div class="row">

<?php
//Variables
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
	echo <<<CAPTCHA
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
</div>
CAPTCHA;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
    exit;
}

if(!($email == $confemail))
{
	echo <<<EMAIL
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
</div>
EMAIL;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
	exit;
}


if(!($passwd == $confpasswd))
{
	echo <<<PASSWORD
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
</div>
PASSWORD;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
	exit;
}

$query = "SELECT * FROM users WHERE username='" . $usr . "'";
if(!($usr == NULL)){
if(($db->query($query)->fetchColumn()) > 0){
    echo <<<USER
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
USER;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
    exit;
}
}

$query = "SELECT * FROM users WHERE email='" . $email . "'";
if(!($email == NULL)){
if(($db->query($query)->fetchColumn()) > 0){
    echo <<<EMAIL
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
EMAIL;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
    exit;
}
}

if($usr == NULL)
{
	echo <<<WRONG
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
</div>
WRONG;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
    exit;
}

if($passwd == NULL)
{
echo <<<BLANK
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
</div>
BLANK;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
    exit;
}

if(strlen($passwd) < 8)
{
echo <<<MIN
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
</div>
MIN;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
    exit;
}

if($email == NULL)
{
	echo <<<EMAIL
<div id="header">
<center><h1>Wrong email!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>
EMAIL;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
    exit;
}

if($username == $email)
{
	echo <<<UE
<div id="header">
<center><h1>We dont allow username equal email!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>
UE;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
    exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo <<<EMAIL
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
</div>
EMAIL;
	echo '				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />';
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
            					echo '
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>';
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

$query = "SELECT * FROM users WHERE gameip='" . $random_ip . "'";

	if(($db->query($query)->fetchColumn()) > 0)
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

//write in mysql database
try {
	$sql = "INSERT INTO users (username, password, email, gameip, confirmkey) VALUES ('$usr', '$generated_passwd', '$email', '$generated_gameip', '$generated_key');";
	$db->exec($sql);
	}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    exit;
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


$db = null;

echo <<<REGISTERED
<div id="header">
	<center><h1>User successfully registered!</h1><br>
</div>
<div id="content">
<center>
<p>Now you need to confirm your email. To access your account go to login page in this <a href="/login">link</a>. NOTE: Check SPAM email Box with email named: noreply@vigilo.cf !</p>
</center>
</div>
</div>
REGISTERED;
?>
				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
							<div class="text-center center-block">
            					<br />
            					<?php
            					if($facebook_page==1)
            					{
            						echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
            					}
            					if($twitter_page==1)
            					{
            						echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
            					}
            					if($googleplus_page==1)
            					{
            						echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
            					}
            					if($email_page==1)
            					{
            						echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
            					}
	            				?>
							</div>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>