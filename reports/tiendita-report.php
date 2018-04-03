<?php
session_start();
include(dirname(__FILE__) . "/../globals/globals.php");
require(dirname(__FILE__) . "/../globals/dbconnect.php");

?>


    <table id='datatable' class='stripe hover cell-border oder-column' style='font-size: 12px;' cellspacing='0' width='100%'>
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

echo " </tbody>
        </table>";

        ?>