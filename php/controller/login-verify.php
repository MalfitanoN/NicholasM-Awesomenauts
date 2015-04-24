<?php

//This connects the config.php page to this page
require_once(__DIR__ . "/../model/config.php");

//this will authenticate the user so you can log out
function authenticateUser() {
    if (!isset($_SESSION["authenticated"])) {
        return false;
    } else {
        if ($_SESSION["authenticated"] != true) {
            return false;
        } else {
            return true;
        }
    }
}
