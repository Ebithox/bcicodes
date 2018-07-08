<?php
try {
	session_start();
	if(isset($_SESSION["sesionEmpresa"]))
	{
		include 'conexionBD.php';
		$empresa = $_SESSION["sesionEmpresa"];
		$sql = "select saldo from EMPRESA where correo = ?";
		$sentencia = $base->prepare($sql);
		$sentencia->execute(array($empresa["correo"]));
		$resultado = $sentencia->fetch();
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
		function historial()
		{
			location.replace("historial.php");
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
			return confirm("¿Está seguro que desea confirmar su pedido?");
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
					<tr><th><center><button disabled class="btn">Comprar códigos</button></center></th></tr>
					<tr><th><center><button onclick="return historial()" class="btn">Historial de códigos</button></center></th></tr>

				</table>
			</center>
		</div>
		<div class="col-lg-8">
			<center>
				<h1>Nueva compra</h1>
				<h5 style="color: red">
					<?php
						if(isset($_GET["msg"]))
						{
							echo $_GET["msg"];
						}
					?>
				</h5>
				<h4>Tu saldo es de:
					<?php
						echo "$".$resultado["saldo"];
					?>
				</h4>
				<form onsubmit="return confirmar()" name="formulario" action="actCompra.php" method="post">
					<table border="1" cellpadding="5">
						<tr>
							<th bgcolor="lightgrey">Monto por código</th>
							<th bgcolor="lightgrey">Cantidad de códigos</th>
							<th bgcolor="lightgrey">Total</th>
						</tr>
						<tr>
							<td>
								<center>
									<?php
										echo "<input type='number' name='txtSaldo' hidden value='".$resultado["saldo"]."'>";
									?>
									<input onchange="return calcular()"  min="1" required="" type="number" name="txtPrecio" class="input-group-text" style="width: 100px">
								</center>
							</td>
							<td>
								<button onclick="return disminuir()" class="btn" style="margin-left: 10px;float: left;">-</button>

								<input type="number" name="txtCantidad" value="1" style="margin-left: 10px;float: left;width: 60px" min="1" readonly="" class="input-group-text">

								<button onclick="return aumentar()" class="btn" style="margin-left: 10px;float: left;">+</button>
							</td>
							<td>
								<center>
									<input readonly style="width: 100px" class="input-group-text" type="number" name="txtTotal">
								</center>
							</td>
						</tr>
						<tr>
							<th colspan="3">
								<center>
									<input type="submit" class="btn" name="btnPagar" value="Pagar">
								</center>
							</th>
						</tr>
					</table>
				</form>
				<br>
				<h3><a href="empresa.php">Ir a la página</a></h3>
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
