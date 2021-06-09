<?php
include "db_er_connection.php";
global $error1;
$error1 = 0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>



  <link rel="stylesheet" href="css/edit.css">

</head>

<body>





  <?php //FETCHING DETAILS FROM PERSONAL EMPLOYER TABLE



  $email_loggedin = $_SESSION['email'];

  $query = "SELECT * FROM employer_personal_details WHERE er_email='$email_loggedin'";
  $selectquery = mysqli_query($connection, $query);




  while ($row = mysqli_fetch_assoc($selectquery)) {
    $er_email = $row['er_email'];
    $er_fname = $row['er_firstname'];
    $er_lname = $row['er_lastname'];
    $er_dob = $row['er_dob'];
    $er_phone = $row['er_phone'];
    $er_city = $row['er_city'];
    $er_state = $row['er_state'];
    $er_gender = $row['er_gender'];
    $er_address = $row['er_address'];
    $er_education = $row['er_educational'];






  ?>












    <!-- PERSONAL DETAILS OF EMPLOYER -->
    <div id=formp1 class="peform">
      <br>
      <div id='formp' class="container">
        <h2 style="color: green;"><u>Personal Details</u></h2>

        <form action="" method=post>
          <div class="form-group">

            <label>First Name </label>
            <input type='text' name="er_fname" value="<?php echo $er_fname ?>" size="18" style="font-size: 18px;">
            <span style="color: red;">


              <?php if (isset($_POST['editp'])) {

                include "function.php";


                $fname = $_POST['er_fname'];
                if (empty($fname)) {
                  $error1++;
                  echo "*cannot be empty";
                } else {

                  if (error_containdigit($fname)) {
                    $error1++;
                  }

                  if (error_maxlength($fname, 50)) {
                    $error1++;
                  }
                }
              }
              ?>
            </span>









            </span>


            <label>Last Name</label>
            <input type="text" name="er_lname" value="<?php echo $er_lname ?>" size="15" style="font-size: 18px;">
            <span style="color: red;">

              <?php if (isset($_POST['editp'])) {

                $lname = $_POST['er_lname'];
                if (empty($fname)) {
                  echo "*cannot be empty";
                } else {

                  if (error_containdigit($lname)) {
                    $error1++;
                  }

                  if (error_maxlength($lname, 50)) {
                    $error1++;
                  }
                }
              }



              ?>
            </span>









            &nbsp



            <label> DOB </label>
            <input type="date" name="er_dob" value="<?php echo $er_dob ?>" style="font-size: 20px;" size="15" />

          </div>

          <div class="form-group">


            <label> Email </label>
            <input type="email" name="er_email" value="<?php echo $er_email ?>" style="font-size: 18px;" size="60" readonly />
            <span>




            </span>

            &nbsp
            <br>
            <br>

            <label> Phone Number </label>
            <input type="tel" name="er_phone" value="<?php echo $er_phone ?>" style="font-size: 18px;" size="10" />
            <label>
              <span style="color: red;">

                <?php global $error1;

                if (isset($_POST['editp'])) {
                  if ((empty($_POST['er_phone'])) || (error_phone($_POST['er_phone']))) {



                    $error1++;
                  }
                }





                ?>

              </span>

          </div>

          <div class="form-group">

            <label>City</label>
            <input type='text' name="er_city" value="<?php echo $er_city ?>" size="15" style="font-size: 18px;">

            &nbsp

            <label>State</label>
            <input type="text" name="er_state" value="<?php echo $er_state ?>" size="20" style="font-size: 18px;">

            &nbsp

            &nbsp


            <label> Gender </label>

            <?php if ($er_gender == 'male') {
            ?>

              <input type="radio" id="male" name="er_gender" value="male" checked>
              <label for="male">Male</label>
              <input type="radio" id="female" name="er_gender" value="female">
              <label for="female">Female</label>
            <?php } else { ?>

              <input type="radio" id="male" name="er_gender" value="male">
              <label for="male">Male</label>
              <input type="radio" id="female" name="er_gender" value="female" checked>
              <label for="female">Female</label>

            <?php } ?>

          </div>
          <div class="form-group">


            <label>Address</label>
            <input type='textarea' style="font-size: 20px;" name="er_address" value="<?php echo $er_address ?>" size='40'>


            <br>
            <br>
            <label>Education</label>
            <input type='textarea' style="font-size: 20px;" name="er_educational" value="<?php echo $er_education ?>" size='40'>

          </div>

          <input type="submit" value="Save" name='editp'>


        </form>


      </div>
</body>

</html>

<?php

    if (isset($_GET['editper'])) {
      if (isset($_POST['editp'])) {
        $er_emailp = $_POST['er_email'];
        $er_fnamep = $_POST['er_fname'];
        $er_lnamep = $_POST['er_lname'];
        $er_dobp = $_POST['er_dob'];
        $er_phonep = $_POST['er_phone'];
        $er_cityp = $_POST['er_city'];
        $er_statep = $_POST['er_state'];
        $er_genderp = $_POST['er_gender'];
        $er_addressp = $_POST['er_address'];
        $er_educationp = $_POST['er_educational'];



        //IF NO ERROR,THEN ONLY DATABASE GETS UPDATED
        if ($error1 == 0) {
          $query = "UPDATE employer_personal_details SET ";
          $query .= "er_firstname  = '{$er_fnamep}', ";
          $query .= "er_lastname = '{$er_lnamep}', ";
          $query .= "er_dob = '{$er_dobp}',";
          $query .= "er_phone   = '{$er_phonep}',";
          $query .= "er_city= '{$er_cityp}',";
          $query .= "er_state  = '{$er_statep}',";
          $query .= "er_gender  ='{$er_genderp}',";
          $query .= "er_address ='{$er_addressp}',";
          $query .= "er_educational ='{$er_educationp}'";
          $query .= "WHERE er_email ='{$er_email}' ";

          $update = mysqli_query($connection, $query);

          if (($update) && ($error1 == 0)) {

            echo " <div class='success'>
     <p><strong></strong> Details are updated successfully<br></p> </div> ";
          } else {
            die("query failed:" . mysqli_error($connection));
          }
        }
      }
    }
  }
