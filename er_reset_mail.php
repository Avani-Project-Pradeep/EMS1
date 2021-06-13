<!-- ACTION TO GET RESET PASSWORD LINK TO INPUT EMAIL -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Mail</title>

</head>


<!-- STYLES FOR MESSAGE -->
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


//DATABASE CONNECTION
include "db_er_connection.php";

//WHEN FORGOT IS SET, EMAIL ID FETCH
if(isset($_POST['forgot']))
{
    $to_email=$_POST['email'];



    //SQL INJECTION






//SELECTING THE MAIL ID FROM DB


$query="SELECT * FROM er_login WHERE user_email='{$to_email}'";
$select_user_query = mysqli_query($connection, $query);



//CHECKING WHETHER EMAIL EXISTS

if(mysqli_num_rows($select_user_query)==0)
{
    echo"
    <div class='error'>
  <p><strong>Error!</strong> Entered email id does not exist.</p>
  <a href=http://localhost/ems/er_login_form.php> Back to Login Page </a>
 
</div>";

}
else
{
   //IF EXISTS, GENERATE THE TOKEN VALUE IN USER TABLE

   
   $length = 5;

   $token = bin2hex(openssl_random_pseudo_bytes($length));



   //UPDATE TOKEN VALUE
    $query="UPDATE er_login SET token ='{$token}' WHERE user_email='{$to_email}'";
    $select_user_query = mysqli_query($connection, $query);
    
    







//FETCH NAME TO WRITE IN EMAIL  FROM DATABASE
$query = "SELECT * FROM employer_personal_details WHERE er_email='{$to_email}'";
        $select_user_query = mysqli_query($connection, $query);
    
        if (!$select_user_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        else{
    
            while ($row = mysqli_fetch_assoc($select_user_query)) {
        
                 
                $db_fname= $row["er_firstname"];
                $db_lname=$row["er_lastname"];

               // echo $db_lname,$db_fname;


                
            }

        }

        //mail body


        $subject= "Reset your password";


        $body= "Hey, $db_fname $db_lname<br>
        As per your request regarding reset password, please click the link below <br>
        <a href=http://localhost/ems/er_reset_form.php?email=$to_email&token=$token> Reset Password 
        </a></h2><br>If you have not requested for password recovery, then kindly ignore this email<br>Thanks<br>Help Desk";


        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "Reply-To: no-reply@example.com\r\n"; // or
        $headers .= "From:no-reply<no-reply@example.com>\r\n";
        


        //sending mail through mail function

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