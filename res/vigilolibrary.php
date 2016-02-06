<?php 
/*
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
*/

function randpass() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function emailkey() {
	$random_password = randpass();
	$random_number = rand();
	$datetime = date("w-Y.d.m:t-H::i::s");
	$str = $datetime . $random_password . $random_number;
	return md5($str);
}

function head_default($title, $rootpath, $googleanalyticsid, $bg=0, $redirect=NULL) {
  $description="Web-Based Hacking simulation game";
  echo '
      <!--[if IE]>
      <meta content="true" name="MSSmartTagsPreventParsing">
        <meta content="false" http-equiv="imagetoolbar">
      <![endif]-->

      <!--[if !IE]><script>fixScale(document);</script><![endif]-->

    <!--[if lt IE 7]>
      <style type="text/css">
        #wrapper { height:100%; }
        #footer {
        position:fixed;
        bottom:0; }
      </style>
    <![endif]-->

    <!--[if lt IE 9]>
      <script src="res/reveal-js/lib/js/html5shiv.js"></script>
      <script src="http://html5shiv-printshiv.googlecode.com/svn/trunk/html5shiv-printshiv.js"></script>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> 
    <![endif]-->

      <title>Vigilo &bull; '.$title.'</title>
        <!-- Meta TAG'."'".'s -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!-- Apple Phones Optimization -->
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
      <meta name="description" content="'.$description.'">
      <meta content="hacking, hack, vigilo, vigiloproject, game, simulator, web-based game" name="keywords">
      <meta name="author" content="VigiloProject">
      <meta name="reply-to" content="vigiloproject@gmail.com">
      <meta name="referrer" content="origin">
      <meta name="generator" content="VigiloLibrary"/>
      <meta name="robots" content="index, noodp, follow"/>
      <meta name="googlebot" content="index, noodp, follow" >
      <meta name="Slurp" content="index, noodp, follow, noydir">
      <meta name="bingbot" content="index, noodp, follow" >
      <meta name="fragment" content="!" >
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <meta http-equiv="content-language" content="en_US">
      <meta charset="UTF-8">

      <meta name="distribution" content="web">
      <link rel="profile" href="http://gmpg.org/xfn/11">
      <meta property="og:locale" content="en_US"/>
      <meta property="og:locale:alternate" content="en" />
      <meta property="og:locale:alternate" content="en_GB" />
      <meta property="og:type" content="website"/>
      <meta property="og:title" content="Vigilo &bull; '.$title.'"/>
      <meta property="og:description" content="'.$description.'"/>
      <meta property="og:url" content="'.$rootpath.'"/>
      <meta property="og:site_name" content="Vigilo"/>
      <meta name="twitter:card" content="summary"/>
      <meta name="twitter:description" content="'.$description.'"/>
      <meta name="twitter:title" content="Vigilo &bull; '.$title.'"/>

      <meta name="google" content="nositelinkssearchbox" />';

      if(!($redirect==NULL)) {
        echo '<meta http-equiv="refresh" content="3;url='.$redirect.'">';
      }

      echo '
      <link rel="icon" href="'.$rootpath.'/res/favicon.ico" type="image/x-icon"/>
      <link rel="shortcut icon" href="'.$rootpath.'/res/favicon.ico" type="image/x-icon"/>
      <link rel="shortcut icon" href="'.$rootpath.'/res/favicon.ico">

      <link rel="stylesheet" type="text/css" href="'.$rootpath.'/res/style.css">';

      if($bg==1) {
        echo '<link rel="stylesheet" type="text/css" href="'.$rootpath.'/res/background.css">';
      }
      echo '
      <script src="'.$rootpath.'/res/jquery/jquery-1.12.0.min.js"></script>
      <!-- <script src="'.$rootpath.'/res/jquery/jquery-2.2.0.min.js"></script> -->

      <script src="https://www.google.com/recaptcha/api.js"></script>

      <link rel="stylesheet" type="text/css" href="'.$rootpath.'/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.css"/>
      <script src="'.$rootpath.'/res/jquery-eu-cookie-law-popup/jquery-eu-cookie-law-popup.js"></script>

      <link href="'.$rootpath.'/res/bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="'.$rootpath.'/res/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link type="text/css" href="'.$rootpath.'/res/normalize/normalize.css" rel="stylesheet">
      <script src="'.$rootpath.'/res/bootstrap/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

      <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

      <script src="'.$rootpath.'/res/vigilo-js/index.js"></script>
      '."
      <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '". $googleanalyticsid ."', 'auto');
  ga('send', 'pageview');

</script>";

if(!($redirect==NULL)) {
        echo '<script type="text/javascript"> setTimeout("window.location.href='.$redirect.', 5000"); </script>';
      }

  echo '
  <noscript>
        <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <span><strong>Notice: </strong> Sorry, but Vigilo does not work if you do not have Javascript enabled. Your browser does not support JavaScript or it is disabled! <a href="http://enable-javascript.com/" class="alert-link">Please Enable JavaScript Safley</a>.</span>
            </div>
      </noscript>
      ';
}

function footer_default($bg=1, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link) {
  echo '<div id="footer">
          <div id="center">';
  if($bg==1) {
        echo '<img alt="" height="100" src="https://vigilo.cf/res/logobackground.png" width="100" />';
      }
  echo '
            <h6>
              <b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
              <div class="text-center center-block">';
                      if($facebook_page==1)
                      {
                        echo '<a href="'.$facebook_link.'"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>';
                      }
                      if($twitter_page==1)
                      {
                        echo '<a href="'.$twitter_link.'"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>';
                      }
                      if($googleplus_page==1)
                      {
                        echo '<a href="'.$googleplus_link.'"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>';
                      }
                      if($email_page==1)
                      {
                        echo '<a href="mailto:'.$email_link.'"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>';
                      }
  echo '
              </div>
            </h6>
          </div>
        </div>';
}

?>