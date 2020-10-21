<div class="main-content" >
    <div class="wrap-content container" id="container">
        <form name="frm_credit" id="frm_credit" method="POST" action="">
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Create New Guest User </h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                            <label class="text-large">Username:</label>
                                            <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                                            <input type="hidden" name="cust_id" id="cust_id" value="0">
                                            <input type="hidden" name="cr_type" id="cr_type" value="save">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Password:</label>
                                            <input type="text" name="password" id="password" placeholder="Password" class="form-control">
                                        </div>
                                        <h5 class="over-title margin-bottom-15">
                                            <button type="button" id="save_btn" name="save_btn" class="btn btn-green add-row">
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
                                <h4 class="panel-title text-white">Guest User</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <span id="errortxtsendemail" style="color:red;"></span>
                                <h5 class="over-title margin-bottom-15 margin-top-5">Guest User Login : <span class="text-bold"><a href="<?= base_url() ?>"><?= base_url() ?></a> </h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="plan_table">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Email</th>
                                                <th>First Name </th>
                                                <th>Last Name</th>
                                                <th>Phone No.</th>
                                                <th>Action</th>                          
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($dummy_user)) {
                                                foreach ($dummy_user as $val) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $val->username ?></td>
                                                        <td><?= base64_decode($val->password) ?></td>
                                                        <td><?= $val->email ?></td>
                                                        <td><?= $val->first_name ?></td>
                                                        <td><?= $val->last_name ?></td>
                                                        <td><?= $val->phone ?></td>
                                                        <td> 
                                                            <a class="btn btn-primary btn-sm edit_user" data-id="<?= $val->cust_id ?>" href="#">
                                                                <i class="fa fa-pencil"></i> Edit
                                                            </a>
                                                            <a class="btn btn-danger btn-sm delete_promo_code" href="<?= base_url() . 'admin/dummy_user/delete_dummy_user/' . $val->cust_id ?>">
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
        $m = "Guest Users Added Successfully...!!!";
        $t = "success";
        break;
    case "U":
        $m = "Guest Users Updated Successfully...!!!";
        $t = "success";
        break;
    case "D":
        $m = "Guest Users Delete Successfully...!!!";
        $t = "success";
        break;
     case "EX":
        $m = "Username already exists";
        $t = "error";
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

        $('#save_btn').click(function () {
            if ($('#username').val() == '') {
                alertify.error('Please Enter Username');
                return false;
            } else if ($('#password').val() == '') {
                alertify.error('Please Enter Password');
                return false;
            } else {
                $('#frm_credit').attr('action', '<?= base_url() ?>admin/dummy_user/add_dummy_user');
                $('#frm_credit').submit();
                return true;
            }
        });

        $(document).on("click", ".edit_user", function () {
            var cr_id = $(this).attr('data-id');

            if (cr_id != '') {
                $.ajax({
                    url: "<?= base_url() ?>admin/dummy_user/getDummyUserById/" + cr_id,
                    type: "post",
                    success: function (response) {
                        cr_data = JSON.parse(response);
                        if (cr_data.msg == "success")
                        {
                            $('#username').val(cr_data.data.username);
                            $('#password').val(atob(cr_data.data.password));
                            $('#cust_id').val(cr_data.data.cust_id);
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









