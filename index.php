<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<!DOCTYPE html>
	<html>
		<head>
			<title>Vigilo</title>
				<!-- Meta TAG's -->
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<?php require("config/cfg.php"); ?>
			<?php googleanalytics(); ?>
			<meta charset="UTF-8">
			<link rel="icon" href="/res/favicon.ico" type="image/x-icon"/>
			<link rel="shortcut icon" href="/res/favicon.ico" type="image/x-icon"/>
			<link rel="shortcut icon" href="/res/favicon.ico?v=2">
			<link rel="stylesheet" type="text/css" href="/res/main.css">
			<link href="/res/bootstrap/css/bootstrap.css" rel="stylesheet">
			<link href="/res/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<script src="/res/bootstrap/js/bootstrap.min.js"></script>
				<!-- vigilo JavaScript Script -->
			<script src="/res/vigilo-js/index.js"></script>
				<!-- If client browser doesn't support JavaScript -->
			<noscript>
				Sorry, but Vigilo does not work if you do not have Javascript enabled. Your browser does not support JavaScript or it is disabled!
			</noscript>
		</head>
	<body>
		<div id="wrapper">
			<center>
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
				<div id="footer">
						<br>
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
						</h6>
				</div>
			</div>
			</center>
		</div>
	</body>
