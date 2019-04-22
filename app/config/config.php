<?php
// App directory root
define("APPROOT", dirname(dirname(__FILE__)));

// URL root - ex. http://localhost/komvc
define("URLROOT", "http://localhost/myportfolio");

// SITE name - ex. MySite
define("SITENAME", "My Portfolio");

// DB Params
define("DB_HOST", "localhost"); 		//  ex: localhost
define("DB_USER", "root");		        //	ex: root
define("DB_PASS", "");	                //	ex: "null"
define("DB_NAME", "myportfolio");	    //	ex: komvc

// Shortcuts
define("HEADER", "/views/inc/header.php");
define("NAVBAR", "/views/inc/navbar.php");
define("FOOTER", "/views/inc/footer.php");

// MVC version
define("MVCVERSION", "1.0.0");


?>