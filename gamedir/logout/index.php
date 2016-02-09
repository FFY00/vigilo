<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Vigilo &bull; Logout</title>
</head>
<body>
<p>...</p>
</body>
</html>
<?php
   unset($_SESSION["s_usr"]);
   unset($_SESSION["s_pw"]);
   session_unset();
   session_destroy();
   header("Location: /login");
?>