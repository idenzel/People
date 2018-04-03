<?php
session_start();
include(dirname(__FILE__) . "/../globals/globals.php");
require(dirname(__FILE__) . "/../globals/dbconnect.php");

?>


    <table id='datatable' class='stripe hover cell-border oder-column' style='font-size: 12px;' cellspacing='0' width='100%'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cocina</th>
                <th>Usuario</th>
                <th>Petición</th>
                <th>Fecha de petición</th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
              <th>ID</th>
                <th>Cocina</th>
                <th>Usuario</th>
                <th>Petición</th>
                <th>Fecha de petición</th>
            </tr>
        </tfoot>
        <tbody>




<?php



$query="select * from comida";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
echo "
            <tr>
                <td>".$row['idcomida']."</td>
                <td>".$row['cocina']."</td>
                <td>".$row['usuario']."</td>
                <td>".$row['peticion']."</td>
                <td>".$row['fecha_peticion']."</td>               
            </tr>




";


}

echo " </tbody>
        </table>";

        ?>