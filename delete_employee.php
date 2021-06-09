<?php
include "db_ee_connection.php";
include "db_er_connection.php";
if(isset($_GET['delete']))
{
    $ee_id=$_GET['ee_id'];
    $query="DELETE FROM employee_registration WHERE ee_id={$ee_id} ";
    $selectquery=mysqli_query($connection,$query);

    $query2="DELETE FROM employee_personal_details WHERE ee_id={$ee_id}";
    $selectquery=mysqli_query($connection2,$query2);

    $query3="DELETE FROM employee_professional_details WHERE ee_id={$ee_id}";
    $selectquery=mysqli_query($connection2,$query3);

    $query4="DELETE FROM er_login WHERE ee_id={$ee_id}";
    $selectquery=mysqli_query($connection2,$query4);

    header("location:manageindex.php");





}