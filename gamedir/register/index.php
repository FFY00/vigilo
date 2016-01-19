<!DOCTYPE HTML>
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
			<title>Registration Area</title>
			<?php require_once("../../config/cfg.php"); ?>
			<?php googleanalytics(); ?>
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
		<body class="eupopup eupopup-top">
			<div id="wrapper">
				<form name="signup" class="form-horizontal" method="post">
					<fieldset>
						<div class="container">
							<div class="row">
								<div id="header">
									<center>
										<h1>Registration Area</h1><br>
									</center>
								</div>
<div id="content">
<!-- Form Name -->

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
  <input id="email" name="email" type="email" placeholder="email" class="form-control input-md"> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="confemail" name="confemail" type="email" placeholder="confirm email" class="form-control input-md"> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="passwd" name="passwd" type="password" placeholder="password" class="form-control input-md">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="confpasswd" name="confpasswd" type="password" placeholder="confirm password" class="form-control input-md">
  </div>
</div>

<center><div class="g-recaptcha" data-sitekey=<?php echo '"' . $captchapublickey . '"'; ?>></div></br></center>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
	<button id="btregister" class="btn btn-success" formaction="/register/validation/">Register</button>
	<span><a href="/login">I already have an account!</a></span>
  </div>
</div>
</div>
</fieldset>
</form>

<div id="footer">
	<center>
		<h6>
			<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
		</h6>
	</center>
</div>
</div>
</body>

<?php $mysqli->close(); ?>
