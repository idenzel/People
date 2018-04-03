<?php

	session_start();
include(dirname(__FILE__) . "/globals/globals.php");
require(dirname(__FILE__) . "/globals/dbconnect.php");

if(isset($_POST['login'])){

	$email=$_POST['email'];
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$password = md5($password);
	$query="select * from users_profile where email= '$email' AND password='$password'";

	$result=mysqli_query($con,$query);

	$row=mysqli_fetch_array($result);

	$count = mysqli_num_rows($result);


	if($count>0){

		$_SESSION['login'] = true;
		$_SESSION['username']=$row['name'];
		$_SESSION['type']=$row['usertype'];
		$_SESSION['myid']=$row['id'];
		$_SESSION['role_jefe']=$row['jefe_inmediato'];
		$_SESSION['role_rh']=$row['rh'];
		header("location: $urlbase" . "/people/home.php");


	}else{
		echo "<div class='alert alert-warning'>Correo o contraseña incorrecta</div>";

	}	

}


?>


<html>
<head>
	<title>People</title>
	<meta charset="utf-8">
	
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<link rel="stylesheet" href="styles/login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


	</head>
	<body>
	
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Por favor inicie sesión</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="" method="post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Correo electrónico" name="email" type="email" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Contraseña" name="password" type="password" required>
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<input hidden name="remember" type="checkbox" value="Remember Me"> 
			    	    	</label>
			    	    </div>
			    		<button class="btn btn-lg btn-success btn-block" value="Login" name="login">Iniciar sesión</button>
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>