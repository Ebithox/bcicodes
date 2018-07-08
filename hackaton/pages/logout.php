<?php
try {
	session_start();
	$_SESSION["sesionEmpresa"] = null;
	header("Location: ../index.php?msg=desconectado");

} catch (Exception $e) {
	header("Location: ../index.php?msg=desconectado");
}
?>
<h1>Cerrando sesión</h1>