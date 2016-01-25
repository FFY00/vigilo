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
	
			<title>Login Area</title>
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
				require_once("../../config/cfg.php"); 
				require_once("../../res/vigilolibrary.php");

				echo '
					<link rel="icon" href="'.$root_remotepath.'/res/favicon.ico" type="image/x-icon"/>
					<link rel="shortcut icon" href="'.$root_remotepath.'/res/favicon.ico" type="image/x-icon"/>
					<link rel="shortcut icon" href="'.$root_remotepath.'/res/favicon.ico">

					<link rel="stylesheet" type="text/css" href="'.$root_remotepath.'/res/style.css">
					<link rel="stylesheet" type="text/css" href="'.$root_remotepath.'/res/background.css">

					<script src="'.$root_remotepath.'/res/jquery/jquery-1.12.0.min.js"></script>
					<!-- <script src="'.$root_remotepath.'/res/jquery/jquery-2.2.0.min.js"></script> -->

					<script src="https://www.google.com/recaptcha/api.js"></script>

					<link rel="stylesheet" type="text/css" href="'.$root_remotepath.'/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.css"/>
					<script src="'.$root_remotepath.'/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.js"></script>

					<link href="'.$root_remotepath.'/res/bootstrap/css/bootstrap.css" rel="stylesheet">
					<link href="'.$root_remotepath.'/res/bootstrap/css/bootstrap.min.css" rel="stylesheet">
					<link type="text/css" href="'.$root_remotepath.'/res/normalize/normalize.css" rel="stylesheet">
					<script src="'.$root_remotepath.'/res/bootstrap/js/bootstrap.min.js"></script>

					<script src="'.$root_remotepath.'/res/vigilo-js/index.js"></script>
				';

				googleanalytics($google_ua_id);
			?>

			<noscript>
				Sorry, but Vigilo does not work if you do not have Javascript enabled. Your browser does not support JavaScript or it is disabled!
			</noscript>
		</head>
		<body class="eupopup eupopup-top">
			<div id="wrapper">
				<form role="form" class="form-horizontal" method="post">
						<div class="container">
							<div class="row">
								<div id="header">
									<center><h1>User Area</h1><br></center>
								</div>
								<div id="content">
										<!-- Text input-->
									<div class="form-group">
  										<label class="col-md-4 control-label" for="textinput"></label>  
  										<div class="col-md-4">
  											<input id="usr" name="usr" type="text" placeholder="username" class="form-control input-md"> 
  										</div>
									</div>

											<!-- Text input-->
									<div class="form-group">
  										<label class="col-md-4 control-label" for="textinput"></label>  
  										<div class="col-md-4">
  											<input id="passwd" name="passwd" type="password" placeholder="password" class="form-control input-md">
  											<center><span class="help-block"><a href="/login/forgot/">Forgot your password?</a> or <a href="/register/">You don't have an account?</a></span></center>
  										</div>
									</div>

									<div id="center">
										<div class="g-recaptcha" data-sitekey=<?php echo '"' . $captchapublickey . '"'; ?>></div></br>
										<label for="checkbox"><input name="checkbox" id="checkbox-remember" value="1" type="checkbox" checked> Remember account?</label>
											<!-- Button (Double) -->
										<br>
										<button id="btlogin" class="btn btn-info" formaction="/login/validation/">Login</button>
										<button id="btregister" class="btn btn-success" formaction="/register/">Register</button>

									</div>
								</div>
							</div>
						</div>
				</form>

				<div id="footer">
					<div id="center">
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
						</h6>
					</div>
				</div>
			</div>
		</body>
	</html>