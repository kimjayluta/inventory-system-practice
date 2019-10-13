<?php
include_once("../database/constants.php");
include_once("user.php");

// Create account handler
if (isset($_POST["name"],$_POST["email"])){

    $user = new User();
    $result = $user->createUserAccount($_POST["name"], $_POST["email"], $_POST["password2"], $_POST["userType"]);

    echo $result;
}


// login user account handler
if (isset($_POST["log_email"], $_POST["log_pass"])){
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_pass"]);
    echo $result;
}

?>