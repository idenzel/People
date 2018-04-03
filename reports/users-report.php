<?php
session_start();
include(dirname(__FILE__) . "/../globals/globals.php");
require(dirname(__FILE__) . "/../globals/dbconnect.php");

?>


    <table id='datatable' class='stripe hover cell-border oder-column' style='font-size: 12px;' cellspacing='0' width='100%'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Hire date</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Telephone</th> 
                <th>Address</th>
                <th>Department</th>
                <th>Vacations</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Hire date</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Telephone</th> 
                <th>Address</th>
                <th>Department</th>
                <th>Vacations</th>
            </tr>
        </tfoot>
        <tbody>




<?php



$query="select * from users_profile";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
echo "
            <tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['hire_date']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['birthday']."</td>
                <td>".$row['telephone']."</td>
                <td>".$row['address']."</td>
                <td>".$row['department']."</td>
                <td>".$row['vacations']."</td>
            </tr>




";


}

echo " </tbody>
        </table>";

        ?>