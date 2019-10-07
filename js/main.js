$(document).ready(function () {
    $("#register_form").on("submit",function (){
        const name = $("#name");
        const email = $("#email");
        const pass1 = $("#password1");
        const pass2 = $("#password2");
        const userType = $("#user-type");
        const name_pattern = new RegExp(/^[A-Za-z ]+$/);
        const email_pattern = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

        // Form Validation
        // Name
        if (name.val() == "" || name.val().length < 6){
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>Please Enter a valid Name and should be less than 6 characters.</span>");
            status = false;
        } else {
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }
        // Email
        if (!email_pattern.test(email.val())){
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Please Enter a valid Email Address!</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }
        // Password
        if (pass1.val() == "" || pass1.val().length < 6){
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>Password is too short! Please Enter atlzeast 6 characters.</span>");
            status = false;
        } else {
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }
    })
})