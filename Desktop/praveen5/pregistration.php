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
  $accountid = trim($_POST['c_id']);
  $user_psswd = trim($_POST['password']);
  $internet_service = trim($_POST['I_Name']);
  $user_hosting = trim($_POST['H_Name']);
  $user_ipblock = trim($_POST['ip_Name']);
  
 //function to verify login credentials

$sql = "SELECT password FROM customers WHERE C_id = '$accountid' ";

$result = $conn->query($sql);

$row=$result->fetch_assoc();

if ($row['password'] == $user_psswd) {

$sql1 ="SELECT I_Price FROM internet_service WHERE I_Name = '$internet_service' ";

$result1 = $conn->query($sql1);

$row1=$result1->fetch_assoc();

$InternetServicePrice = $row1['I_Price'];

$sql2 ="SELECT H_Price FROM Hosting WHERE H_Name = '$user_hosting' ";

$result2 = $conn->query($sql2);

$row2=$result2->fetch_assoc();

$HostingServicePrice = $row2['H_Price'];

$sql3 ="SELECT IP_Price FROM ipblocks WHERE ip_Name = '$user_ipblock' ";

$result3 = $conn->query($sql3);

$row3=$result3->fetch_assoc();

$IPblockPrice = $row3['IP_Price'];


$invoicetotal = $InternetServicePrice + $HostingServicePrice + $IPblockPrice;



$sql4 = "INSERT INTO `invoice` (`Invoice_No`, `C_id`, `InternetService`, `IS_Price`, `Hosting`, `H_Price`, `IPblock`, `IP_price`, `Invoice_total`) VALUES (NULL, '$accountid', '$internet_service', '$InternetServicePrice', '$user_hosting', '$HostingServicePrice', '$user_ipblock', '$IPblockPrice', '$invoicetotal')" ;

if ($conn->query($sql4) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "wrong password: " . $conn->error;
}
}
$conn->close();
}
?>