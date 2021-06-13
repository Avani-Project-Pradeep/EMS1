

<!DOCTYPE html>
<html lang="en">
<head>

<!-- STYLESHEETS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



    <style> body{background-color: honeydew};</style>  
</head>

<?php 


/* TAB2 FORM */







/* NAVIGATION BAR */

include "e_navbar.php"; ?>
<ul>


<li><?php


 include "db_ee_connection.php";
session_start();
include "function.php";


$email_loggedin=$_SESSION['email'];

$query = "SELECT * FROM employee_personal_details WHERE ee_email='$email_loggedin'";
$selectquery = mysqli_query($connection2, $query);


$row=mysqli_fetch_assoc($selectquery);
if(!empty($row['ee_image']))
{
$ee_image=$row['ee_image'];

 if (isset($ee_image) && $ee_image != '') { ?>
  <img src="images/<?php echo $ee_image; ?>"style="width:50px; height:50px;" alt="Employee Image"><?php }


 }
/* ELSE BLANK IMAGE IS SHOWN */ else { ?>
  <img src="images/blank image.png" style="width:50px; height:50px;" alt="Employee Image">
<?php } ?>

</li>


<li><a href="http://localhost/ems/employee_portal.php">Home</a></li>
<li><a href="ee_logout.php">Logout</a></li>
</ul>
</nav>
<br>





<ul class="nav nav-pills nav-justified">
    <li ><a href="http://localhost/ems/add_eedetails.php?ee_id=<?php echo $ee_id ?>">Tab1</a></li>
    <li style="background-color:green;"><a style='color:white'  href="add_employee_tab2.php">Tab 2</a></li>
  </ul>
</div>

<div class="centered">

<h1 style="margin-top:40px; margin-left:10px"><u> Add Employee</u> </h1>
<br>



<?php $ee_id=$_GET['id']?>

<form action=" "  enctype="multipart/form-data" method="POST">

<img name='ee_image' src="images/
<?php
//QUERY TO GENERATE IMAGE FROM DATABASE

$ee_id=$_GET['id'];

include "db_ee_connection.php";
$query ="SELECT * FROM employee_personal_details WHERE ee_id=$ee_id";

$selectquery = mysqli_query($connection2, $query);




while ($row = mysqli_fetch_assoc($selectquery)) {
    
 if(!empty($row['ee_image']))

 {

  $ee_image = $row['ee_image'];
  if(!empty($ee_image))
      {

  echo "$ee_image";}

     }
 else {
   echo 'blank image.png';
}}

?>

" style="margin:10px; width:300px ; height:300px;overflow:hidden;border:solid green" alt="Employee Image">
<br>
<input type="submit" name="remove" value="remove">

<input type="file"  name="ee_image" value="upload">
<input type="submit" name="upload" value="upload">



</form>
<?php
if(isset($_POST['upload']))
 {$ee_id=$_GET['id'];

        
      
   //print_r($_FILES);
    $ee_image          =  ($_FILES['ee_image']['name']);
    $ee_image_temp     =  ($_FILES['ee_image']['tmp_name']);
    move_uploaded_file($ee_image_temp, "images/$ee_image");



    $error2=0;


    //Image file size
    if (($_FILES['ee_image']["size"] > 5000000)) {

        echo " <div class='error'>
    <p><strong></strong>Max file size is 5MB<br></p> 
    <a href=add_employee_tab2.php>Back </a>

    </div> ";
        $error2++;
    }


    //CHECKING EXTENSION OF FILE


    //print_r($_FILES);

    $ext = pathinfo($ee_image, PATHINFO_EXTENSION);

    if (($ext != 'jpeg') && ($ext!='png') && ($ext !='jpg')) {

        echo " <div class='error'>
    <p><strong></strong> Only png or jpeg format is allowed<br>
    </p> </div> ";
        $error2++;
    }





    if($error2==0){


    $query="UPDATE employee_personal_details SET ee_image='$ee_image' WHERE ee_id= $ee_id";
   
    $selectquery= mysqli_query($connection2,$query);

    echo"Image successfully uploaded";
}
}


if(isset($_POST['remove']))
{
    $query="UPDATE employee_personal_details SET ee_image='' WHERE ee_id= $ee_id";
   
    $selectquery= mysqli_query($connection2,$query);


    echo"Image successfully uploaded";
}


?>






</div>








