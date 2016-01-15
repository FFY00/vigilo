<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<!DOCTYPE HTML>
	
	<!-- vigilo JavaScript Script -->
	<script src="/libs/vigilo-js/index.js"></script>
	<!-- If client browser doesn't support JavaScript -->
	<noscript>
		Sorry, but Vigilo does not work if you do not have Javascript enabled. Your browser does not support JavaScript or it is disabled!
	</noscript>

	<!-- style to insert background page and improve it in mobile devices -->
	<style>
		html,
		body {
			margin:0;
			padding:0;
			height:100%;
			}
		#wrapper {
			min-height:100%;
			position:relative;
			}
		#header {
			}
		#content {
			padding-bottom:100px;   
			/* Height of the footer element */
			}
		#footer {
			width:100%;
			height:100px;
			position:absolute;
			bottom:0;
			left:0;
			}
		body {
			/* Location of the image */
			background-image: url(/res/logobackground.png);
  
			/* Background image is centered vertically and horizontally at all times */
			background-position: center center;
  
			/* Background image doesn't tile */
			background-repeat: no-repeat;
  
			/* Background image is fixed in the viewport so that it doesn't move when 
				the content's height is greater than the image's height */
			background-attachment: fixed;
  
			/* This is what makes the background image rescale based
				on the container's size */
			background-size: contain;
  
			/* Set a background color that will be displayed
				while the background image is loading */
			background-color: #464646;
			}

		@media only screen and (max-width: 767px) {
		body {
			/* The file size of this background image is 93% smaller
				to improve page load speed on mobile internet connections */
			background-image: url(/res/logobackground.png);
			}
		}
	</style>

	<html>
		<head>
			<title>Vigilo</title>
				<!-- Meta TAG's -->
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
			<?php 
				require("config/cfg.php"); googleanalytics(); 
			?>
			<meta charset="UTF-8">
			<link rel="icon" href="/res/favicon.ico" type="image/x-icon"/>
			<link rel="shortcut icon" href="/res/favicon.ico" type="image/x-icon"/>
			<link rel="shortcut icon" href="/res/favicon.ico?v=2">
			<link rel="stylesheet" type="text/css" href="/res/style.css">
			<link rel="stylesheet" type="text/css" href="/res/main.css">
			<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
			<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<script src="/bootstrap/js/bootstrap.min.js"></script>
		</head>
	<body>
		<div id="wrapper">
			<div class="container">
				<div class="row">
					<div id="header">
						<center><h1>Welcome to Vigilo!</h1>
						<p>Vigilo is a web-based hacking simulation game, where you play the role of a hacker seeking for money and power.</p><br>
					</div>
					<div id="content">
						<center>
						<?php 
							echo '<a class="btn btn-primary btn-lg" href="'.$play_remotepath.'/login/">Login</a> ';
							echo '<a class="btn btn-success btn-lg" href="'.$play_remotepath.'/register/">Register</a>';
						?>
						</center>
					</div>
				</div>
				<div id="footer">
					<center>
						<br>
						<h6>
							<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
						</h6>
					</center>
				</div>
			</div>
		</div>
	</body>
