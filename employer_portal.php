<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Employer Portal</title>
    <style>
         .error {
      margin-bottom: 15px;
      padding: 4px 12px;

      background-color: #ffdddd;
      border-left: 6px solid #f44336;
    }
 
 </style>
</head>
    
<body style="background-color: honeydew;">



<?php 

include "db_er_connection.php";
$email_loggedin=$_SESSION['email'];
include "function.php";

if(isset($_POST['remove_img']))
{ 
 
    $query="UPDATE employer_personal_details SET er_image = ''  WHERE er_email='$email_loggedin'";

    $selectquery= mysqli_query($connection,$query);


    if($query)
    {
        header("location:employer_portal.php");
    }


}



if(isset($_POST['upload']))
{
      
     //print_r($_FILES);
    $er_image          =  ($_FILES['er_img']['name']);
    $er_image_temp     =  ($_FILES['er_img']['tmp_name']);
    move_uploaded_file($er_image_temp, "images/$er_image");



    $error1=0;


    //Image file size
    if (($_FILES['er_img']["size"] > 5000000)) {

        echo " <div class='error'>
    <p><strong></strong>Max file size is 5MB<br></p> 
    <a href=employer_portal.php>Back to home </a>

    </div> ";
        $error1++;
    }


    //CHECKING EXTENSION OF FILE


    //print_r($_FILES);

    $ext = pathinfo($er_image, PATHINFO_EXTENSION);
   
    if(($ext!='jpg')&&($ext!='jpeg')&&($ext!='png'))
    {
          echo"only jpeg/jpg or png is allowed";
    }



    if($error1==0){



    $query="UPDATE employer_personal_details SET er_image='$er_image' WHERE er_email='$email_loggedin'";
    $selectquery= mysqli_query($connection,$query);


    if($query)
    {
        header("location:employer_portal.php");
    }
    }
  


}





?>

</body>
</html>











<!DOCTYPE html>
<html lang="en">

<head>

  <!-- STYLESHEETS -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employer Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <style>
    body {
      background-color: honeydew
    }

    ;
  </style>

</head>

<?php


/* NAVIGATION BAR */

include "navbar.php"; ?>
<ul>

  <li><a href="http://localhost/ems/employer_portal.php">Home</a></li>
  <li><a href="http://localhost/ems/add_employee.php">Add Employees</a></li>
  <li><a href="manageindex.php">Manage Employees</a></li>
  <li><a href="er_logout.php">Logout</a></li>
</ul>
</nav>
<br>





<div class="row">
  <div class="col-sm-4" style="background-color:honeydew;">

    <!-- EDIT DETAILS  LINK -->
    <i class="fa fa-edit" style="font-size:36px;color:black"></i>
    <span style="font-size:36px;"><a href='edit_erportal.php?editprof=1&editper=1'>Edit details</a></span>

    <br><br> <br> <br> <br> <br> <br> <br> <br> <br>





    <?php
    //QUERY TO GENERATE IMAGE FROM DATABASE

    $email_loggedin = $_SESSION['email'];

    $query = "SELECT * FROM employer_personal_details WHERE er_email='$email_loggedin'";
    $selectquery = mysqli_query($connection, $query);




    while ($row = mysqli_fetch_assoc($selectquery)) {
      $er_image = $row['er_image'];




    ?>

      <form action="" enctype="multipart/form-data" method='post'>

        <!--  EMPLOYER IMAGE -->

        <!-- IF UPLOAD IMAGE THEN THE IMAGE IS SHOWN -->
        <?php if (isset($er_image) && $er_image != '') { ?>
          <img src="images/<?php echo $er_image; ?>" style="margin:10px; width:300px ; height:300px; overflow:hidden;border:solid green" alt="Employer Image">
        <?php }



        /* ELSE BLANK IMAGE IS SHOWN */ else { ?>
          <img src="images/blank image.png" style="margin:10px; width:300px ; height:300px; overflow:hidden;border:solid green" alt="Employer Image">
        <?php } ?>

        <br>


        <input type='submit' name='remove_img' value='Remove Image' style="font-size:18px">

        &nbsp


        <input type='file' name='er_img' value="upload">
        <input type="submit" name='upload' value="Upload">




        <br>
        <br>



      </form>
    <?php } ?>
    <!-- WHILE LOOP ENDS HERE -->

  </div>


  <br>
  <br>


  <div class="col-sm-8" style="background-color:honeydew;">

    <?php
    //Professional Details file
    include "er_professional_details.php";

    echo "<br><br>";

    echo "<hr style=color:green;>";

    //Personal Details
    include "er_personal_details.php";
    ?>

    <br>




  </div>

</div>








</html>