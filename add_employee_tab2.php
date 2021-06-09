
<? include "db_ee_connection.php"; ?>
<? include "function.php" ; ?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- STYLESHEETS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Portal</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <style> body{background-color: honeydew};</style>  
</head>

<?php 


/* TAB2 FORM */


  /* ADD EMPLOYEE PERSONAL DETAILS BY EMPLOYER */




/* NAVIGATION BAR */

include "navbar.php"; ?>
<ul>

<li><a href="http://localhost/ems/employer_portal.php">Home</a></li>
<li><a href="http://localhost/ems/manageindex.php">Manage Employees</a></li>
<li><a href="#">Logout</a></li>
</ul>
</nav>
<br>





<ul class="nav nav-pills nav-justified">
    <li ><a style='color:green' href="add_employee.php">Tab1</a></li>
    <li style="background-color:green;"><a style='color:white'  href="add_employee_tab2.php">Tab 2</a></li>
  </ul>
</div>

<div class="centered">

<h1 style="margin-top:40px; margin-left:10px"><u> Add Employee</u> </h1>
<br>


 <!-- REGISTRATION FORM OF EMPLOYEE -->

 <h3 style="display:inline; margin-left:60%;"><i> <a href="http://localhost/ems/ee_register_form.php"> Register Employees</a> </i></h3>
 <br>
 <br>
 <br>

</div>

<?php $ee_id=$_GET['id']?>


<form action=" "  enctype="multipart/form-data" method="POST">



<img src="images/blank image.png" style="margin:10px; width:300px ; height:300px; overflow:hidden;border:solid green" alt="Employee Image">
<br>
<span>
  <input type='text' name="ee_id"   size='3px' value=<?php  echo "$ee_id";?> readonly>
	<input type='file' name='ee_image' value="upload">
    <input type="submit" name="upload" value="upload">
</span>
</form>



<?php
include "ee_image_action.php";
?>







