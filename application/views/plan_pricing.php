<section class="parallax">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <div class="row">
                <form id="frm_reg" name="frm_reg" method="post" action="<?= base_url() ?>register/update_registration_type">
                    <input type="hidden" name="cust_id" id="cust_id"  value="<?= (isset($myprofile)) ? $myprofile->cust_id : ''; ?>">
                    <div class="col-md-12 background-white" style="border-radius: 10px; padding: 0px 60px 20px 60px;">
                        <div class="col-md-12">
                            <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Registration</h5>
                            <small>Please indicate your registration type:</small>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-text text-muted">Member</label>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-text text-muted">Non-Member</label>
                                </div>
                            </div>

                            <?php
                            if (isset($plan_pricing) && !empty($plan_pricing)) {
                                foreach ($plan_pricing as $val) {
                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <label class="custom-control custom-radio">
                                                <input name="plan_name" type="radio" value="<?= $val->plan_pricing_id ?>" class="custom-control-input">
                                                <span class="form-text text-muted"><?= $val->plan_name ?></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="form-text text-muted">$<?= number_format($val->member_price, 2) ?></span>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="form-text text-muted">$<?= number_format($val->non_member_price, 2) ?></span>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>

                            <div class="col-md-12 m-t-20">
                                <div class="col-md-12">
                                    <small class="form-text text-muted">All funds are in US funds and include 5% state Tax </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 m-t-20">
                                <div class="form-group col-md-12">
                                    <small class="form-text text-muted"><?php if(!empty($cms_details)){ echo $cms_details->description; } ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12 form-group">
                                    <button class="btn btn-primary" id="update_registration_type" type="submit">Submit</button>
                                    <button type="button" class="btn btn-danger m-l-10">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function () {
        $("#update_registration_type").on("click", function () {
            var pay_method = $('input[name=plan_name]:checked').val();
            if (typeof pay_method === "undefined")
            {
                alertify.error('Select Plan');
                return false;
            } else {
                return true; //submit form
            }
            return false; //Prevent form to submitting
        });
    });
</script>

