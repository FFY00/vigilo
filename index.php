<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<!DOCTYPE html>
	<html lang="en-US" prefix="og: http://ogp.me/ns#">
		<head>
		<?php 
			require_once("config/cfg.php"); 
			require_once("res/vigilolibrary.php");

			head_default("Home", $root_remotepath, $google_ua_id, $bg=1, $redirect=NULL); ?>
		</head>
		<body class="eupopup eupopup-top">
		<nav class="navbar navbar-default">
		<div class="container-fluid">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Brand</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Works</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
            <li>
              <a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">Sign in</a>
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="Email">Email</label>
                <input type="email" class="form-control" id="Email" placeholder="Email" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="Password" required />
              </div>
              <button type="submit" class="btn btn-success">Sign in</button>
            </form>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
    </div>
			<div id="wrapper"><br>
				<div id="center">
						<div class="container">
							<div class="row">
								<div id="header">
									<h1>Welcome to Vigilo!</h1>
									<p>Vigilo is a web-based hacking simulation game, where you play the role of a hacker seeking for money and power.</p><br>
								</div>
								<div id="content">
									<?php 
										echo '<a class="btn btn-primary btn-lg" href="'.$play_remotepath.'/login/">Login</a> ';
										echo '<a class="btn btn-success btn-lg" href="'.$play_remotepath.'/register/">Register</a>';
									?>
								</div>
							</div>
							<div id="terminal"></div>
							<?php footer_default($bg=0, $facebook_page, $facebook_link, $twitter_page, $twitter_link, $googleplus_page, $googleplus_link, $email_page, $email_link); ?>
						</div>
				</div>
			</div>
		</body>
	</html>