<form action="" method=post  style="margin-top:-300px ;margin-left:800px;">
<div class="form-group">




    <label>First Name </label>
    <input type='text' name="ee_fname"  size="18" style="font-size: 18px;">
    <span style="color:red">
          <?php
          global $error1; //TO COUNT ERRORS 
          $error1 = 0;

          if (isset($_POST['save']) 
           ) {
            $ee_fname = $_POST['ee_fname'];
           // echo $ee_fname;

            if (empty($ee_fname)) {
              echo "*Required Field";
              $error1++;
            } else {
              if (strlen($ee_fname) > 50) //MAX LENGHTH SHOULD BE 50
              {

                $error1++; //SPECIFIES ERROR


                echo "*Max Limit of  name is 50 characters ";
              }

              $containsDigit   = preg_match('/\d/', $ee_fname); //CHECKS -NUMERIC VALUE (NOT ALLOWED)

              if ($containsDigit) {

                $returnStyle1 = '#ffdddd';

                $error1++;
                echo "* name should not contain numeric value!!";
              }
            }
          }


          ?>
        </span>
    


    <label>Last Name</label>
    <input type="text" name="ee_lname" size="15" style="font-size: 18px;">

    <span style="color: red;">
        <?php
          if (isset($_POST['save'])  ) {
            $ee_lname = $_POST['ee_lname'];

          if (empty($ee_lname)) {
            echo "*Required Field";
            $error1++;
          } else {
            if (strlen($ee_lname) > 50) //MAX LENGHTH SHOULD BE 50
            {

              $error1++; //SPECIFIES ERROR


              echo "*Max Limit of  name is 50 characters ";
            }

            $containsDigit   = preg_match('/\d/', $ee_lname); //CHECKS -NUMERIC VALUE (NOT ALLOWED)

            if ($containsDigit) {


              $error1++;
              echo "* name should not contain numeric value!!";
            }
          }
        }


        ?>
      </span>





<br>
<br>
<br>



    <label> Gender </label>
    <input type="text" name="ee_gender"  size="15" style="font-size: 18px;">
<span style="color: red;">
        <?php
          if (isset($_POST['save'])   ) {
            $ee_gender=$_POST['ee_gender'];
                
                  if(empty($ee_gender))
                  {
                    echo"*required field";
                    $error1++;
                }
  

              }
          

        
  ?>
</span>

   &nbsp &nbsp

    <label>  DOB </label>
    <input type="date" name="ee_dob"  style="font-size:15px;" size="15" />


<span style="color: red;">
        <?php
          if (isset($_POST['save'])   ) {
            $ee_dob = $_POST['ee_dob'];

            if (empty($ee_dob) || $ee_dob==" ") {
              echo "*Required Field";
            $error1++;
          } }
        
  ?>

</span>

<br>
<br>




<div class="dropdown">
  


  <label for="bloodgrp">Blood Group:</label>
  <select name="bloodgrp" >
    <option value=""></option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    


 
  </select>
  <span style="color: red;">


  <?php
           
           if (isset($_POST['save'])  ) {
            $ee_blood = $_POST['bloodgrp'];

          if (empty($ee_blood)) {
            echo "*Required Field";
            $error1++;
          } 
           }

?>

  </span>
</div>


</div>



<br>
<br>
<div class="form-group">


    <label> Email </label>
    <input type="email" name="ee_email"  style="font-size: 18px;" size="80" />
    <span style="color: red;">
      <?php
          if (isset($_POST['save'])   ) {
            // echo"yes";
          $ee_email = $_POST['ee_email'];
          //echo $ee_email;

          if (empty($ee_email)) {
            echo "*required field";
            $error1++;
          }
          else{
         
            $res = error_email($ee_email);

          if ($res) {

            $error1++;
          }}
        }
        ?>
</span>
<br><br><br> 

<label> PAN No.</label>
    <input type="text" name="ee_pan"  style="font-size: 18px;" size="20" />
    <span style="color: red;">
      <?php
          if (isset($_POST['save'])   ) {
            // echo"yes";
          $ee_pan = $_POST['ee_pan'];
          //echo $ee_pan;

          if (empty($ee_pan)) {
            echo "*required field";
            $error1++;
          }
          else{
         
            if (!(preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $ee_pan)) || strlen($ee_pan)!==10 )    {
              echo "*Invalid PAN number";
              $error1++;
  
          } 

         }
        }

        ?>




      </span>


      <label> Aadhar ID</label>
    <input type="text" name="ee_aadhar"  style="font-size: 18px;" size="20" />
    <span style="color: red;">
      <?php
          if (isset($_POST['save'])   ) {
            // echo"yes";
          $ee_aadhar = $_POST['ee_aadhar'];
          //echo $ee_aadhar;

          if (empty($ee_aadhar)) {
            echo "*required field";
            $error1++;
          }
          else{
         
            if (!(preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $ee_aadhar)) || strlen($ee_aadhar)!==10 )    {
              echo "*Invalid ID";
              $error1++;
  
          } 

         }
        }
