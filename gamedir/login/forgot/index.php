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
        //Objects
      $configLinks = new configLinks();
      $configID = new configID();
      $configPath = new configPath();
      $vigiloHTML5 = new vigiloHTML5();
			$vigiloHTML5->head_default("Password Recovery", $configPath->root_remotepath, $configID->google_ua_id, $bg=1, $redirect=NULL); ?>
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

<?php $vigiloHTML5->footer_default($bg=1, $configLinks->facebook_page, $configLinks->facebook_link, $configLinks->twitter_page, $configLinks->twitter_link, $configLinks->googleplus_page, $configLinks->googleplus_link, $configLinks->email_page, $configLinks->email_link); ?>
</div>
</body>
