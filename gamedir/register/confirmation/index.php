<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
			require_once("../../../config/cfg.php"); 
			require_once("../../../res/vigilolibrary.php");

			head_default("...", $root_remotepath, $google_ua_id, $bg=0, $redirect=NULL); ?>
	</head>
	<body>
	<div id="wrapper">
<div class="container">
<div class="row">
<?php 
$confirm_email_key=$_GET["key"];

$query = "SELECT * FROM users WHERE confirmkey='" . $confirm_email_key . "'";
if(($db->query($query)->fetchColumn()) > 0){
    echo <<<EMAILCONFIRMATION
<div id="header">
	<center><h1>Email confirmed!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
EMAILCONFIRMATION;

try {
	$sql = "UPDATE users SET confirmkey='". $confirm_email_key . "x" ."', confirmed='1'
WHERE confirmkey='". $confirm_email_key ."'; ";
	$db->exec($sql);
	}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

	
echo <<<EMAILCONFIRMATIONFAIL
<div id="header">
	<center><h1>Email confirmation key not founded!</h1><br>
</div>
<div id="content">
<center>
<p>If you are not redirected automatically, follow the <a href="/login">link</a>.</p>
</center>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/login'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/login">
</div>
</div>
';
EMAILCONFIRMATIONFAIL;

?>

<?php footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link); ?>
</div>
</body>
</html>