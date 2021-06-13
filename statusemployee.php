<?php
 

 //UPDATING STATUS OF EMPLOYEE
 include "db_ee_connection.php";
if(isset($_GET['status']))
{
    $ee_id=$_GET['ee_id'];
$ee_status=$_GET['status'];

    $query= "UPDATE employee_professional_details SET ";
     $query.="ee_status='{$ee_status}'";
    $query.="WHERE ee_id={$ee_id}";
    $selectquery = mysqli_query($connection2, $query);

    if (!$selectquery) {
        die("query0 failed:" .mysqli_error($connection2));
    }
    else
    {
        header("location:manageindex.php");
    }
    
    
    
    
    
    
    
    

}