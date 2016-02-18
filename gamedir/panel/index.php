<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php 
	require "../../config/session.php"; 
	require_once("../../config/cfg.php"); 
		//Objects
	$configDatabase = new configDatabase();
	$configLinks = new configLinks();
	$configID = new configID();
	$configPath = new configPath();

	if (!isset($_SESSION["s_usr"]) || !isset($_SESSION["s_pw"]))
	{
		header("Location: /login");
		exit;
	}
	else {
		$query = "SELECT * FROM users WHERE username='" . $_SESSION["s_usr"] . "' and password='".$_SESSION["s_pw"]."'";
		if(!(($configDatabase->db->query($query)->rowCount()) > 0))
		{
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
				var menuState = 0;
				/*
				Yb    dP 88  dP""b8 88 88      dP"Yb  
				 Yb  dP  88 dP   `" 88 88     dP   Yb 
				  YbdP   88 Yb  "88 88 88  .o Yb   dP  
				   YP    88  YboodP 88 88ood8  YbodP   
				*/
				if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) 
				{
    				// is mobile..
    				window.location.href = "mobile/";
				}
				if( screen.width <= 480 ) 
				{   
					// is mobile..
    				window.location.href = "mobile/";
				}
				$(function () {
    				setTimeout(function () {
        				$("#splash").fadeOut("slow", function () {
            				$("#aftersplash").show();
            				$.backstretch("imgs/bg.jpg");
            				document.getElementById("aftersplash_sound").play();
            				$("#dialog-welcome").dialog({
            					autoOpen: true,
            					show: "fade",
							    hide: "fade",
							    modal: false,
							    dialogClass: 'no-close',
							    title: 'Welcome to Vigilo OS'
            				}).css("font-size", "12px");
            				$("ul#menu").menu().hide();
            				$("#dialog-console").dialog({
							    autoOpen: false,
							    show: "fade",
							    hide: "fade",
							    modal: false,
							    open: function (ev, ui) {
							      $('#iframe-terminal').src = 'apps/console.php';
							    },
							    height: '300',
							    width: '450',
							    dialogClass: 'console',
							    resizable: false,
							    position: [10,10],
							    title: 'Terminal'
							});
        				});
    				}, 1750);
				});
				  
				function showMenu() {
					if(menuState == 0) {
						menuState = 1;
						$("ul#menu").menu().show().position({
				              my: "left top", 
				              at: "left bottom",
				              collision: "flipfit flipfit"
				        });
					} else if (menuState == 1) {
						$("ul#menu").menu().hide();
						menuState = 0;
					}

					return false;
				}
				$(document).click(function(e) {
				  	if( e.target.id != 'menu') {
				  		$("ul#menu").menu().hide();
				  		menuState = 0;
				  	}
				  	$("#dialog-welcome").dialog("close");

				});
				function showConsole() {
					$("#dialog-console").dialog("open");
    				return false;
				}
			</script>
      		<style>
      			/*
				Yb    dP 88  dP""b8 88 88      dP"Yb  
				 Yb  dP  88 dP   `" 88 88     dP   Yb 
				  YbdP   88 Yb  "88 88 88  .o Yb   dP 
				   YP    88  YboodP 88 88ood8  YbodP  
			 	  */
   
				#bg {
					position:fixed; 
					top:-50%; 
					left:-50%; 
					width:200%; 
					height:200%;
				}
				#bg img {
					position:absolute; 
					top:0; 
					left:0; 
					right:0; 
					bottom:0; 
					margin:auto; 
					min-width:50%;
					min-height:50%;
				}
				html {
				}
				#aftersplash {
		    		display: none;
		    		background: url(imgs/bg.jpg) no-repeat center center fixed; 
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
				}
				.fit { /* set relative picture size */
    				max-width: 100%;
    				max-height: 100%;
    				padding: 0;
    				margin: 0;
  				}
  				.center {
    				display: block;
    				margin: auto;
  				}
  				#status-div {
  					bottom:0;
      				left:0;
      				margin:0;
      				padding:0;
      				position:fixed;
      				width:100%;
  				}
  				#status {
      				background:#ffffff;
      				border-top:solid 1px #aaaaaa;
      				color: #000000;
    			}

    			#status div {
      				margin:0;
      				padding:3px;
    			}
				.statusright{
    				float:right;
				}
				.statusright span {
				    float:left;
				}
				.ui-dialog-title {
					font-size:12px;
				}
				.ui-menu { width: 150px; }
				iframe {
					border-style: none;
				}
				.console {
				    
				    background:#000000;
				}
				.ui-dialog .ui-dialog-content {
					padding: 0;
				}
				.no-close .ui-dialog-titlebar-close {
				  display: none;
				}
				.ui-dialog .ui-dialog-title {
				  text-align: center;
				  width: 100%;
				}
      		</style>
		</head>
		<body>
			<div id="wrapper">
				<div class="container">
					<div class="row">
						<div id="splash">
							<script>
								$.backstretch("imgs/bg.jpg");
							</script>
    						<div id="bg">
								<img class="center fit" src="imgs/splashscreen.jpg" alt="">
							</div>
						</div>
						<div id="aftersplash">
							<audio id= "aftersplash_sound">
 								<source src="sounds/splash_sound.oga" type="audio/ogg">
 								<source src="sounds/splash_sound.mp3" type="audio/mpeg">
							</audio>
							<div id="dialog-welcome" title="Welcome to Vigilo OS">
								<div style="text-align: center;">
									<p style="font-size:11px; text-align: center;">Welcome to Vigilo Operation System! It is here that you can simulate a hacker computer! Start hacking and enjoy this awesome web-based game!</p>
								</div>
							</div>
							<div id="dialog-console" title="Terminal">
								<iframe src="apps/console.php" id="iframe-terminal" width="441" height="253" allowfullscreen></iframe> 
							</div>
							<div id="status-div">
								<ul id="menu">
								         	<li><a href="#">Applications</a>
								            	<ul>
								               		<li><a href="#" onclick="showConsole()">Terminal</a></li>
								            	</ul>
								         	</li>
								         	<li><a href="#">About</a></li>
								         	<li><a href="/logout">Logout</a></li>
								      	</ul>
								<div id="status" style="font-size:14px;">
	      							<span>
	      								&nbsp;
	       			 					<img src="imgs/menu-btn.png" alt="" width="14" height="14" onclick="showMenu()" id="menu">
	      							</span>
	      							<span class="statusright">
		      							<b>
		      								<span id="time">
		      									<script>
		      										(function () {
		    											function checkTime(i) {
		        											return (i < 10) ? "0" + i : i;
		    											}
		    											function startTime() {
		        											var today = new Date(),
		            										h = checkTime(today.getHours()),
												            m = checkTime(today.getMinutes()),
												            s = checkTime(today.getSeconds());
		        											document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
		        											t = setTimeout(function () {
		            											startTime()
		        											}, 500);
		    											}
		    											startTime();
													})();
												</script>
											</span>
										</b>
										&nbsp;
										<span>
											&nbsp;
											<script type="text/javascript">
												function toggleFullScreen() {
												  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    // alternative standard method
												      (!document.mozFullScreen && !document.webkitIsFullScreen)) {               // current working methods
												    if (document.documentElement.requestFullScreen) {
												      document.documentElement.requestFullScreen();
												    } else if (document.documentElement.mozRequestFullScreen) {
												      document.documentElement.mozRequestFullScreen();
												    } else if (document.documentElement.webkitRequestFullScreen) {
												      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
												    }
												  } else {
												    if (document.cancelFullScreen) {
												      document.cancelFullScreen();
												    } else if (document.mozCancelFullScreen) {
												      document.mozCancelFullScreen();
												    } else if (document.webkitCancelFullScreen) {
												      document.webkitCancelFullScreen();
												    }
												  }
												}
											</script>
											<img src="imgs/fullscreen-btn.png" alt="" width="14" height="14" onclick="toggleFullScreen()">
										</span>
									</span>
	    						</div>
    						</div>
						</div>
					</div>
				</div>
			</div>
		</body>
	</html>