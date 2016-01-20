<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<!DOCTYPE html>
	<html>
		<head>
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
		<![endif]-->

			<title>Vigilo</title>
				<!-- Meta TAG's -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
				<!-- Apple Phones Optimization -->
			<meta name="apple-mobile-web-app-capable" content="yes">
			<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
			<meta name="description" content="Web-Based Hacking simulation game">
			<meta name="author" content="Vigilo">
			<meta charset="UTF-8">
		
				<!-- PHP  -->
			<?php require_once("config/cfg.php"); ?>
			<?php require_once("res/vigilolibrary.php"); ?>

				<!-- Icon -->
			<link rel="icon" href="/res/favicon.ico" type="image/x-icon"/>
			<link rel="shortcut icon" href="/res/favicon.ico" type="image/x-icon"/>
			<link rel="shortcut icon" href="/res/favicon.ico">

				<!-- CSS Style -->
			<link rel="stylesheet" type="text/css" href="/res/style.css">

				<!-- jquery -->
			<script src="/res/jquery/jquery-1.12.0.min.js"></script>
			<script src="/res/jquery/jquery-2.2.0.min.js"></script>

				<!-- Google recaptcha -->
			<script src='https://www.google.com/recaptcha/api.js'></script>

				<!-- jquery Cookies Law Popup -->
			<link rel="stylesheet" type="text/css" href="/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.css"/>
			<script src="/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.js"></script>

				<!-- Bootstrap -->
			<link href="/res/bootstrap/css/bootstrap.css" rel="stylesheet">
			<link href="/res/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<link type="text/css" href="/res/normalize/normalize.css" rel="stylesheet">
			<script src="/res/bootstrap/js/bootstrap.min.js"></script>
				<!-- vigilo JavaScript Script -->
			<script src="/res/vigilo-js/index.js"></script>

			<?php googleanalytics($google_ua_id); ?>
				<!-- If client browser doesn't support JavaScript -->
			<noscript>
				Sorry, but Vigilo does not work if you do not have Javascript enabled. Your browser does not support JavaScript or it is disabled!
			</noscript>
		</head>
		<body class="eupopup eupopup-top">
			<div id="wrapper"><br>
				<div id="center">
						<div class="container">
							<div class="row">
								<div id="header">
									<h1>Welcome to Vigilo!</h1>
									<p>Vigilo is a web-based hacking simulation game, where you play the role of a hacker seeking for money and power.</p><br>
								</div>
								<div id="content">
									<?php 
										echo '<a class="btn btn-primary btn-lg" href="'.$play_remotepath.'/login/">Login</a> ';
										echo '<a class="btn btn-success btn-lg" href="'.$play_remotepath.'/register/">Register</a>';
									?>
								</div>
							</div>
							<div id="terminal"></div>
							<div id="footer">
									<br>
									<h6>
										<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
									</h6>
							</div>
						</div>
				</div>
			</div>
		</body>
	<html>
