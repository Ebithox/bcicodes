<?php
try {
session_start();
if(isset($_SESSION["sesionEmpresa"]))
{
	header("Location: perfil.php");
}else
{
	if (isset($_POST["btnLogin"])) {	
		include 'conexionBD.php';
		$sql = "select nombre, saldo from EMPRESA where correo = ? and pass = ?";
		$sentencia= $base->prepare($sql);
		$sentencia->execute(array($_POST["txtCorreo"],$_POST["txtPass"]));

		if ($sentencia->rowCount() > 0) {
			$resultados = $sentencia->fetch();
			$empresa = array("nombre"=>$resultados["nombre"],"saldo"=>$resultados["saldo"],"correo"=>$_POST["txtCorreo"]);
			$_SESSION["sesionEmpresa"] =  $empresa;
			header("Location: perfil.php");

		}else
		{
			header("Location: ../index.php?msg=Datos incorrectos");
		}
	}else
	{	
		header("Location: ../index.php");	
	}
}
} catch (Exception $e) {
	header("Location: ../index.php?msg=Error");
}
?>