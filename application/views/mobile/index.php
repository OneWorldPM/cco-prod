<style>
    body{
        text-rendering: optimizelegibility;
        margin-top: 0;
        color: #222222;
        font-family: "Open Sans", sans-serif
    }
    .parallax {
        /* Set a specific height */
        min-height: 500px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<?php //echo"<pre>"; print_r($sessions[0]->presenter);exit;?>
<section class="parallax" style="background-image: url(https://yourconference.live/CCO/front_assets/images/bg_login.png); top: 0; padding-top: 0; height: 100%" >
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-12" style="margin-top: 100px; margin-left: 20px; margin-right: 20px;">
            <div class="card m-auto text-center">
                <div class="row">
                    <div class="col-sm-12" style="margin: 30px 0px" >
                        <h6 style="color:#EF5D21">Welcome to the</h6>
                        <h4  style="color:#EF5D21"><b>CCO Learner Resource App</b></h4>
                        <div style="height: 1px;background-color: #EF5D21;" class="my-3"></div>
                        <div class="mx-3">
                        <?php if(isset($sessions) && !empty($sessions)): ?>

                        <b><p id="sessionTitle"><?=$sessions[0]->session_title?></b>

                        <?php foreach ($sessions[0]->presenter as $presenter):?>
                       <p id="moderators" style="font-size: 14px; line-height: 0">
                        <?=$presenter->first_name.' '.$presenter->last_name.', '.$presenter->degree?>
                       </p>
                            <?php endforeach;?>
                        <?php endif; ?>
                        </div>
                        <div style="height: 2px;background-color: #EF5D21;" class="mb-5"></div>
                        <p style="font-size: 14px"> Signing in will allow you to  participate in <br> polling, access resources and other valuable <br>features available in this session.</p>
                        <a href="<?=base_url().'mobile/register'?>" class="btn btn-sm text-white" style="background-color:#EF5D21">Create a new user</a>
                        <br><br>
                        <label style="font-size: 12px">
                            Already have account ?
                            <a href="<?=base_url().'mobile/login/index/'.$this->session->userdata('sess_id')?>" class="" style="color:#EF5D21;"> Login</a>
                        </label>

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

    });

</script>