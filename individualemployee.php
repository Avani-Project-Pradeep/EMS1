<!-- INDIVIDUAL EMPLOYEE PAGE BY ID -->

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
//DATABASE CONNECTION
include "db_ee_connection.php";
$ee_id=$_GET['ee_id'];
//GET ID BY CLICKING LINK ON MANAGE EMPLOYEES PAGE

//NAVIGATION BAR
include "managenavigation.php";
?>



<div class="container">



<div class="row">
  <div class="col-sm-4" style="background-color:honeydew;">

    <!-- EDIT DETAILS  LINK -->
    <span style="font-size:36px;">
    <a href='http://localhost/ems/editindividualemployee.php?edit=1&ee_id=<?php echo "$ee_id"?>'>Edit </a>
    </span>
    <i class="fa fa-edit" style="font-size:36px;color:black"></i>


    <?php 

//REMOVE IMAGE
if(isset($_GET['remove_img']))
{ 
 
    $query="UPDATE employee_personal_details SET ee_image = ''  WHERE ee_id=$ee_id";

    $selectquery= mysqli_query($connection2,$query);


    if($query)
    {
        header("location:addemployee.php?ee_id=$ee_id");
    }


}

//UPLOAD IMAGE
if(isset($_GET['upload']))
{
      
    $ee_image          =  ($_FILES['ee_img']['name']);
    $ee_image_temp     =  ($_FILES['ee_img']['tmp_name']);
    move_uploaded_file($ee_image_temp, "images/$ee_image");



    $error1=0;


    //Image file size
    if (($_FILES['ee_img']["size"] > 5000000)) {

        echo " <div class='error'>
    <p><strong></strong>Max file size is 5MB<br></p> 

    </div> ";
        $error1++;
    }


    //CHECKING EXTENSION OF FILE



    $ext = pathinfo($ee_image, PATHINFO_EXTENSION);
   
    if(($ext!='jpg')&&($ext!='jpeg')&&($ext!='png'))
    {
          echo"only jpeg/jpg or png is allowed";
    }



    if($error1==0){


//IF NO ERROR, IMAGE UPDATED
    $query="UPDATE employee_personal_details SET ee_image='$ee_image' WHERE ee_id=$ee_id";
    $selectquery= mysqli_query($connection2,$query);


   

    }}


    ?>


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







</div>


<?php 
$ee_id=$_GET['ee_id'];

//JOINING TWO TABLES TO FETCH ALL THE DETAILS BY USING ID 

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
                       $ee_skills = $row['ee_skills'];
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

<form action="" method="GET">

    <div class="form-group">

        <br>
<!-- DISPLAYING ALL DATA FROM JOINED TABLE OF INDIVIDUAL EMPLOYEE -->
        <label>E_ID</label>
        <input type='text' name="ee_id" value="<?php echo $ee_id ?>" size="15" style="font-size: 18px;">




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




</form>
</div>
<div class="col-sm-12">
<br>
<br>
<br>

<h2 style="color: green;"><u>Personal Details</u></h2>

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

    <label>PAN ID</label>
    <input type="text" name="ee_pan" value="<?php echo $ee_pan ?>" size="15" style="font-size: 18px;">


    <label>Aadhar ID </label>
    <input type="text" name="ee_aadhar" value="<?php echo $ee_aadhar ?>" size="15" style="font-size: 18px;">


    <br>
     <br>


    <label>Contact Number</label>
    <input type="text" name="ee_contact" value="<?php echo $ee_phone ?>" size="15" style="font-size: 18px;">

    <label>Emergency Contact Number</label>
    <input type="text" name="ee_emergency" value="<?php echo $ee_emergency?>" size="15" style="font-size: 18px;">



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


    <label>Current Address</label>
    <input type='textarea' style="font-size: 20px;" name="ee_current" value="<?php echo $ee_current ?>" size='40'>




   
    <label> DOB </label>
    <input type="date" name="ee_dob" value="<?php echo $ee_dob ?>" style="font-size: 20px;" size="15" />

    <label>Blood type</label>
    <input type='text' name="ee_blood" value="<?php echo $ee_blood ?>" size="15" style="font-size: 18px;">

    <br>
   <br>

    <label>Hobbies</label>
    <input type='text' name="ee_hobbies" value="<?php echo $ee_hobbies ?>" size="15" style="font-size: 18px;">



    <label>Skills</label>
    <input type='text' name="ee_city" value="<?php echo $ee_skills ?>" size="15" style="font-size: 18px;">





    </form>


     <?php } ?>




     