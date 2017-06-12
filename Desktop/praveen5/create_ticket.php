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
if(isset($_POST['submit']))
 {
  $account_id = trim($_POST['C_id']);
  $status = trim($_POST['status']);
  $severity = trim($_POST['severity']);
  $assignto = trim($_POST['username']);
  $problem = trim($_POST['problem']);
  $description = trim($_POST['description']);
  
// sql to create table
$sql = "INSERT INTO `tickets` (`C_id`, `status`, `severity`, `username`, `problem`, `description`) VALUES ('$account_id','$status','$severity','$assignto','$problem','$description') ";

if ($conn->query($sql) === TRUE) {
    echo "Ticket Created Successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
}
?>