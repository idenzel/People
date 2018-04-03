<?php 
session_start();
include(dirname(__FILE__) . "/globals/globals.php");
require(dirname(__FILE__) . "/globals/dbconnect.php");
if(!isset($_SESSION['login'])){
   header("location:$urlbase"."/people/index.php");
   die;


}
?>

<html>
<title>
	Inicio
</title>
<head>
<meta name = "viewport" content = "width = device-width, initial-scale = 1">  
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





	<!--Inicia la barra lateral-->
<div class="lateral" style="position: absolute;margin-top: 6%;margin-left: 1%; width: 25%; height: 500px; background-color: #FFFFFF; box-shadow: 4px 4px 20px rgba(0, 0, 0, 0.4);">
	<div class="alert alert-info">
	<h4>Mi perfil</h4><div class="dropdown">
  <button class="btn btn-info dropdown-toggle pull-right" type="button" data-toggle="dropdown">Acciones
  <span class="caret"></span></button>
  <ul class="dropdown-menu pull-right">
    <li><a href="<?php echo $urlbase ."/people/profile.php?id=" .$_SESSION['myid'] ?>">+ Detalles</a></li>
    <li><a href="<?php echo $urlbase . "/people/tiendita.php"?>">La tiendita</a></li>
    <li><a href="<?php echo $urlbase . "/people/menudeldia.php"?>">Menú del día</a></li>
  </ul>
</div>
	
	</div>
	<?php
		$queryperfil="select * from users_profile where name='".$_SESSION['username']."'";
		$perfilresult=mysqli_query($con,$queryperfil);
		while ($rowperfil=mysqli_fetch_array($perfilresult)) {
			
			$nombre=$rowperfil['name'];
			$correo=$rowperfil['email'];
			$departamento=$rowperfil['department'];
			$fechaingreso=$rowperfil['hire_date'];
			$fechacumple=$rowperfil['birthday'];
			$telefono=$rowperfil['telephone'];
			$direccion=$rowperfil['address'];
			$vacaciones=$rowperfil['vacations'];

			echo "<h5 data-toggle='tooltip' title='Nombre'><span class='	glyphicon glyphicon-user'></span> $nombre </h5>
				  <h5><span class='		glyphicon glyphicon-envelope'></span> $correo </h5>
				  <h5><span class='	glyphicon glyphicon-tag'></span> $departamento </h5>
					<h5><span class='	glyphicon glyphicon-calendar'></span> $fechaingreso </h5>
					<h5><span class='	fa fa-birthday-cake'></span> $fechacumple </h5>
					<h5><span class='	glyphicon glyphicon-phone'></span> $telefono </h5>
					<h5><span class='	glyphicon glyphicon-map-marker'></span> $direccion </h5>
					<h5><span class='	fa fa-plane'></span> $vacaciones Día(s) de vacaciones</h5>




			";
		}
$queryjefe="select * from users_profile where jefe_inmediato=1";
$resultjefe=mysqli_query($con,$queryjefe);
while($rowjefe=mysqli_fetch_array($resultjefe)){

$nombrejefe[]=$rowjefe['name'];

}




	?>

</div>


<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
    </button>
    <a class="navbar-brand" href="<?php echo $urlbase . "/people/home.php"?>">Dric People</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->

  <?php

  if($_SESSION['type']=="admin"){
echo "

 <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>

    <ul class='nav navbar-nav'>
  
      <li class='dropdown'>
        <a href='#'' class='dropdown-toggle' data-toggle='dropdown'>Admin <b class='caret'></b></a>
        <ul class='dropdown-menu'>
          <li disabled><a href='$urlbase" . "/people/newuser.php" . " '> Nuevo Usuario</a></li>
         
          
          <li class='divider'></li>
          <li><a href=' $urlbase" . "/people/reports.php "."  '   >Reports</a></li>
          <li class='divider'></li>
         
        </ul>
      </li>
    </ul>


";
}


  ?>
 


           <ul class="nav navbar-nav navbar-right">
     
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user "></span><?php echo $_SESSION['username'];  ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li> <button class="btn btn-info" data-toggle="modal" data-target="#passwordModal" type="button"><span class="glyphicon glyphicon-wrench"></span> Cambiar contraseña</button></li>
          <li> <a href="logout.php" class="btn btn-info" ><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión</a></li>
         
        </ul>
      </li>
    </ul>
<button class="navbar-toggle navbar-right" id="tiendita">La tiendita</button>
        <a class="navbar-brand navbar-right" href="<?php echo $urlbase . "/people/tiendita.php"?>"">La tiendita</a>

    <div class="col-sm-3 col-md-3">
        
        	<center>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar" id="cardtosearch">
            <div class="input-group-btn">
               <button class="btn btn-default" type="button" id="buscar"><i class="glyphicon glyphicon-search" name="buscar" id="buscar"></i></button>

            </div>
            
          

        </div>
 

    </div>
    
  </div><!-- /.navbar-collapse -->
</nav>
	
