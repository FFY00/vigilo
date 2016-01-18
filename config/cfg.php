<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php
	//Databse Account Cerdentials
	$hostname = "";
	$username=  "";
	$password = "";
	$dbname =  "";

	//do connection
	//$mysqli = new mysqli($hostname, $username, $password, $dbname);

	// We're migrating from mysqli to PDO
	$db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	//google analytics ID
	/* To activate import googleanalytics() function */
	$google_ua_id="";

// return database name
/*
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    $dbresponse_name= $row[0];
    $result->close();
}
// return error in database connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
*/

	//api remote path
	$api_remotepath = ""; //Without / in the end of url

	//play remote path
	$play_remotepath = ""; //Without / in the end of url

	//api-check password
	$api_check_pw = "";

	//recaptcha
	$captchapublickey = "";
	$captchakey = "";

// change db to name_of_db db 
//$mysqli->select_db("name_of_db");
/*
// return name of current default database
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}*/

//$mysqli->close();

	function googleanalytics() {
		echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '". $google_ua_id ."', 'auto');
  ga('send', 'pageview');

</script>";
	}
?>
