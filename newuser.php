

<?php
session_start();
require(dirname(__FILE__) . "/globals/dbconnect.php");
include(dirname(__FILE__) . "/globals/globals.php");

if(!isset($_SESSION['login'])){
   header("location:$urlbase"."/people/index.php");
   die;
}

if(isset($_POST['save'])){

$name=$_POST['name'];
$apellido=$_POST['lastname'];
$email=$_POST['email'];
$hire_date=$_POST['hire_date'];
$gender=$_POST['gender'];
$birthday=$_POST['birthday'];
$telephone=$_POST['telephone'];
$address=$_POST['address'];
$department=$_POST['department'];
$vacations=$_POST['vacations'];
$profile_pic= basename($_FILES['picture']['name']);
$password=$_POST['password'];
$usertype="user";
$puesto=$_POST['puesto'];

$target_dir = "img/";

$target_file = $target_dir . basename($_FILES['picture']['name']);
move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

if(isset($_POST['jefe'])){
$jefe=1;


}

else{
$jefe=0;

}

if(isset($_POST['rh'])){
$rh=1;


}

else{
$rh=0;

}

if(isset($_POST['admin'])){
$admin=1;
$usertype="admin";


}

else{
$admin=0;


}

    
$query="insert into users_profile (name,apellido,email,puesto,hire_date,gender,birthday,telephone,address,department,vacations,profile_pic,password,usertype,jefe_inmediato,rh,admin) values ('$name','$apellido','$email','$puesto','$hire_date','$gender','$birthday','$telephone','$address','$department','$vacations','$profile_pic',MD5('$password'),'$usertype','$jefe','$rh','$admin')";
    $save=mysqli_query($con,$query);



echo "<div id='footer' class='alert alert-success'>
  <strong>Success!</strong>
</div>";
}





?>

<html>
<head>
	<title>New User</title>
	<!--Cargamos JS-->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

	<!--Cargamos CSS-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/userprofile.css">

</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    
    <a class="navbar-brand" href="<?php echo $urlbase . "/people/home.php"?>">Dric People</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
   
    <div class="col-sm-3 col-md-3">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
   
  </div><!-- /.navbar-collapse -->
</nav>
<div class="container">
	<div class="row">
		 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="" style="background: #DCDCDC; border-radius: 5px; position: absolute; top:40px; width: 400px; left:35%;box-shadow: 3px 3px 3px #888888;">
            
                <!-- Address form -->
         
                <h2>User Profile</h2>
         
                <!-- first-name input-->
                <div class="control-group">
                    <label class="control-label">Nombre</label>
                    
                        <input id="name" name="name" type="text" placeholder="Nombre"
                        class="form-control" style="width: 150px;" required>
                        
                    
                </div>
                <div class="control-group">
                    <label class="control-label">Apellido</label>
                    
                        <input id="lastname" name="lastname" type="text" placeholder="Apellido"
                        class="form-control" style="width: 150px;" required>
                        
                    
                </div>
                
                
                <!-- last-name input-->
                <div class="control-group">
                    <label class="control-label">Fecha de contratación</label>
                    
                        <input id="hire_date" name="hire_date" type="date" placeholder="hire-date"
                        class="form-control" style="width: 150px;" required>
                        
                    
                </div>
                
                <!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="selectbasic">Género</label>
  
    <select id="gender" name="gender" class="form-control" style="width: 150px;">
      
      <option>Masculino</option>
      <option>Femenino</option>
    </select>
 
</div>

                <div class="control-group">
                                    <label class="control-label">Cumpleaños</label>
                  
                 
    			<input type="date" required class="form-control" style="width: 150px;" id="birthday" name="birthday">
                
			  
                </div>
                
                <!-- city input-->
                <div class="control-group">
                    <label class="control-label">Teléfono</label>
                    
                        <input id="telephone" name="telephone" type="text" placeholder="Telephone." class="form-control" style="width: 150px;">
                        
                    
                </div>
                
                <!-- city input-->
                <div class="control-group">
                    <label class="control-label">Dirección</label>
                    
                        <input id="address" name="address" type="text" placeholder="address" class="form-control" required>
                        
                    
                </div>

                 <div class="control-group">
                    <label class="control-label">Correo electrónico</label>
                    
                        <input id="email" name="email" type="email" placeholder="email" class="form-control" required>
                        
                    
                </div>
                   <div class="control-group">
                    <label class="control-label">Puesto</label>
                    
                        <input id="puesto" name="puesto" type="puesto" placeholder="Puesto" class="form-control" required>
                        
                    
                </div>  


                <!-- country select -->
                <div class="control-group">
                    <label class="control-label">Departmento</label>
                   
                        <select id="department" name="department" class="form-control" style="width: 150px;">
                            <option value="" selected="selected">(Por favor selecciona el departamento)</option>
                            <option value="Operaciones">Operaciones</option>
                            <option value="Ventas">Ventas</option>
                            <option value="Dirección">Dirección</option>
                            <option value="Finanzas">Finanzas</option>

                        </select>
                    
                </div>


          <div class="control-group">
                    <label class="control-label">Vacaciones</label>
                    
                        <input id="vacations" name="vacations" type="text" placeholder="Vacations" class="form-control" style="width: 150px;" maxlength="2" pattern= "[0-9]" required>
                        
                    
                </div>

                 <div class="control-group">
                    <label class="control-label">Imagen de perfil</label>
                    
                        <input id="profile_pic" name="picture" type="file" class="form-control">
                        <label for="sesion" class="control-label">Jefe inmediato</label>
                        <input id="jefe" name="jefe" type="checkbox">

                        <div class="col-xs-5">
                            <label for="sesion" class="control-label">RH</label>

                        <input id="rh" name="rh" type="checkbox">
                        <label for="sesion" class="control-label">Admin</label>
                            
                        <input id="admin" name="admin" type="checkbox">
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        
                    
                </div>
                <div class="control-group">
                    <button name="save" id="save" class="btn btn-primary" style="display: inline; position: relative;left:170px;">save</button>
                </div>
                  

            </fieldset>
        </form>
	</div>
</div>
<style type="text/css">
    
#footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    animation: cssAnimation 3s forwards;
}
    @keyframes cssAnimation {
    0%   {opacity: 1;}
    90%  {opacity: 1;}
    100% {opacity: 0;}
}




</style>



</body>

</html>



