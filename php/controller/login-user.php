<?php

//This connects the confi.php page to this page
require_once(__DIR__ . "/../model/config.php");

$array = array(
  'exp'=> '',
  'exp1'=> '',
  'exp2'=> '',
  'exp3'=> '',
  'exp4'=> ''
);

//this is so no innopropriate characters can be in the username and password
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

//this will set the query eqall to the username
$query = $_SESSION["connection"]->query("SELECT * FROM users WHERE BINARY username = '$username'");


if($query){
    $row = $query->fetch_array();
     echo $row["username"];;
}else{
    echo "<p>" . $_SESSION["connection"]->error . "</p>";
}

echo $password;

//this is an if statement to check if the password and username is correct andd if its right it will automaticaly redirect you  to the index
if ($query->num_rows == 1) {
    $row = $query->fetch_array();

    if ($row["password"] === crypt($password, $row["salt"])) {
        $_SESSION["authenticated"] = true;
        $array["exp"] = $row["exp"];
        $array["exp1"] = $row["exp1"];
        $array["exp2"] = $row["exp2"];
        $array["exp3"] = $row["exp3"];
        $array["exp4"] = $row["exp4"];
        $_SESSION["name"] = $username; 
        
        echo json_encode($array);
    } else {

        echo 'Invalid username and password';
    }
} else {

    echo 'Invalid username and password';
}
 
