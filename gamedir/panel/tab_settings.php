<!-- 
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP 
   YP    88  YboodP 88 88ood8  YbodP  
-->
<?php 
class TabTitle {
	public function set($title) {
		if($title == "dashboard") {
			return "Dashboard";
		}
		else {
			return "Panel";
		}
	}
}


?>