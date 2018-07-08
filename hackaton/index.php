<?php
try {
  session_start();
  if(isset($_SESSION["sesionEmpresa"]))
  {
    header("Location: pages/perfil.php");
  }
  
} catch (Exception $e) {
  header("Location: index.php?msg=Error");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BCI Coins</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>


<div class="col-lg-12">
   <div class="row">
        <div class="col-lg-12">
            <center><img class="img-fluid" src="img/banner.png"></center>
            <hr>  
        </div>
   </div>
   <div class="row">
       <div class="col-lg-12">
           <center>
             <br>
             <form method="post" action="pages/actLogin.php">
                 <h1>Login empresas</h1>
                 <br>
                 <table cellpadding="5">
                     <tr>
                         <th>
                            <center><input class="input-group-text" type="mail" required minlength="" name="txtCorreo" placeholder="Correo" ></center>
                             
                         </th>
                     </tr>
                     <tr>
                         <th>
                            <center><input class="input-group-text" type="password" required minlength="3" name="txtPass" placeholder="Contraseña" ></center>
                             
                         </th>
                     </tr>
                     <tr>
                         <th>
                            <center>
                                <input class="input-group-text" type="submit" value="Ingresar" name="btnLogin">
                            </center>
                         </th>
                     </tr>
                     <tr>
                         <th>
                             <center>¿Aún no tienes cuenta?<a href="#">Registrate</a><br>
                              ¿No eres una empresa?<a href="pages/login.php">Inicia sesión como cliente</a>
                            </center>
                         </th>
                     </tr>  
                 </table>
             </form>
           </center>
       </div>
   </div>
   <div class="row" >
       <div  class="col-lg-12" style="background-color: #272727;position: fixed;bottom: 0px">
           <center >
            <div style="float: left;" class="col-lg-2">
                <img class="img-fluid" src="https://bci.modyocdn.com/uploads/514696fd-0a39-4e79-b773-ebf68aa75bbd/original/bci-logo_white.png" width="100px" height="70px">
            </div><div class="col-lg-10"><b style="color: white">Mesa Central: 22692 7000, Av. El Golf 125, Las Condes, Santiago. Notificaciones Legales: Agustinas 1161, 7° piso. Santiago Centro, Santiago.
Infórmese sobre la garantía estatal de los depósitos en su banco o en www.sbif.cl</b>    </div>            
            

           </center>
       </div>
   </div> 
</div>
	








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>