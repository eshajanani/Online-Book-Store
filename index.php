<?php

// checking for minimum PHP version
//require_once("libraries/password_compatibility_library.php");


require_once("config/db.php");
require_once("classes/Login.php");


$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    
    echo "User logged in";
    include("views/logged_in.php");
    

} else {
    echo "<h3> Log in </h3>";
    include("views/not_logged_in.php");
}
