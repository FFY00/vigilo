/*
Yb    dP 88  dP""b8 88 88      dP"Yb  
 Yb  dP  88 dP   `" 88 88     dP   Yb 
  YbdP   88 Yb  "88 88 88  .o Yb   dP  
   YP    88  YboodP 88 88ood8  YbodP   -js
*/

//If protocolis HTTP refresh href in HTTPS protocol
if (window.location.protocol != "https:")
    window.location.href = "https:" + window.location.href.substring(window.location.protocol.length);