<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Employer Portal</title>
  
</head>
    
<body style="background-color: honeydew;">
<?php 

include "db_ee_connection.php";
$ee_id=$_GET['ee_id'];
include "managenavigation.php";
?>



<div class="container">



<div class="row">
  <div class="col-sm-4" style="background-color:honeydew;">

 

  <form action=" "  enctype="multipart/form-data" method="POST">

  <img src="images/
<?php
//QUERY TO GENERATE IMAGE FROM DATABASE

$ee_id=$_GET['ee_id'];


$query ="SELECT * FROM employee_personal_details WHERE ee_id=$ee_id";

$selectquery = mysqli_query($connection2, $query);




while ($row = mysqli_fetch_assoc($selectquery)) {
    
     

  $ee_image = $row['ee_image'];
  if(!empty($ee_image))
      {

  echo "$ee_image";

     }
 else {
   echo 'blank image.png';
}}

?>

" style="margin:10px; width:300px ; height:300px;overflow:hidden;border:solid green" alt="Employee Image">




  <span>
      <br>
      <input type='text' name="ee_id"   size='3px' value=<?php  echo "$ee_id";?> readonly>

	<input type='file' name='ee_image' value="upload">
    <input type='submit' name='remove' value="remove">
    <input type="submit" name="upload" value="upload">
</span>
</form>



<?php
include "ee_image_action.php";
?>








</div>


<?php 
$ee_id=$_GET['ee_id'];

$query="SELECT * FROM employee_personal_details INNER JOIN  employee_professional_details ON 
employee_personal_details.ee_id = employee_professional_details.ee_id WHERE employee_personal_details.ee_id=$ee_id" ;
                $selectquery=mysqli_query($connection2,$query);

                while($row=mysqli_fetch_assoc($selectquery))
                {
                       $ee_id=$row['ee_id'];
                       $ee_fname=$row['ee_first_name'];
                       $ee_lname=$row['ee_last_name'];
                       $ee_image=$row['ee_image'];
                       $ee_doj=$row['ee_doj'];
                       $ee_designation=$row['ee_designation'];
                       $ee_status=$row['ee_status'];
                       $ee_phone=$row['ee_phone'];
                       $ee_email=$row['ee_email'];
                       $ee_gender=$row['ee_gender'];
                       $ee_state=$row['ee_state'];
                       $ee_division=$row['ee_division'];
                       $ee_department=$row['ee_department'];
                       $ee_comp_name=$row['ee_company_name'];
                       $ee_type=$row['ee_type'];
                       $ee_shift=$row['ee_shift'];
                       $ee_permanent = $row['ee_permanent'];
                       $ee_current = $row['ee_current'];
                       $ee_blood = $row['ee_blood'];
                       $ee_hobbies = $row['ee_hobbies'];
                       $ee_pan = $row['ee_pan'];
                       $ee_aadhar = $row['ee_aadhar'];
                       $ee_emergency = $row['ee_emergency'];
                       $ee_city=$row['ee_city'];
                   

                       

                


        ?>

<br>
<br>
<br>
<br>
<br>

<div class="container">
<div class="col-sm-12">

<h2 style="color: green;"><u>Professional Details<u></h2>

<form action=" " method="POST">

    <div class="form-group">

        <br>

        <label>E_ID</label>
        <input type='text' name="ee_id" value="<?php echo $ee_id ?>" size="15" style="font-size: 18px; " readonly>




        <label> Date of Joining: </label>
        <input type="date" name="ee_doj" value="<?php echo $ee_doj ?>" style="font-size: 15px;" size="15" />


        <label> Status: </label>
        <input type="text" name="ee_status" value="<?php echo $ee_status ?>" style="font-size: 15px;" size="15" />




        <div class="form-group">

            <br>



            <label>Designation</label>
            <input type='text' name="ee_designation" value="<?php echo $ee_designation  ?>" size="15" style="font-size: 18px;">




            <label>Department:</label>
            <input type="text" name="ee_department" value="<?php echo $ee_department ?>" size="20" style="font-size: 18px;">


            <br>
        </div>

        <div class="form-group">



           

            <label> Company Name: </label>
            <input type="text" name="ee_comp_name" value="<?php echo $ee_comp_name ?>" style="font-size: 18px;" size="15" />
            <label>



                <label> Division: </label>
                <input type="text" name="ee_division" value="<?php echo $ee_division ?>" style="font-size:15px;" size="15">

        </div>


        <div class="form-group">

            <br>



            <label>Shift</label>
            <input type='text' name="ee_shift" value="<?php echo $ee_shift ?>" size="15" style="font-size: 18px;">





            <label>Employee Type</label>
            <input type="text" name="ee_type" value="<?php echo $ee_type ?>" size="10" style="font-size: 18px;">


            <br>
        </div>



    </div>


   <input type="submit" value="edit" name="edit">

</form>
</div>



<div class="col-sm-12">
<br>
<br>
<br>

<h2 style="color: green;"><u>Personal Details</u></h2>
<form action=" " method=post>

<div class="form-group">

    <label>First Name </label>
    <input type='text' name="ee_fname" value="<?php echo $ee_fname ?>" size="18" style="font-size: 18px;">


    <label>Last Name</label>
    <input type="text" name="ee_lname" value="<?php echo $ee_lname ?>" size="15" style="font-size: 18px;">

    &nbsp



    <label> Gender </label>

    <?php if ($ee_gender == 'male') {
    ?>

        <input type="radio" id="male" name="gender" value="male" checked>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
    <?php } else { ?>

        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" checked>
        <label for="female">Female</label>

    <?php } ?>

    <br>
    <br>   

    <label>Email Id</label>
    <input type="text" name="ee_email" value="<?php echo $ee_email?>" size="15" style="font-size: 18px;">


    <br>
     <br>


    <label>Contact Number</label>
    <input type="text" name="ee_contact" value="<?php echo $ee_phone ?>" size="15" style="font-size: 18px;">

  



    <label>State</label>
    <input type="text" name="ee_state" value="<?php echo $ee_state ?>" size="20" style="font-size: 18px;">


    <label>City</label>
    <input type='text' name="ee_city" value="<?php echo $ee_city ?>" size="15" style="font-size: 18px;">

    <br>
     <br>






    <label>Permanent Address</label>
    <input type='textarea' style="font-size: 20px;" name="ee_permanent" value="<?php echo $ee_permanent ?>" size='40'>

    
    <br>
   <br>






   
    <label> DOB </label>
    <input type="date" name="ee_dob" value="<?php echo $ee_dob ?>" style="font-size: 20px;" size="15" />
    <br>

    <label>Blood type</label>
    <input type='text' name="ee_blood" value="<?php echo $ee_blood ?>" size="15" style="font-size: 18px;">

    <br>
   <br>

    <label>Hobbies</label>
    <input type='text' name="ee_hobbies" value="<?php echo $ee_hobbies ?>" size="15" style="font-size: 18px;">





<br>

<input type="submit" name="editper" value="edit">


    </form>




  <?php   } ?>


  <?php

