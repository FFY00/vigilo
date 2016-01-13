//If protocolis HTTP refresh href in HTTPS protocol
if (window.location.protocol != "https:")
    window.location.href = "https:" + window.location.href.substring(window.location.protocol.length);
