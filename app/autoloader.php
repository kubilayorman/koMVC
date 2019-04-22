<?php
// Load config
require_once "config/config.php";
// Load helpers
require_once "helpers/url_helper.php";
// Session helpder (flash messages)
require_once "helpers/session_helper.php";

// Autoload Core Libraries - will only work if class file names and class names match ex. Controller.php match class name Controller
spl_autoload_register(function($className){
    require_once "libraries/" . $className . ".php"; 
});

// Load libraries 
/*
require_once "libraries/Core.php";
require_once "libraries/Controller.php";
require_once "libraries/Database.php";
*/


?>
