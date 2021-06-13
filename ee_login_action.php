<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<style>
.error {
  margin-bottom: 15px;
  padding: 4px 12px;

  background-color: #ffdddd;
  border-left: 6px solid #f44336;
}
</style>

</head>
<body>
    
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

 

   

</body>
</html>