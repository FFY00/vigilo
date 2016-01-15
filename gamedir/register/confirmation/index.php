<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php require_once("../../../config/cfg.php"); ?>
<!DOCTYPE HTML>
<noscript>Your browser does not support JavaScript or it is disabled!</noscript>
<html>
<head>
	<title>Account Created</title>
		<!-- Meta TAGs -->
	<meta charset="UTF-8">
	<link rel="icon" href="/res/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/res/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/res/favicon.ico?v=2">
	<link rel="stylesheet" type="text/css" href="/res/style.css">
	<link rel="stylesheet" type="text/css" href="/res/main.css">
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<?php googleanalytics(); ?>
	</head>
	<body>
	<div id="wrapper">
<div class="container">
<div class="row">
<?php include_once('../../libs/php/vigilolibrary.php');
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
?>

<div id="footer">
	<center>
		<h6>
			<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
		</h6>
	</center>
</div>
</div>
</body>
</html>
EMAILCONFIRMATIONFAIL;
