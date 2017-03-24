<?php

include_once('connection.php');

class User{
    
    private $db;
    
    public function __construct(){
        $this->db = new connection();
        $this->db = $this->db->dbConnect();
        
    }
    
    public function Login($userName, $passWord){
        
        if(!empty($userName) && !empty($passWord)){
            
            $st = $this->db->prepare("select * from login where username=? and password=?");
            $st->bindParam(1, $userName);
            $st->bindParam(2, $passWord);
            $st->execute();
            $row = $st->fetch(PDO::FETCH_ASSOC);
            
            if($st->rowCount() == 1){
                
                echo "username and password correct";
                $_SESSION['user_session'] = $row['username'];
            }
            else{
                
                echo " credentials are wrong";
            }
        }
        else{
            echo "Please enter username and password" ;
        }
    }
    
    
}

?>