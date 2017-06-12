<?php

 $connection = new mysqli("localhost", "root","", "asp");
    if ($connection->connect_error){
         die("Connection failed:".$connection->connect_error);
     }
     try {

if(isset($_POST['username'])&& isset($_POST['password']))
{
	
	$username=$_POST['username'];
	$password=$_POST['password'];

	$query="select * from login where username= '$username ' AND password = '$password'";
	$res = $connection->query($query);
	$row = $res->fetch_assoc();
	if($row>=0)
	
	{
	$data=mysqli_fetch_array($res);
		$_SESSION["username"] = $data["username"];
		echo $data["username"];
	}
	}

}
}catch (Exception $e){
         echo("Error:" .$e->getMessage());
    }//end try
     
    $connection->close();
?>
