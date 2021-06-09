<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
session_start();
$email_loggedin=$_SESSION['email'];
include "function.php";

if(isset($_POST['remove_img']))
{ 
 
    $query="UPDATE employer_personal_details SET er_image = ''  WHERE er_email='$email_loggedin'";

    $selectquery= mysqli_query($connection,$query);

    check($query); //checks result of  query execution

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
   
    if(($ext!='jpg')&&($ext!='jpeg')||($ext!='png'))
    {
          echo"only jpeg/jpg or png is allowed";
    }



    if($error1==0){



    $query="UPDATE employer_personal_details SET er_image='$er_image' WHERE er_email='$email_loggedin'";
    $selectquery= mysqli_query($connection,$query);

    check($query); //checks result of  query execution

    if($query)
    {
        header("location:employer_portal.php");
    }
    }
  


}





?>

</body>
</html>