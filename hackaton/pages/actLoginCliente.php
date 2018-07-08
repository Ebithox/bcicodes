<?php
try {
session_start();
if(isset($_SESSION["sesionCliente"]))
{
	header("Location: perfilCliente.php");
}else
{
	if (isset($_POST["btnLogin"])) {	
		include 'conexionBD.php';
		$sql = "select nombreCompleto, saldo,tipoCuenta from CLIENTE where user = ? and pass = ?";
		$sentencia= $base->prepare($sql);
		$sentencia->execute(array($_POST["txtUser"],$_POST["txtPass"]));

		if ($sentencia->rowCount() > 0) 
		{
			$resultados = $sentencia->fetch();

			$cliente = array("nombre"=>$resultados["nombreCompleto"],"saldo"=>$resultados["saldo"],"tipoCuenta"=>$resultados["tipoCuenta"],"user"=>$_POST["txtUser"]);
			$_SESSION["sesionCliente"] = $cliente;
			header("Location: perfilCliente.php");

		}else
		{
			header("Location: login.php?msg=Datos incorrectos");
		}
	}else
	{	
		header("Location: login.php");	
	}
}
} catch (Exception $e) {
	header("Location: login.php?msg=Error");
}
?>