<?php 
	$saludo = "Hola php";
	if(session_status()==2){
		session_destroy();
	}
	setcookie("cookie", "mcs", time() + 1200);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
</head>
<body>
	<form id="form1">
		<input id="txtUser" name="username" type="text" placeholder="User">
		<input id="txtPassword" name="password" type="text" placeholder="Password">
	</form>
	<button id="btnLlamar">Ingresar</button>
	<div id="div1"></div>
	<div id="div2"><?=$saludo?></div>
</body>
</html>