<form action="" method=post  style="margin-top:-300px ;margin-left:800px;">
<div class="form-group">




    <label>First Name </label>
    <input type='text' name="ee_fname"  size="18" style="font-size: 18px;">
    <span style="color:red">
          <?php
          global $error1; //TO COUNT ERRORS 
          $error = 0;

          if (isset($_POST['save']) || isset($_POST['update']) ) {
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
          if (isset($_POST['save']) || isset($_POST['update']) ) {
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
          if (isset($_POST['save']) || isset($_POST['update']) ) {
            $ee_gender=$_POST['ee_gender'];
                
                  if(empty($ee_gender))
                  {
                    echo"*required field";
                    $error1++;
                }
  

              }
          

        
  ?>
</span>



   &nbsp &nbsp &nbsp

    <label>  DOB </label>
    <input type="date" name="ee_dob"  style="font-size: 20px;" size="15" />
<span style="color: red;">
        <?php
          if (isset($_POST['save']) || isset($_POST['update']) ) {
            $ee_dob = $_POST['ee_dob'];

          if (empty($ee_dob) || $ee_dob==" ") {
            echo "*Required Field";
            $error1++;
          } }

  ?>

</span>







<br>
<br>
<div class="form-group">


    <label> Email </label>
    <input type="email" name="ee_email"  style="font-size: 18px;" size="80" />
    <span style="color: red;">
      <?php
          if (isset($_POST['save']) || isset($_POST['update']) ) {
            // echo"yes";
          $ee_email = $_POST['ee_email'];
          //echo $ee_email;

          if (empty($ee_email)) {
            echo "*required field";
            $error1++;
          }
          else{
           include "function.php";
          $res = error_email($ee_email);

          if ($res) {

            $error1++;
          }}
        }
        ?>




      </span>



    <br>
    <br>
    <br>
    </div>

    <label> Phone Number </label>
    <input type="tel" name="ee_phone" style="font-size: 18px;" size="20" />
    <label>
<span style="color: red;">
<?php
          if (isset($_POST['save']) || isset($_POST['update']) ) {

            $ee_phone = $_POST['ee_phone'];

            if (empty($ee_phone)) {
              echo "*required field";
              $error1++;
            } else {
              $mobilenumber = "/^[0-9][0-9]{9}$/";

              if (!preg_match($mobilenumber, $ee_phone)) {

                $returnStyle3 = "#ffdddd";

                echo "*Please enter your 10 digit phone number ";
                $error1++;
              }
            }}
        ?>
</span>
</div>
<br>
<br>


<br>
<div class="form-group">

        <label>City</label>
        <input type='text' name="ee_city" size="15" style="font-size: 18px;">
        <span style="color: red;">
    <?php
          if (isset($_POST['save']) || isset($_POST['update']) ) {

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
          if (isset($_POST['save']) || isset($_POST['update']) ) {

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
          if (isset($_POST['save']) || isset($_POST['update']) ) {

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
        <label>Education</label>
        <input type='textarea' style="font-size: 20px;" name="ee_educational"  size='40'>
        <span style="color: red;"> 
        <?php
          if (isset($_POST['save']) || isset($_POST['update']) ) {

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
<a href="http://localhost/ems/add_employee.php" class="previous">&laquo; Back</a>
</button>



<input type="submit" name='save' value='Save'>


<input type="submit" name='update' value='Update'>

</form>

</div>




<?php 

include "db_ee_connection.php"; 

//THROUGH GET METHOD WE ARE GETTING E_ID

if(isset($_GET['id']))
{

   $ee_id=$_GET['id'];
   $ee_designation = $_GET['des'];
   
$ee_department = $_GET['dep'];
$ee_division = $_GET['div'];
$ee_type = $_GET['type'];
$ee_doj  =    $_GET['doj'];
$ee_comp_name = $_GET['comp'];
$ee_rep_manager = $_GET['rep'];
$ee_shift = $_GET['shift'] ;
$ee_status=$_GET['status'];

if(isset($_POST['save']))
{

//when we save the data data will be inserted into table




  if($error1==0){
  // print_r($_POST);

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



   
      



   
   //HERE FIRST WE CHECK WHETHER THE ID EXISTS 

   $query = "SELECT * FROM employee_professional_details WHERE ee_id= $ee_id";
   $selectquery = mysqli_query($connection2, $query);

   if ($selectquery) {

       if (mysqli_num_rows($selectquery) != 0) {
           echo "<h3>*employee id already added</h3>"; //THE ID WILL NOT BE INSERTED IF ALREADY EXISTS
       }
   
       else{

       //ELSE IF NEW ID THE DATA WILL BE INSERTED




//professional
$querypro = "INSERT INTO employee_professional_details (ee_id, ee_designation, ee_department, ee_division, ee_type, ee_doj, ee_reporting_manager, ee_company_name, ee_shift,ee_status) 
VALUES ($ee_id, '$ee_designation', '$ee_department', '$ee_division', '$ee_type' , '$ee_doj', '$ee_rep_manager', '$ee_comp_name', '$ee_shift','$ee_status')";  

$selectquery = mysqli_query($connection2, $querypro);  


    

  $query1="INSERT INTO employee_personal_details (ee_id,ee_first_name, ee_last_name,ee_gender,ee_dob, ee_email, ee_phone,ee_state,ee_city,ee_permanent,ee_education) 
  VALUES($ee_id,'$ee_fnamep','$ee_lnamep','$ee_genderp','$ee_dobp','$ee_emailp','$ee_phonep','$ee_statep','$ee_cityp','$ee_addressp','$ee_educationp')";


   $selectquery=mysqli_query($connection2,$query1);

   if(!$selectquery)
   {
    die("query failed:" . mysqli_error($connection2));

   }
   else{
     echo"<h3>Success</h3>";
   }
 } 

}

}
}






if(isset($_POST['update']))
{
  //when we update, db will get updated
 // print_r($_POST);



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
     $query.="ee_doj='{$ee_doj}',";
     $query.="ee_reporting_manager='{$ee_rep_manager}'," ;
     $query.="ee_company_name='{$ee_comp_name}',";
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




     include "db_er_connection.php";



     $query4="UPDATE employee_registration SET ";
     $query4.="ee_fname = '{$ee_fnamep}'," ;
     $query4.="ee_lname = '{$ee_lnamep}',";
     $query4.="ee_phone='{$ee_phonep}',";
     $query4.="ee_city='{$ee_cityp}',";
     $query4.="ee_state='{$ee_statep}',";
     $query4.="ee_address='{$ee_addressp}',";
     $query4.="ee_email='{$ee_emailp}'";
     $query4.="WHERE ee_id= {$ee_id}";

   


     $selectquery4 = mysqli_query($connection, $query4);  

     if (!$selectquery4) {
         die("query4 failed:" . mysqli_error($connection));
     }




     echo"<h3>Success<h3>";



  }}}}






}









?>


