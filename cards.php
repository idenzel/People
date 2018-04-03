<?php
require(dirname(__FILE__) . "/globals/dbconnect.php");

	$query="select * from users_profile";
	$result=mysqli_query($con,$query);

	while($row=mysqli_fetch_array($result)){
echo "<div class='element-card'> <div class='front-facing'> <h1 class='abr'>" . $row['name'] . "</h1>"; 


	}

echo "</div>" . "</div>";

?>