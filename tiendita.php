<?php 
session_start();
include(dirname(__FILE__) . "/globals/globals.php");
require(dirname(__FILE__) . "/globals/dbconnect.php");

if(!isset($_SESSION['login'])){
   header("location:$urlbase"."/people/index.php");
   die;
}
if(isset($_POST['guardar'])){

$producto=$_POST['producto'];
$cantidad=$_POST['cantidad'];
//$dt = new DateTime();
//$fecha = $dt->format('d/m/Y ');
//$fecha2=date( "d/m/Y", strtotime($fecha));
$datesql= date("Y-m-d", time());
$date= date("d/m/Y", time());
$contar=0;
$useronline=$_SESSION['username'];
//Mando a traer la cantidad de productos que han pedido
$querytiendita ="select * from tiendita where username='".$useronline."' and createdtime like '%".$datesql. " %'";
$consultar=mysqli_query($con,$querytiendita);
  while($row=mysqli_fetch_array($consultar)){
     
    $contar+=$row['cantidad'];
    $createdtime=$row['createdtime'];
    //$fechapeticion=$createdtime->format('Y-m-d ');
    $fechapeticion = date( "d/m/Y", strtotime($createdtime));
    $user=$row['username'];
    

    }


  if($contar>1 and $date==$fechapeticion){

      echo "<script>javascript:alert('Ya pediste mas de 2 productos el día de hoy $date $fechapeticion');</script>";
     //echo "<div style='color:white;'>$fechapeticion</div>";

      }
    else{

$query="insert into tiendita (producto,cantidad,username) values ('$producto','$cantidad','$useronline')";
$save=mysqli_query($con,$query);
$contar=0;

echo "<script>javascript:alert('Success' ); </script>";
}



}

?>

<html>
	<head>
		<title>Tiendita</title>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
      <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      
     
     
	<!--Cargamos CSS-->



      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="styles/tiendita.css">
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

<?php

  if($_SESSION['type']=="admin"){
echo "

 <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>

    <ul class='nav navbar-nav'>
  
      <li class='dropdown'>
        <a href='#'' class='dropdown-toggle' data-toggle='dropdown'>Admin<b class='caret'></b></a>
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

  <!--
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
     
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Actions <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php //echo $urlbase . "/people/newuser.php"?>">New Contact</a></li>
          <li><a href="#modal1" class="modal-trigger">New People Admin</a></li>
          
          <li class="divider"></li>
          <li><a href=<?php// echo $urlbase . "/people/reports.php "     ?> >Reports</a></li>
          <li class="divider"></li>
         
        </ul>
      </li>
    </ul>

-->
    <ul class="nav navbar-nav navbar-right">
     
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'];  ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
         
         
        </ul>
      </li>
    </ul>
    
  </div><!-- /.navbar-collapse -->






</nav>
<div class="container col-md-6" style="position: absolute;background-color: white; top:40%;left:40%;width:450px; height: 130px; border-radius: 3px;box-shadow: -1px 2px 20px 0px rgba(0,0,0,0.75);">





		<form method="post" enctype="multipart/form-data" action="">

	<div class="col-md-9">
	<label for="producto" >Producto</label>
<input type="text" class="form-control" name="producto" id="producto" required>
</div>
<div class="col-md-3" >
<label for="cantidad">Cantidad</label> 
<select id="cantidad" name="cantidad" class="form-control" >
	<option value="1">1</option>
	<option value="2">2</option>

</select>


</div>


	



</div>
<div class="col-md-11" style="text-align: center;position: absolute;top:50%;">
<button class="btn btn-info" id="guardar" name="guardar">Guardar</button>
</form>
</div>
</body>


</html>