<style>
    .red-star{
        color: #ff3c2d;
        font-size: 20px;
    }
</style>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Add Sponsors</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary" id="panel5">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white">Add New Sponsors</h4>
                        </div>
                        <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                            <div class="col-md-12">
                                <form name="add_sponsors_frm" id="add_sponsors_frm" action="<?= isset($sponsors_edit) ? base_url() . "admin/sponsors/updateSponsors" : base_url() . "admin/sponsors/createSponsors" ?>" method="POST" enctype="multipart/form-data">
                                    <?php if (isset($sponsors_edit)) { ?>
                                        <input type="hidden" name="sponsors_id" value="<?= $sponsors_edit->sponsors_id ?>">
                                    <?php } ?>
                                    <div class="form-group">
                                        <label class="text-large">Company Name</label><i class="red-star">*</i>
                                        <input type="text" name="company_name" id="company_name" value="<?= (isset($sponsors_edit) && !empty($sponsors_edit) ) ? $sponsors_edit->company_name : "" ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">Email</label><i class="red-star">*</i>
                                        <input type="text" name="email" id="email" value="<?= (isset($sponsors_edit) && !empty($sponsors_edit) ) ? $sponsors_edit->email : "" ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">Password</label><i class="red-star">*</i>
                                        <input type="text" name="password" id="password" value="<?= (isset($sponsors_edit) && !empty($sponsors_edit) ) ? $sponsors_edit->password : "" ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">Embed HTML Code</label>
                                        <textarea class="form-control" style="color: #000;" name="embed_code" id="embed_code"><?= (isset($sponsors_edit) && !empty($sponsors_edit) ) ? $sponsors_edit->embed_code : "" ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">Website</label>
                                        <input type="text" name="website" id="website" value="<?= (isset($sponsors_edit) && !empty($sponsors_edit) ) ? $sponsors_edit->website : "" ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">Twitter ID</label>
                                        <input type="text" name="twitter_id" id="twitter_id" value="<?= (isset($sponsors_edit) && !empty($sponsors_edit) ) ? $sponsors_edit->twitter_id : "" ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">Facebook ID</label>
                                        <input type="text" name="facebook_id" id="facebook_id" value="<?= (isset($sponsors_edit) && !empty($sponsors_edit) ) ? $sponsors_edit->facebook_id : "" ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large">LinkedIn ID</label>
                                        <input type="text" name="linkedin_id" id="linkedin_id" value="<?= (isset($sponsors_edit) && !empty($sponsors_edit) ) ? $sponsors_edit->linkedin_id : "" ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Sponsors Logo</label>
                                        <input type="file" class="form-control" name="sponsors_logo" id="sponsors_logo">
                                        <?php
                                        if (isset($sponsors_edit)) {
                                            if ($sponsors_edit->sponsors_logo != "") {
                                                ?>
                                                <img src="<?= base_url() ?>uploads/sponsors/<?= $sponsors_edit->sponsors_logo ?>" style="height: 100px; width: 100px;">
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <h5 class="over-title margin-bottom-15" style="text-align: center;">
                                        <button type="submit" id="btn_sponsors" name="btn_sponsors" class="btn btn-green add-row">Submit</button>
                                    </h5>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function ()
    {
        $("#btn_sponsors").on("click", function ()
        {
            if ($("#company_name").val() == "")
            {
                alertify.error("Enter Company Name");
                return false;
            } else if ($("#email").val() == "") {
                alertify.error("Email is required!");
                return false;
            } else if ($("#password").val() == "") {
                alertify.error("Password is required!");
                return false;
            } else {
                return true;
            }
            return false;
        });
    });
</script>