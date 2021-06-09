<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">

</head>
<body>
<nav >

       <div> 
       <!-- LOGO -->
           <h1><img src="images/logo1.jpeg " style="width: 80px; ; height:80px;" alt="logo"></a></h1>

       </div>
       <!-- HEADING -->
       <h1 style="color: whitesmoke;">EMPLOYER PORTAL </h1>

     
     
     
     <?php
      /*  if(time() - $_SESSION['last_login_timestamp'] > 300) { //subtract new timestamp from the old one
    echo"<script>alert('5 Minutes over!');</script>";
    unset($_SESSION['email'], $_SESSION['password'], $_SESSION['timestamp']);
    $_SESSION['logged_in'] = false;
    header("Location:er_login_form.php " ); //redirect to index.php
    exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
}
 */
?>
       
             

       <!-- SOME FILES THAT ARE NEEDED IN EVERY PAGE SO INCLUDING IT IN NAV BAR -->
       <!-- THIS HELPS IN NO MULTI DECLARATION ERROR -->
       
       
      <!-- NAVIGATION OPTIONS CONTINUED ... -->