<?php
session_start();
$usuario = $_SESSION['usuario'];
if (empty($usuario)) {
	header('Location: index.php');
}
setcookie("cookie", "mcs", time() + 1200);
?>
<html>
<head>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/home.js"></script>
</head>
<body>
	<button id="btnVolver">volver</button>
	<button id="btnData">Data</button>
	<div id="divUsuario">Hola <?=$usuario?></div>
	<div id="divToken"></div>
	<div id="divResponse"></div>
</body>
</html>