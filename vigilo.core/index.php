<script src="/res/https.js"></script>
<style>
html,
body {
	margin:0;
	padding:0;
	height:100%;
}
#wrapper {
	min-height:100%;
	position:relative;
}
#header {
}
#content {
	padding-bottom:100px;   /* Height of the footer element */
}
#footer {
	width:100%;
	height:100px;
	position:absolute;
	bottom:0;
	left:0;
}
body {
  /* Location of the image */
  background-image: url(/res/logobackground.png);
  
  /* Background image is centered vertically and horizontally at all times */
  background-position: center center;
  
  /* Background image doesn't tile */
  background-repeat: no-repeat;
  
  /* Background image is fixed in the viewport so that it doesn't move when 
     the content's height is greater than the image's height */
  background-attachment: fixed;
  
  /* This is what makes the background image rescale based
     on the container's size */
  background-size: contain;
  
  /* Set a background color that will be displayed
     while the background image is loading */
  background-color: #464646;
}

@media only screen and (max-width: 767px) {
  body {
    /* The file size of this background image is 93% smaller
       to improve page load speed on mobile internet connections */
    background-image: url(/res/logobackground.png);
  }
}
</style>
<?php

?>
<html>
<head>

	<!--[if lt IE 7]>
		<style type="text/css">
			#wrapper { height:100%; }
			#footer {
			position:fixed;
			bottom:0; }
		</style>
	<![endif]-->
	
	
		<!-- Meta TAG's -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<link rel="icon" href="/res/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/res/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="/favicon.ico?v=2">
		<!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="res/style.css"> 
	<link rel="stylesheet" type="text/css" href="res/main.css"> 
		<!-- Scripts -->
	<script src="res/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/bootstrap/js/bootstrap.min.js"></script>
	<script src="res/smoothscroll.js"></script>
		<!-- Bootstrap -->
	<link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	
	<body>
	<div id="wrapper">
<form class="form-horizontal" method="post">
<fieldset>
<div class="container">
<div class="row">
<div id="header">
	<center><h1>User Area</h1><br></center>
</div>
<div id="content">
<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="username" class="form-control input-md"> 
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput"></label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="password" placeholder="password" class="form-control input-md">
  <center><span class="help-block"><a href="#">Forgot your password?</a></span></center>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <button id="btlogin" class="btn btn-info" formaction="#">Login</button>
	<button id="btregister" class="btn btn-success" formaction="#">Register</button>
  </div>
</div>
</div>
</fieldset>
</form>

<div id="footer">
	<center>
		<h6>
			<b>Github: </b><a href="https://github.com/vigiloproject">https://github.com/vigiloproject</a>
		</h6>
	</center>
</div>
</div>
</body>