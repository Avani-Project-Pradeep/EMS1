<!DOCTYPE html>
<html lang="en">

<head>
  <title>Confirmation of Employer Registration</title>

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


  //CONNECT DATABASE
  include "db_er_connection.php";




  //GETTING EMAIL FROM GET METHOD

  if (isset($_GET['email'])) {

    $to_email = $_GET['email']; //TO


    $body =  "Hi! You are successfully registered. Click  here for Login 
<a href=http://localhost/ems/er_login_form.php>Login </a><br>
Register your employees with this link <a href=http://localhost/ems/ee_register_form.php>Register Employee</a><br> Thanks,<br>Help Desk  "; //BODY



    // Always set content-type when sending HTML email
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= "Reply-To: no-reply@example.com\r\n"; // or
    $headers .= "From:no-reply<no-reply@example.com>\r\n";



    $subject = "Successfully Registered"; //SUBJECT

    //Sending mail
    if (mail($to_email, $subject, $body, $headers)) {

      echo "
<div class=success>
  <p><strong>Success!</strong> You are Successfully Registered!<br> Email successfully sent to $to_email...</p>
</div>"; //SUCCESS MESSAGE
    } else {
      echo "Email sending failed...";
    }
  }
