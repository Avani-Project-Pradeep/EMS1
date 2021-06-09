<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Mail</title>

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
  <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
</head>

    <style>
.error {
  margin-bottom: 15px;
  padding: 4px 12px;

  background-color: #ffdddd;
  border-left: 6px solid #f44336;
}

.success {
      margin-bottom: 15px;
      padding: 4px 12px;

      background-color: #ddffdd;
      border-left: 6px solid #04AA6D;
    }
    </style>
</head>
<body>
    
</body>
</html>









<?php

include "db_ee_connection.php";

//WHEN FORGOT IS SET, EMAIL ID FETCH
if(isset($_POST['forgot']))
{
    $to_email=$_POST['email'];









//SELECTING THE MAIL ID FROM DB


$query="SELECT * FROM ee_login WHERE user_email='{$to_email}'";
$select_user_query = mysqli_query($connection2, $query);



//CHECKING WHETHER EMAIL EXISTS

if(mysqli_num_rows($select_user_query)==0)
{
    echo"
    <div class='error'>
  <p><strong>Error!</strong> Entered email id does not exist.</p>
  <a href=http://localhost/ems/ee_login_form.php> Back to Login Page </a>
 
</div>";

}
else
{
   //IF EXISTS, GENERATE THE TOKEN VALUE IN USER TABLE

   
   $length = 5;

   $token = bin2hex(openssl_random_pseudo_bytes($length));



   //UPDATE TOKEN VALUE
    $query="UPDATE ee_login SET token ='{$token}' WHERE user_email='{$to_email}'";
    $select_user_query = mysqli_query($connection2, $query);
    
    
   if(!$select_user_query)
   {
    die("query failed:" . mysqli_error($connection2));

   }






//FETCH NAME TO WRITE IN EMAIL  FROM DATABASE
$query = "SELECT * FROM employee_personal_details WHERE ee_email='{$to_email}'";
        $select_user_query = mysqli_query($connection2, $query);
    
        if (!$select_user_query) {
            die("QUERY FAILED" . mysqli_error($connection2));
        }
        else{
    
            while ($row = mysqli_fetch_assoc($select_user_query)) {
        
                 
                $db_fname= $row["ee_first_name"];
                $db_lname=$row["ee_last_name"];
                 
               //echo $db_lname,$db_fname;


                
            }

        }

        //mail body


        $subject= "Reset your password";


        $body= "Hey, $db_fname $db_lname<br>
        As per your request regarding reset password, please click the link below <br>
        <a href=http://localhost/ems/ee_reset_form.php?email=$to_email&token=$token> Reset Password 
        </a></h2><br>If you have not requested for password recovery, then kindly ignore this email<br>Thanks<br>Help Desk";


        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "Reply-To: no-reply@example.com\r\n"; // or
        $headers .= "From:no-reply<no-reply@example.com>\r\n";
        


if (mail($to_email, $subject, $body,$headers)) 
{

    echo"<div class='success'>
    <p><strong>Success!</strong>Reset password link is sent successfully, Please check your mail</p>
  </div>";
  }
else {
    echo "Email sending failed...";
}

}

        
}




?>