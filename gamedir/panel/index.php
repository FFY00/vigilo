<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php 
session_name("VigiloID");
session_start(); ?>
<?php require_once("../../config/cfg.php"); 
if (!isset($_SESSION["s_usr"]) || !isset($_SESSION["s_pw"])){
	header("Location: /login");
	exit;
}
else {
	$query = "SELECT * FROM users WHERE username='" . $_SESSION["s_usr"] . "' and password='".$_SESSION["s_pw"]."'";
	if(!(($db->query($query)->rowCount()) > 0)){
		header("Location: /logout");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
	<?php 
			$panel_tab = $_GET["tab"];
			require_once("../../res/vigilolibrary.php");
			require_once("tab_settings.php");
			$tabtitle = new TabTitle;

			$vigiloHTML5 = new vigiloHTML5();
			$vigiloHTML5->head_default($tabtitle->set($panel_tab), $root_remotepath, $google_ua_id, $bg=0, $redirect=NULL); 
			?>
	</head>
	<body>
	<div id="wrapper">
<div class="container">
<div class="row">
<?php $vigiloHTML5->footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link); ?>
</div>
</body>
</html>
