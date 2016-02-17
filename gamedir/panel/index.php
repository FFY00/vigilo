<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php require "../../config/session.php"; 
require_once("../../config/cfg.php"); 
	//Objects
			$configDatabase = new configDatabase();
			$configLinks = new configLinks();
			$configID = new configID();
			$configPath = new configPath();

if (!isset($_SESSION["s_usr"]) || !isset($_SESSION["s_pw"])){
	header("Location: /login");
	exit;
}
else {
	$query = "SELECT * FROM users WHERE username='" . $_SESSION["s_usr"] . "' and password='".$_SESSION["s_pw"]."'";
	if(!(($configDatabase->db->query($query)->rowCount()) > 0)){
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
			$vigiloTools = new vigiloTools();
			$vigiloHTML5 = new vigiloHTML5();
			$vigiloHTML5->head_default($tabtitle->set($panel_tab), $configPath->root_remotepath, $configID->google_ua_id, $bg=0, $redirect=NULL); 
			?>
		<script>
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) 
			{
    			// is mobile..
    			window.location.href = "mobile/";

			}
			if( screen.width <= 480 ) 
			{     
    			window.location.href = "mobile/";
			}
		</script>
	</head>
	<body>
	<div id="wrapper">
<div class="container">
<div class="row">
<?php $vigiloHTML5->footer_default($bg=1, $configLinks->facebook_page, $configLinks->facebook_link, $configLinks->twitter_page, $configLinks->twitter_link, $configLinks->googleplus_page, $configLinks->googleplus_link, $configLinks->email_page, $configLinks->email_link); ?>
</div>
</body>
</html>
