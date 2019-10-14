<?php
include_once("database/constants.php");
if (!isset($_SESSION["userId"])){
    header("location: ./");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory System</title>
    <!-- Bootstrap Cdn Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <!-- Fa Icon Cdn -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
    <!-- Jquery Cdn -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
</head>
<body>
<!-- Navbar -->
<?php include_once("templates/header.php");?>

<!-- Dashboard Content -->
<div class="container pt-5 mb-2">
    <!-- Profile Section -->
    <div class="row">
        <div class="col-md-4">
            <div class="card mx-auto">
                <img src="images/user.png" style="width:60%;"class="card-img-top mx-auto" alt="User Image">
                <div class="card-body">
                    <h5 class="card-title">Profile Information: </h5>
                    <p class="card-text">
                        <i class="fa fa-user fa-lg">&nbsp;</i> Kim Jay Luta
                    </p>
                    <p class="card-text">
                        <i class="fa fa-user fa-lg">&nbsp;</i> Developer
                    </p>
                    <p class="card-text">
                        <i class="fas fa-clock fa-lg"></i> Last login: xxxx-xx-xx
                    </p>
                    <a href="#" class="btn btn-primary">
                        <i class="fa fa-edit fa-lg">&nbsp;</i> Edit Profile
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="jumbotron" style="width:100%; height:100%;">
                <h1>Welcome Admin!</h1>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">New Orders</h5>
                                <p class="card-text">Create a New Order and Invoices</p>
                                <a href="#" class="btn btn-success">New Orders</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <iframe src="http://free.timeanddate.com/clock/i6xtxnwa/n145/szw160/szh160/hoc000/hbw0/hfc09f/cf100/hnc07c/hwc000/facfff/fnu2/fdi76/mqcfff/mqs4/mql18/mqw4/mqd60/mhcfff/mhs4/mhl5/mhw4/mhd62/mmv0/hwm2/hhcfff/hhs1/hhb10/hmcfff/hms1/hmb10/hscfff/hsw3"
                         frameborder="0" width="160" height="160"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Manage Section -->
<div class="container mb-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Categories</h5>
                    <p class="card-text">Manage your Categories!</p>
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#category">Add</a>
                    <a href="#" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Brands</h5>
                    <p class="card-text">Manage your Brands!</p>
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#brands">Add</a>
                    <a href="#" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Manage your Products!</p>
                    <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#products">Add</a>
                    <a href="#" class="btn btn-primary">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modals -->
<?php include_once("templates/category.php");?>
<?php include_once("templates/brands.php");?>
<?php include_once("templates/products.php");?>

<script src="js/main.js"></script>
<!-- Bootstrap Cdn Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
         crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>