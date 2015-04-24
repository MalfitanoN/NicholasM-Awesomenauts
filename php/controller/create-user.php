<?php

// this connects the config page here
require_once(__DIR__ . "/../model/config.php");

//this filters the text in it so therecant be innapropriate things
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

//this is  so you can only have 5000 characters in your post
$salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";

//this is so hackers cant get in to your account
$hashedPassword = crypt($password, $salt);

//this sends the information to the database
$query = $_SESSION["connection"]->query("INSERT INTO users SET "
        . "email = '$email',"
        . "username = '$username',"
        . "password = '$hashedPassword',"
        . "salt = '$salt',"
        . "exp = 0, "
        . "exp1 = 0, "
        . "exp2 = 0, "
        . "exp3 = 0, "
        . "exp4 = 0");

$_SESSION["name"] = $username;  

//this is when you register it will redirect you to the index
if ($query) {
    //need this for Ajax on index.php
    echo "true";
    //header('Location: http://localhost/MalfitanoN-Blog/index.php');

    //this will tell you the error if there is one
} else {
    "<p>" . $_SESSION["connection"]->error . "</p>";
}