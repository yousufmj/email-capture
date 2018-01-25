<?php

// get db config
include_once '../config/database.php';
// get user Class
include_once '../src/user/user.php';

// initilase db connection
$database = new Database();
$db = $database->getConnection();

// Get post data
$name = strip_tags($_POST['fullname']);
$email = strip_tags($_POST['email']);

//create new user
$user = new User($db);
$user->fullName = $name;
$user->email = $email;

// Add the new user to the database
if($user->create() === true){
    echo "Thank you $user->fullName for submitting your details";
}else{
    echo "Error: sorry we could not add your details";
}