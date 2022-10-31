<?php 

// unset($_SESSION['user_id']);
// unset($_SESSION['email']);
session_start();



    session_unset();
    
    session_write_close();
   
  header("Location:login.php");


// header("location : login.php");

/*
$_SESSION = [];

session_destroy();
header("location : login.php");*/

 ?>