<?php
include_once('SignUp.php');


if(isset($_POST['btn-register']))
 {
  $user = trim($_POST['username']);
  $fname = trim($_POST['fname']);
  $lname = trim($_POST['lname']);
  $passwd = trim($_POST['password']);
  $email = trim($_POST['email']);
  $phoneno = trim($_POST['phoneno']);
  $address = trim($_POST['address']);
  $city = trim($_POST['city']);
  $state = trim($_POST['state']);
  $zcode = trim($_POST['zcode']);
  $country = trim($_POST['country']);
    
    
  $reg = new SignUp();
  $reg->register($fname, $lname, $user, $passwd, $email, $phoneno, $address, $city, $state, $zcode, $country); 

}
?>