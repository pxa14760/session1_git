<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
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
// sql to create table
$sql = "INSERT INTO `customers` (`firstname`, `lastname`, `username`,`password`, `email`, `phoneno`, `address`, `city`, `state`, `zcode`, `country`) VALUES ('$fname', '$lname', '$user', '$passwd', '$email', '$phoneno', '$address', '$city', '$state', '$zcode', '$country')";
if ($conn->query($sql) === TRUE) {
  echo "Data inserted into customers successfully";
  $sql1 = "INSERT INTO `login` ( `username`, `password`) VALUES ('$user', '$password')";
    if ($conn->query($sql1) === TRUE) {
      echo "Data inserted into login successfully";
    }
    
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
}
?>