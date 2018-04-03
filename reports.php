<?php
session_start();
include(dirname(__FILE__) . "/globals/globals.php");
require(dirname(__FILE__) . "/globals/dbconnect.php");



?>

<html>
	
<head>
	<title>Reports</title>
			<!--CSS-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
			<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
			<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css">
			<link rel="stylesheet" href="styles/reports.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<!--JS-->
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
			<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
			<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>


		</head>

		<script>
			$(document).ready(function() {
   				 $('#datatable').DataTable({
   				 	 dom: 'Bfrtip',
        				buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        			]

   				 });

   				 $('#refresh').click(function(){

   				 	//alert('Ya refresque');
   				 	$.ajax({
   url: "reports/tiendita-report.php",
   dataType: "html",
   success: function(data){
     $(".datatable").html(data);
   }
 });

   				 });

$('#usersreport').click(function(){

   				 
   				 	$.ajax({
   url: "reports/users-report.php",
   dataType: "html",
   success: function(data){
     $(".datatable").html(data);
   }
 });

   				 });



$('#type').change(function(){


var tipo=this.value;
if (tipo=='tiendita'){

$.ajax({
   url: "reports/tiendita-report.php",
   dataType: "html",
   success: function(data){
     $(".datatable").html(data);
   }
 });


}
//Fin del if de tiendita
else if(tipo=='users'){
 
   				 	$.ajax({
   url: "reports/users-report.php",
   dataType: "html",
   success: function(data){
     $(".datatable").html(data);
   }
 });



}

else if(tipo=='comida'){
 
            $.ajax({
   url: "reports/comida-report.php",
   dataType: "html",
   success: function(data){
     $(".datatable").html(data);
   }
 });



}
});



				});



		</script>
<body>

<div class="container">

	

	<div class="row" style="background-color: red;background-color: white; border-radius: 3px;box-shadow: 0px 1px 9px 0px rgba(0,0,0,0.75);margin-top: 20%; ">
		<div class="col-md-2">

			
			<label for="type">Tipo de reporte</label>
			<select class="form-control" id="type" name="type" style="font-size: 12px;">
				
				<option value="users">Usuarios</option>
				<option value="tiendita">Tiendita</option>
        <option value="comida">Comida</option>


			</select>	

		</div>

<table id="datatable" class="stripe hover cell-border oder-column" style="font-size: 12px;" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>ID</th>
                <th>Nombre</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha de pedido</th>
      
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>ID</th>
                <th>Nombre</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha de pedido</th>
            </tr>
        </tfoot>
        <tbody>
<?php

$query="select * from tiendita";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
echo "
			<tr>
                <td>".$row['id']."</td>
                <td>".$row['username']."</td>
                <td>".$row['producto']."</td>
                <td>".$row['cantidad']."</td>
                <td>".$row['createdtime']."</td>

            </tr>




";


}



?>
		
            
        </tbody>
        </table>
	</div>
<div class="row">
<div class="col-md-3">
<a href=<?php echo $urlbase. "/people/home.php" ?>> <h3>Volver a inicio</h3></a>
<!--<button id="refresh" class="btn btn-primary">Refresh</button>
<button id="usersreport" class="btn btn-primary">Users Report</button>-->

</div>
</div>
</div>


</body>

</html>