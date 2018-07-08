<?php
try {
	session_start();
	$_SESSION["sesionCliente"] = null;
	header("Location: login.php?msg=desconectado");

} catch (Exception $e) {
	header("Location: login.php?msg=desconectado");
}
?>
<h1>Cerrando sesión</h1>