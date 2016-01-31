<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php 

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

function googleanalytics($id) {
        echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '". $id ."', 'auto');
  ga('send', 'pageview');

</script>";
    }

function html5_ie() {
  echo '<!--[if IE]>
      <meta content="true" name="MSSmartTagsPreventParsing">
        <meta content="false" http-equiv="imagetoolbar">
      <![endif]-->

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
    <![endif]-->';
}
?>