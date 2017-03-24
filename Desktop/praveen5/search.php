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



	

	if(isset($_POST['search']))
	{
		$table = trim($_POST['tablename']);
  $column = trim($_POST['clm']);
  $search_term = trim($_POST['search_box']);
		
		
	$sql =  "SELECT * FROM $table  WHERE $column = '$search_term'";
	
	$result = $conn->query($sql);
	?>
	
	
	<div class="table-responsive">
		<table class="table table-bordered">
   
     		
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
