<!-- SECTION -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
    /* The message box is shown when the user clicks on the password field */

    #message p {
        padding: 0px 5px;
        font-size: 14px;
        margin-bottom: 0px;
    }

    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -10px;
        content: "✔";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -10px;
        content: "✖";
    }
</style>
<style>
    @media (min-width: 768px) and (max-width: 1000px)  {
        #home_first_section{
            height: 550px;
        }
    }

    @media (min-width: 1000px) and (max-width: 1400px)  {
        #home_first_section{
            height: 590px;
        }
    }

    @media (min-width: 1400px) and (max-width: 1600px)  {
        #home_first_section{
            height: 700px;
        }
    }

    @media (min-width: 1600px) and (max-width: 1800px)  {
        #home_first_section{
            height: 800px;
        }
    }

    @media (min-width: 1800px) and (max-width: 2200px)  {
        #home_first_section{
            height: 900px;
        }
    }

    @media (min-width: 2200px) and (max-width: 2800px)  {
        #home_first_section{
            height: 1100px;
        }
    }
    @media (min-width: 2800px) and (max-width: 3200px)  {
        #home_first_section{
            height: 1450px;
        }
    }

    @media (min-width: 3200px) and (max-width: 4200px)  {
        #home_first_section{
            height: 1950px;
        }
    }

    @media (min-width: 4200px) and (max-width: 6000px)  {
        #home_first_section{
            height: 2550px;
        }
    }
</style>
<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/bg_login.png); top:0;">
    <div class="container container-fullscreen" id="home_first_section">
        <div class="text-middle">
            <div class="row p-b-60">
                <form id="frm_reg" name="frm_reg" method="post" action="<?= base_url() ?>register/add_customer">
                    <div class="col-md-6 col-md-offset-3 background-white" style="border-radius: 10px; padding: 30px 80px 20px 80px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 style="padding-bottom: 3px; border-bottom: 2px solid #ebebeb">Create User</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" value="" placeholder="First Name" name="first_name" id="first_name" class="form-control">
                                <span id="errorfirst_name" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" value="" placeholder="Last Name" name="last_name" id="last_name" class="form-control">
                                <span id="errorlast_name" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="email" value="" placeholder="Email" name="email" id="email" class="form-control">
                                <span id="erroremail" style="color:red"></span>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" value="" placeholder="Confirm Email" name="confirm_email" id="confirm_email" class="form-control">
                                <span id="errorconfirm_email" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="password" value="" id="password" name="password" placeholder="Password" class="form-control input-lg">
                                <span id="errorpassword" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div id="message">
                                    <h6 style="padding-bottom: 3px; border-bottom: 2px solid #ebebeb">Password Strength:</h6>
                                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                    <p id="number" class="invalid">A <b>number</b></p>
                                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="row p-t-10">
                            <div class="col-md-6 form-group">
                                <input type="password" value="" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control input-lg">
                                <span id="errorconfirm_password" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="g-recaptcha" data-callback="recaptchaCallback" style="text-align: -webkit-center;" data-sitekey="6LfbHKQZAAAAAA9nhI-4GNOmLakkRGGaBTJgHFbF"></div>
                                <div class="gaps-2x"></div>
                                <span id="errorcaptcha" style="color:red"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <button class="btn btn-primary" id="btn_register" type="submit">Submit</button>
                                <button type="button" class="btn btn-danger m-l-10">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$msg = $this->input->get("msg");
switch ($msg) {
    case "A":
        $m = "Email Alredy Exist!!!";
        $t = "error";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>
<script type="text/javascript">
    $(document).ready(function () {
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>

        $("#btn_register").on("click", function () {
            var response = grecaptcha.getResponse();
            var lowerCaseLetters = /[a-z]/g;
            var upperCaseLetters = /[A-Z]/g;
            var numbers = /[0-9]/g;
            var pwd = $("#password").val();

            if ($("#first_name").val().trim() == "")
            {
                $("#errorfirst_name").text("Please Enter First Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#last_name").val().trim() == "") {
                $("#errorlast_name").text("Please Enter Last Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#email").val().trim() == "") {
                $("#erroremail").text("Please Enter Email").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!validateEmail($("#email").val().trim())) {
                $("#erroremail").text("Enter Valid Email Id..").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#confirm_email").val() == "") {
                $("#errorconfirm_email").text("Please Enter Confirm Email").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#email").val() != $("#confirm_email").val()) {
                $("#errorconfirm_email").text("Email and Confirm Email Doesn't Match").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#password").val() == "") {
                $("#errorpassword").text("Please Enter Password").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!lowerCaseLetters.test(pwd)) {
                $("#errorpassword").text("Enter Lowercase Letter").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!upperCaseLetters.test(pwd)) {
                $("#errorpassword").text("Enter Uppercase Letter").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (!numbers.test(pwd)) {
                $("#errorpassword").text("Enter Numbers").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($('#password').val().length < 8) {
                $("#errorpassword").text("Minimum 8 Characters").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#confirm_password").val() == "") {
                $("#errorconfirm_password").text("Please Enter Confirm Password").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#password").val() != $("#confirm_password").val()) {
                $("#errorconfirm_password").text("Password and Confirm Passwords Doesn't Match").fadeIn('slow').fadeOut(5000);
                return false;
            } else if (response.length == 0) {
                $("#errorcaptcha").text("Please check captcha").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });
    });

    function validateEmail(sEmail) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(sEmail);
    }
</script> 
<script type="text/javascript">
    function recaptchaCallback() {
        $('#reg_login').removeAttr('disabled');
    }
    ;
</script>
<script>
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
    }

// When the user starts to type something inside the password field
    myInput.onkeyup = function () {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if (myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if (myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if (myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<!-- END: SECTION -->
<!-- END: SECTION -->