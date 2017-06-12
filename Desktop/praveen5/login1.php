<?php

    $connection = new mysqli("localhost", "root","", "asp");
    if ($connection->connect_error){
         die("Connection failed:".$connection->connect_error);
     }
     try {
        $username = $_POST["username"];
         $password =$_POST["password"];
        $sql = "SELECT count(*) From login WHERE (username='$username' AND password='$password')";
        $res = $connection->query($sql);
        $row = $res->fetch_assoc();
         foreach($row as $value){
        echo "$value";
        } 
       }catch (Exception $e){
         echo("Error:" .$e->getMessage());
    }//end try
     
    $connection->close();
    
    ?>
