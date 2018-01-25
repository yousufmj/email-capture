<?php

class Database{
    // declare db credentials
    private $host = "localhost";
    private $dbName = "email_capture";
    private $username = "root";
    private $password = "";
    public $conn;

    // connect to db
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=" . $this->dbName, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}