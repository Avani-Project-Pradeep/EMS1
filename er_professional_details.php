<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
 
<!-- STYLES -->
  <style>
  div {
    border-radius: 8px;
    background-color: honeydew;
      }



  input[type=text] {
  margin: 5px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;

}

  </style>

</head>
<body>

<?php //FETCHING DETAILS FROM PROFESSIONAL EMPLOYER TABLE
      
      include "db_er_connection.php";

      //logged in email is fetched through session
     $email_loggedin=$_SESSION['email'];


    
     $query="SELECT * FROM employer_professional_details WHERE er_email='$email_loggedin'";
     $selectquery= mysqli_query($connection,$query);


       //fetch data
      while($row=mysqli_fetch_assoc($selectquery))
      {
       $er_designation=$row['er_designation'];
       $er_location=$row['er_location'];
       $er_division= $row['er_division'];
       $er_doj=$row['er_doj'];
       $er_skill=$row['er_skill'];
       $er_work=$row['er_work'];
       $er_bank=$row['er_bank'];
       $er_company=$row['er_company_name'];
      }
     
  

       
        


       

     




     ?>









<!-- Professional details -->
<div  id='formp' class="container">
  <h2 style="color: green;"><u>Professional Details<u></h2>

  <form action="edit_form.php" method="post" >

    <div class="form-group">

    <br>

  




    <label>Designation</label>
			<input type='text' name="er_designation" value="<?php echo $er_designation ?>" size="15"  readonly style="font-size: 18px;">


      &nbsp

			<label>Location:</label>
			<input type="text" name="er_location" value="<?php echo $er_location ?>" size="10"   readonly  style="font-size: 18px;">

			&nbsp

			<label> Company Name: </label>
			<input type="text" name="er_comp_name" value="<?php echo $er_company ?>"   readonly  style="font-size: 18px;" size="15" />
			<label>

				&nbsp

				<label> Division: </label>
				<input type="text" name="er_division" value="<?php echo $er_division ?>"    readonly style="font-size:15px;" size="15">
			
     </div>
    <div class="form-group">

     	<label> Date of Joining: </label>
					<input type="date" name="er_doj" value="<?php echo $er_doj ?>" style="font-size: 15px;"   readonly  size="15" />

					&nbsp

					<label> Work Experience: </label>
					<input type="text" name="er_work_exp" style="font-size: 20px;" value="<?php echo $er_work ?>" size="10"    readonly  />
					<i class="fa fa-briefcase" style="font-size:24px"></i>

				
          <br> <br>
        <label>Skills</label>
					<input type='textarea' style="font-size: 20px;" name="er_skills" value="<?php echo $er_skill ?>" size='40'   readonly >
    <br><br>
    
      <label>Bank Account Details</label>
					<input type='textarea' style="font-size: 20px;" name="er_bank_account" value="<?php echo $er_bank ?>" size='40'    readonly >

					</div>


             

                     
   </form>
</div>

</body>
</html>
