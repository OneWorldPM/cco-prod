<style>
    #example_wrapper .dt-buttons .buttons-csv{
        background-color: #1fbba6;
        padding: 5px 15px 5px 15px;

    }
</style>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">List Of User Data</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">User Data</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center" id="user">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Date</th>
                                            <th>Register ID</th>
                                            <th>Profile</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Address</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($user) && !empty($user)) {
                                            foreach ($user as $val) {
                                                ?>
                                                <tr>
                                                    <td><?= $val->cust_id ?></td>
                                                    <td><?= date("Y-m-d", strtotime($val->register_date)) ?></td>
                                                    <td><?= $val->register_id ?></td>
                                                    <td>
                                                        <?php if ($val->profile != "") { ?>
                                                            <img src="<?= base_url() ?>uploads/customer_profile/<?= $val->profile ?>" style="height: 40px; width: 40px;">
                                                        <?php } else { ?>
                                                            <img src="<?= base_url() ?>assets/images/Avatar.png" style="height: 40px; width: 40px;">
                                                        <?php } ?>
                                                    <td><?= $val->first_name . ' ' . $val->last_name ?></td>
                                                    <td><?= $val->email ?></td>
                                                    <td><?= ($val->jti == '')?base64_decode($val->password):'***' ?></td>
                                                    <td><?= $val->address ?></td>
                                                    <td><?= $val->country ?></td>
                                                    <td> 
                                                        <a class="btn btn-danger btn-sm delete_presenter" href="<?= base_url() . 'admin/user/deleteuser/' . $val->cust_id ?>">
                                                            <i class="fa fa-trash-o"></i> Delete
                                                        </a>
                                                        <a class="btn btn-primary btn-sm" href="<?= base_url() . 'admin/user/user_activity/' . $val->cust_id ?>">
                                                            Activity
                                                        </a>
                                                        <?php if ($val->v_card != "") { ?>
                                                            <a download class="btn btn-info btn-sm" href="<?= base_url() . 'uploads/upload_vcard/' . $val->v_card ?>">
                                                                vCard
                                                            </a>
                                                        <?php } else { ?>
                                                            <a class="btn btn-info btn-sm" href="<?= base_url() . 'admin/exportvcard/' . $val->cust_id ?>">
                                                                vCard
                                                            </a>
                                                        <?php } ?>
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
    </div>
</div>
</div>
<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "D":
        $m = "User Delete Successfully...!!!";
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
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
        $("#user").dataTable({
            "ordering": true,
        });
    });
</script>








