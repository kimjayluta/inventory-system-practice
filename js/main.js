$(document).ready(function () {
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
})