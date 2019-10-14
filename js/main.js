$(document).ready(function () {
    // Creating an account functionality
    $("#register_form").on("submit",function (){
        const name = $("#name");
        const email = $("#email");
        const pass1 = $("#password1");
        const pass2 = $("#password2");
        const userType = $("#user-type");
        const name_pattern = new RegExp(/^[A-Za-z ]+$/);
        const email_pattern = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

        let status = true;

        // Form Validation
        // Name
        if (name.val() == "" || name.val().length < 6){
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please Enter a valid Name and should be less than 6 characters.</span>");
            status = false;
        } else {
            name.removeClass("border-danger");
            $("#u_error").html("");
        }
        // Email
        if (!email_pattern.test(email.val())){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter a valid Email Address!</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
        }
        // Password
        if (pass1.val() == "" || pass1.val().length < 6){
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'> Please Enter at least 6 characters.</span>");
            status = false;
        } else {
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
        }

        // Password Match
        if (pass2.val() != pass1.val()){
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'> Password not matched! </span>");
            status = false;
        } else {
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
        }

        // User Type
        if (userType.val() == ""){
            userType.addClass("border-danger");
            $("#t_error").html("<span class='text-danger'> Please choose a user type!.</span>");
            status = false;
        } else {
            userType.removeClass("border-danger");
            $("#t_error").html("");
        }

        if (status){
            $.ajax({
                url: "../includes/process.php",
                method: "POST",
                data: $("#register_form").serialize(),
                success: function (res){
                    if (res === "EMAIL_ALREADY_EXISTS"){
                        alert("Email is already used!");
                    } else if (res === "ERROR!"){
                        alert("It seems there's an error creating your account!");
                    } else {
                        window.location.href = encodeURI('../index.php?msg="Please login"')
                    }
                }
            })
        }
    })

    // Login functionality
    $("#login-form").on("submit", function() {
        const email = $("#log_email"),
              user_pass = $("#log_pass");
        let status = true;

        if (email.val() == "" || user_pass.val() == ""){

            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>All fields are required!</span>");

            user_pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>All fields are required!</span>");

            status = false;

        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");

            user_pass.removeClass("border-danger");
            $("#p_error").html("");

        }

        if (status){
            $.ajax({
                url: "../includes/process.php",
                method: "POST",
                data: $("#login-form").serialize(),
                success: function (res){
                    if (res === "NOT_REGISTERED"){
                        alert("Error username or password, please try again!");
                    } else if (res === "INCORRECT_PASSWORD"){
                        alert("Error username or password, please try again!");
                    } else {
                        window.location.href = encodeURI("../dashboard.php");
                    }
                }
            })
        }
    });

    // Fetching the parent categories and printing to category modal.
    fetch_category();
    function fetch_category(){
        $.ajax({
            url: "../includes/process.php",
            method: "POST",
            data: {getCategory:1},
            success: function(res){
                let root = "<option value='0'>Root</option>";
                $("#parent_category").html(root + res);
            }
        })
    }

    // Adding new category function
    $("#category-form").on("submit", function(){
        if ($("#category-name").val() == ""){
            $("#category-name").addClass("border-danger");
            $("#n_error").html("<span class='text-danger'>Please Enter a category name.</span>")
            return false;

        } else {
            $.ajax({
                url: "../includes/process.php",
                method: "POST",
                data: $("#category-form").serialize(),
                success: function(res) {
                    if (res == "CATEGORY_ADDED"){

                        $("#category-name").val("");
                        $("#category-name").addClass("border-success");
                        $("#n_error").html("<span class='text-success'>Added new category!</span>")
                    } else {
                        alert(res);
                    }
                }
            })
        }
    });
})