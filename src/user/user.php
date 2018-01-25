<?php

// connect to DB
include_once '../config/database.php';

class User{
    // DB connection
    private $conn;
    // properties
    public function setFullName($fullName){
        $this->fullName = $fullName;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create new user
    function create()
    {
        // query to insert new user
        $query = "INSERT INTO
                    users(fullname, email)
                VALUES
                    (:fullName,
                    :email)";
        // prepare query
        $stmt = $this->conn->prepare($query);
        // bind values
        $stmt->bindParam(":fullName", $this->fullName);
        $stmt->bindParam(":email", $this->email);

        // execute query
        if($stmt->execute()){

            return true;
        }else{

            return $stmt->errorInfo();
        }
    }
}