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
			require_once("../config/cfg.php"); 
			require_once("../res/vigilolibrary.php");

			head_default("Page Redirection", $root_remotepath, $google_ua_id, $bg=0, $redirect="/login"); ?>
		</head>
		<body>
			<div id="wrapper">
				<div class="container">
					<div class="row">
						<div id="header">
							<div id="center">
								<h1>Page Redirection</h1>
								<br>
							</div>
						</div>
					</div>
					<div id="content">
						<div id="center">
							<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
							<br/>
							<img alt="" height="100" src="https://vigilo.cf/res/logobackground.png" width="100" />
						</div>
					</div>
				</div>
				<?php footer_default($bg=0, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link); ?>
			</div>
		</body>
	</html>