<!-- SECTION -->
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
<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/attend_background.png); top: 0; padding-top: 0px;">
    <div class="container container-fullscreen" id="home_first_section">
        <div class="text-middle">
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-12 center p-60 background-white" style="border-radius: 10px;">
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-sm-12">
                            <h4>Welcome!</h4>
                            <p>Sign in Below</p>
                            <?php
                            echo ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
                            ?> 
                            <form id="login-form" name="frm_login" method="post" action="<?= base_url() ?>login/authentication">
                                <div class="form-group">
                                    <label class="sr-only">Email Address</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email/Username">
                                    <span id="erroremail" style="color:red"></span>
                                </div>
                                <div class="form-group m-b-5">
                                    <label class="sr-only">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                    <span id="errorpassword" style="color:red"></span>
                                </div>
                                <div class="form-group form-inline text-left ">
                                    <a href="<?= base_url() ?>forgotpassword" class="right"><small>Forgot Password?</small></a>
                                </div>
                                <div class="text-left form-group">
                                    <button type="submit" id="btn_login" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-12">
                            <h4>-OR-</h4>
                            <p class="text-left"><a href="<?= base_url() ?>register">Sign in as a temporary guest</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $("#btn_login").on("click", function () {
            if ($("#email").val().trim() == "") {
                $("#erroremail").text("Please Enter Email").fadeIn('slow').fadeOut(5000);

                return false;
            } else if ($("#password").val() == "") {
                $("#errorpassword").text("Please Enter Password").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });

        $('#toolbox').hide();
    });
</script>
