<section class="parallax fullscreen" style="background-image: url(<?= base_url() ?>front_assets/images/bg_login.png); top: 0; padding-top: 0px;">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <div class="row">
                <div class="col-md-3 center p-40 background-white" style="border-radius: 10px;">
                    <div class="row">
                        <h4>Forgot Password</h4>
                        <?php
                        echo ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
                        ?> 
                        <form class="form-transparent-grey" id="login-form" name="frm_login" method="post" action="">
                            <div class="form-group">
                                <label class="sr-only">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                                <span id="erroremail" style="color:red"></span>
                            </div>
                            <div class="text-left form-group">
                                <button type="submit" id="btn_forgotpassword" class="btn btn-primary">Recover My Password</button>
                            </div>
                            <div class="form-group smsg" style="padding: 5px;margin-bottom: 0px;color:green;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: SECTION -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#btn_forgotpassword").on("click", function () {
            if ($("#email").val().trim() == "") {
                $("#erroremail").text("Please Enter Email").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                $.ajax({
                    url: "<?= base_url() ?>presenter/forgotpassword/checkEmail",
                    type: "post",
                    data: {'email': $("#email").val().trim()},
                    dataType: "json",
                    success: function (data, textStatus, jqXHR) {
                        if (data.msg == 'exist') {
                            $.ajax({
                                url: "<?= base_url() ?>presenter/forgotpassword/sendEmail",
                                type: "post",
                                data: {'email': $("#email").val().trim()},
                                dataType: "json",
                                success: function (data, textStatus, jqXHR) {
                                    if (data.msg == 'sendemail') {
                                        //alertify.success("Send Confirmation Emails,Please Check Your Email...!!!"); 
                                        $('.smsg').html("<p>Check your email for instructions on how to recover your password</p>");
                                        window.setTimeout('location.reload()', 5000);
                                    } else {
                                        alertify.error("Email does not exist, Please try again!!!");
                                        window.setTimeout('location.reload()', 5000);
                                    }
                                }
                            });

                        } else {
                            $("#erroremail").text("Email does not exist, Please try again!").fadeIn('slow').fadeOut(5000);
                            window.setTimeout('location.reload()', 5000);
                        }
                    }
                });
            }
            return false; //Prevent form to submitting
        });
    });
</script>