<div class="container" id="container" style="float: right;">

	<!--Inicia modal de cambio de contraseña-->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      	<form method="POST" id="formpass" name="formpass" action="">
      	<label for="nuevopass">Escribe tu nueva contraseña:</label>
        <input type="password" name="nuevopass" id="nuevopass" class="form-control" required>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" name="guardarpass" id="guardarpass">Guardar cambios</button>
      </div>
    
    </div>

  </div>
</div>
</form>
 <!-- Modal Structure 
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>New Admin User</h4>
    	<form class="col s3" method="POST" action="" id="admin_form" >
    		<div class="row">
        <div class="input-field col s3">
          <input placeholder="Name" id="name" type="text" class="validate" name="name">
          <label for="first_name">Name</label>

         

        </div>
        <div class="input-field col s3">
        	<label for="username">Email</label>
<input id="username" name="username" class="validate" placeholder="Email" type="email">

</div>
    </div>
     

      
      <input id="password" class="input-field validate" placeholder="Password" type="password" name="password">
      
      <button class="waves-effect waves-light btn" id="newadmin" name="newadmin">Guardar</button>
    <button class="waves-light waves-effect btn">Cerrar</button>		

    </form>
    </div>
    
  </div>
-->
<script type="text/javascript">

	$(document).ready(function(){



		$("#buscar").on('click', function(e){

		var bla = $("#cardtosearch").val();
		if(bla == ""){
			location.reload();

		}

		$(".element-card").hide();
		$("*:contains('" + bla + "')").each(function(){
	//$(".container:contains('"+ bla + "')").each(function(){
     //if($(this).children().length < 1) 
     	if($(this).children().length < 1) 
     	
      
         //() $(this).css("border","solid 2px red")
      		//accion a realizar despues de encontrar la tarjeta
      		$(this).show();
      		//$(this).css("border","solid 2px red")
      		$(this).slideDown()
      	
           });


});



	});
	


</script>

<script>
	
	'use strict';

$(document).ready(function () {


	$('.element-card').on('click', function () {

		if ($(this).hasClass('open')) {
			$(this).removeClass('open');
		} else {
			$('.element-card').removeClass('open');
			$(this).addClass('open');
		}
	});



//Lanzamos a dar de alta el usuario admin a traves de AJAX
$("#guardarpass").click(function() {
    var data = $("#formpass").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "newadmin.php",
        success: function(data){
        alert('Tu contraseña se ha guardado satisfactoriamente');
		location.reload();

        }
    });
   
});

});
</script>

<?php


	$query="select * from users_profile where usertype='user'";
	$result=mysqli_query($con,$query);

	while($row=mysqli_fetch_array($result)){
//Obtenemos la url base mas el id del usuario
$searchprofile = $urlbase . "/people/profile.php?id=" . $row['id'];
$profilename=$row['name'];

echo "<div class='element-card' id=$profilename> <div class='front-facing'> <h1 class='abr'>" . $row['name'] . "</h1></div>" . "<div class='back-facing'><p><strong>Departamento:</strong>" . $row['department'] . "</p><p><strong>Teléfono:</strong>". $row['telephone'] ." </p> <a id='details' name='details' href=' $searchprofile ' class='btn btn-info'>Detalles</a>  </div></div>"; 




	}

//echo "</div>" . "</div>";

?>

<?php
                  if ($_SESSION['role_jefe']==1){
//Tabla donde se muestra el historial de solicitudes de vacaciones del usuario logueado-->

 $queryvacaciones="select * from vacaciones where jefe_inmediato='$nombre' and status_aprobacion_jefe='Pendiente'";
              $queryresult=mysqli_query($con,$queryvacaciones);

              while ($rowvac=mysqli_fetch_array($queryresult)) {
              $id=$rowvac['idvacacion'];
              $nombre=$rowvac['nombre'];
              $departamento=$rowvac['departamento'];
              $puesto=$rowvac['puesto'];

               $diasperiodo1=$rowvac['dias_periodo1'];
              $diasperiodo2=$rowvac['dias_periodo2'];
              $diassolicitados=$rowvac['dias_solicitados'];
              $diasdisfrutar=$rowvac['dias_disfrutar'];

              
              $fechadisfrutar1=$rowvac['fecha_disfrutar1'];
              $fechadisfrutar2=$rowvac['fecha_disfrutar2'];
              $fecharegreso=$rowvac['fecha_regreso'];
              $jefeinmediato=$rowvac['jefe_inmediato'];
              $fechapeticion=$rowvac['fecha_peticion'];
              $status_aprobacion_jefe=$rowvac['status_aprobacion_jefe'];
              $status_aprobacion_rh=$rowvac['status_aprobacion_rh'];
              //creo la variable que almacena el direccionamiento id de la vacación
              $searchvacation=$urlbase . "/people/vacations.php?idvacacion=" . $id;





              echo "
              <div class='row' id='demo'>
              
                <hr>
                <div class='col-md-11' style='background-color: white; border-radius: 3px;left:4%;box-shadow: 0px 1px 9px 0px rgba(0,0,0,0.75); margin-top:25%;margin-left:-35%;position:absolute; width:200%;'>
  <h4 style='text-align: center;'>   Solicitudes de vacaciones por aprobar</h4>
                  <table class='table'>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Departamento</th>
                      <th>Puesto</th>
                      <th>Días Periodo 1</th>
                      <th>Días Periodo 2</th>
                      <th>Días Solicitados</th>
                      <th>Días por disfrutar</th>
                      <th>Fecha a disfrutar 1</th>
                      <th>Fecha a disfrutar 2</th>
                      <th>Fecha Regreso</th>
                      <th>Jefe inmediato</th>
                      <th>Fecha Petición</th>
                      <th>Status aprobación Jefe</th>
                      <th>Status aprobación RH</th>
                    </tr>
                  </thead>
                  <tbody>
                  ";

             
              echo "
                    <tr class='info'>
                      <td><a href=javascript:window.open('$searchvacation','Vacaciones','width=600,height=400')>$id</a></td>
                      <td>$nombre</td>
                      <td>$departamento</td>
                      <td>$puesto</td>
                      <td>$diasperiodo1</td>
                      <td>$diasperiodo2</td>
                      <td>$diassolicitados</td>
                      <td>$diasdisfrutar</td>
                      <td>$fechadisfrutar1</td>
                      <td>$fechadisfrutar2</td>
                      <td>$fecharegreso</td>
                      <td>$jefeinmediato</td>
                      <td>$fechapeticion</td>
                      <td>$status_aprobacion_jefe</td>
                      <td>$status_aprobacion_rh</td>
                    </tr>   

              ";
              }

                         echo "
                        </tbody>
                      </table>
                    </div>



                      </div>
                    </div>";

                        }

