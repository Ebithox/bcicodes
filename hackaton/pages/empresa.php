<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Página de empresa promedio</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script type="text/javascript">
		var contador = 0;

		function aparecer()
		{	

			if(contador % 3 == 0)
			{
				document.getElementById("div").style.visibility = 'visible';
			}else
			{
				document.getElementById("div").style.visibility = 'hidden';
			}
			contador++;
		}

		function actuar()
		{
			myVar = setInterval(aparecer, 1500);
		}
	</script>
</head>
<body onload="actuar()" style="background-color: grey">

<div class="col-lg-12">
	<div class="row">
		<div class="col-lg-12">
			<center>
			<br>
			<img  src="../img/logoinfoauto.png">
			<br>
			<br>
			<br>
			<h1 style="color: white">Tu página de noticias, siempre actualizada</h1></center>
			<br>
			<br>
			<br>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div id="div"  style="bottom:10px;width: 160px;height: 100px;background-color: white;position: fixed;visibility: hidden;">
				<center>
					<b>¡Canjea rápido este código <a href="login.php">aqui</a>!</b><br>
					<b id="texto" style="color: red">
						<?php
						try {
							include 'conexionBD.php';
							$sql = "select max(codigo) codigo from codigo where estado = 'A'";
							$sentencia = $base->prepare($sql);
							$sentencia->execute(array());
							$resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
							$codigo = $resultado["codigo"];
							echo $codigo;
						} catch (Exception $e) {
							echo $e->getMessage();
						}
						?>
					</b>
				</center>
			</div>
			<center>
				<table>
					<tr>
						<td><img  src="../img/auto1.jpg" class="img-thumbnail" width="480" height="720"></td>
						<td><img  src="../img/auto2.jpg" class="img-thumbnail" width="480" height="720"></td>
					</tr>
					<tr>
						<td colspan="2">
							<center><h3 style="color: white">Todo lo relacionado al mundo de la mecánica, en este, tu sitio de noticias</h3>
							</center>
						</td>
					</tr>
				</table>
			</center>
			<br>
			<br>
			<center>
				<table>
					<tr>
						<td><img  src="../img/auto3.jpg" class="img-thumbnail" width="480" height="720"></td>
						<td><img  src="../img/auto4.jpg" class="img-thumbnail" width="480" height="720"></td>
					</tr>
					<tr>
						<td colspan="2">
							<center><h3 style="color: white">Suscribete a nuestro boletín enviando un correo a: <b style="color: red">correofalso@noexiste.com</b></h3>
							</center>
						</td>
					</tr>
				</table>
			</center>
			<br>
			<br>
			<br>
			<center>
				<table>
					<tr>
						<td><img  src="../img/auto5.jpg" class="img-thumbnail" width="480" height="720"></td>
						<td><img  src="../img/auto6.jpg" class="img-thumbnail" width="480" height="720"></td>
					</tr>
					<tr>
						<td colspan="2">
							<center><h3 style="color: white">Muchas gracias a AngelHack por la invitación, son los mejores 
								<b style="color: blue">&#9829;</b>
								<b style="color: red">&#9829;</b>
								<b style="color: yellow">&#9829;</b>
								<b style="color: green">&#9829;</b>
							</h3>
							</center>
						</td>
					</tr>
				</table>
			</center>
		</div>
	</div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>