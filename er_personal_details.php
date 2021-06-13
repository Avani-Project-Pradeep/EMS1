
<!-- EMPLOYER PERSONAL DETAILS -->

<?php //FETCHING DETAILS FROM PERSONAL EMPLOYER TABLE
include "db_er_connection.php";


      
     $email_loggedin=$_SESSION['email'];

     $query="SELECT * FROM employer_personal_details WHERE er_email='$email_loggedin'";
     $selectquery= mysqli_query($connection,$query);



     
     while($row=mysqli_fetch_assoc($selectquery))
     {
     $er_email=$row['er_email'];
     $er_fname=$row['er_firstname'];
     $er_lname=$row['er_lastname'];
     $er_dob=$row['er_dob'];
     $er_email=$row['er_email'];
     $er_phone=$row['er_phone'];
     $er_city=$row['er_city'];
     $er_state=$row['er_state'];
     $er_gender=$row['er_gender'];
     $er_address=$row['er_address'];
     $er_education=$row['er_educational'];

    

?>

     










<!-- PERSONAL DETAILS OF EMPLOYER -->
<style>
  div {
    border-radius: 8px;
    background-color: honeydew;
  
  }

  
  input {
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

  </style>
<div id=formp1 class="peform">
<br>
<div  id='formp' class="container">
<h2 style="color: green;"><u>Personal Details</u></h2>

<form action=edit_form.php method=post >
<div class="form-group">

    <label>First Name </label>
    <input type='text' name="er_fname" value="<?php echo $er_fname ?>" size="18"  readonly  style="font-size: 18px;">


    <label>Last Name</label>
    <input type="text" name="er_lname" value="<?php echo $er_lname ?>" size="15" readonly  style="font-size: 18px;">

    &nbsp



    <label>  DOB </label>
    <input type="date" name="er_dob" value="<?php echo $er_dob ?>" style="font-size: 20px;" readonly  size="15" />

</div>

<div class="form-group">


    <label> Email </label>
    <input type="email" name="er_comp_name" value="<?php echo $er_email ?>" style="font-size: 18px;" size="60" readonly />

    &nbsp

    <label> Phone Number </label>
    <input type="tel" name="er_phone" value="<?php echo $er_phone ?>" style="font-size: 18px;" size="10"  readonly />
    <label>

</div>

<div class="form-group">

        <label>City</label>
        <input type='text' name="er_city" value="<?php echo $er_city ?>" size="15" style="font-size: 18px;" readonly>

        &nbsp

        <label>State</label>
        <input type="text" name="er_state" value="<?php echo $er_state ?>"  readonly size="20" style="font-size: 18px;">

        &nbsp

        &nbsp


        <label> Gender </label>

        <?php if ($er_gender=='male')
        { 
          ?>
        
        <input type="radio" id="male" name="gender" value="male" checked>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        <?php } else { ?>

          <input type="radio" id="male" name="gender" value="male" >
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" checked>
        <label for="female">Female</label>
       
 <?php } ?>
        
</div>
<div class="form-group">


        <label>Address</label>
        <input type='textarea' style="font-size: 20px;" name="er_address" readonly  value="<?php echo $er_address ?>" size='40'>


        <br>
        <br>
        <label>Education</label>
        <input type='textarea' style="font-size: 20px;" name="er_educational"  readonly value="<?php echo $er_education ?>" size='40'>

</div>


</form>

 <?php } ?> <!-- here while loop ends -->

</div>
</body>

</html>









