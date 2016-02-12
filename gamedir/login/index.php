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
			require_once("../../config/cfg.php"); 
			require_once("../../res/vigilolibrary.php");

			head_default("Login", $root_remotepath, $google_ua_id, $bg=0, $redirect=NULL); ?>
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
			    								<form name="login" role="form" class="omb_loginForm" action="/login/validation/" autocomplete="off" method="POST">
													<div class="form-group has-feedback has-feedback-left">
														<input type="text" class="form-control" name="usr" id="usr" placeholder="username">
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
				<?php footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link); ?>
			</div>
		</body>
	</html>