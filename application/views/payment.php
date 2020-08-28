<section class="parallax">
    <div class="container container-fullscreen">
        <div class="text-middle">
            <div class="row">
                <form id="frm_reg" name="frm_reg" method="post" action="<?= base_url() ?>register/pay_payment">
                    <input type="hidden" name="cust_id" id="cust_id"  value="<?= (isset($myprofile)) ? $myprofile->cust_id : ''; ?>">
                    <input type="hidden" value="<?= (isset($myprofile)) ? $myprofile->member_price + ($myprofile->member_price * 4) / 100 : ''; ?>" id="total_payment" name="total_payment">
                    <input type="hidden" value="<?= (isset($myprofile)) ? $myprofile->plan_name : ''; ?>" id="plan_name" name="plan_name">
                    <input type="hidden" value="<?= (isset($myprofile)) ? $myprofile->member_price + ($myprofile->member_price * 4) / 100 : ''; ?>" id="member_price" name="member_price">
                    <input type="hidden" value="" id="total_discount" name="total_discount">
                    <input type="hidden" value="" id="total_tax" name="total_tax">
                    <div class="col-md-12 background-white" style="border-radius: 10px; padding: 0px 60px 20px 60px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Payment Summary</h5>
                                <small>Please review your purchase</small>
                            </div>
                        </div>
                        <div class="row" style="border: 2px solid #ebebeb; border-radius: 10px; padding: 10px; margin: 1px;">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label class="form-text text-muted"><?= (isset($myprofile)) ? $myprofile->plan_name : ''; ?></label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-text text-muted"><?= (isset($myprofile)) ? $myprofile->member_price : ''; ?></label>
                                    </div>
                                </div>
                                <div class="row" style="border-bottom: 1px solid #ebebeb;">
                                    <span id="errorpromo_code" style="color:red; margin-left: 15px;"></span>
                                    <div class="col-md-8 form-group" style="display:flex;">
                                        <input type="text" value="" id="promo_code" name="promo_code" placeholder="Promo Code" class="form-control input-lg">
                                        <button class="btn btn-info" data-total_value="<?= (isset($myprofile)) ? $myprofile->member_price + ($myprofile->member_price * 4) / 100 : ''; ?>"  id="btn_apply_code" type="button">Apply</button>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <small class="form-text text-muted" id="discount_label">0</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 form-group" style="text-align: end; margin-bottom: 0px;">
                                        <label class="form-text text-muted">Tax(4%)</label>
                                    </div>
                                    <div class="col-md-4 form-group" style="margin-bottom: 0px;">
                                        <label class="form-text text-muted" id="tax_label"><?= (isset($myprofile)) ? ($myprofile->member_price * 4) / 100 : ''; ?></label>
                                    </div>
                                    <div class="col-md-8 form-group" style="text-align: end;">
                                        <label class="form-text text-muted">Total</label>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label class="form-text text-muted" id="total_label"><?= (isset($myprofile)) ? $myprofile->member_price + ($myprofile->member_price * 4) / 100 : ''; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row  m-t-30">
                            <div class="col-md-12">
                                <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb"><?php
                                    if (!empty($cancellation_policy)) {
                                        echo $cancellation_policy->title;
                                    }
                                    ?></h5>
                                <p><?php
                                    if (!empty($cancellation_policy)) {
                                        echo $cancellation_policy->description;
                                    }
                                    ?></p>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <h5 style="padding-bottom: 4px; border-bottom: 2px solid #ebebeb">Payment Method</h5>
                                <small>Please fill in your payment method:</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <select id="inputState" class="form-control">
                                    <option selected="">Card Type</option>
                                    <option>Visa</option>
                                    <option>Master Card</option>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <input type="text" value="" placeholder="Card Expire" class="form-control input-lg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input type="text" value="" placeholder="Card Number" class="form-control input-lg">
                            </div>
                            <div class="col-md-2 form-group">
                                <input type="text" value="" placeholder="CVV" class="form-control input-lg">
                            </div>
                        </div>
                        <div class="row m-t-40">
                            <div class="form-group col-md-12">
                                <small class="form-text text-muted"><?php
                                    if (!empty($cms_details)) {
                                        echo $cms_details->description;
                                    }
                                    ?></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <button class="btn btn-primary" id="update_user" type="submit">Submit</button>
                                <button type="button" class="btn btn-danger m-l-10">Cancel</button>
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
        $("#btn_apply_code").on("click", function () {
            var total;
            var discount = 0;
            total = $("#btn_apply_code").attr("data-total_value");
            var promo_code = $("#promo_code").val();
            if ($("#promo_code").val() == "")
            {
                $("#errorpromo_code").text("Please Enter Promo Code").fadeIn('slow').fadeOut(5000);
                return false;
            } else {
                $.ajax({
                    url: "<?= site_url() ?>register/get_promo_code_details",
                    type: "POST",
                    data: {'promo_code': promo_code},
                    dataType: "json",
                    success: function (data, textStatus, jqXHR) {
                        if (data.status == "success") {
                            discount = data.promo_code_details.discount;
                            total = total - discount;
                            $("#discount_label").text("-" + discount);
                            $("#tax_label").text((total * 4) / 100);
                            $("#total_label").text((total * 4) / 100 + total);
                            $("#total_payment").val((total * 4) / 100 + total);
                            $("#total_discount").val(discount);
                            $("#total_tax").val((total * 4) / 100);
                        } else {
                            $("#errorpromo_code").text("Invalid Promo Code").fadeIn('slow').fadeOut(5000);
                        }
                    }
                });
            }
        });
    });
</script> 
