<?php  
 $connect = mysqli_connect("localhost", "root", "", "asp");  
 $sql = "INSERT INTO login(username, password, role) VALUES('".$_POST["username"]."', '".$_POST["password"]."','".$_POST["role"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>  