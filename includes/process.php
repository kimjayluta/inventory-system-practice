<?php
include_once("../database/constants.php");
include_once("user.php");

if (isset($_POST["name"],$_POST["email"])){

    $user = new User();
    $result = $user->createUserAccount($_POST["name"], $_POST["email"], $_POST["password2"], $_POST["userType"]);

    echo $result;
}

?>