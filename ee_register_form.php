<?php include "db_er_connection.php"; ?>
<!-- DATABSE -->
<?php
include "function.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Registration</title>


  <!-- STYLESHEETS-->

  <link rel="stylesheet" href="css/er_register.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>
  <form action=" " enctype="multipart/form-data" method="post">
    <div>
      <h1><u>Employee Registeration Form</u></h1>
      <hr>


      <div>
  
      <input type="text" class="input1" placeholder="Enter your first name" name="ee_fname" style="background-color: <?php echo $returnStyle1 ?> " ><span class="asterisk_input"></span>
      <span style="color:red">
          <?php
          global $error1; //TO COUNT ERRORS 
          $error = 0;

          if (isset($_POST['ee_register'])) {
            $ee_fname = $_POST['ee_fname'];
           // echo $ee_fname;

            if (empty($ee_fname)) {
              echo "*Required Field";
              $error1++;
            } else {
              if (strlen($ee_fname) > 50) //MAX LENGHTH SHOULD BE 50
              {
                $returnStyle1 = '#ffdddd'; //IF FALSE, FIELD HIGHLIGHTS IN RED COLOR

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
      </div>

<br>
<br>


      <div>
        <input type="text" class="input1" placeholder="Enter your second name" name="ee_lname" style="background-color: <?php echo $returnStyle2 ?>" ><span class="asterisk_input"></span>
      
      <span style="color: red;">
        <?php
        if (isset($_POST['ee_register'])) {
          $ee_lname = $_POST['ee_lname'];

          if (empty($ee_lname)) {
            echo "*Required Field";
            $error1++;
          } else {
            if (strlen($ee_lname) > 50) //MAX LENGHTH SHOULD BE 50
            {
              $returnStyle2 = '#ffdddd'; //IF FALSE, FIELD HIGHLIGHTS IN RED COLOR

              $error1++; //SPECIFIES ERROR


              echo "*Max Limit of  name is 50 characters ";
            }

            $containsDigit   = preg_match('/\d/', $ee_lname); //CHECKS -NUMERIC VALUE (NOT ALLOWED)

            if ($containsDigit) {

              $returnStyle2 = '#ffdddd';

              $error1++;
              echo "* name should not contain numeric value!!";
            }
          }
        }


        ?>
      </span>
      </div>

      <br>
      <br>






      <div>
        <input type="text" class="input1" placeholder="Enter phone number" name=" ee_phone" style="background-color: <?php echo $returnStyle3 ?>" ><span class="asterisk_input"></span>

        <span style="color:red">
          <?php
          if (isset($_POST['ee_register'])) {

            $ee_phone = $_POST['ee_phone'];

            if (empty($ee_phone)) {
              echo "*required field";
              $error1++;
            } else {
              $mobilenumber = "/^[0-9][0-9]{9}$/";

              if (!preg_match($mobilenumber, $ee_phone)) {

                $returnStyle3 = "#ffdddd";

                echo " <div class='error'>*Please enter your 10 digit phone number ";
                $error1++;
              }
            }
             //CHECKING WHETHER PHONE NUMBER IS REGISTERED OR NOT

             $query = "SELECT * FROM employee_registration WHERE ee_phone='{$ee_phone}'";
             $select_user_query = mysqli_query($connection, $query);
 
             if ($select_user_query) {
 
 
 
               if (mysqli_num_rows($select_user_query) != 0) {
 
                 echo " <div class='error'>
           <p><strong></strong> *This phone number is registered<br></p> </div> ";
                 $returnStyle3 = "#ffdddd";
 
 
 
                 $error1++;
               }
             }
           } ?>






</div>
<br>
<br>

<span>
  <input type="text" placeholder="City" name="ee_city" id=location><span class="asterisk_input"></span>
  <span style="color: red;">
    <?php
    if (isset($_POST['ee_register'])) {

      $ee_city = $_POST['ee_city'];

      if (empty($ee_city)) {
        echo "*required field";
        $error1++;
      }
    }
    ?>
  </span>
  &nbsp &nbsp &nbsp
  <input type="text" placeholder="State" name="ee_state" id=location ><span class="asterisk_input"></span>
        <span style="color: red;">
          <?php
          if (isset($_POST['ee_register'])) {

            $ee_state = $_POST['ee_state'];

            if (empty($ee_state)) {
              echo "*required field";
              $error1++;
            }
          }
          ?>
        </span>




        &nbsp &nbsp &nbsp &nbsp &nbsp


        <input type="file" name="ee_image"> <label style="font-size: 20px; color:blue; display:inline-block">Upload Image</label>
        <i style='font-size:24px' class='fas'>&#xf1c5;</i>

        <span style="color:red">
        <?php
        if(isset($_POST['ee_register']))
        {
          $ee_image = $_FILES['ee_image']['name'];
          $er_image_temp = $_FILES['ee_image']['tmp_name'];
   
          

          
          if (($_FILES['ee_image']["size"] > 5000000))
           {

          echo "*Max file size is 5MB ";
          $error1++;
      }
  
      $ext = pathinfo($ee_image, PATHINFO_EXTENSION);
  
      if( ($ext != 'jpeg')  && ($ext!='png') &&($ext!='jpg'))
       {
  
          echo "*Only jpeg/jpg or png is allowed   .";
          $error1++;
      }
    }
  ?>


        </span>
      <br>

      <input type="text" class="input1" placeholder="Enter Address" name="ee_address" ><span class="asterisk_input"></span>
      <span style="color: red;">
        <?php
        if (isset($_POST['ee_register'])) {

          $ee_address = $_POST['ee_address'];

          if (empty($ee_address)) {
            echo "*required field";
            $error1++;
          }
        }
        ?>
      </span>






      <br>
      <br>

      <input type="text" class="input1" placeholder="Enter Email" name="ee_email"><span class="asterisk_input"></span>
      <span style="color: red;">
      <?php
        if (isset($_POST['ee_register'])) {
          $ee_email = $_POST['ee_email'];

          if (empty($ee_email)) {
            echo "*required field";
            $error1++;
          }
          else{

          $res = error_email($ee_email);

          if ($res) {
            $returnStyle7 = '#ffdddd';
            $error1++;
          }
          }
        }
        ?>




      </span>


      <hr>


      <button type="submit" name="ee_register" class="registerbtn">Register</button>
    </div>

    </div>
  </form>

  </body>

</html>



<?php



if (isset($_POST['ee_register'])) {

  $ee_fname = $_POST['ee_fname'];
  $ee_lname = $_POST['ee_lname'];
  $ee_phone = $_POST['ee_phone'];
  //IMAGE
  $ee_image          =  ($_FILES['ee_image']['name']);
  $ee_image_temp     =  ($_FILES['ee_image']['tmp_name']);
  move_uploaded_file($ee_image_temp, "images/$ee_image");
  //print_r($_FILES);



  //STATE
  $ee_state = $_POST['ee_state'];

  //CITY

  $ee_city = $_POST['ee_city'];

  //ADDRESS
  $ee_address = $_POST['ee_address'];

  $ee_email = $_POST['ee_email'];

 



// echo $error1;

  if ($error1 == 0) {
    $query1 = "INSERT INTO employee_registration(ee_fname, ee_lname, ee_email, ee_phone,ee_state,ee_city,ee_address) 
  VALUES('$ee_fname','$ee_lname','$ee_email','$ee_phone','$ee_state','$ee_city','$ee_address')"; //e_id auto increment

    $selectquery1 = mysqli_query($connection, $query1);

   if(!$selectquery1)
   {
    die("query failed:" . mysqli_error($connection));



   }

   $ee_id= mysqli_insert_id($connection);
    //echo $ee_id;


   include "db_ee_connection.php";



   $query2="INSERT INTO ee_login(user_id,user_email) VALUES ($ee_id,'$ee_email')";

   $selectquery2 = mysqli_query($connection2, $query2);

   if(!$selectquery2)
   {
    die("query failed:" . mysqli_error($connection2));

   }







   







     else
     {
       echo"<h1>Success</h1>";
       echo"<a style=color:green;font-size:100px; href='ee_register_confirm.php?email=$ee_email&name=$ee_fname'>Click to Continue</a></h1>";

     }
  }









}
 ?>












        


        