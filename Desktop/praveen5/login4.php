<?php
 session_start();
 require_once 'db4.php';

 if(isset($_POST['btn-login']))
 {
  $user_name = trim($_POST['username']);
  $user_password = trim($_POST['password']);
  
  $password = $user_password;
  
  try
  { 
  
   $stmt = $db_con->prepare("SELECT * FROM login WHERE username = :username ");
   $stmt->execute(array(":username"=>$user_name));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
      
 
   
   if($row['password']==$user_password){
    
    echo "ok"; // log in
    $_SESSION['user_session'] = $row['username'];
   }
   else{
    
    echo "username or password does not exist."; // wrong details 
   }
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }

?>