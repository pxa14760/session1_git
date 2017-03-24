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
if(isset($_POST['internet'])){

	$sql = "SELECT * FROM internet_service";

	$i=1;
	$result = $conn->query($sql);
	?>
	<h2 class="sub-header" >INTERNET SERVICES</h2>
	
	
		<table class="table table-bordered">
   
     		<tr>
     		<th>#</th>	
     		<th>I_ID</th>
     		<th>I_Name</th>
     		<th>I_Price</th>
     		</tr>
     	
     	<?php
	while ($row=$result->fetch_assoc()) {
		echo ("<tr>");
		echo ("<td>$i</td>");
		foreach ($row as $value) {
			
			echo ("<td>$value</td>");
		}
		echo ("</tr>");
		$i++;
	}
	
}
?>
</table>
<?php
if(isset($_POST['ip'])){

	$sql = "SELECT * FROM ipblocks";
	$result = $conn->query($sql);
	?>
	<h2 class="sub-header" >IP BLOCKS</h2>
	
		<table class="table table-bordered">
   
     		<tr>
     		<th>#</th>
     		<th>Ip_ID</th>
     		<th>Ip_Name</th>
     		<th>Ip_Price</th>
     		</tr>
     	
     	<?php
     	$i=1;
	while ($row=$result->fetch_assoc()) {
		echo ("<tr>");
		echo ("<td>$i</td>");
		foreach ($row as $value) {
			echo ("<td>$value</td>");
		}
		echo ("</tr>");
		$i++;
	}
	
}
?>
</table>
<?php
if(isset($_POST['hosting'])){

	$sql = "SELECT * FROM hosting";
	$result = $conn->query($sql);
	?>
	<h2 class="sub-header" >Hosting Details</h2>
	
		<table class="table table-bordered">
   
     		<tr>
     		<th>#</th>
     		<th>H_ID</th>
     		<th>H_Name</th>
     		<th>H_Price</th>
     		</tr>
     	
     	<?php
     	$i=1;
	while ($row=$result->fetch_assoc()) {
		echo ("<tr>");
		echo ("<td>$i</td>");
		foreach ($row as $value) {
			echo ("<td>$value</td>");
		}
		echo ("</tr>");
		$i++;
	}
	
}
?>
</table>
<?php
if(isset($_POST['customer'])){

	$sql = "SELECT * FROM customers";
	$result = $conn->query($sql);
	?>
	<h2 class="sub-header" >Customer Details</h2>
	
   <table class="table table-bordered">
     		<tr>
     		<th>#</th>
     		<th>Client ID</th>
     		<th>First Name</th>
     		<th>Last Name</th>
            <th>Username</th>
     		<th>Password</th>
     		<th>Email</th>
     		<th>Phone No</th>
     		<th>Address</th>
     		<th>City</th>
     		<th>State</th>
     		<th>Zip Code</th>
     		<th>Country</th>


     		</tr>
     	
     	<?php
     	$i=1;
	while ($row=$result->fetch_assoc()) {
		echo ("<tr>");
		echo ("<td>$i</td>");
		foreach ($row as $value) {
			echo ("<td>$value</td>");
		}
		echo ("</tr>");
		$i++;
	}
	
}
?>
</table>
<?php
if(isset($_POST['invoice'])){

	$sql = "SELECT * FROM invoice";
	$result = $conn->query($sql);
	?>
	<h2 class="sub-header" >Invoice</h2>
	<table class="table table-bordered">
   
     		<tr>
     		<th>#</th>
     		<th>Invoice_No</th>
     		<th>C_Id</th>
     		<th>InternetService</th>
     		<th>IS_Price</th>
     		<th>Hosting</th>
     		<th>H_Price</th>
     		<th>IPblock</th>
     		<th>ip_price</th>
     		<th>Invoice_total</th>
     		
     		</tr>
     	
     	<?php
     	$i=1;
	while ($row=$result->fetch_assoc()) {
		echo ("<tr>");
		echo ("<td>$i</td>");
		foreach ($row as $value) {
			echo ("<td>$value</td>");
		}
		echo ("</tr>");
		$i++;
	}
	
}
?>
</table>
<?php
if(isset($_POST['tr'])){

	$sql = "SELECT customers.C_id, firstname, lastname, email, ticket_id FROM customers, tickets WHERE customers.C_id = tickets.c_id";
	$result = $conn->query($sql);
	?>
	<h4><font color="#008B8B"> Tickets Associated to client ID</font></h4>
	<table class="table table-bordered">
     		<tr>
     			<th>#</th>
     		<th>Client ID</th>
     		<th>First Name</th>
     		<th>Last Name</th>
     		<th>Email</th>
     		<th>ticket_id</th>

     		</tr>
     	
     	<?php
     	$i=1;
	while ($row=$result->fetch_assoc()) {
		echo ("<tr>");
		echo ("<td>$i</td>");
		foreach ($row as $value) {
			echo ("<td>$value</td>");
		}
		echo ("</tr>");
		$i++;
	}
	
}
?>
</table>

<?php
if(isset($_POST['submit'])){

	$ticketid = trim($_POST['ticketno']);

	$sql = "SELECT * FROM tickets where ticket_id = '$ticketid'";
	$result = $conn->query($sql);
	?>
	<h2 class="sub-header" ><font color="#008B8B">Invoice</font></h2>
	<table class="table table-bordered">
     		<tr>
     		<th>#</th>
     		<th>Ticket_ID</th>
     		<th>C_Id</th>
     		<th>Status</th>
     		<th>Severity</th>
     		<th>AssignTo</th>
     		<th>Problem</th>
     		<th>Description</th>
     		<th>Time</th>
     		
     		</tr>
     	
     	<?php
     	$i=1;
	while ($row=$result->fetch_assoc()) {
		echo ("<tr>");
		echo ("<td>$i</td>");
		foreach ($row as $value) {
			echo ("<td>$value</td>");
		}
		echo ("</tr>");
		$i++;
	}
	
}
?>
</table>

<?php
if(isset($_POST['roles'])){

	

	$sql = "SELECT * FROM login";
	$result = $conn->query($sql);
	?>
	<h2 class="sub-header" ><font color="#008B8B">Roles Table</font></h2>
	<div class="table-responsive">
		<table class="table table-bordered">
   
     		<tr>
     		<th>#</th>
     		<th>Username</th>
     		<th>Password</th>
     		<th>Roles</th>
     		
     		</tr>
     	
     	<?php
     	$i=1;
	while ($row=$result->fetch_assoc()) {
		echo ("<tr>");
		echo ("<td>$i</td>");
		foreach ($row as $value) {
			echo ("<td>$value</td>");
		}
		echo ("</tr>");
		$i++;
	}
	
}
?>
</table>

