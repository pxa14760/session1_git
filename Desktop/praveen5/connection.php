<?php

class connection{
    
    public function dbConnect(){
        
        return new PDO ("mysql:host=localhost; dbname=asp", "root", "");
    }
}
?>
