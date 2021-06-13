<!-- EMPLOYER IMAGE ACTION -->

<?php //DATABASE CONNECTION
include "db_ee_connection.php";
include "db_er_connection.php";
if(isset($_POST['upload']))
{      $ee_id=$_POST['ee_id'];
       
        
      
    
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



    $ext = pathinfo($ee_image, PATHINFO_EXTENSION);

    if (($ext != 'jpeg') && ($ext!='png') && ($ext !='jpg')) {

        echo " <div class='error'>
    <p><strong></strong> Only png or jpeg format is allowed<br>
    </p> </div> ";
        $error2++;
    }





    if($error2==0){

//UPDATING IMAGE IF NO ERROR
    $query="UPDATE employee_personal_details SET ee_image='$ee_image' WHERE ee_id= $ee_id";
   
    $selectquery= mysqli_query($connection2,$query);

    $query2= "UPDATE employee_registration SET ee_image='$ee_image' WHERE ee_id= $ee_id";
    $selectquery= mysqli_query($connection,$query2);

    echo"Image successfully uploaded";
}
}


if(isset($_POST['remove']))
{
    $query="UPDATE employee_personal_details SET ee_image='' WHERE ee_id= $ee_id";
   
    $selectquery= mysqli_query($connection2,$query);

    $query2= "UPDATE employee_registration SET ee_image='' WHERE ee_id= $ee_id";
    $selectquery= mysqli_query($connection,$query2);

    echo"Image successfully uploaded";
}


?>



   

