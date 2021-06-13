

<!-- EMPLOYER REGISTRATION FORM-->


<!-- DATABSE -->

<?php include "db_er_connection.php"; 
           include "function.php";
           ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employer Registration</title>


  <!-- STYLESHEETS -->

  <link rel="stylesheet" href="css/er_register.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body>

  <!-- EMPLOYER REGISTRATION FORM -->

  <form action=" " enctype="multipart/form-data" method='post'>
    <div class="container">
      <h1><u>Employer Registeration</u></h1>
      <hr>


      <!-- FORM -->



      <input type="text" class="input1"  placeholder="Enter Company name" name="er_comp_name" ><span class="asterisk_input" ></span>
      <?php $red='red'?>
      <span style="color:red">
        <?php
        global $error1; //TO COUNT ERRORS 
        $error = 0;

        if (isset($_POST['er_register'])) {
          $comp_name = $_POST['er_comp_name'];

          if (empty($comp_name)) {
            echo "*Required Field";
            $error1++;
          } 
          else {

            if (strlen($comp_name) > 50) //MAX LENGHTH SHOULD BE 50
            {

              $error1++; //SPECIFIES ERROR


            }


           if(error_containdigit($comp_name))
           {
             $error1++;
           }


            //CHECKS WHETHER COMPANY NAME IS TAKEN OR NOT.. IF YES THEN ERROR




            $query = "SELECT * FROM employer_professional_details WHERE er_company_name='$comp_name'";
            $select_user_query = mysqli_query($connection, $query);

            if ($select_user_query) {



              if (mysqli_num_rows($select_user_query) != 0) {

                $error1++;
                  
                

                echo "*Company name is already taken!!";

              }
            }
          }
        }



        ?>


      </span>

      <br>
      <br>
      <br>


      <input type="text" class="input1" style="background-color: <?php echo $returnStyle2 ?>;" placeholder="Enter Company Website" name="er_comp_website"><span class="asterisk_input"></span>
      <span style="color:red">
        <?php
        //REQUIRED
        if (isset($_POST['er_register'])) {
          $website = $_POST['er_comp_website'];

          if (empty($website)) {
            echo "*Required Field";
            $error1++;
          } else {


            //VALIDATE URL

            if (!filter_var($website, FILTER_VALIDATE_URL)) {
              $returnStyle2 = '#ffdddd';

              $error1++;

              echo "*Invalid format of website ";
            }
          }
        } ?>

        <br>
        <br>

        <!-- TERMS AND CONDITIONS -->

        <span><label style="font-size: 20px; color:blue;  display:inline-block">Upload Terms and Conditions agreement</label> <i class='fas fa-upload' style='font-size:24px'></i> <span class="asterisk_input1"></span> <span><input type="file" name="er_tc"> </span></span>
        <span style="color:red">
          <?php
          if (isset($_POST['er_register'])) {
            $er_tc = $_FILES['er_tc']['name'];
            $er_tc_temp = $_FILES['er_tc']['tmp_name'];
            //REQUIRED

            if (empty($er_tc)) {
              echo "*Required Field";
              $error1++;
            } else {
              if (($_FILES['er_tc']["size"] > 500000)) {

                echo "*Max file size is 500KB ";
                $error1++;
              }
              //PDF IS ALLOWED ONLY
              $ext = pathinfo($er_tc, PATHINFO_EXTENSION);

              if ($ext != 'pdf') {

                echo "*Only pdf format is allowed   .";
                $error1++;
              }
            }
          }
          ?>






          <br>



        
          <!-- COMPANY DOCUMENTS -->



          <label style="font-size: 20px; color:blue; display:inline-block">Upload Company Documents</label> <i class='fas fa-upload' style='font-size:24px'></i> <span class="asterisk_input1"></span> <span><input type="file" name="er_cd"></span>

          <span style="color:red">
            <?php
            if (isset($_POST['er_register'])) {
              $er_cd = $_FILES['er_cd']['name'];
              $er_cd_temp = $_FILES['er_cd']['tmp_name'];


              if (empty($er_cd)) {
                echo "*Required Field";
                $error1++;
              } else {
                if (($_FILES['er_cd']["size"] > 500000)) {

                  echo "*Max file size is 500KB ";
                  $error1++;
                }

                $ext = pathinfo($er_cd, PATHINFO_EXTENSION);

                if ($ext != 'pdf') {

                  echo "*Only pdf format is allowed   .";
                  $error1++;
                }
              }
            }
            ?>






            <br>
            <br>

            <input type="tel" class="input1" style="background-color: <?php echo $returnStyle3 ?>;" placeholder="Enter Phone Number " name="er_phone"><span class="asterisk_input"></span>

            <span style="color:red">
              <?php
              if (isset($_POST['er_register'])) {

                $er_phone = $_POST['er_phone'];

                if (empty($er_phone)) {
                  echo "*required field";
                  $error1++;
                } else {
                  $mobilenumber = "/^[0-9][0-9]{9}$/";

                  if (!preg_match($mobilenumber, $er_phone)) {

                    $returnStyle3 = "#ffdddd";

                    echo " <div class='error'>*Please enter your 10 digit phone number ";
                    $error1++;
                  }
                }

                //CHECKING WHETHER PHONE NUMBER IS REGISTERED OR NOT

                $query = "SELECT * FROM employer_personal_details WHERE er_phone='{$er_phone}'";
                $select_user_query = mysqli_query($connection, $query);

                if ($select_user_query) {



                  if (mysqli_num_rows($select_user_query) != 0) {

                    echo " 
          *This phone number is registered<br> ";
                    $returnStyle3 = "#ffdddd";



                    $error1++;
                  }
                }
              } ?>

 <br>
 <br>
              <input type="text" placeholder="City" name="er_city" id=location>



              &nbsp &nbsp
              <span>
                <?php
                if (isset($_POST['er_register'])) {
                  $city = $_POST['er_city'];

                  if (strlen($city) > 50) {
                    $returnStyle6 = '#ffdddd';

                    $error1++;


                    echo "Limit exceeded ";
                  }
                  if(error_containdigit($city))
                  {
                    $error1++;
                  }
                }

                ?></span>

              <input type="text" placeholder="State" name="er_state" id=location>
              <span>
                <?php
                if (isset($_POST['er_register'])) {
                  $state = $_POST['er_state'];

                  if (strlen($state) > 50) {

                    $error1++;


                    echo "Limit exceeded ";
                  }
                  if(error_containdigit($state))
                  {
                    $error1++;
                  }
                }

                ?></span>


              <br>



              <input type="text" style="background-color: <?php echo" $returnStyle4" ?>;" placeholder="Enter Email" class="input1" name="er_email"><span class="asterisk_input"></span>
              <span style="color:red">
                <?php
                if (isset($_POST['er_register'])) {
                  $email = $_POST['er_email'];
                  if (empty($email)) {
                    echo "*required field";
                    $error1++;
                  } else {


                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $returnStyle4 = '#ffdddd';

                      $error1++;


                      echo "*Invalid format of email";
                    }

                    //CHECKING EMAIL IS REGISTERED OR NOT


                    $query = "SELECT * FROM employer_personal_details WHERE er_email='{$email}'";
                    $select_user_query = mysqli_query($connection, $query);

                    if ($select_user_query) {
                      if (mysqli_num_rows($select_user_query) != 0) {


                        echo "This email is registered";
                        $returnstyle4 = "#ffdddd";
                      }
                    }
                  }
                }
                ?>
              </span>



              <input type="password" style="background-color: <?php echo $returnStyle5 ?>;" class="input1" placeholder="Enter Password" name="er_password"><span class="asterisk_input"></span>

              <span style="color: red; ">

                <?php
                if (isset($_POST['er_register'])) {

                  $password = $_POST['er_password'];

                  if (empty($password)) {
                    echo "*required field";
                    $error1++;
                  } 
                  else {


                    //MAX LENGTH OF PASSWORD IS 8
                    if (strlen($password) > 8) {

                      
                       
                      $error1++;


                      echo "Limit exceeded";
                    }
                  }
                } ?>
              </span>


              <input type="password" class="input1" style="background-color: <?php echo "$returnStyle6" ?>;" placeholder="Confirm Password" name="er_confirm_password"><span class="asterisk_input"></span>
              <span style="color: red;">

                <?php
                if (isset($_POST['er_register'])) {
                  $confirm = $_POST['er_confirm_password'];

                  if (empty($confirm)) {
                    echo "*required field";
                    $error++;
                  } else {
                    if ($password !== $confirm) {
                      $returnStyle6 = '#ffdddd';

                      $error1++;


                      echo "Password does not match. ";
                    }
                  }
                } ?>






                <hr>


                <input type="submit" name='er_register' value="Register" class="registerbtn">
    </div>


  </form>

