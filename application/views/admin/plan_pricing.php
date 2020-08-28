<div class="main-content" >
    <div class="wrap-content container" id="container">
        <form name="frm_credit" id="frm_credit" method="POST" action="">
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Add Plan</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label class="text-large">Plan Name:</label>
                                            <input type="text" name="plan_name" id="plan_name" placeholder="Plan Name" class="form-control">
                                            <input type="hidden" name="plan_pricing_id" id="plan_pricing_id" value="0">
                                            <input type="hidden" name="cr_type" id="cr_type" value="save">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Member Price:</label>
                                            <input type="text" name="member_price" id="member_price" placeholder="Member Prince" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Non-Member Price:</label>
                                            <input type="text" name="non_member_price" id="non_member_price" placeholder="Non-Member Prince" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Color:</label>
                                            <input type="text" name="color_code" id="color_code" placeholder="Color Code" class="form-control">
                                            <p><a target="blank" href="https://htmlcolorcodes.com">Get Color Code<a></p>
                                        </div>
                                        <h5 class="over-title margin-bottom-15">
                                            <button type="button" id="save_plan" name="save_plan" class="btn btn-green add-row">
                                                Submit
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">                     
                    <div class="col-md-12">
                        <div class="panel panel-light-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Plan & Pricing</h4>
                            </div>

                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <span id="errortxtsendemail" style="color:red;"></span>
                                <h5 class="over-title margin-bottom-15 margin-top-5">Plan<span class="text-bold"></span></h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="plan_table">
                                        <thead>
                                            <tr>
                                                <th>Plan</th> 
                                                <th>Member Price</th>
                                                <th>Non-Member Price</th>
                                                <th>Color</th>
                                                <th>Action</th>                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($plan_pricing)) {
                                                foreach ($plan_pricing as $val) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $val->plan_name ?></td>
                                                        <td><i class="fa fa-dollar"></i> <?= $val->member_price ?></td>
                                                        <td><i class="fa fa-dollar"></i> <?= $val->non_member_price ?></td>
                                                        <td> <?= $val->color_code ?></td>
                                                        <td> 
                                                            <a class="btn btn-primary btn-sm edit_plan" data-id="<?= $val->plan_pricing_id ?>" href="#">
                                                                <i class="fa fa-pencil"></i> Edit
                                                            </a>
                                                            <a class="btn btn-danger btn-sm delete_plan" href="<?= base_url() . 'admin/plan_pricing/deletePlanPricing/' . $val->plan_pricing_id ?>">
                                                                <i class="fa fa-trash-o"></i> Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>   
        <!-- end: DYNAMIC TABLE -->
    </div>
</div>

</div>

<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "S":
        $m = "Plan Added Successfully...!!!";
        $t = "success";
        break;
    case "U":
        $m = "Plan Updated Successfully...!!!";
        $t = "success";
        break;
    case "D":
        $m = "Plan Delete Successfully...!!!";
        $t = "success";
        break;
    case "E":
        $m = "Something went wrong, Please try again!!!";
        $t = "error";
        break;
    default:
        $m = 0;
        break;
}
?>

<script>
    $(document).ready(function () {

<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>

        $('#plan_table').dataTable({
            "aaSorting": []
        });

        $('#save_plan').click(function () {
            if ($('#plan_name').val() == '') {
                alertify.error('Please Enter Plan Name');
                return false;
            } else if ($('#member_price').val() == '') {
                alertify.error('Please Enter Member Price');
                return false;
            } else if ($('#non_member_price').val() == '') {
                alertify.error('Please Enter Non-Member Price');
                return false;
            } else if ($('#color_code').val() == '') {
                alertify.error('Please Enter Color');
                return false;
            } else {
                $('#frm_credit').attr('action', '<?= base_url() ?>admin/plan_pricing/add_plan_pricing');
                $('#frm_credit').submit();
                return true;
            }
        });

        $('.edit_plan').click(function () {
            var cr_id = $(this).attr('data-id');

            if (cr_id != '') {
                $.ajax({
                    url: "<?= base_url() ?>admin/plan_pricing/getPlanPricingById/" + cr_id,
                    type: "post",
                    success: function (response) {
                        cr_data = JSON.parse(response);
                        if (cr_data.msg == "success")
                        {
                            $('#plan_name').val(cr_data.data.plan_name);
                            $('#member_price').val(cr_data.data.member_price);
                            $('#non_member_price').val(cr_data.data.non_member_price);
                            $('#color_code').val(cr_data.data.color_code);
                            $('#plan_pricing_id').val(cr_data.data.plan_pricing_id);
                            $('#cr_type').val('update');
                        } else {
                            alertify.error('Something went wrong, Please try again!');
                            window.setTimeout('location.reload()', 3000);
                        }
                    }
                });
            } else {
                alertify.error('Something went wrong, Please try again!');
                window.setTimeout('location.reload()', 3000);
            }
        });

    });

</script>









