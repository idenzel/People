<?php 
session_start();
include(dirname(__FILE__) . "/globals/globals.php");
require(dirname(__FILE__) . "/globals/dbconnect.php");

if(!isset($_SESSION['login'])){
   header("location:$urlbase"."/people/index.php");
   die;
}

if(isset($_POST['btnpedido'])){

$usuario=$_SESSION['username'];
$cocina=$_POST['cocina'];
$pedido=$_POST['pedido'];

$insertar="insert into comida(cocina,peticion,usuario) values ('$cocina','$pedido','$usuario')";

$salvar=mysqli_query($con,$insertar);

echo "<script>javascript:alert('Petición guardada' ); </script>";

}



?>

<html>
<head>
	
	<title>Menú del día</title>
	<meta charset="utf-8">
	<meta http-equiv="content-language" content="es">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
	<!--Cargamos CSS-->
<link rel="stylesheet" href="styles/userprofile.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
<script>
$(document).ready(function() {
    $('#menu1').click(function(e) {  
      
      window.location.href="upload/menu.pdf";
    });
    $('#menu1').hover(function(){
    	$(this).css("cursor", "pointer");

    });
 	$('#menu2').click(function(e) {  
        window.location.href="upload/menu2.pdf";
    });
    $('#menu2').hover(function(){
    	$(this).css("cursor", "pointer");

    });


});

</script>




	<a href="<?php echo $urlbase . "/people/home.php"?>"><h4>Volver a inicio</h4></a>
	<div class="container">

		<div class="row">
			<div id="menu1" style="margin-top: -80%;margin-left: 6%;background-color: white;width: 300px;height: 100px;box-shadow: 0px 1px 9px 0px rgba(0,0,0,0.75);">
				<div style="text-align: center;color: #3498db;"><h2>Menú Socorrito</h2></div>
			</div>


		</div>
		<div class="row">
			<div id="menu2" style="margin-top: -80%;margin-left: 20%;background-color: white;width: 300px;height: 100px;box-shadow: 0px 1px 9px 0px rgba(0,0,0,0.75);">
				<div style="text-align: center;top: 20%;color: #3498db;"><h2>Menú Morena Mia</h2>
					</div>

			</div>


		</div>

<form id="comidafrm" action="" method="POST">
	<div class="form-group" style="position:absolute;top:50%;left: 10%;width: 100%;" >
		<label for"cocina">Selecciona la Cocina</label>
		<select class="form-control" id="cocina" name="cocina">
			<option>Socorrito</option>
			<option>Morena Mia</option>

		</select>
  <label for="comment">Escribe tu pedido:</label>
  <textarea class="form-control" rows="5" id="pedido" name="pedido" placeholder="¿Qué pediras el día de hoy?" ></textarea>
  <button class="btn btn-default" id="btnpedido" name="btnpedido">Enviar Pedido</button>
</div>

</form>

	</div>



</body>






</html>