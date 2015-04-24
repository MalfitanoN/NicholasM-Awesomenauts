<?php

//This connects the confi.php page to this page
require_once(__DIR__ . "/../model/config.php");

//will set a session to log out
unset($_SESSION["authenticated"]);

//deestroys the session
session_destroy();

//this is a redirection link
header("Location: " . $path . "index.php");

