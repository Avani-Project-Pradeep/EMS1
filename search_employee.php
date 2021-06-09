<?php

include "db_ee_connection.php";

//SEARCH BY ID
if(isset($_POST['search_id']))
{

    $ee_id=$_POST['search'];


    //check if not numeric then search by name
    if(!is_numeric($ee_id))
    {
        echo"<h1>No results found,Try search by name<h1>";
    }

 $query="SELECT * FROM employee_personal_details INNER JOIN  employee_professional_details ON 
employee_personal_details.ee_id = employee_professional_details.ee_id WHERE employee_personal_details.ee_id=$ee_id" ;

$search_query=mysqli_query($connection2,$query);

if($search_query)
{
$count = mysqli_num_rows($search_query);



if (!$count||$count == 0 ) {
    echo " <h1>No results found<h1>";
} else {
//link to individual employee
echo" <a href='individualemployee.php?ee_id=$ee_id'>View employee with $ee_id </a>";

 }


}
}



//SEARCH BY NAME

if(isset($_POST['search_name']))
{

    $ee_name=$_POST['search'];
 

 $query="SELECT ee_id FROM employee_personal_details WHERE ee_first_name OR ee_last_name LIKE  '%$ee_name%'" ;

$search_query=mysqli_query($connection2,$query);

$count = mysqli_num_rows($search_query);

if ($count == 0) {
    if(is_numeric($ee_name))
    {
        echo"<h1>No results found,Try search by id<h1>";
    }
    else
    {
    echo " <h1>No results found<h1>";
    }
} else {

    while($row=mysqli_fetch_assoc($search_query))
    {
        $ee_id=$row['ee_id'];
    
//link to individual employee

echo" <a href='individualemployee.php?ee_id=$ee_id'>View $ee_name</a>";
echo"<br>";

 }


}
}






















?>