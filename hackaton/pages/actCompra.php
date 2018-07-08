<?php
/*
Créditos por el generador de código a: http://www.inkuba.com/blog/generar-codigo-aleatorio-con-php/
*/
function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
	try {
		session_start();
		if (isset($_SESSION["sesionEmpresa"])) {
			if(isset($_POST["btnPagar"]))
			{
				include 'conexionBD.php';
				$empresa = $_SESSION["sesionEmpresa"];
				$sql = "select saldo from EMPRESA where correo = ?";
				$sentencia = $base->prepare($sql);
				$sentencia->execute(array($empresa["correo"]));
				$resultado = $sentencia->fetch();

				$cantidad = $_POST["txtCantidad"];
				$precio = $_POST["txtPrecio"];
				$total =  $cantidad * $precio;
				if ($total < $resultado["saldo"]) 
				{
					//actualiza saldo
					include 'conexionBD.php';
					$sql = "update empresa set saldo = saldo - ? WHERE correo = ?";
					$correo = $empresa["correo"];
					$sentencia = $base->prepare($sql);
					$sentencia->execute(array($total,$correo));
					//agrega pedido
					$sql = "insert INTO PEDIDO VALUES (null,now(),?)";
					$sentencia = $base->prepare($sql);
					$sentencia->execute(array($correo));
					//Agrega códigos
					for ($i=0; $i < $cantidad ; $i++) { 
						$sql = "insert INTO codigo values (null,?,?,'A',(SELECT MAX(nroPedido) FROM pedido))";
						$sentencia = $base->prepare($sql);
						$sentencia->execute(array(generarCodigo(10),$precio));
					}
					//gg
					header("Location: comprar.php?msg=Comprados");
				}else
				{
					header("Location: comprar.php?msg=Exede el maximo");
				}
			}else
			{
				header("Location: comprar.php");
			}
		}else
		{
			header("Location: ../index.php?msg=Expiro la sesion");
		}
	} catch (Exception $e) {
		header("Location: ../index.php?msg=Error");
	}
?>