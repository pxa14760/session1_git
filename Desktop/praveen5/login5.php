<?php
 session_start();
include_once('User.php');

 if(isset($_POST['btn-login']))
 {
  $userName = trim($_POST['username']);
  $passWord = trim($_POST['password']);
  
   $object = new User();
   $object->Login($userName, $passWord);
    
  
 }

?>