
<!-- PROFESSIONAL DETAILS OF EMPLOYEE -->

<?php include "db_ee_connection.php"; ?>
<?php include "function.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">


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


        label {
            text-indent: 1em;
        }
    </style>

</head>

<body>

    <?php //FETCHING DETAILS FROM PROFESSIONAL EMPLOYEE TABLE


    $email_loggedin = $_SESSION['email'];



    $querygetid="SELECT * FROM ee_login WHERE user_email='$email_loggedin'";
    $selectquery = mysqli_query($connection2, $querygetid);




    while ($row = mysqli_fetch_assoc($selectquery)) {

        $ee_id = $row['user_id'];
    }



//FETCHING DATA TO DISPLAY IN FORM
    $query = "SELECT * FROM employee_professional_details WHERE ee_id=$ee_id";
    $selectquery = mysqli_query($connection2, $query);

   

    while ($row = mysqli_fetch_assoc($selectquery)) {

        $ee_id = $row['ee_id'];
        $ee_designation = $row['ee_designation'];
        $ee_type = $row['ee_type'];
        $ee_division = $row['ee_division'];
        $ee_doj = $row['ee_doj'];
        $ee_shift = $row['ee_shift'];
        $ee_company = $row['ee_company_name'];
        $ee_status = $row['ee_status'];
        $ee_department = $row['ee_department'];
        $ee_reporting_manager = $row['ee_reporting_manager'];
    }

    
    



        ?>


    









    <!-- Professional details -->
    <div id='formp' class="container">
        <h2 style="color: green;"><u>Professional Details<u></h2>

        <form action="" method="post">

            <div class="form-group">

                <br>

                <label>E_ID</label>
                <input type='text' name="ee_id" value="<?php echo $ee_id ?>" size="15" style="font-size: 15px;">




                <label> Date of Joining: </label>
                <input type="date" name="ee_doj" value="<?php echo $ee_doj ?>" style="font-size: 15px;" size="15" />


                <label> Status: </label>
                <input type="text" name="ee_status" value="<?php echo $ee_status ?>" style="font-size: 15px;" size="15" />




                <div class="form-group">

                    <br>



                    <label>Designation</label>
                    <input type='text' name="ee_designation" value="<?php echo $ee_designation  ?>" size="20" style="font-size: 15px;">




                    <label>Department:</label>
                    <input type="text" name="ee_department" value="<?php echo $ee_department ?>" size="20" style="font-size: 15px;">


                    <br>
                </div>

                <div class="form-group">



                    <label>Reporting Manager</label>
                    <input type='text' style="font-size: 15px;" name="ee_reporting_manager" value="<?php echo $ee_reporting_manager ?>" size='20'>


                    <label> Company Name: </label>
                    <input type="text" name="ee_comp_name" value="<?php echo $ee_company ?>" style="font-size:15 px;" size="15" />
                    <label>



                        <label> Division: </label>
                        <input type="text" name="er_division" value="<?php echo $ee_division ?>" style="font-size:15px;" size="20">

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

</body>

</html>