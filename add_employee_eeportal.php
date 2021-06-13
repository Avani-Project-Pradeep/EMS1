<?php include "db_ee_connection.php"; ?>

<!-- FUNCTIONS -->
<?php include "function.php"; ?>

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
    <link rel="stylesheet" href="css/edit.css">

    <link rel="stylesheet" href="css/error.css">

    <link rel="stylesheet" href="css/add.css">
    <style>
        body {
            background-color: honeydew
        }

        .error {
            background-color: #ffdddd;
            border-left: 6px solid #f44336;
        }

        ;
    </style>
</head>

<?php




/* NAVIGATION BAR */

include "e_navbar.php"; ?>
<ul>

    <li><a href="http://localhost/ems/employer_portal.php">Home</a></li>
    <li><a href="http://localhost/ems/manageindex.php">Manage Employees</a></li>
    <li><a href="#">Logout</a></li>
</ul>
</nav>
<br>



<!-- TAB 1 PROFESSIONAL FORM -->

<ul class="nav nav-pills nav-justified">
    <li style="background-color:green;"><a style='color:white' href="add_employee.php">Tab1</a></li>
    <li><a style='color:green'>Tab 2</a></li>
</ul>
</div>

<div class="centered">

    <h1 style=margin-top:60px;><u> Add Employee</u> </h1>
    <br>


    <!-- REGISTRATION FORM OF EMPLOYEE -->

    <h3 style="display:inline; margin-left:60%;"><i> <a href="http://localhost/ems/ee_register_form.php"> Register Employees</a> </i></h3>
</div>

<h1 style="display:inline"> Professional Details </h1>


<br>
<br>

