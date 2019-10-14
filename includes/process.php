<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");

// Create account handler
if (isset($_POST["name"],$_POST["email"])){
    $user = new User();
    $result = $user->createUserAccount($_POST["name"], $_POST["email"], $_POST["password2"], $_POST["userType"]);
    echo $result;
    exit;
}


// login user account handler
if (isset($_POST["log_email"], $_POST["log_pass"])){
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_pass"]);
    echo $result;
    exit;
}

// Fetch Category handler
if (isset($_POST["getCategory"])){
    $obj = new DBOperation();
    $rows = $obj->getAllRecord("categories");
    foreach($rows as $row){
        echo "<option value='".$row["id"]."'>".$row["category_name"]."</option>";
    }
    exit;
}

// Adding new Category handler
if (isset($_POST["category-name"], $_POST["parent_category"])){
    $obj = new DBOperation();
    $result = $obj->addCategory($_POST["parent_category"],$_POST["category-name"]);
    echo $result;
    exit;
}
?>