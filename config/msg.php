<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php require_once("cfg.php");
class MsgConfig {
	//Information message
	public function information_msg($title, $redirect_path, $redirect_time=5000) {
		echo '
<div id="header">
	<div id="center"><h1>'.$title.'</h1><br></div>
</div>
<div id="content">
<div id="center">
<p>If you are not redirected automatically, follow the <a href="'.$redirect_path.'">link</a>.</p>
</div>
<script type="text/javascript"> setTimeout("window.location.href = ' . $redirect_path. '", '.$redirect_time.'); </script>
<meta http-equiv="refresh" content="'.($redirect_time / 1000).';url='.$redirect_path.'">
</div>
</div>
';
		$vigiloHTML5_msgconfig = new vigiloHTML5();
		$configLinks_msgconfig = new configLinks();
		$vigiloHTML5_msgconfig->footer_default($bg=1, $configLinks_msgconfig->facebook_page, $configLinks_msgconfig->facebook_link, $configLinks_msgconfig->twitter_page, $configLinks_msgconfig->twitter_link, $configLinks_msgconfig->googleplus_page, $configLinks_msgconfig->googleplus_link, $configLinks_msgconfig->email_page, $configLinks_msgconfig->email_link);
	echo <<<END
			</div>
		</body>
	</html>
END;
	exit;
	}
}
?>