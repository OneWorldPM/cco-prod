<div class="main-content" >
    <div class="wrap-content container" id="container">
        <form name="frm_credit" id="frm_credit" method="POST" action="" enctype="multipart/form-data">
            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white">Add Presenters</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-large">First Name:</label>
                                                    <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-large">Last Name:</label>
                                                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="text-large">Affiliation:</label>
                                                <input type="text" name="designation" id="designation" placeholder="Designation" class="form-control">
                                                <input type="hidden" name="presenter_id" id="presenter_id" value="0">
                                                <input type="hidden" name="cr_type" id="cr_type" value="save">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-large">Title:</label>
                                                    <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-large">Degree:</label>
                                                    <input type="text" name="degree" id="degree" placeholder="Degree" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-large">Specialty:</label>
                                                    <input type="text" name="specialty" id="specialty" placeholder="Specialty" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-large">Bio:</label>
                                            <textarea class="form-control" style="color: #000;" name="bio" id="bio" placeholder="Bio"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Company Name:</label>
                                            <input type="text" name="company_name" id="company_name" placeholder="Company Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Email:</label>
                                            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="text-large">Set Password:</label>
                                            <input type="text" name="password" id="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Presenter Profile</label>
                                            <input type="file" class="form-control" name="presenter_photo" id="presenter_photo">
                                            <img src="" id="presenter_profile" style="height: 100px; width: 100px; display: none;">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-large">Facebook:</label>
                                                    <input type="text" name="facebook" id="facebook" placeholder="Facebook" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-large">Linkin:</label>
                                                    <input type="text" name="linkin" id="linkin" placeholder="Linkin" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-large">Twitter:</label>
                                                    <input type="text" name="twitter" id="twitter" placeholder="Twitter" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="over-title margin-bottom-15">
                                            <button type="button" id="save_presenter" name="save_presenter" class="btn btn-green add-row">
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
                                <h4 class="panel-title text-white">Presenter</h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb;">
                                <span id="errortxtsendemail" style="color:red;"></span>
                                <h5 class="over-title margin-bottom-15 margin-top-5">Presenter Login Link : <span class="text-bold"><a href="<?= base_url() ?>presenter"><?= base_url() ?>presenter</a></span></h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="presenter_table">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Presenter Name</th> 
                                                <th>Designation</th>
                                                <th>Company Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($presenters)) {
                                                foreach ($presenters as $val) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php if ($val->presenter_photo != "") { ?>
                                                                <img src="<?= base_url() ?>uploads/presenter_photo/<?= $val->presenter_photo ?>" style="height: 40px; width: 40px;">
                                                            <?php } ?>
                                                        </td>
                                                        <td><?= $val->first_name . ' ' . $val->last_name ?></td>
                                                        <td><?= $val->designation ?></td>
                                                        <td><?= $val->company_name ?></td>
                                                        <td><?= $val->email ?></td>
                                                        <td><?= $val->password ?></td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm edit_presenter" data-id="<?= $val->presenter_id ?>" href="#">
                                                                <i class="fa fa-pencil"></i> Edit
                                                            </a>
                                                            <a class="btn btn-danger btn-sm delete_presenter" href="<?= base_url() . 'admin/presenters/deletePresenter/' . $val->presenter_id ?>">
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
        $m = "Presenter Added Successfully...!!!";
        $t = "success";
        break;
    case "U":
        $m = "Presenter Updated Successfully...!!!";
        $t = "success";
        break;
    case "D":
        $m = "Presenter Delete Successfully...!!!";
        $t = "success";
        break;
    case "nd":
        $m = "You cannot delete this Presenter as they are part of an active session.";
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
        var cr_id = "<?=$presenter_id?>";
        if (cr_id != '') {
            $.ajax({
                url: "<?= base_url() ?>admin/presenters/get_presenter_byid/" + cr_id,
                type: "post",
                success: function (response) {
                    cr_data = JSON.parse(response);
                    //$('#email').prop('readonly', true);
                    if (cr_data.msg == "success")
                    {
                        $('#first_name').val(cr_data.data.first_name);
                        $('#last_name').val(cr_data.data.last_name);
                        $('#designation').val(cr_data.data.designation);
                        $('#title').val(cr_data.data.title);
                        $('#degree').val(cr_data.data.degree);
                        $('#specialty').val(cr_data.data.specialty);
                        $('#facebook').val(cr_data.data.facebook);
                        $('#linkin').val(cr_data.data.linkin);
                        $('#twitter').val(cr_data.data.twitter);
                        $('#bio').val(cr_data.data.bio);
                        $('#company_name').val(cr_data.data.company_name);
                        $('#email').val(cr_data.data.email);
                        $('#password').val(cr_data.data.password);
                        $('#presenter_id').val(cr_data.data.presenter_id);
                        $('#presenter_profile').attr('src', "<?= base_url() ?>uploads/presenter_photo/" + cr_data.data.presenter_photo);
                        $('#presenter_profile').show();
                        $('#cr_type').val('update');

                        alertify.success('Save Success');
                    } else {
                    }
                }
            });
        } else {
        }

<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>

        $('#presenter_table').dataTable({
            "aaSorting": []
        });

        $('#save_presenter').click(function () {
            if ($('#first_name').val() == '') {
                alertify.error('Please Enter First Name');
                return false;
            } else if ($('#last_name').val() == '') {
                alertify.error('Please Enter Last Name');
                return false;
            } else if ($('#email').val() == '') {
                alertify.error('Please Enter Email');
                return false;
            } else if (!validateEmail($("#email").val().trim())) {
                alertify.error('Enter Valid Email Id..');
                return false;
            } else if ($('#password').val() == '') {
                alertify.error('Please Enter Password');
                return false;
            } else {
                $('#frm_credit').attr('action', '<?= base_url() ?>admin/presenters/add_presenters');
                $('#frm_credit').submit();
                return true;
            }
        });

        $(document).on("click", ".edit_presenter", function () {
            var cr_id = $(this).attr('data-id');
            if (cr_id != '') {
                $.ajax({
                    url: "<?= base_url() ?>admin/presenters/get_presenter_byid/" + cr_id,
                    type: "post",
                    success: function (response) {
                        cr_data = JSON.parse(response);
                        //$('#email').prop('readonly', true);
                        if (cr_data.msg == "success")
                        {
                            $('#first_name').val(cr_data.data.first_name);
                            $('#last_name').val(cr_data.data.last_name);
                            $('#designation').val(cr_data.data.designation);
                            $('#title').val(cr_data.data.title);
                            $('#degree').val(cr_data.data.degree);
                            $('#specialty').val(cr_data.data.specialty);
                            $('#facebook').val(cr_data.data.facebook);
                            $('#linkin').val(cr_data.data.linkin);
                            $('#twitter').val(cr_data.data.twitter);
                            $('#bio').val(cr_data.data.bio);
                            $('#company_name').val(cr_data.data.company_name);
                            $('#email').val(cr_data.data.email);
                            $('#password').val(cr_data.data.password);
                            $('#presenter_id').val(cr_data.data.presenter_id);
                            $('#presenter_profile').attr('src', "<?= base_url() ?>uploads/presenter_photo/" + cr_data.data.presenter_photo);
                            $('#presenter_profile').show();
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

    function validateEmail(sEmail) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(sEmail);
    }
</script>









