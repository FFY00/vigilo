<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php require "../../../config/session.php"; ?>
<!DOCTYPE html>
	<html lang="en-US" prefix="og: http://ogp.me/ns#">
		<head>
		<?php 
			require_once("../../../config/cfg.php"); 
			require_once("../../../res/vigilolibrary.php");
				//Objects
			$configDatabase = new configDatabase();
			$configLinks = new configLinks();
			$configID = new configID();
			$configPath = new configPath();
			$vigiloHTML5 = new vigiloHTML5();
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
			$vigiloHTML5->head_default("Mobile", $configPath->root_remotepath, $configID->google_ua_id, $bg=0, $redirect=NULL); ?>
		</head>
		<body>
			<div id="wrapper">
				<div class="container">
					<div class="row">
						<div id="header">
							<div id="center">
								<h1>Mobile Incompatible</h1>
								<br>
							</div>
						</div>
					</div>
					<div id="content">
						<div id="center">
							<p>Now, vigilo can't support mobile web browsers or less 480px screen resolution, for logout follow <a href="/logout">this</a> link.</p>
							<br/>
							<?php echo '<img alt="" height="100" src="'.$configPath->root_remotepath.'/res/logobackground.png" width="100" />'; ?>
						</div>
					</div>
				</div>
				<?php $vigiloHTML5->footer_default($bg=0, $configLinks->facebook_page, $configLinks->facebook_link, $configLinks->twitter_page, $configLinks->twitter_link, $configLinks->googleplus_page, $configLinks->googleplus_link, $configLinks->email_page, $configLinks->email_link); ?>
			</div>
		</body>
	</html>