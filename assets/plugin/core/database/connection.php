<?php 

class DB{
    
    private $dbHost     = "localhost";
    private $dbUsername = "irageeyt_root";
    private $dbPassword = "shemafa1@";
    private $dbName     = "irageeyt_test";
    private $dbPort     = "3308";
    
    public function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName, $this->dbPort);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
}
?>