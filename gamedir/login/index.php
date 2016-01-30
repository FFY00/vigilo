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
	
			<title>Vigilo • Login</title>
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
		<body class="eupopup eupopup-top">
			<div id="wrapper">
				<!--<form role="form" class="form-horizontal" method="post">-->
						<div class="container">
							<div class="row">
								<div id="header">
									<div id="center">
										<h3 class="omb_authTitle">Login or <a href="/register/">Sign up</a></h3>
										<br />
									</div>
								</div>
								<div id="content">
									<div class="omb_login">
										<div class="row omb_row-sm-offset-3 omb_socialButtons">
    	    								<div class="col-xs-4 col-sm-2">
		        								<a href="#" class="btn btn-lg btn-block omb_btn-facebook">
			        								<i class="fa fa-facebook visible-xs"></i>
			        								<span class="hidden-xs"><i class="fa fa-facebook"></i> Facebook</span>
		        								</a>
	        								</div>
        									<div class="col-xs-4 col-sm-2">
		        								<a href="#" class="btn btn-lg btn-block omb_btn-twitter">
			        								<i class="fa fa-twitter visible-xs"></i>
			       			 						<span class="hidden-xs"><i class="fa fa-twitter"></i> Twitter</span>
		        								</a>
	        								</div>	
        									<div class="col-xs-4 col-sm-2">
		       						 			<a href="#" class="btn btn-lg btn-block omb_btn-google">
			        								<i class="fa fa-google-plus visible-xs"></i>
			        								<span class="hidden-xs"><i class="fa fa-google-plus"></i> Google+</span>
		        								</a>
	        								</div>	
										</div>
										<div class="row omb_row-sm-offset-3 omb_loginOr">
											<div class="col-xs-12 col-sm-6">
												<hr class="omb_hrOr">
												<span class="omb_spanOr">or</span>
											</div>
										</div>
										<div class="row omb_row-sm-offset-3">
											<div class="col-xs-12 col-sm-6">	
			    								<form role="form" class="omb_loginForm" action="/login/validation/" autocomplete="off" method="POST">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" class="form-control" name="usr" placeholder="username or email address">
														<i class="glyphicon glyphicon-user form-control-feedback"></i>
													</div>
													<span class="help-block"></span>
													<div class="form-group has-feedback has-feedback-left">
														<input  id="passwd" name="passwd" type="password" class="form-control" placeholder="Password">
														<i class="glyphicon glyphicon-lock form-control-feedback"></i>
													</div>
													<span class="help-block"></span>
													<br/>
													<div id="center">
                    									<div class="g-recaptcha" data-sitekey=<?php echo '"' . $captchapublickey . '"'; ?>></div></br>
                    								</div>
                    								<br/>
													<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
												</form>
											</div>
    									</div>
    									<div class="row omb_row-sm-offset-3">
    										<div class="col-xs-12 col-sm-3">
												<label class="checkbox">
													<input name="checkbox" id="checkbox-remember" type="checkbox" value="1" checked>Remember Me
												</label>
											</div>
											<div class="col-xs-12 col-sm-3">
												<p class="omb_forgotPwd">
													<a href="/login/forgot/">Forgot password?</a>
												</p>
											</div>	
										</div>
    								</div>
								</div>
							</div>
						</div>
				<!--</form>-->
				<div id="footer">
					<div id="center">
						<img alt="" height="100" src="https://vigilo.cf/res/logobackground.png" width="100" />
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