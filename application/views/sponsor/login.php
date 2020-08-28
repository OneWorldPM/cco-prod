<link href="<?= base_url() ?>front_assets/sponsor/css/sponsor-home.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<style>
    body{
        background-color: #e8e8e8;
    }

    header{
        background-color: white !important;
    }
</style>

<div id="logreg-forms">
    <form action="login/validate" method="post" class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sponsor Login</h1>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="" autofocus="">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">

        <button class="btn btn-success btn-block" type="submit">Sign in <i class="fa fa-sign-in" aria-hidden="true"></i></button>
        <a href="#" id="forgot_pswd">Forgot password?</a>
        <hr>
        <!-- <p>Don't have an account!</p>  -->
<!--        <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</button>-->
    </form>

    <form action="/reset/password/" class="form-reset">
        <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
        <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
        <a href="#" id="cancel_reset"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
    </form>

    <form action="/signup/" class="form-signup">
        <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Sponsor Sign Up</h1>

        <input type="text" id="user-name" class="form-control" placeholder="Full name" required="" autofocus="">
        <input type="email" id="user-email" class="form-control" placeholder="Email address" required autofocus="">
        <input type="password" id="user-pass" class="form-control" placeholder="Password" required autofocus="">
        <input type="password" id="user-repeatpass" class="form-control" placeholder="Repeat Password" required autofocus="">

        <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
        <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
    </form>
    <br>

</div>


<script src="<?= base_url() ?>front_assets/sponsor/js/sponsor-home.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
