<?php
session_start();
require(dirname(__FILE__) . "/globals/dbconnect.php");
include(dirname(__FILE__) . "/globals/globals.php");
if(!isset($_SESSION['login'])){
   header("location:$urlbase"."/people/index.php");
   die;
}
	if(isset($_REQUEST)){

	$nombre=$_POST['nombre'];
	$departamento=$_POST['departamento'];
	$puesto=$_POST['puesto'];
	$fecha_periodo1=$_POST['fecha_periodo1'];
	$fecha_periodo2=$_POST['fecha_periodo2'];
	$dias_solicitados=$_POST['dias_solicitados'];
	$pordisfrutar=$_POST['pordisfrutar'];
	$fechainicial=$_POST['fechainicial'];
	$fechafinal=$_POST['fechafinal'];
	$fechalaboral=$_POST['fechalaboral'];
	$jefe=$_POST['jefe'];
	$aprobacion_jefe='Pendiente';
	$aprobacion_rh='Pendiente';

	$query="insert into vacaciones (nombre,departamento,puesto,dias_periodo1,dias_periodo2,dias_solicitados,dias_disfrutar,fecha_disfrutar1,fecha_disfrutar2,fecha_regreso,jefe_inmediato,status_aprobacion_jefe,status_aprobacion_rh) values ('$nombre','$departamento','$puesto','$fecha_periodo1','$fecha_periodo2','$dias_solicitados','$pordisfrutar','$fechainicial','$fechafinal','$fechalaboral','$jefe','$aprobacion_jefe','$aprobacion_rh')";
	$save=mysqli_query($con,$query);

	
}


?>