?>

    </span>
    <br>
    <br>
    <br>
    <div class="form-group">

    <label> Contact Number </label>
    <input type="tel" name="ee_phone" style="font-size: 18px;" size="20" />
    <label>
</div>
<span style="color: red;">
<?php
          if (isset($_POST['save'])   ) {

            $ee_phone = $_POST['ee_phone'];

            if (empty($ee_phone)) {
              echo "*required field";
              $error1++;
            } else {
              $mobilenumber = "/^[0-9][0-9]{9}$/";

              if (!preg_match($mobilenumber, $ee_phone)) {


                echo"*Please enter your 10 digit phone number ";
                $error1++;
              }
            }}
        ?>
</span>
</div>
<br>
<br>


<div class="form-group">

<label> Emergency Contact Number </label>
    <input type="tel" name="ee_emergency" style="font-size: 18px;" size="20" />
    <label>
</div>
<span style="color: red;">
<?php
          if (isset($_POST['save'])   ) {

            $ee_emergency = $_POST['ee_emergency'];

            if (empty($ee_emergency)) {
              echo "*required field";
              $error1++;
            } else {
              $mobilenumber = "/^[0-9][0-9]{9}$/";

              if (!preg_match($mobilenumber, $ee_emergency)) {


                echo"*Please enter your 10 digit phone number ";
                $error1++;
              }

              if($ee_phone==$ee_emergency)
              {
                echo"*Please enter different emergency number";
                $error1++;


              }
            }}
        ?>
</span>
</div>
<br>
<br>



















<div class="form-group">

        <label>City</label>
        <input type='text' name="ee_city" size="15" style="font-size: 18px;">
        <span style="color: red;">
    <?php
          if (isset($_POST['save'])   ) {

      $ee_city = $_POST['ee_city'];

      if (empty($ee_city)) {
        echo "*required field";
        $error1++;
      }
    }
    ?>
  </span>
  

        &nbsp

        <label>State</label>
        <input type="text" name="ee_state"  size="20" style="font-size: 18px;">
        <span style="color: red;">
          <?php
          if (isset($_POST['save'])   ) {

            $ee_state = $_POST['ee_state'];

            if (empty($ee_state)) {
              echo "*required field";
              $error1++;
            }
          }
          ?>
        </span>


        &nbsp

        &nbsp


       
        


</div>
<div class="form-group">


        <label>Permanent Address</label>
        <input type='textarea' style="font-size: 18px;" name="ee_address" size='40'>
        <span style="color: red;"> 
        <?php
          if (isset($_POST['save'])   ) {

          $ee_address = $_POST['ee_address'];
          //echo $ee_address;

          if (empty($ee_address)) {
            echo "*required field";
            $error1++;
          }
        }
        ?>
        </span>
        <br>
        <br>


        <label>Current Address</label>
        <input type='textarea' style="font-size: 18px;" name="ee_current" size='40'>
        <span style="color: red;"> 
        <?php
          if (isset($_POST['save'])   ) {

          $ee_current = $_POST['ee_current'];
          //echo $ee_address;

          if (empty($ee_current)) {
            echo "*required field";
            $error1++;
          }
        }
        ?>
        </span>
        <br>
        <br>



        <label>Hobbies</label>
        <input type='textarea' style="font-size: 20px;" name="ee_hobbies"  size='40'>
        <span style="color: red;"> 
        <?php
          if (isset($_POST['save'])    ) {

          $ee_hobbies = $_POST['ee_hobbies'];
          //echo $ee_address;

          if (empty($ee_hobbies)) {
            echo "*required field";
            $error1++;
          }
        }
        ?>
        </span>
     


        <br>
        <br>
        <label>Education</label>
        <input type='textarea' style="font-size: 20px;" name="ee_educational"  size='40'>
        <span style="color: red;"> 
        <?php
          if (isset($_POST['save'])    ) {

          $ee_education = $_POST['ee_educational'];
          //echo $ee_address;

          if (empty($ee_address)) {
            echo "*required field";
            $error1++;
          }
        }
        ?>
        </span>
     



<br>
<br>
<br>

<button>
<a href="http://localhost/ems/add_eedetails.php?ee_id=<?php echo $ee_id ?>" class="previous">&laquo; Back</a>

</button>



<input type="submit" name='save' value='Save'>



</form>

</div>




<?php 

include "db_ee_connection.php"; 

//THROUGH GET METHOD WE ARE GETTING E_ID

