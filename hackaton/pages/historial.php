<?php
try {
	session_start();
	if(isset($_SESSION["sesionEmpresa"]))
	{
		$empresa = $_SESSION["sesionEmpresa"];
	}else
	{
		header("Location: ../index.php?msg=Expiro la sesion");
	}
} catch (Exception $e) {
	header("Location: ../index.php?msg=Error");
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil empresa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script type="text/javascript">
		function logout()
		{
			if(confirm('¿Desea salir?'))
			{
				location.replace("logout.php");
			}
		}
		function perfil()
		{
			location.replace("perfil.php");
		}
		function comprar()
		{
			location.replace("comprar.php");
		}
		function aumentar()
		{
			document.formulario.txtCantidad.value++;
			calcular();
			return false;
		}
		function disminuir()
		{
			if(document.formulario.txtCantidad.value == 1)
			{
				alert("No se puede pedir menos de 1 código");
			}else
			{
				document.formulario.txtCantidad.value--;
			}
			calcular();
			return false;
		}
		function calcular()
		{
			document.formulario.txtTotal.value = document.formulario.txtCantidad.value * document.formulario.txtPrecio.value;
			return false;
		}
		function confirmar()
		{
			calcular();
			if (document.formulario.txtTotal.value > document.formulario.txtSaldo.value)
			{
				alert("El total excede su saldo");
				return false;
			}else
			{
				return confirm("¿Está seguro que desea confirmar su pedido?");
			}
		}
	</script>
</head>
<body>
<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-12">
			<center><img class="img-fluid" src="../img/banner.png"></center>
            <hr>
		</div>
	</div>
	<div class="row">
		<div style="height: 400px;float: left;border-right: 1px solid lightgrey" class="col-lg-2">
			<br>
			<br>
			<center>
				<table cellpadding="15">
					<tr><th><center><button onclick="return comprar()"  class="btn">Comprar códigos</button></center></th></tr>
					<tr><th><center><button disabled class="btn">Historial de códigos</button></center></th></tr>

				</table>
			</center>
		</div>
		<div class="col-lg-8">
			<center>
				<h1>Todos tus códigos antiguos</h1>
				<br>
				<table border="1" cellpadding="5" bgcolor="lightgrey">
					<tr>
						<th>#</th><th>Código</th><th>Fecha compra</th><th>Recompensa</th><th>Activo</th>
					</tr>
					<?php
						include 'conexionBD.php';
						$sql = 'select c.nroCodigo "nro", c.codigo "codigo", p.fecha "fecha",c.precio "precio",c.estado "estado" from codigo as c join pedido as p on c.nroPedido = p.nroPedido where p.correo = ?';
						$sentencia = $base->prepare($sql);
						$sentencia->execute(array($empresa["correo"]));
						foreach ($sentencia->fetchAll(PDO::FETCH_ASSOC) as $fila) {
							echo "<tr>";
							echo "<td>".$fila["nro"]."</td>";
							echo "<td>".$fila["codigo"]."</td>";
							echo "<td>".$fila["fecha"]."</td>";
							echo "<td>".$fila["precio"]."</td>";
							echo "<td>".$fila["estado"]."</td>";
							echo "</tr>";
						}
					?>
				</table>
			</center>
		</div>
		<div class="col-lg-2">
            <table align="right" cellpadding="10">
            	<tr><th><button onclick="return perfil()" class="btn">Perfil</button></th><th><button onclick="return logout()" class="btn">Cerrar sesión</button></th></tr>
            </table>
		</div>
	</div>
</div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
