<?php
try {
	session_start();
	if(isset($_SESSION["sesionCliente"]))
	{
		include 'conexionBD.php';
		$cliente = $_SESSION["sesionCliente"];
		$sql = "select saldo from CLIENTE  where user = ?";
		$sentencia = $base->prepare($sql);
		$sentencia->execute(array($cliente["user"]));
		$resultado = $sentencia->fetch();
	}else
	{
		header("Location: login.php?msg=Expiro la sesion");
	}
} catch (Exception $e) {
	header("Location: login.php?msg=Error");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perfil cliente</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script type="text/javascript">
		function logout()
		{
			if(confirm('¿Desea salir?'))
			{
				location.replace("logoutCliente.php");
			}
		}
	</script>
</head>
<body>

<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-12">
			<center><img class="img-fluid" src="../img/logo.png"></center>
		</div>
	</div>
	<div class="row" style="background-color: grey">
		<div class="col-lg-10">
            <h1 style="color: white">Bienvenido, <?php echo $cliente["nombre"]; ?></h1>
		</div>
		<div class="col-lg-2">
            <table align="right" cellpadding="10">
            	<tr><th><button disabled class="btn">Perfil</button></th><th><button onclick="return logout()" class="btn">Cerrar sesión</button></th></tr>
            </table>
		</div>		
	</div>
	<div class="row" style="background-color: lightgrey">
		<div class="col-lg-12" style="height: 500px">
        	<center>
        		<br>
        		<h2>Estado cuenta</h2>     		
        		<table border="1" cellpadding="5" bgcolor="white">
        			<tr>
        				<th>Tipo de cuenta</th>
        				<td><?php echo $cliente["tipoCuenta"]; ?></td>
        			</tr>
        			<tr>
        				<th>Saldo en tu cuenta</th>
        				<td><?php echo "$".$resultado["saldo"]; ?></td>
        			</tr>
        		</table>
        		<h5 style="color: red">
        			<?php
        				if(isset($_GET["msg"]))
						{
							echo $_GET["msg"];
						}
					?>
        		</h5>
        		<br>
        		<h2 style="color: red">¡Canjea tu código antes que te ganen!</h2>
        		<form method="post" action="actValidarCodigo.php">
        			<table>
        				<tr>
        					<th><input class="input-group-text" placeholder="Código" type="text" name="txtCodigo" required minlength="10"></th>
        					<th><input class="btn" type="submit" name="btnCanjear" value="Canjear"></th>
        				</tr>
        			</table>
        		</form>
        		<br>
        		<br>
        		<h2>Páginas con códigos activos</h2>
        		<h4><a href="empresa.php">Info Car SA</a></h4>
        	</center>
		</div>		
	</div>
</div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>