if(isset($_GET['id']))
{
  //print_r($_GET);

   $ee_id=$_GET['id'];
   $ee_designation = $_GET['des'];
   
$ee_department = $_GET['dep'];
$ee_division = $_GET['div'];
$ee_type = $_GET['type'];
$ee_doj  =    $_GET['doj'];
$ee_rep_manager = $_GET['rep'];
$ee_shift = $_GET['shift'] ;
$ee_status=$_GET['status'];
$ee_work_exp = $_GET['ee_work_exp'];
$ee_skills = $_GET['ee_skills'];
$ee_project= $_GET['ee_project'];





if(isset($_POST['save']))
{
//print_r($_POST);



  if($error1==0){
  /* FETCHING THE DATA FROM FORM OF TAB 2 */
   $ee_emailp=$_POST['ee_email'];
   $ee_fnamep=$_POST['ee_fname'];
   $ee_lnamep=$_POST['ee_lname'];
   $ee_dobp=$_POST['ee_dob'];
   $ee_phonep=$_POST['ee_phone'];
   $ee_cityp=$_POST['ee_city'];
   $ee_statep=$_POST['ee_state'];
   $ee_genderp=$_POST['ee_gender'];
   $ee_addressp=$_POST['ee_address'];
   $ee_educationp=$_POST['ee_educational'];
   $ee_blood=$_POST['bloodgrp'];
  $ee_pan=$_POST['ee_pan'];
  $ee_aadhar=$_POST['ee_aadhar'];
  $ee_hobbies=$_POST['ee_hobbies'];
  $ee_current= $_POST['ee_current'];
  $ee_emergency= $_POST['ee_emergency'];



   $query = "SELECT * FROM employee_professional_details WHERE ee_id= $ee_id";
   $selectquery = mysqli_query($connection2, $query);

   if ($selectquery) {

       if (mysqli_num_rows($selectquery) == 0) {
           $error++;
           echo "*employee id not added"; 
       }
   
       else{

       //ELSE IF NEW ID THE DATA WILL BE INSERTED

       
      

     $query= "UPDATE employee_professional_details SET ";
     $query.="ee_designation='{$ee_designation}', ";
     $query.="ee_department='{$ee_department}' ,";
     $query.="ee_division='{$ee_division}',";
     $query.="ee_type='{$ee_type}',";
     $query.="ee_work_exp='{$ee_work_exp}',";
     $query.="ee_skills='{$ee_skills}',";
     $query.="ee_project='{$ee_project}',";
     $query.="ee_doj='{$ee_doj}',";
     $query.="ee_reporting_manager='{$ee_rep_manager}'," ;
     $query.="ee_shift='{$ee_shift}',";
     $query.="ee_status='{$ee_status}'";
     $query.="WHERE ee_id={$ee_id}";


     $selectquery = mysqli_query($connection2, $query);  

     if (!$selectquery) {
         die("query0 failed:" .mysqli_error($connection2));
     }











     $query2 ="UPDATE employee_personal_details SET ";
     $query2.="ee_first_name='{$ee_fnamep}',";
     $query2.="ee_last_name='{$ee_lnamep}',";
     $query2.="ee_gender='{$ee_genderp}',";
     $query2.="ee_dob='{$ee_dobp}',";
     $query2.="ee_phone='{$ee_phonep}',";
     $query2.="ee_city='{$ee_cityp}',";
     $query2.="ee_state='{$ee_statep}',";
     $query2.="ee_permanent='{$ee_addressp}',";
     $query2.="ee_email='{$ee_emailp}',";
     $query2.="ee_pan='{$ee_pan}',";
     $query2.="ee_aadhar='{$ee_aadhar}',";
     $query2.="ee_skills='{$ee_skills}',";
     $query2.="ee_hobbies='{$ee_hobbies}',";
     $query2.="ee_blood='{$ee_blood}',";
     $query2.="ee_emergency='{$ee_emergency}',";
     $query2.="ee_current='{$ee_current}',";
     $query2.="ee_education='{$ee_educationp}'";
     $query2.="WHERE ee_id={$ee_id}";


     $selectquery2 = mysqli_query($connection2, $query2);
     if (!$selectquery2) {
      die("query2 failed:".mysqli_error($connection2));
  }


   



     $query3="UPDATE ee_login SET user_email='{$ee_emailp}' WHERE user_id='{$ee_id}'";
     $selectquery3 = mysqli_query($connection2, $query3);  
 

     if (!$selectquery3) {
         die("query3 failed:" . mysqli_error($connection2));
     }


           if($selectquery && $selectquery2 && $selectquery3) 
           {
               echo " <h1>success <h1>";
           }


     



  }}}}






}









?>


