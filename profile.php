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
	<title>People</title>
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
<body>


<?php

$urlhome=$urlbase . "/people/home.php";

$query="select * from users_profile where id=". $_GET['id'];

$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){

$name=$row['name'];
$department=$row['department'];
$hiredate=$row['hire_date'];
$birthday=$row['birthday'];
$gender=$row['gender'];
$vacations=$row['vacations'];
$address=$row['address'];
$telephone=$row['telephone'];
$profilepic=$row['profile_pic'];
$email=$row['email'];
$puesto=$row['puesto'];
}


$deleteprofile = $urlbase . "/people/deleteprofile.php?id=";

$queryjefe="select * from users_profile where jefe_inmediato=1";
$resultjefe=mysqli_query($con,$queryjefe);
while($rowjefe=mysqli_fetch_array($resultjefe)){

$nombrejefe[]=$rowjefe['name'];

}
?>

<script>
  
$(document).ready(function(){
 
 $("#request").click(function(){
           var data = $("#vacation_form").serialize();
            $.ajax({
              data: data,
              type: "post",
              url: "vacationrequest.php",
              success: function(data){
              alert('Success');
              $('#myModal').modal('toggle');
        }
    });
   
      });






    //Deshabilito el ingreso de datos a los input ".prof-field"
    $(".prof-field").attr("disabled", true);

    $("#btn-edit").click(function(){
  
    //Apago el disbled de los input .prof-field
    $(".prof-field").attr("disabled", false);
    //remuevo la clase .prof-field y agrego la clase form-control
    $(".prof-field").removeClass("prof-field").addClass("form-control");


});

    $(".prof-field").keyup(function() { 
       $(this).attr("name");
       
        alert ($(this).attr('name'));
        })

  });

</script>

<div class="container">
<!--MODAL de vacaciones-->
<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content modal-background">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"></button>
          <h4 class="modal-title">Solicitud de Vacaciones</h4>
        </div>
        <div class="modal-body">
          <form id="vacation_form" action="" method="POST">
          <p>Datos del empleado</p>

            <div class="col-xs-3">
              <label for="ex1">Nombre</label>
               <input class="form-control" id="nombre" name="nombre"type="text" value=<?php echo $name  ?> readonly>


            </div>
             
            <div class="col-xs-3">
              <label for="ex1">Departamento</label>
               <input class="form-control" id="departamento" name="departamento" type="text" value=<?php echo $department  ?> readonly>
            </div>
            <div class="col-xs-3">
              <label for="ex1">Puesto</label>
               <input class="form-control" id="puesto" name="puesto" type="text" value=<?php echo $puesto  ?> readonly>
            </div>

</br></br></br>
<hr>
<h4>Periodo al que corresponden las vacaciones</h4>
              <div class="form-group row">
                <div class="col-xs-4">
                <p>Días correspondientes al periodo:</p>
                </div>
                
                <?php
                echo "<div class='col-xs-2'>";
                echo "<select class='form-control' name='fecha_periodo1'>";
                  for($i=2017;$i<=2030;$i++){
                     echo "
                    <option> $i </option>
                     "; 
                  }
                  echo "</select> </div>";
                  echo "<div class='col-xs-2'>";
                  echo "<select class='form-control' name='fecha_periodo2'>";
                  for($i=2017;$i<=2030;$i++){
                     echo "
                    <option> $i </option>
                     "; 
                  }
                  echo "</select> </div>";



                ?>  

              
              </div>
              <div class="form-group row">
                <div class="col-xs-1">
                <p>Días Solicitados:</p>
              </div>
                 <?php
                echo "<div class='col-xs-2' style='left:25%;'>";
                echo "<select class='form-control' id='dias_solicitados' name='dias_solicitados' >";
                  for($k=1;$k<=15;$k++){
                     echo "
                    <option value='$k'> $k </option>
                     "; 
                  }
                  echo "</select> </div>";
                 


                ?>  

              </div>
              <div class="form-group row">
                
                <div class="col-xs-4">
                <p>Días pendientes por disfrutar:</p>
              </div>

              <div class="col-xs-2">

                <input type="text" class="form-control" id="pordisfrutar" name="pordisfrutar" value=<?php echo $vacations ?> >
              </div>

              </div>
             
              <div class="form-group row">
                <div class="col-xs-4">
                   <p>Que se disfrutaran del día:</p> 
                </div>
                <div class="col-xs-3">
                  <input type="date" name="fechainicial" class="form-control">
                </div>
                  <div class="col-xs-3">
                  <input type="date" name="fechafinal" class="form-control">
                </div>

              </div>

              <div class="form-group row">
                <div class="col-xs-4">
                   <p>Presentándose a laborar el día:</p> 
                </div>
                <div class="col-xs-3">
                  <input type="date" name="fechalaboral" class="form-control">
                </div>
                  

              </div>

  <div class="form-group row">
                <div class="col-xs-4">
                   <p>Jefe inmediato:</p> 
                </div>
                <div class="col-xs-3">
               <?php
                echo "<div class='col-xs-12' style='left:9%;'>";
                echo "<select class='form-control' name='jefe'>";
                  for($j=0;$j<count($nombrejefe);$j++){
                     echo "
                    <option> $nombrejefe[$j] </option>
                     "; 
                  }
                  echo "</select> </div>";
                 


                ?>  
                </div>
                  

              </div>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info" id="request" name="request">Request</button>
        </div>
      </div>
      
    </div>
  </div>
