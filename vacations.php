
<?php
session_start();
require(dirname(__FILE__) . "/globals/dbconnect.php");
include(dirname(__FILE__) . "/globals/globals.php");
if(!isset($_SESSION['login'])){
   header("location:$urlbase"."/people/index.php");
   die;
}
?>

<html>
<head>
	<title>Vacations</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--Cargamos JS-->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
  


 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

	<!--Cargamos CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/profilestyle.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<h3>Detalles de la solicitud</h3>
<a href=<?php echo "$urlbase" . "/people/home.php";  ?>><p>Volver a inicio</p></a>






</html>


<?php
$vacquery="select * from vacaciones where idvacacion=" . $_GET['idvacacion'];
$vacresult=mysqli_query($con,$vacquery);

while($vacrow=mysqli_fetch_array($vacresult)){

$idvacacion=$vacrow['idvacacion'];

 
              $nombre=$vacrow['nombre'];
              $departamento=$vacrow['departamento'];
              $puesto=$vacrow['puesto'];

               $diasperiodo1=$vacrow['dias_periodo1'];
              $diasperiodo2=$vacrow['dias_periodo2'];
              $diassolicitados=$vacrow['dias_solicitados'];
              $diasdisfrutar=$vacrow['dias_disfrutar'];

              
              $fechadisfrutar1=$vacrow['fecha_disfrutar1'];
              $fechadisfrutar2=$vacrow['fecha_disfrutar2'];
              $fecharegreso=$vacrow['fecha_regreso'];
              $jefeinmediato=$vacrow['jefe_inmediato'];
              $fechapeticion=$vacrow['fecha_peticion'];
              $status_aprobacion_jefe=$vacrow['status_aprobacion_jefe'];
              $status_aprobacion_rh=$vacrow['status_aprobacion_rh'];

echo "
		<form action='' method='POST'>
		<div class='panel panel-primary'>
		";

if($_SESSION['role_jefe']==1){
		if($status_aprobacion_jefe=="Aprobada" or $status_aprobacion_jefe=="Rechazada" ){
		echo    "		
		<button class='btn btn-warning pull-right' disabled>Rechazar</button>
		<button class='btn btn-success pull-right' disabled>Aprobar</button>
		";

		}
		else{



		echo    "		
				<button class='btn btn-warning pull-right' id='rechazar' name='rechazar'>Rechazar</button>
				<button class='btn btn-success pull-right' id='aprobar' name='aprobar'>Aprobar</button>
				";
		}

}
elseif($_SESSION['role_rh']==1){

		if($status_aprobacion_rh=="Aprobada" or $status_aprobacion_rh=="Rechazada" ){
		echo    "		
		<button class='btn btn-warning pull-right' disabled>Rechazar</button>
		<button class='btn btn-success pull-right' disabled>Aprobar</button>
		";

		}
		else{



		echo    "		
				<button class='btn btn-warning pull-right' id='rechazar' name='rechazar'>Rechazar</button>
				<button class='btn btn-success pull-right' id='aprobar' name='aprobar'>Aprobar</button>
				";
		}


}



echo 	"		
		<div class='panel-heading clickable'>
		
			<h3 class='panel-title'>Información</h3>
		</div>
		<div class='row'>
			<div class='col-sm-4'>
			<strong>Nombre:</strong>$nombre
			</div>
			<div class='col-sm-4'>
			<strong>Departamento:</strong>$departamento
			</div>
			<div class='col-sm-4'>
			<strong>Puesto:</strong>$puesto
			</div>
			<div class='col-sm-4'>
			<strong>Del periodo:</strong>$diasperiodo1 al $diasperiodo2
			</div>
			<div class='col-sm-4'>
			<strong>Días Solicitados:</strong>$diassolicitados
			</div>
			<div class='col-sm-4'>
			<strong>Días por disfrutar:</strong>$diasdisfrutar
			</div>
			<div class='col-sm-4'>
			<strong>A disfrutar del día:</strong>$fechadisfrutar1 al $fechadisfrutar2
			</div>
			<div class='col-sm-4'>
			<strong>Presentandose a laboral el día:</strong>$fecharegreso
			</div>
			<div class='col-sm-4'>
			<strong>Jefe inmediato:</strong>$jefeinmediato
			</div>
			<div class='col-sm-4'>
			<strong>Status de aprobación Jefe:</strong>$status_aprobacion_jefe
			</div>
			<div class='col-sm-4'>
			<strong>Status de aprobación RH:</strong>$status_aprobacion_rh
			</div>
		</div>

		

</form>
	  </div>






";


if(isset($_POST['aprobar']) && $_SESSION['role_jefe']==1 ){

$updatequery="update vacaciones SET status_aprobacion_jefe='Aprobada' where idvacacion=".$_GET['idvacacion'];
$updateresult=mysqli_query($con,$updatequery);

echo "<script>javascript:alert('Sucess');</script>";
//Refresco la pagina
header("Refresh:0");

}
elseif (isset($_POST['rechazar']) && $_SESSION['role_jefe']==1 ) {
	$updatequery="update vacaciones SET status_aprobacion_jefe='Rechazada' where idvacacion=".$_GET['idvacacion'];
$updateresult=mysqli_query($con,$updatequery);

echo "<script>javascript:alert('Sucess');</script>";
//Refresco la pagina
header("Refresh:0");

}

if(isset($_POST['aprobar']) && $_SESSION['role_rh']==1 ){

$updatequery="update vacaciones SET status_aprobacion_rh='Aprobada' where idvacacion=".$_GET['idvacacion'];
$updateresult=mysqli_query($con,$updatequery);

echo "<script>javascript:alert('Sucess');</script>";
//Refresco la pagina
header("Refresh:0");

}
elseif (isset($_POST['rechazar']) && $_SESSION['role_rh']==1 ) {
	$updatequery="update vacaciones SET status_aprobacion_rh='Rechazada' where idvacacion=".$_GET['idvacacion'];
$updateresult=mysqli_query($con,$updatequery);

echo "<script>javascript:alert('Sucess');</script>";
//Refresco la pagina
header("Refresh:0");

}

}


?>


