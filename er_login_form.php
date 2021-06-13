<!-- EMPLOYER LOGIN FORM -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="css/er_login.css">
 
</head>

<body>


 <!-- FORM -->
<div class="container">
    <div class="login-form">
 <form class = "box" action =" " method = "post">

<!-- HEADINGS -->

<h1>Employer Login</h1>
<p1 style="color:#ADD8E6">Please Enter Your Credentials</p1>


<!-- COMPANY NAME -->
<input type="text" class="input1"  placeholder =" Enter your company" name = "company" required> <span class="asterisk_input"></span>


<!-- EMAIL -->
<input type="text" name = "email"  placeholder =" Email" required>


<!-- PASSWORD -->

<input type="password" name = "password"  placeholder ="Password" required>


<!-- SUBMIT -->
<input type="submit" name="login"  value ="Login">
<a href="er_forgot_form.php">Forgot Password? </a>
</form>

</div>
</div>
</body>

</html>



<?php

include "db_er_connection.php"; //DATABASE

if(isset($_POST['login'])) //IF LOGIN IS SET
{    $company_name=$_POST['company'];
  $email=$_POST['email'];
  $password=$_POST['password'];


//SQL INJECTION
  $company=mysqli_real_escape_string($connection,$company_name);
  $email=mysqli_real_escape_string($connection,$email);
  $password=mysqli_real_escape_string($connection,$password);



//FETCHING DATA FROM E_LOGIN TABLE
  $query = "SELECT * FROM er_login WHERE user_email='{$email}'";
$select_user_query = mysqli_query($connection, $query);

//FETCH DATA
while ($row = mysqli_fetch_assoc($select_user_query)) {
  $db_company=$row['user_company_name'];
  $db_email= $row['user_email'];
  $db_password = $row['user_password'];





 //Checking whether the email registered

 if(mysqli_num_rows($select_user_query)==0)
 {
     header("location:er_login_form.php");
 }


 $cryptpassword = crypt($password, $db_password);

  //VALIDATING  ALL DETAILS 

  if(($email==$db_email) && ($db_password==$cryptpassword) && ($company_name==$db_company))
  {  echo 
   //IF EQUAL SESSION STARTS AND SET
             session_start();
              $_SESSION['email']=$db_email;
              $_SESSION['password']=$db_password;
              $_SESSION['company']=$db_company;
              $_SESSION['last_login_timestamp'] = time();  


              //GO TO EMPLOYER PORTAL
           header("location:employer_portal.php");
  }

  else
  {//ERROR
  ?>
  <div class="error">
    <p><strong>Error!</strong> Invalid Input please enter valid inputs.</p>
  </div>
  <br>
  <!-- login page link -->
  <a href="http://localhost/ems/er_login_form.php" > Back to Login Page </a>
   
  
  <?php }}} ?>
  

























