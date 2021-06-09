<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>

<body>



    <?php

    include "db_er_connection.php";



    
    function check($query)
    {
        include "db_er_connection.php";
        $selectquery = mysqli_query($connection, $query);

        if (!$selectquery) {
            die("query failed:" . mysqli_error($connection));
        }
    }

    
        function checkee($query)
        {
            include "db_ee_connection.php";
            $selectquery = mysqli_query($connection2, $query);
    
            if (!$selectquery) {
                die("query failed:" . mysqli_error($connection2));
            }
        }
    
    






    function error_maxlength($var, $max)
    {
        if (strlen($var) > $max) {
            echo "*The  limit should be $max characters ";

            return 1; // yes error

        } else {
            return 0;
        } //no error

    }


    function error_containdigit($var)
    {
        $containsDigit   = preg_match('/\d/', $var); //CHECKS -NUMERIC VALUE (NOT ALLOWED)

        if ($containsDigit) {

            echo " *Name Should not contain numeric value!! ";
            return 1;
        } else {
            return 0;
        }
    }


    function error_phone($phone)
    {

        $mobilenumber = "/^[0-9][0-9]{9}$/";

        if (!preg_match($mobilenumber, $phone)) {

            echo "*Please enter your 10 digit phone
        number";

            return 1;
        } else {
            return 0;
        }
    }



    function error_email($email)
    {
        //VALIDATE EMAIL   
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 echo " *Invalid format of email-id ";
      return 1;  
    }

    else
    {
        return 0;
    }


    }



function password_generate($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}





    ?>

</body>

</html>