<?php

require(dirname(__FILE__) . "/globals/dbconnect.php");
include(dirname(__FILE__) . "/globals/globals.php");

$urlhome=$urlbase . "/people/home.php";

$query="delete from users_profile where id=". $_GET['id'];

$result=mysqli_query($con,$query);

echo "<h3>Success</h3>";


header('Refresh: 3; URL='.$urlbase. '/people/home.php');

?>