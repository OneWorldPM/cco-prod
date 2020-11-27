<style>
    .input-group-addon {
        background-color: #1c8aa4;
        border: 1px solid #45cbff;
        color: #ffffff;
    }

    .swal2-container{
        z-index: 10000;
    }
</style>

<div class="main-content">
    <div class="wrap-content container" id="container">

        <div class="row">
            <div class="col-sm-12 margin-top-5 margin-bottom-5">
                <span class="mainTitle" style="font-size: 30px">Admin Users</span>
                <button class="btn btn-success pull-right" data-toggle="modal" data-target="#addAdminModal"><i class="fa fa-plus"></i> Add Admin</button>
            </div>
        </div>

        <!-- start: FEATURED BOX LINKS -->
        <div class="container-fluid container-fullw bg-white">
            <div class="row">
                <table id="adminsTable" class="table-bordered" style="width:100%">
                    <thead style="font-size: 15px;">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody style="font-size: 15px;">
                    <?php foreach ($admins as $admin){ ?>
                        <tr>
                            <td><?=$admin['admin_id']?></td>
                            <td><?=$admin['username']?></td>
                            <td><?=$admin['email']?></td>
                            <td><?=$admin['role']?></td>
                            <td style="padding-top: 8px;padding-bottom: 8px;">
                                <?php if ($admin['role'] != 'super_admin') { ?>
                                    <button class="delete-admin-btn btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                    <button class="edit-admin-btn btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                                <?php }else{ ?>
                                    <span class="label label-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Cannot Modify Super Admin Users</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Add Admin Modal -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Add Admin</h4>
            </div>
            <div class="modal-body">
                <form>

                    <div class="input-group margin-bottom-5">
                        <span class="input-group-addon" id="username">Username <i aria-hidden="true" class="fa fa-asterisk fa-sm" style="color: #ce0000;font-size: 10px;"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Admins use this to login" aria-describedby="username">
                    </div>

                    <div class="input-group margin-bottom-5">
                        <span class="input-group-addon" id="email">Email</span>
                        <input type="text" name="email" class="form-control" placeholder="Email is just for communication purposes" aria-describedby="email">
                    </div>

                    <div class="input-group margin-bottom-5">
                        <span class="input-group-addon" id="password">Password <i aria-hidden="true" class="fa fa-asterisk fa-sm" style="color: #ce0000;font-size: 10px;"></i></span>
                        <input type="text" name="password" class="form-control" placeholder="Password" aria-describedby="password">
                    </div>

                    <label for="role" style="font-size: 18px;">Role: <i aria-hidden="true" class="fa fa-asterisk fa-sm" style="color: #ce0000;font-size: 10px;"></i> </label>
                    <select name="role" id="role">
                        <option value="publisher">Publisher</option>
                        <option value="super-admin">Super Admin</option>
                    </select>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="add-admin-btn btn btn-success"><i class="fa fa-plus"></i> Add</button>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };


        $('#adminsTable').DataTable();

        $('.add-admin-btn').on('click', function () {
            var username = $("input[name='username']").val();
            var email = $("input[name='email']").val();
            var password = $("input[name='password']").val();
            var role = $('select[name=role] option').filter(':selected').val();
            var role_text = $('select[name=role] option').filter(':selected').text();

            if (username == '' || /\s/g.test(username))
            {
                toastr.warning('Username cannot be empty or contain a whitespace!');
                return false;
            }
            if (password == '' || /\s/g.test(password))
            {
                toastr.warning('Password cannot be empty or contain a whitespace!');
                return false;
            }
            if (/\s/g.test(email))
            {
                toastr.warning('Email cannot contain a whitespace!');
                return false;
            }
            if (role == '')
            {
                toastr.warning('Role cannot be empty!');
                return false;
            }

            $.post( "admins/addAdmin",
                {
                    username: username,
                    email: email,
                    password: password,
                    role: role
                })
                .done(function( data ) {
                    if (data)
                    {
                        $('#addAdminModal').modal('hide');
                        $("input[name='username']").val('');
                        $("input[name='email']").val('');
                        $("input[name='password']").val('');

                        Swal.fire(
                            'Done!',
                            'Admin with '+role_text+' role is added!',
                            'success'
                        ).then(() => {
                            location.reload();
                        });

                    }else{
                        Swal.fire(
                            'Problem!',
                            'Unable to add admin, probably because username or email already exists!',
                            'error'
                        );
                    }
                })
                .error(function (error) {
                    Swal.fire(
                        'Problem!',
                        'Unable to add admin, probably because username or email already exists!',
                        'error'
                    );
                });
        });

        $('.delete-admin-btn, .edit-admin-btn').on('click', function () {
            toastr.warning('Under development!');
        });

    });
</script>
