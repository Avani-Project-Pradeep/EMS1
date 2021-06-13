<?php //FETCHING DETAILS FROM PERSONAL EMPLOYER TABLE
include "db_ee_connection.php";








$query = "SELECT * FROM employee_personal_details WHERE ee_email='$email_loggedin'";
$selectquery = mysqli_query($connection2, $query);




while ($row = mysqli_fetch_assoc($selectquery)) {
    $ee_email = $row['ee_email'];
    $ee_fname = $row['ee_first_name'];
    $ee_lname = $row['ee_last_name'];
    $ee_dob = $row['ee_dob'];
    $ee_email = $row['ee_email'];
    $ee_phone = $row['ee_phone'];
    $ee_city = $row['ee_city'];
    $ee_state = $row['ee_state'];
    $ee_gender = $row['ee_gender'];
    $ee_permanent = $row['ee_permanent'];
    $ee_current = $row['ee_current'];
    $ee_blood = $row['ee_blood'];
    $ee_hobbies = $row['ee_hobbies'];
    $ee_skills = $row['ee_skills'];
    $ee_pan = $row['ee_pan'];
    $ee_aadhar = $row['ee_aadhar'];
    $ee_emergency = $row['ee_emergency'];



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
    <br>
    <h2 style="color: green;"><u>Personal Details</u></h2>

    <div class="form-group">

        <label>First Name </label>
        <input type='text' name="ee_fname" value="<?php echo $ee_fname ?>" size="20" style="font-size: 15px;">


        <label>Last Name</label>
        <input type="text" name="ee_lname" value="<?php echo $ee_lname ?>" size="20" style="font-size: 15px;">

<br>
<br>

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


        <label>Email Id</label>
        <input type="text" name="ee_email" value="<?php echo $ee_email?>" size="20" style="font-size: 15px;">
        
        
        <br>
        <br>
        

        <label>PAN ID</label>
        <input type="text" name="ee_pan" value="<?php echo $ee_pan ?>" size="10" style="font-size: 15px;">
        
    



        <label>Aadhar ID </label>
        <input type="text" name="ee_aadhar" value="<?php echo $ee_aadhar ?>" size="10" style="font-size: 15px;">


        <br>
        <br>
        <br>


        <label>Contact Number</label>
        <input type="text" name="ee_contact" value="<?php echo $ee_phone ?>" size="10" style="font-size: 15px;">

        

        <label>Emergency Contact Number</label>
        <input type="text" name="ee_emergency" value="<?php echo $ee_emergency?>" size="10" style="font-size: 15px;">


        
        <br>
        <br>
        <br>

        <label>State</label>
        <input type="text" name="ee_state" value="<?php echo $ee_state ?>" size="20" style="font-size: 15px;">


        <label>City</label>
        <input type='text' name="ee_city" value="<?php echo $ee_city ?>" size="20" style="font-size: 15px;">


        <br>
        <br>




    
        <label>Permanent Address</label>
        <input type='textarea' style="font-size: 15px;" name="ee_permanent" value="<?php echo $ee_permanent ?>" size='40'>

        

        <br>
        <br>

        <label>Current Address</label>
        <input type='textarea' style="font-size: 15px;" name="ee_current" value="<?php echo $ee_current ?>" size='40'>



        <br>
        <br>
        <br>

       
        <label> DOB </label>
        <input type="date" name="ee_dob" value="<?php echo $ee_dob ?>" style="font-size: 15px;" size="20" />

        

        <label>Blood type</label>
        <input type='text' name="ee_blood" value="<?php echo $ee_blood ?>" size="20" style="font-size: 15px;">

        <br>
       <br>

        <label>Hobbies</label>
        <input type='text' name="ee_hobbies" value="<?php echo $ee_hobbies ?>" size="20" style="font-size: 15px;">
       


        <label>Skills</label>
        <input type='text' name="ee_city" value="<?php echo $ee_skills ?>" size="20" style="font-size: 15px;">
         
        <br>
        <br>
        <br>
          







       



    


     


        <br>
        <br>
     
    </div>


    </form>

<?php } ?>
<!-- here while loop ends -->

</div>
</body>

</html>