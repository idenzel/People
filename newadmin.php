<?php
session_start();
require(dirname(__FILE__) . "/globals/dbconnect.php");
include(dirname(__FILE__) . "/globals/globals.php");
if(!isset($_SESSION['login'])){
   header("location:$urlbase"."/people/index.php");
   die;
}
	if(isset($_REQUEST)){

	$myid=$_SESSION['myid'];
	$password=$_POST['nuevopass'];
	$password=md5($password);
	


	$query="update users_profile SET password='". "$password" . "' where id=". "$myid";
	$save=mysqli_query($con,$query);

	
}





?>