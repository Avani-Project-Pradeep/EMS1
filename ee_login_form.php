



<?php

include "db_ee_connection.php";

//FETCHING DETAILS FROM FORM
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
       //print_r($_POST);


       //CHECKING EMPTY

if(empty($email)&& empty($password) )
{
    header("location:ee_login_form.php");

}

  //SQL INJECTION
  $email = mysqli_real_escape_string($connection2, $email);
  $password = mysqli_real_escape_string($connection2,$password);

   //FETCHING DETAILS FROM USER TABLE

   $query = "SELECT * FROM ee_login WHERE user_email='{$email}'";
   $select_user_query = mysqli_query($connection2, $query);

   if (!$select_user_query) {
       die("QUERY FAILED" . mysqli_error($connection2));
   }
   else{

   while ($row = mysqli_fetch_assoc($select_user_query)) {

       $db_email= $row['user_email'];
       $db_password = $row['user_password'];
       $db_id=$row['user_id'];
       




 //Checking whether the email registered


if(mysqli_num_rows($select_user_query)==0)
{
    header("location:ee_login_form.php");
}

$cryptpassword = crypt($password, $db_password);

    //VALIDATING  ALL DETAILS 

    if(($email==$db_email) && ($db_password==$cryptpassword))
    {
     
     //IF EQUAL SESSION STARTS AND SET
               session_start();
                $_SESSION['email']=$db_email;
                $_SESSION['password']=$db_password;
                $_SESSION['id']=$db_id;
        
                $_SESSION['last_login_timestamp'] = time();
                

 
                //GO TO EMPLOYEE  PORTAL
             header("location:employee_portal.php");
 
    }
 else
 {
     header("location:ee_login_form.php");
 }
 ?>

  
 
 
 <?php }}} ?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/er_login.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
</head>
<body>
 
<div class="container">
    <div class="login-form">
 <form class = "box" action ="" method = "post">
<h1> Employee Login</h1>
<p style="color:#ADD8E6"> Please Enter Your Credentials </p>
<input type="text" name = "email"  placeholder =" Email" required>
<i class="far fa-envelop"></i>
<input type="password" name = "password"  placeholder ="Password" required>
<i class="fas fa-lock"></i>
<input type="submit" name="login"  value ="Login">
<a href="ee_forgot_form.php"> Forgot Password? </a>
</form>
</div>
</div>
</body>
</html>