</body>

</html>



<?php

if (isset($_POST['er_register'])) {
  if ($error1 == 0) //THIS SPECIFIES NO ERROR
  {
    //INSERT VALUES TO TABLES

    $comp_name = $_POST['er_comp_name'];
    $website = $_POST['er_comp_website'];
    $er_phone = $_POST['er_phone'];
    $email = $_POST['er_email'];
    $password = $_POST['er_password'];
    $confirm = $_POST['er_confirm_password'];
    $city = $_POST['er_city'];
    $state = $_POST['er_state'];
   

    //INSERTING FILES TO TABLES
   
    $er_tc = $_FILES['er_tc']['name'];
    $er_tc_temp = $_FILES['er_tc']['tmp_name'];


    move_uploaded_file($er_tc, "/docs/$er_tc");


    $er_cd = $_FILES['er_cd']['name'];
    $er_cd_temp = $_FILES['er_cd']['tmp_name'];

    move_uploaded_file($er_cd, "/docs/$er_cd");



    //SQL INJECTION
     $comp_name=mysqli_real_escape_string($connection,$comp_name);
     $website=mysqli_real_escape_string($connection,$website);
     $er_phone=mysqli_real_escape_string($connection,$er_phone);
     $email=mysqli_real_escape_string($connection,$email);
     $password=mysqli_real_escape_string($connection,$password);
     $confirm=mysqli_real_escape_string($connection,$confirm);
     $state=mysqli_real_escape_string($connection,$state);
     $city=mysqli_real_escape_string($connection,$city);



 //IF NO ERROR THEN INSERT TO DATABASE


    if ($error1 == 0) {


       //QUERY TO INSERT PROFESSIONAL DETAILS

      $query1 = "INSERT INTO employer_professional_details (er_email,er_company_name, er_comp_website, er_tc, er_docs) VALUES('{$email}','{$comp_name}','{$website}','{$er_tc}','{$er_cd}')";




      $query_er1 = mysqli_query($connection, $query1);

      if (!$query_er1) {
        die("query failed:" . mysqli_error($connection));
      }



      //QUERY TO INSERT PERSONAL DETAILS

      $query2 = "INSERT INTO employer_personal_details (er_phone,er_city, er_state, er_email)
  VALUES('{$er_phone}','{$city}','{$state}','{$email}')";

      $query_er2 = mysqli_query($connection, $query2);

      if (!$query_er2) {
        die("query failed:" . mysqli_error($connection));
      }






       //ENCRYPTING PASSWORD

      $query = "SELECT randSalt FROM er_login";
      $select_randsalt_query = mysqli_query($connection, $query);
      if (!$select_randsalt_query) {
        die("Query Failed" . mysqli_error($connection));
      }
      $row = mysqli_fetch_array($select_randsalt_query); //NEEDS ONLY ONE 

      $salt = $row['randSalt']; //fetching the value of randsalt



      $password = crypt($password, $salt); //crypt




      //QUERY    

      $query3 = "INSERT INTO er_login(user_email,user_password,user_company_name) VALUES('{$email}', '{$password}','{$comp_name}')";





      $query_er3 = mysqli_query($connection, $query3);
      if (!$query_er3) {
        die("query failed:" . mysqli_error($connection));
      }
    }

    //When all queries will run successfully.. registration confirmation

    if (($query_er1) && ($query_er2) && ($query_er3)) {

      echo "<a style=color:green;font-size:100px; href='er_register_confirm.php?email=$email'>Successful Registration , Click to Continue</a></h1>";
    }
  }
}





?>