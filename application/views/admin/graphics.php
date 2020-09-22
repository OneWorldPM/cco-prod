<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="box-register">
                        <form class="form-register" id="frm_imgUpload" name="frm_imgUpload"   enctype="multipart/form-data" action="<?= base_url() ?>admin/graphics/update_background" method="post">
                            <fieldset>
                                <h3 class="box-title">Update Graphics</h3>
                                <div class="form-group">
                                    <label>Login / Register / Forgot Password / Main hall / Change Password </label>
                                    <span class="input-icon">
                                        <input type="file" class="form-control" name="main_background" id="main_background">
                                        <i class="fa fa-user"></i> 
                                    </span>
                                    <img src="<?= base_url() ?>front_assets/images/bg_login.jpg" alt="les" style="width:30%">
                                </div>
                                <div class="form-group">
                                    <label>Session List / Session View / My Backpack / Sponsor / Sponsor View / Attend View</label>
                                    <span class="input-icon">
                                        <input type="file" class="form-control" name="sub_background" id="sub_background">
                                        <i class="fa fa-user"></i> 
                                    </span>
                                    <img src="<?= base_url() ?>front_assets/images/attend_background.png" alt="les" style="width:30%">
                                </div>
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary form-control" id="btn_image_upload">
                                        Save  <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end: FEATURED BOX LINKS -->