elseif ($_SESSION['role_rh']==1){
//Tabla donde se muestra el historial de solicitudes de vacaciones del usuario logueado-->

 $queryvacaciones="select * from vacaciones where status_aprobacion_rh='Pendiente'";
              $queryresult=mysqli_query($con,$queryvacaciones);

              while ($rowvac=mysqli_fetch_array($queryresult)) {
              $id=$rowvac['idvacacion'];
              $nombre=$rowvac['nombre'];
              $departamento=$rowvac['departamento'];
              $puesto=$rowvac['puesto'];

               $diasperiodo1=$rowvac['dias_periodo1'];
              $diasperiodo2=$rowvac['dias_periodo2'];
              $diassolicitados=$rowvac['dias_solicitados'];
              $diasdisfrutar=$rowvac['dias_disfrutar'];

              
              $fechadisfrutar1=$rowvac['fecha_disfrutar1'];
              $fechadisfrutar2=$rowvac['fecha_disfrutar2'];
              $fecharegreso=$rowvac['fecha_regreso'];
              $jefeinmediato=$rowvac['jefe_inmediato'];
              $fechapeticion=$rowvac['fecha_peticion'];
              $status_aprobacion_jefe=$rowvac['status_aprobacion_jefe'];
              $status_aprobacion_rh=$rowvac['status_aprobacion_rh'];
              //creo la variable que almacena el direccionamiento id de la vacación
              $searchvacation=$urlbase . "/people/vacations.php?idvacacion=" . $id;





              echo "
              <div class='row' id='demo'>
              
                <hr>
                <div class='col-md-11' style='background-color: white; border-radius: 3px;left:4%;box-shadow: 0px 1px 9px 0px rgba(0,0,0,0.75); margin-top:25%;margin-left:-35%;position:absolute; width:200%;'>
  <h4 style='text-align: center;'>   Solicitudes de vacaciones por aprobar</h4>
                  <table class='table'>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Departamento</th>
                      <th>Puesto</th>
                      <th>Días Periodo 1</th>
                      <th>Días Periodo 2</th>
                      <th>Días Solicitados</th>
                      <th>Días por disfrutar</th>
                      <th>Fecha a disfrutar 1</th>
                      <th>Fecha a disfrutar 2</th>
                      <th>Fecha Regreso</th>
                      <th>Jefe inmediato</th>
                      <th>Fecha Petición</th>
                      <th>Status aprobación Jefe</th>
                      <th>Status aprobación RH</th>
                    </tr>
                  </thead>
                  <tbody>
                  ";

             
              echo "
                    <tr class='info'>
                      <td><a href=javascript:window.open('$searchvacation','Vacaciones','width=600,height=400')>$id</a></td>
                      <td>$nombre</td>
                      <td>$departamento</td>
                      <td>$puesto</td>
                      <td>$diasperiodo1</td>
                      <td>$diasperiodo2</td>
                      <td>$diassolicitados</td>
                      <td>$diasdisfrutar</td>
                      <td>$fechadisfrutar1</td>
                      <td>$fechadisfrutar2</td>
                      <td>$fecharegreso</td>
                      <td>$jefeinmediato</td>
                      <td>$fechapeticion</td>
                      <td>$status_aprobacion_jefe</td>
                      <td>$status_aprobacion_rh</td>
                    </tr>   

              ";
              }

                         echo "
                        </tbody>
                      </table>
                    </div>



                      </div>
                    </div>";

                        }

                        

?>




</div>
</body>
</html>

