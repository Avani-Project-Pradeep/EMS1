<?php include "db_ee_connection.php";?>
<?php session_start(); 
$email_loggedin = $_SESSION['email'];



$querygetid="SELECT * FROM ee_login WHERE user_email='$email_loggedin'";
$selectquery = mysqli_query($connection2, $querygetid);



while ($row = mysqli_fetch_assoc($selectquery)) {


  global $ee_id;

    $ee_id = $row['user_id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- STYLESHEETS -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <style>
    body {
      background-color: honeydew
    }
  </style>

</head>

<?php


/* NAVIGATION BAR */

include "e_navbar.php"; ?>
<ul>



<!-- USER ICON -->
<li><?php
$email_loggedin=$_SESSION['email'];

$query = "SELECT * FROM employee_personal_details WHERE ee_email='$email_loggedin'";
$selectquery = mysqli_query($connection2, $query);

$row=mysqli_fetch_assoc($selectquery);

if(!empty($row['ee_image'])){
$ee_image=$row['ee_image'];

 if (isset($ee_image) && $ee_image != '') { ?>
  <img src="images/<?php echo $ee_image; ?>"style="width:50px; height:50px"  alt="Employee Image"><?php }

 }
 
/* ELSE BLANK IMAGE IS SHOWN */ else { ?>
  <img src="images/blank image.png" style="width:50px; height:50px;" alt="Employee Image">
<?php } ?>

</li>

  <li><a href="http://localhost/ems/employee_portal.php">Home</a></li>
  <li><a href="http://localhost/ems/add_eedetails.php?ee_id=<?php echo $ee_id ?>">Add Details</a></li>
  <li><a href="ee_logout.php">Logout</a></li>
</ul>
</nav>


<br><br><br> <br> <br> 
<div class="col-sm-4" style="background-color:honeydew;">



<form action="" enctype="multipart/form-data" method='post'>


<?php

 if (isset($ee_image) && $ee_image != '') { ?>

  <img src="images/<?php echo $ee_image; ?>" style="margin:100px; width:300px ; height:300px; overflow:hidden;border:solid green" alt="Employee Image">
<?php }



/* ELSE BLANK IMAGE IS SHOWN */ else { ?>
  <img src="images/blank image.png" style="margin:10px; width:300px ; height:300px; overflow:hidden;border:solid green" alt="Employee Image">
<?php } ?>




&nbsp








</form>


  <div class="col-sm-12" style="background-color:honeydew; margin-left:700px ; margin-top:-400px">

    <?php
    //Professional Details file
    include "ee_professional_details.php";?>

</div>


<div class="col-sm-8" style="background-color:honeydew; margin-left:-10px ; margin-bottom:-900px">
<br>
<br>

<br>

<br>

<!-- MESSAGE BOX -->
<?php include "message.php" ?>

</div>

<br>
<div class="col-sm-12" style="background-color:honeydew; margin-left:700px ; margin-top:-80px">

<?php
    echo "<hr style=color:green;>";
    echo"<br>";


    //Personal Details
    include "ee_personal_details.php";

    
    ?>

    <br>




  </div>

</div>






</html>