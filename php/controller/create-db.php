        <?php

//This links this page to database.php 
require_once (__DIR__ . "/../model/config.php");

//This is for the blog posts only
// 7 = int | 7.2 = float | b = char | "Sequence" = string
$query = $_SESSION["connection"]->query("CREATE TABLE posts ("
        . "id int(11) NOT NULL AUTO_INCREMENT,"
        . "title varchar(255) NOT NULL,"
        . "post text NOT NULL,"
        . "PRIMARY KEY (id))");

//this is for the register page
$query = $_SESSION["connection"]->query("CREATE TABLE users("
        . "id int(11) NOT NULL AUTO_INCREMENT,"
        . "username varchar(30) NOT NULL,"
        . "email varchar(50) NOT NULL,"
        . "password char(128) NOT NULL,"
        . "salt char(128) NOT NULL,"
        . "exp int(4), "
        . "exp1 int(4), "
        . "exp2 int(4), "
        . "exp3 int(4), "
        . "exp4 int(4), "
        . "PRIMARY KEY (id))");
