<style>
    body{
        text-rendering: optimizelegibility;
        margin-top: 0;
        color: #222222;
        font-family: "Open Sans", sans-serif;
        font-size: 16px;
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
    .form-control{
        font-size: 18px;
    }
</style>

<?php //echo"<pre>"; print_r($sessions[0]->presenter);exit;?>
<section class="parallax" style="background-image: url(https://yourconference.live/CCO/front_assets/images/bg_login.png); top: 0; padding-top: 0; height: 100%" >
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12" style="margin-top: 100px; margin-left: 20px; margin-right: 20px;">
                <div class="card m-auto text-center">
                    <div class="row">
                        <div class="col-sm-12" style="margin: 30px 0px" >
                            <h6 style="color:#EF5D21">Welcome to the</h6>
                            <h4  style="color:#EF5D21"><b>CCO Learner Resource App</b></h4>
                            <div style="height: 1px;background-color: #EF5D21;" class="my-3"></div>
                            <div class="mx-3">
                            <?php if(isset($sessions) && !empty($sessions)): ?>

                                <b><p style="font-size: 20px" id="sessionTitle"><?=$sessions[0]->session_title?></b>

                                <?php foreach ($sessions[0]->presenter as $presenter):?>
                                    <p id="moderators" style=" line-height: 0">
                                        <?=$presenter->first_name.' '.$presenter->last_name.', '.$presenter->degree?>
                                    </p>
                                <?php endforeach;?>
                            <?php endif; ?>
                            </div>
                            <div style="height: 2px;background-color: #EF5D21;" class="mb-3"></div>
                            <p style="font-size: 14px"> Log in to participate in <br> polling, access resources and other valuable <br>features available in this session.</p>
                            <form id="login-form" name="frm_login" method="post" action="<?= base_url() ?>mobile/login/authentication">
                            <div class="mx-5" style="">
                                <div class="form-group mb-1">
                                    <input type="text" name="sess_id" class="form-control shadow-none" value="<?=$this->session->userdata('sess_id')?>" placeholder="Username" style="display: none" >
                                    <input type="text" name="username" class="form-control shadow-none" value="" placeholder="Username" >
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control shadow-none" value="" placeholder="Password">
                                </div>
                            </div>

                            <div class="text-left mx-5">
                                <button type="submit" href="<?=base_url().'mobile/register'?>" class="btn btn text-white" style="background-color:#EF5D21">Login</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<?php if($this->session->flashdata('msg')): ?>
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          html: '<div style="color:#EF5D21"><?=$this->session->flashdata('msg')?><div>',
      })
  </script>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function () {

        $("#btn_login").on("click", function () {
            if ($("#username").val().trim() == "") {
                $("#erroremail").text("Please Enter Username").fadeIn('slow').fadeOut(5000);

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
