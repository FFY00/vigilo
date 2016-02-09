<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<!DOCTYPE html>
	<html lang="en-US" prefix="og: http://ogp.me/ns#">
		<head>
		<?php 
			require_once("config/cfg.php"); 
			require_once("res/vigilolibrary.php");

			head_default("Home", $root_remotepath, $google_ua_id, $bg=1, $redirect=NULL); ?>
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
							<?php footer_default($bg=0, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link); ?>
						</div>
				</div>
			</div>
		</body>
	<html>
