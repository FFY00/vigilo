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
			require_once("../../../config/cfg.php"); 
			require_once("../../../res/vigilolibrary.php");

			head_default("Password Recovery", $root_remotepath, $google_ua_id, $bg=1, $redirect=NULL); ?>
	</head>
	
	<body class="eupopup eupopup-top">
	<div id="wrapper">
<form class="form-horizontal" method="post">
<div class="container">
<div class="row">
<div id="header">
	<div id="center"><h1>Forgot your password?</h1><br></div>
</div>
<div id="content">
<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="email" placeholder="email" class="form-control input-md"> 
  <span class="help-block">Email of your forgotten account!</span>
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="btlogin" class="btn btn-info" formaction="#">Restore</button>
  </div>
</div>
</div>
</form>

<?php footer_default($bg=0, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link); ?>
</div>
</body>
