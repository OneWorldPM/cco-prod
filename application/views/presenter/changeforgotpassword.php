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
                        <form class="form-horizontal form-signin" id="frm_password" name="frm_password" method="post" action="<?= base_url() ?>presenter/forgotpassword/passwordChange">
                            <input type="hidden" class="form-control" id="cid" name="cid" value="<?= $this->input->get('id'); ?>">
                            <div class="form-group">
                                <input type="password" class="form-control" id="user-password" name="password" placeholder="Your Password" required="" autofocus="">
                                <span id="errorpassword" style="color:red"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="user-cnf-password" name="conf_password" placeholder="Your Confirm Password"  required="" autofocus="">
                                <span id="errorconf_password" style="color:red"></span><span id="errorconf_passwordmuch" style="color:green"></span>
                            </div>
                            <div class="text-left form-group">
                                <button type="submit" id="btn_forgotpassword" class="btn btn-primary">Save</button>
                            </div>
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
            if ($("#user-password").val().trim() == "") {
                $("#errorpassword").text("Please Enter Your Password").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#user-cnf-password").val() == "") {
                $("#errorconf_password").text("Please Confirm Password").fadeIn('slow').fadeOut(5000);
                return false;
            } else if ($("#user-password").val() != $("#user-cnf-password").val()) {
                $("#errorconf_passwordmuch").text("Password and Password Confirmation Must Match").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });
    });
</script>
