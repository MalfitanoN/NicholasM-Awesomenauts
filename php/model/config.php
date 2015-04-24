<?php

//This links this page to database.php 
require_once (__DIR__ . "/Database.php");

session_start();
session_regenerate_id(true);

//this is for the post.php page and can  be searched for in the xampp folder
$path = "/NicholasMAwesomenauts/php/";

//Name of host
$host = "localhost";

//username which is root
$username = "root";

//Password which is root
$password = "root";

//Data base name
$database = "awsomenauts_db";

if (!isset($_SESSION["connection"])) {
    //connection to new database
    $connection = new Database($host, $username, $password, $database);

    $_SESSION["connection"] = $connection;
}