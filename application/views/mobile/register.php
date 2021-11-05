<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>-->
<style>
    body{
        text-rendering: optimizelegibility;
        margin-top: 0;
        color: #222222;
        font-family: "Open Sans", sans-serif;
        font-size: 18px;
    }
    .form-control{
        font-size: 18px;
    }
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

<?php //echo"<pre>"; print_r($sessions[0]->presenter);exit;?>
<section class="parallax" style="background-image: url(https://yourconference.live/CCO/front_assets/images/bg_login.png); top: 0; padding-top: 0px; height: 100%" >
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-12" style="margin-top: 20%; margin-left: 20px; margin-right: 20px;">
            <div class="card text-center">
                <div class="row">
                    <div class="col" style="margin: 30px 0px" >
                        <div class="mx-3">
                            <h6  style="color:#EF5D21"><b>CCO Learner Resource App</b></h6>
                            <div style="height: 1px;background-color: #EF5D21; " class="mt-3 mb-1" ></div>
                            <div class="text-left">
                                <h6>Create User</h6>
                                <div style="height: 1px;background-color: darkgray;margin-top: -5px" class="mb-2" ></div>

                                    <form id="frm_reg" name="frm_reg" method="post" action="<?= base_url() ?>mobile/register/register_user">

                                    <div class="form-group">
                                    <input type="text" id="first_name" class="form-control shadow-none" name="first_name" placeholder="First Name" >
                                        <span id="errorfirst_name" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" id="last_name" class="form-control shadow-none mb-1" name="last_name" placeholder="Last Name">
                                        <span id="errorlast_name" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="username"  class="form-control shadow-none mb-1" name="username" placeholder="Username">
                                        <span id="errorusername" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" id="email"  class="form-control shadow-none mb-1" name="email" placeholder="Email">
                                        <span id="erroremail" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" id="confirm_email"  class="form-control shadow-none mb-1" name="confirm_email" placeholder="Confirm email">
                                        <span id="errorconfirm_email" style="color:red"></span>
                                    </div>
                            </div>

                            <div class="text-left ml-1">

                                <button type="submit" href="" class="btn text-white" id="reg_login" style="background-color:#EF5D21"  >Submit</button>
                                <a href="" class="btn btn-danger " >Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
$msg = $this->input->get("msg");
switch ($msg) {
    case "A":
        $m = "Username Already Exist!!!";
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        <?php if ($msg): ?>
        Swal.fire(
            "<?=$t?>",
           "<?=$m?>",
            "<?=$t?>",
        )
        <?php endif; ?>

        $("#reg_login").on("click", function () {
            if ($("#first_name").val().trim() == "")
            {
                $("#errorfirst_name").text("Please Enter First Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#last_name").val().trim() == "") {
                $("#errorlast_name").text("Please Enter Last Name").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#username").val().trim() == ""){
                $("#errorusername").text("Please Enter Username").fadeIn('slow').fadeOut(5000);
                return false;
            }
            else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });
    });
</script>
