<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php
class configDatabase {
	//do connection
	//$mysqli = new mysqli($hostname, $username, $password, $dbname);
	
				//Databse Account Cerdentials
			private $hostname = "localhost";
			private $username=  "root";
			private $password = "root";
			private $dbname =  "vigilo";
			
			public $db;
            // We're migrating from mysqli to PDO
			public function __construct()
  { 
			$this->db = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  }
			

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
}
	
class configID {
	//google analytics ID
	/* To activate import googleanalytics() function */

	public $google_ua_id="UA-00000-0";

	//For facebook app ID
	public $facebook_app_id="";

	//recaptcha
	public $captchapublickey = "";
	public $captchakey = "";

	public $cookies = "vigiloid";
}

class configPath {
	//api remote path
	public $api_remotepath = ""; //Without / in the end of url

	//play remote path
	public $root_remotepath= ""; //Without / in the end of url
	public $play_remotepath = ""; //Without / in the end of url

	//api-check password
	public $api_check_pw = "";
}

class configLinks{
//Facebook Social Button
public $facebook_page=0;
public $facebook_link="";

//Twitter Social Button
public $twitter_page=0;
public $twitter_link="";

//Google+ Social Button
public $googleplus_page=0;
public $googleplus_link="";

//Email Social Button
public $email_page=0;
public $email_link="";
}
?>
