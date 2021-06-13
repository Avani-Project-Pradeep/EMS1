<!-- CONFIRMATION OF EMPLOYEE REGISTRATION-->
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Confirmation of Employee Registration</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- STYLESHEETS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .success {
      margin-bottom: 15px;
      padding: 4px 12px;

      background-color: #ddffdd;
      border-left: 6px solid #04AA6D;
    }
  </style>

</head>

<body style="background-color: white">


 <?php



  include "db_ee_connection.php";
  include "function.php";

  //GETTING EMAIL AND NAME FROM GET METHOD

  

  if (isset($_GET['email'])) {
    $to_email = $_GET['email'];
    $to_name=$_GET['name'];
  }

    




  //GENERATES PASSWORD
$user_password=password_generate(5);


//ENCRYPTING THE PASSWORD
$query="SELECT randSalt FROM ee_login";

$select_randsalt_query=mysqli_query($connection2,$query);
$row=mysqli_fetch_array($select_randsalt_query); //NEEDS ONLY ONE 

$salt=$row['randSalt']; //fetching the value of randsalt



//USING CRYPT FUNCTION

$user_passwordcrypt=crypt($user_password,$salt);


$query = "UPDATE ee_login SET ";
$query .="user_password   = '{$user_passwordcrypt}'" ;
$query .= "WHERE user_email='{$to_email}'";




$selectquery=mysqli_query($connection2,$query);



  $body =  "Hi!  $to_name    You are successfully registered. Click  here for Login 
<a href=http://localhost/ems/ee_login_form.php>Login </a><br>, Your password : $user_password
<br> Thanks,<br>Help Desk  ";


$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "Reply-To: no-reply@example.com\r\n"; // or
$headers .= "From:no-reply<no-reply@example.com>\r\n";


  $subject = "Successfully Registered";

  //Sending mail
  if (mail($to_email, $subject, $body, $headers)) {
    echo "
<div class=success>
  <p><strong>Success!</strong> You are Successfully Registered!<br> Email successfully sent to $to_email...</p>
</div>";
  } else {
    echo "Email sending failed...";
  }
