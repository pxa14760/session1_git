<?php  
 $connect = mysqli_connect("localhost", "root", "", "asp");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE login SET ".$column_name."='".$text."' WHERE username ='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?> 