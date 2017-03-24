<?php

include_once('connection.php');

class SignUp{
    
    private $db;
    
    public function __construct(){
        $this->db = new connection();
        $this->db = $this->db->dbConnect();
        
    }
    
    public function register($fname, $lname, $user, $passwd, $email, $phoneno, $address, $city, $state, $zcode, $country){
        
        $sql = $this->db->prepare("INSERT INTO `customers` (`firstname`, `lastname`, `username`,`password`, `email`, `phoneno`, `address`, `city`, `state`, `zcode`, `country`) VALUES ('$fname', '$lname', '$user', '$passwd', '$email', '$phoneno', '$address', '$city', '$state', '$zcode', '$country')");    
        
         $sql->execute(); 
        if($sql->execute() === TRUE){
            echo "Date inserted Successfully";
            
            $sql1 = $this->db->prepare( "INSERT INTO `login` ( `username`, `password`) VALUES ('$user', '$passwd')");
    if ($sql1->execute() === TRUE) {
      echo "Data inserted into login successfully";
    }
        }
            
        }
        
    }
    
    


?>