<form action="" method="post">

    <div class="row">
        <div class="col-sm-6" style="background-color:honeydew; margin-left:50px">


          
          <!-- E_ID -->
          
            <label>Employee ID</label>
            <input type='text' name="ee_id" size="15" style="font-size: 18px;">
            <span style="color: red;"> 
                <?php //VALIDATION
                global $error;
                $error=0;
                if (isset($_POST['next'])) {
                    $ee_id = $_POST['ee_id'];

                    if (empty($ee_id)) {
                        $error++;
                        echo "*Field Required";
                    } else {
                        $checkid = is_numeric($ee_id);



                        if (!$checkid) //NO ALPHANUMERIC
                        {
                            $error++;
                            echo " *Cannot be alphanumeric";
                        }
                        if (error_maxlength($ee_id, 10)) //CHECKING MAX LIMIT FUNCTION
                        {
                            $error++;
                        }

                                        }
                }
                ?>



            </span>

            <br>
            <br>
            <br>



            <label>Designation</label>
            <input type='text' name="ee_designation" size="25" style="font-size: 18px;">
            <span style="color: red;">
                <?php
                if (isset($_POST['next'])) {
                    $ee_designation = $_POST['ee_designation'];
                    if (empty($ee_designation)) {
                        $error++;
                        echo "*Field Required";
                    } else {
                     


                    if (error_maxlength($ee_designation, 50)) {
                        $error++;
                    }
                }}


                ?></span>


                <br>
                <br>
                <br>



                <label> Department: </label>
                <input type="text" name="ee_department" style="font-size: 18px;" size="15">
                <span style="color: red;"><?php
                                            if (isset($_POST['next'])) {
                                                $ee_department = $_POST['ee_department'];
                                                if (empty($ee_department)) {
                                                    $error++;
                                                    echo "*Field Required";
                                                } else {
                                                 

                                                if (error_maxlength($ee_department, 50)) {
                                                    $error++;
                                                }
                                            }} ?> </span>

                <br>
                <br>
                <br>


                <label> Division: </label>
                <input type="text" name="ee_division" style="font-size: 18px;" size="15">
                <span style="color: red;"><?php
                                            if (isset($_POST['next'])) {
                                                $ee_division = $_POST['ee_division'];

                                                if (empty($ee_division)) {
                                                    $error++;
                                                    echo "*Field Required";
                                                } else {
                                                 


                                                if (error_maxlength($ee_division, 100)) {
                                                    $error++;
                                                }
                                            }}  ?>




                </span>




                <br>
                <br>
                <br>


                <label> Employee Type </label>
                <input type="text" name="ee_type" style="font-size: 18px;" size="15">
                <span style="color: red;">
                    <?php
                    if (isset($_POST['next'])) {
                         
                        $ee_type = $_POST['ee_type'];
                        if (empty($ee_type)) {
                            $error++;
                            echo "*Field Required";
                        } else {
                         

                        if (error_maxlength($ee_type, 50)) {
                            $error++;
                        }
                    }}

                      ?>




                </span>

        </div>

        <div class="col-sm-4" style="background-color:honeydew;">

            <label> Date of Joining: </label>
            <input type="date" name="ee_doj" value="doj php" style="font-size: 20px;" size="15">
            <span style="color: red;" >
                    <?php
                    if (isset($_POST['next'])) {
                        $ee_doj = $_POST['ee_doj'];


                        if (empty($ee_doj)) {
                            $error++;
                            echo "*Field Required";
                        } 
                        }
                      ?>




                </span>



        


            <br>
            <br>
            <br>

            <label>Company Name </label>
            <input type="text" name="ee_comp_name" style="font-size: 18px;" size="15">
            <span style="color: red;">
                    <?php
                    if (isset($_POST['next'])) {

                        $ee_comp_name = $_POST['ee_comp_name'];

                        if (empty($ee_comp_name)) {
                            $error++;
                            echo "*Field Required";
                        } else {
                         
                          

                        if (error_maxlength($ee_comp_name, 50)) {
                            $error++;
                        }

                    }}

                      ?>




                </span>


            <br>
            <br>
            <br>

            <label>Reporting Manager </label>
            <input type="text" name="ee_rep_name" style="font-size: 18px;" size="15">
            <span style="color: red;" >
                    <?php
                    if (isset($_POST['next'])) {
                        $ee_rep_manager = $_POST['ee_rep_name'];

                        if (empty($ee_rep_manager)) {
                            $error++;
                            echo "*Field Required";
                        } else {
                         



                        if (error_maxlength($ee_rep_manager, 50)) {
                            $error++;
                        }}}
                      ?>




                </span>

            
                  

            <br>
            <br>
            <br>

            <label>Shift </label>
            <input type="text" name="ee_shift" style="font-size: 18px;" size="15">
            <span style="color: red;" >
                    <?php
                    if (isset($_POST['next'])) {
                        $ee_shift = $_POST['ee_shift'];

                        if (empty($ee_shift)) {
                            $error++;
                            echo "*Field Required";
                        } else {
                         



                        if (error_maxlength($ee_shift, 50)) {
                            $error++;
                        }}}
                      ?>




                </span>

          
            <br>
            <br>
            <br>

            <label>Employee Status </label>
            <input type="text" name="ee_status" style="font-size: 18px;" size="15">
            <span style="color: red;" >
                    <?php
                    if (isset($_POST['next'])) {
                        $ee_status = $_POST['ee_status'];

                        if (empty($ee_status)) {
                            $error++;
                            echo "*Field Required";
                        } else {
                         



                        if (error_maxlength($ee_status, 50)) {
                            $error++;
                        }}}
                      ?>




                </span>

                  





            <br>
            <br>
            <br>


            <input type="submit" value="Next>>" style="font: size 25px;" name="next">

  <!-- NEXT BUTTON -->
            <br>
            <br>
            <br>


            <br>
            <br>
            <br>



            </body>

</html>

<?php



//WHEN ACTOR  WILL CLICK NEXT, 
//THE DATA WILL GET POSTED AND THEN CHECK WHETHER MANDATORY  FIELD  ARE EMPTY OR NOT 


if (isset($_POST['next'])) {
    if($error==0)
{ 
    $ee_id = $_POST['ee_id'];
    $ee_designation = $_POST['ee_designation'];
    $ee_department = $_POST['ee_department'];
    $ee_division = $_POST['ee_division'];
    $ee_type = $_POST['ee_type'];
    $ee_doj  =    $_POST['ee_doj'];
    $ee_comp_name = $_POST['ee_comp_name'];
    $ee_rep_manager = $_POST['ee_rep_name'];
    $ee_shift = $_POST['ee_shift'] ;
    $ee_status=$_POST['ee_status'];




    $data=array('id'=>$ee_id,'des'=>$ee_designation,'dep'=>$ee_department,'div'=>$ee_division,'type'=>$ee_type, 'doj'=>$ee_doj,'comp'=>$ee_comp_name,'rep'=>$ee_rep_manager,'shift'=>$ee_shift,
    'status'=>$ee_status );




    //print_r($_POST);

//echo $error;


    echo " <div style=color:green>
    <p style=font-size:'xx large'><strong> Now you are allowed to visit next page.
    Please click 
    
    <a href='http://localhost/ems/add_employee_tab2.php? " .http_build_query($data) . "'>Next</a>    </strong> <br></p> </div> ";
}}
    ?>
    
    
    
    




    





   




  



