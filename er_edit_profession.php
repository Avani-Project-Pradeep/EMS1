
<!-- EDIT PROFESSIONAL DETAILS -->

<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="utf-8">


  <!-- STYLE -->
  <link rel="stylesheet" href="css/edit.css">


</head>

<body>

  <?php

  //FETCHING DETAILS FROM PROFESSIONAL EMPLOYER TABLE
  



  $email_loggedin = $_SESSION['email'];

  $query = "SELECT * FROM employer_professional_details WHERE er_email='$email_loggedin'";
  $selectquery = mysqli_query($connection, $query);



  while ($row = mysqli_fetch_assoc($selectquery)) {
    $er_designation = $row['er_designation'];
    $er_location = $row['er_location'];
    $er_division = $row['er_division'];
    $er_doj = $row['er_doj'];
    $er_skill = $row['er_skill'];
    $er_work = $row['er_work'];
    $er_bank = $row['er_bank'];
    $er_company = $row['er_company_name'];
  }



  if (isset($_GET['editprof'])) {

    if (isset($_POST['editit'])) {

      //getting edit data from form
      $er_designationp = $_POST['er_designation'];
      $er_locationp = $_POST['er_location'];
      $er_divisionp = $_POST['er_division'];
      $er_dojp = $_POST['er_doj'];
      $er_skillp = $_POST['er_skill'];
      $er_workp = $_POST['er_work'];
      $er_bankp = $_POST['er_bank'];
      $er_companyp = $_POST['er_company_name'];




      //COMPANY NAME VALIDATION

      $error1 = 0;

      if (strlen($er_companyp) > 50) //MAX LENGHTH SHOULD BE 50
      {

        $error1++; //SPECIFIES ERROR



        echo " <div class='error'>
        <p><strong></strong> Max Limit of company name is 50 characters<br></p> </div> ";
      }







      if (empty($er_companyp)) {
        $error1++; //SPECIFIES ERROR



        echo " <div class='error'>
          <p><strong></strong> Company name cannot be blank<br></p> </div> ";
      }









      $containsDigit   = preg_match('/\d/', $er_companyp); //CHECKS -NUMERIC VALUE (NOT ALLOWED)

      if ($containsDigit) {


        $error1++;

        echo " <div class='error'>
                <p><strong></strong> Company name should not contain numeric value!!<br></p> </div> ";
      }






      //IF NO ERROR,THEN ONLY DATABASE GETS UPDATED
      if ($error1 == 0) {
        $query = "UPDATE employer_professional_details SET ";
        $query .= "er_designation  = '{$er_designationp}', ";
        $query .= "er_location = '{$er_locationp}', ";
        $query .= "er_division = '{$er_divisionp}', ";
        $query .= "er_skill = '{$er_skillp}', ";
        $query .= "er_work   = '{$er_workp}', ";
        $query .= "er_bank= '{$er_bankp}', ";
        $query .= "er_company_name  = '{$er_companyp}' ";
        $query .= "WHERE er_email = '{$email_loggedin}' ";



        $update = mysqli_query($connection, $query);

        if ($update) {

          echo " <div class='success'>
          <p><strong></strong> Details are updated successfully<br></p> </div> ";
     
          
        }
      }
    }
  }






  ?>









  <!-- Professional details -->
  <div id='formp' class="container">
    <h2 style="color: green;"><u>Professional Details<u></h2>

    <form action="" method="post">

      <div class="form-group">

        <br>






        <label>Designation</label>
        <input type='text' name="er_designation" value="<?php echo $er_designation ?>" size="15" style="font-size: 18px;">


        &nbsp

        <label>Location:</label>
        <input type="text" name="er_location" value="<?php echo $er_location ?>" size="10" style="font-size: 18px;">

        &nbsp

        <label> Company Name: </label>
        <input type="text" name="er_company_name" value="<?php echo $er_company ?>" style="font-size: 18px;" size="15" />
        <label>

          &nbsp

          <label> Division: </label>
          <input type="text" name="er_division" value="<?php echo $er_division ?>" style="font-size:15px;" size="15">

      </div>
      <div class="form-group">

        <label> Date of Joining: </label>
        <input type="date" name="er_doj" value="<?php echo $er_doj ?>" style="font-size: 15px;" size="15" />

        &nbsp

        <label> Work Experience: </label>
        <input type="text" name="er_work" style="font-size: 20px;" value="<?php echo $er_work ?>" size="10" />
        <i class="fa fa-briefcase" style="font-size:24px"></i>


        <br> <br>
        <label>Skills</label>
        <input type='textarea' style="font-size: 20px;" name="er_skill" value="<?php echo $er_skill ?>" size='40'>
        <br><br>

        <label>Bank Account Details</label>
        <input type='textarea' style="font-size: 20px;" name="er_bank" value="<?php echo $er_bank ?>" size='40'>

      </div>

      <input type="submit" value="Save" name='editit'>


    </form>
  </div>

</body>

</html>