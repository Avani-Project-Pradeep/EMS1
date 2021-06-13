
<!-- ABOUT EMPLOYER OF EMPLOYEE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<TITLE>Employee Portal</TITLE>
</HEAD>

 <?php
 /* DATABASE CONNECTION */
include "db_er_connection.php";
include "db_ee_connection.php";
 include "e_navbar.php"; ?>
 <ul>
 <li><?php
session_start();
$email_loggedin=$_SESSION['email'];

$query = "SELECT * FROM employee_personal_details WHERE ee_email='$email_loggedin'";
$selectquery = mysqli_query($connection2, $query);

$row=mysqli_fetch_assoc($selectquery);

if(!empty($row['ee_image'])){

$ee_image=$row['ee_image'];

 if (isset($ee_image) && $ee_image != '') { ?>
  <img src="images/<?php echo $ee_image; ?>"style="width:50px; height:50px;" alt="Employee Image"><?php }

 }

/* ELSE BLANK IMAGE IS SHOWN */ else { ?>
  <img src="images/blank image.png" style="width:50px; height:50px;" alt="Employee Image">
<?php } ?>

</li>
<?php $ee_id= $_SESSION['id']; ?>


<li><a href="http://localhost/ems/employee_portal.php">Home</a></li>
<li><a href="http://localhost/ems/add_eedetails.php?ee_id=<?php echo $ee_id ?>">Add Details</a></li>
<li><a href="ee_logout.php">Logout</a></li>
</ul>
</nav>



</div>

  <body style="background-color: honeydew;">

<?php


//FETCHING EMAIL ID OF EMPLOYER FROM PROFESSIONAL EMPLOYER TABLE
$employer="SELECT ee_employer FROM employee_professional_details WHERE ee_id=$ee_id";

$res=mysqli_query($connection2,$employer);


$row=mysqli_fetch_assoc($res);

$employer_email=$row['ee_employer'];


//JOING EMPLOYER TABLES BY COMMON EMAIL ID OF EMPLOYER

 $query="SELECT * FROM employer_personal_details INNER JOIN  employer_professional_details ON 
employer_personal_details.er_email = employer_professional_details.er_email WHERE employer_personal_details.er_email='$employer_email'" ;
                
                $selectquery1=mysqli_query($connection,$query);

                while($row=mysqli_fetch_assoc($selectquery1))
                {
                       $er_fname=$row['er_firstname'];
                       $er_lname=$row['er_lastname'];
                       $er_image=$row['er_image'];
                       $er_designation=$row['er_designation'];
                       $er_phone=$row['er_phone'];
                       $er_email=$row['er_email'];
                       $er_gender=$row['er_gender'];
                       $er_city=$row['er_city'];

                       $er_state=$row['er_state'];
                       $er_division=$row['er_division'];
                       $er_comp_name=$row['er_company_name'];
                }
               // echo $er_fname;



?>

<div class="container">
 

    <div class="row">
 
         
        <div class="col-md-6">

                <!-- E_NAME -->
                <h1><i>

                <br>
                <br>
                
 
                <?php echo "Employer-name: 
                 $er_fname   $er_lname " ?></a>
                   
                 </i></h1>   


                 <span>                  <!-- EMPLOYEE IMAGE -->
<img src="images/
<?php 

if(empty($er_image))
{
    echo "blank image.png";
}
else
{
    echo $er_image;
}



 ?>" style="margin:10px; width:500px ; height:500px; overflow:hidden;border:solid blue" alt="Employer Image">



&nbsp &nbsp 

   </span>


   <p class="lead">
   <br>


   <span ><?php echo"Company Name : $er_comp_name "; ?></span>

   <br>

                   <span ><?php echo"Designation : $er_designation "; ?></span>
<br>
                   <span ><?php echo"Division : $er_division "; ?></span>
<br>

<span ><?php echo"Location : $er_city,$er_state "; ?></span>
<br>



<h1> Contact Details </h1>
<h2 style="color: blue;">Phone no : </h2> 
<p style="color:black ; font-size:x-large; "?>
<?php  echo $er_phone ?></p>
<h2 style="color: blue;">Email : </h2> 
<p style="color:black ; font-size:x-large; "?>

<?php  echo $er_email ?></p>
<br>
 <br>











 
</div>
    </div></div>
