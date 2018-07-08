<?php

try {
	session_start();
	if (isset($_SESSION["sesionCliente"])) {
		if(isset($_POST["btnCanjear"]))
		{
			$cliente = $_SESSION["sesionCliente"];
			include 'conexionBD.php';
			$codigo = $_POST["txtCodigo"];
			$sql = "select precio, codigo from codigo where codigo = ? and estado = 'A'";
			$sentencia = $base->prepare($sql);
			$sentencia->execute(array($codigo));
			if($sentencia->rowCount() > 0)
			{
				$resultado = $sentencia->fetch();
				$monto = $resultado["precio"];
				$sql = "update codigo set estado = 'C' where codigo = ?";
				$sentencia = $base->prepare($sql);
				$sentencia->execute(array($codigo));
				$sql = "update cliente set saldo = saldo + ? where user = ?";
				$sentencia = $base->prepare($sql);
				$sentencia->execute(array($monto,$cliente["user"]));
				header("Location: perfilCliente.php?msg=Codigo canjeado con exito, se han agregado ".$monto." a tu cuenta, visita mas empresas para seguir ganando!");
			}else
			{
				header("Location: perfilCliente.php?msg=Este codigo no existe o ya fue canjeado, ¡Visita mas paginas para seguir ganando");
			}
		}else
		{
			header("Location: perfilCliente.php");
		}
		}else
	{
		header("Location: login.php?msg=Expiro la sesion");
	}
} catch (Exception $e) {
	echo $e->getMessage();
	//header("Location: perfilCliente.php?msg=Error");
}
?>