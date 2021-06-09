<?php

session_start(); //start the session
session_unset(); // unset the variables stored in $_SESSION
session_destroy(); // destroy the session that leads to logout
header("location:ee_login_form.php"); //after logout, the employer will land to login page of employer portal










?>