if(isset($_POST['edit']))
{
   //print_r($_POST);
   $ee_designation = $_POST['ee_designation'];
   $ee_department = $_POST['ee_department'];
   $ee_division = $_POST['ee_division'];
   $ee_type = $_POST['ee_type'];
   $ee_doj  =    $_POST['ee_doj'];
   $ee_comp_name = $_POST['ee_comp_name'];
   $ee_shift = $_POST['ee_shift'] ;
   $ee_status=$_POST['ee_status'];

$query= "UPDATE employee_professional_details SET ";
$query.="ee_designation='{$ee_designation}', ";
$query.="ee_department='{$ee_department}' ,";
$query.="ee_division='{$ee_division}',";
$query.="ee_type='{$ee_type}',";
$query.="ee_doj='{$ee_doj}',";
$query.="ee_company_name='{$ee_comp_name}',";
$query.="ee_shift='{$ee_shift}',";
$query.="ee_status='{$ee_status}'";
$query.="WHERE ee_id={$ee_id}";


$selectquery = mysqli_query($connection2, $query);  

if (!$selectquery) {
    die("query0 failed:" .mysqli_error($connection2));
}
else
{
    echo "Success";
}









}















if(isset($_POST['editper']))
{
    //print_r($_POST);
    $ee_emailp=$_POST['ee_email'];
    $ee_fnamep=$_POST['ee_fname'];
    $ee_lnamep=$_POST['ee_lname'];
    $ee_dobp=$_POST['ee_dob'];
    $ee_phonep=$_POST['ee_contact'];
    $ee_cityp=$_POST['ee_city'];
    $ee_statep=$_POST['ee_state'];
    $ee_permanent=$_POST['ee_permanent'];
    $ee_hobbies=$_POST['ee_hobbies'];
    $ee_blood_group=$_POST['ee_blood'];
    $ee_gender=$_POST['gender'];

    $query2 ="UPDATE employee_personal_details SET ";
    $query2.="ee_first_name='{$ee_fnamep}',";
    $query2.="ee_last_name='{$ee_lnamep}',";
    $query2.="ee_dob='{$ee_dobp}',";
    $query2.="ee_phone='{$ee_phonep}',";
    $query2.="ee_city='{$ee_cityp}',";
    $query2.="ee_state='{$ee_statep}',";
    $query2.="ee_permanent='{$ee_permanent}',";
    $query2.="ee_email='{$ee_emailp}',";
    $query2.="ee_hobbies='{$ee_hobbies}',";
    $query2.="ee_blood='{$ee_blood_group}'";
    $query2.="WHERE ee_id={$ee_id}";

    $selectquery2 = mysqli_query($connection2, $query2);

    if (!$selectquery2) {
        die("query2 failed:" . mysqli_error($connection2));
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
$query4.="ee_address='{$ee_permanent}',";
$query4.="ee_email='{$ee_emailp}'";
$query4.="WHERE ee_id= {$ee_id}";




$selectquery4 = mysqli_query($connection, $query4);  

if (!$selectquery4) {
    die("query4 failed:" . mysqli_error($connection));
}

}


  

                
                ?>




