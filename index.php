<?php
include_once("database/constants.php");
if (isset($_SESSION["userId"])){
    header("location: ./dashboard.php");
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
<!-- End Of Navbar -->
<!-- Login Form -->
<div class="container pt-5">
    <?php
        if (isset($_GET["msg"]) && !empty($_GET["msg"])){
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $_GET["msg"]?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php
        }
    ?>
    <div class="card mx-auto" style="width: 18rem;">
        <img src="images/login.png" style="width:60%;" class="card-img-top mx-auto" alt="Login Now!">
        <div class="card-body">
            <form id="login-form" onsubmit="return false;">
                <div class="form-group">
                    <label for="log_email">Email address</label>
                    <input type="email" class="form-control" id="log_email" name="log_email" placeholder="Enter email">
                    <small id="e_error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="log_pass">Password</label>
                    <input type="password" class="form-control" id="log_pass" name="log_pass" placeholder="Password">
                    <small id="p_error" class="form-text text-muted"></small>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <span><a href="register.php">Create an account now!</a></span>
            </form>
        </div>
        <div class="card-footer">
            <a href="#">Forgot Password ?</a>
        </div>
    </div>
</div>

<!-- End of login Form -->
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