</form>

<!--MODAL de assets-->

<div class="modal" id="assetModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"></button>
          <h4 class="modal-title">Asset Details</h4>
        </div>
        <div class="modal-body">
          <p>Se muestra toda la información de los assets asignados al usuario.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

      <div class="row">
  
  
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
          
       <br>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $name  ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src=<?php echo "img/" . $profilepic ?> class="img-circle img-responsive"> </div>

                <!--Inicio del formulario-->
                <form action="" method="post">
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td class="td">Departmento:</td>
                        <td><?php echo $department  ?></td>
                      </tr>
                      <tr>
                        <td class="td">Fecha de ingreso:</td>
                        <td><input type="date" class="prof-field" id="birth-field" value=<?php echo $hiredate  ?>></input></td>
                      </tr>
                      <tr>
                        <td class="td">Cumpleaños</td>
                        <td><input type="date" class="prof-field" id="birth-field" value=<?php echo $birthday  ?>></input></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td class="td">Genero</td>
                        <td><?php echo $gender  ?></td>
                      </tr>
                        <tr>
                        <td class="td">Dirección</td>
                        <td><input type="text" class="prof-field" id="address" value=<?php echo $address  ?>></input></td>
                      </tr>
                      <tr>
                        <td class="td">Correo Electrónico</td>
                        <td><input type="text" class="prof-field" id="birth-field" value=<?php echo $email  ?>></input></td>
                      </tr>
                        <td class="td">Teléfono</td>
                        <td><input type="text" class="prof-field" id="phone-field" name="telephone"value=<?php echo $telephone  ?>></input>
                        </td>
                           
                      </tr>
                     <tr>
                      <td class="td">Vacaciones</td>
                      <td><input type="text" class="prof-field" id="vacation-field" value=<?php echo $vacations  ?>></input></td>
                     </tr>
                    </tbody>
                  </table>
                  
                  <?php
                  if ($name == $_SESSION['username']){

                     echo "<button class='btn btn-info' data-toggle='modal' data-target='#myModal' type='button'>Solicitud de Vacaciones</button>";

                     echo "<button class='btn btn-info' data-toggle='modal' data-target='#assetModal' type='button'>Asset Details</button>";
                    


                  }
                  else{

                    echo "<a href='#' class='btn btn-primary' disabled>Vacation Request</a>";

        
                  }
                 


                   ?> 



                  <a href=<?php echo $urlhome ?> class="btn btn-info">Volver a inicio</a>
                </div>
              </div>
            </div>

            <?php

            if($_SESSION['type']=="admin"){
                 echo "<div class='panel-footer'>
                        
                        <span class='pull-right'>
                            <a data-original-title='Edit this user' type='button' class='btn btn-sm btn-warning' id='btn-edit'><i class='glyphicon glyphicon-edit'></i></a>
                            <a href= '". $deleteprofile . $_GET['id']. " ' data-original-title='Eliminar este usuario' data-toggle='tooltip' type='button' class='btn btn-sm btn-danger' onclick='javascript:return confirm('Estas seguro?');'><i class='glyphicon glyphicon-remove'></i></a>
                            <a name='submit-changes'  type='button' class='btn btn-sm btn-success'><i class='glyphicon glyphicon-save'></i></a>
                        </span>
                      </form>
                    </div>";
                  }


                    ?>
            



          </div>
        </div>
      </div>









    </div>
 <?php
                  if ($name == $_SESSION['username']){
//Tabla donde se muestra el historial de solicitudes de vacaciones del usuario logueado-->

              echo " <button class='btn btn-info' type='button' data-toggle='collapse' data-target='#demo'>Historial de solicitudes</button>
              <div class='row collapse' id='demo'>
                <h4 style='text-align: center;'>   Solicitudes de vacaciones</h4>
                <hr>
                <div class='col-md-11' style='background-color: white; border-radius: 3px;left:4%;box-shadow: 0px 1px 9px 0px rgba(0,0,0,0.75);'>

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

              $queryvacaciones="select * from vacaciones where nombre='$name'";
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


</body>

</html>



