<?php

	include_once('db.php');

	$username = $_POST["username"];
	$password = $_POST["password"];
    
    $sql = "SELECT count(*) From login WHERE (username='$username' AND password='$password')";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
	foreach($row as $value)
    if($value >0)
    	echo " login sccessful" ;
	else
		echo "login failed";
    
    ?>
