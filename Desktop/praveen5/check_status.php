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
if(isset($_POST['check-status'])){
	$ticketid = trim($_POST['status']);
	$sql = "SELECT ticket_id, C_id,problem, status  FROM tickets where ticket_id = '$ticketid'";
	$result = $conn->query($sql);
	?>
	<h2 class="sub-header" >ticket status</h2>
	<div class="table-responsive">
		<table class="table table-striped">
   
     		<tr>
     		<th>Ticket_ID</th>
     		<th>CustomerID</th>
            <th>Problem</th>
     		<th>Status</th>
     		</tr>
     	
     	<?php
	while ($row=$result->fetch_assoc()) {
		echo ("<tr>");
		foreach ($row as $value) {
			echo ("<td>$value</td>");
		}
		echo ("</tr>");
	}
	
}
?>
</table>