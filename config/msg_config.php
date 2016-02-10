<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php 
class MsgConfig {
	//Error Captcha message
	public static function error_captcha() {
		echo <<<END
<div id="header">
	<div id="center"><h1>Wrong captcha, try again!</h1><br></div>
</div>
<div id="content">
<div id="center">
<p>If you are not redirected automatically, follow the <a href="/register">link</a>.</p>
</div>
<script type="text/javascript"> setTimeout("window.location.href = ' . "'/register'" . '", 5000); </script>
<meta http-equiv="refresh" content="5;url=/register">
</div>
</div>
END;
		footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link);
	echo <<<END
			</div>
		</body>
	</html>
END;
	exit;
	}
}
?>