<?php  
 $connect = mysqli_connect("localhost", "root", "", "asp");  
 $sql = "DELETE FROM login WHERE username = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>  
