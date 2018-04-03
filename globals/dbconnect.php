<?php
$hostname="localhost";
$username="root";
$password="";
$db="people";

$con=mysqli_connect($hostname,$username,$password,$db) or die;

if(mysqli_connect_errno()){
echo "Failed to connect to MySQL:" . mysqli_connect_error();
echo "<script> alert('Fallo la conexión');</script>";
}



?>