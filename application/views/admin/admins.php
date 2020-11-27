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
                                    <button class="delete-admin-btn btn btn-danger" admin-id="<?=$admin['admin_id']?>" username="<?=$admin['username']?>"><i class="fa fa-trash"></i> Remove</button>
                                    <button class="edit-admin-btn btn btn-info" admin-id="<?=$admin['admin_id']?>" username="<?=$admin['username']?>" email="<?=$admin['email']?>" role="<?=$admin['role']?>"><i class="fa fa-edit"></i> Edit</button>
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
                        <option value="super_admin">Super Admin</option>
                    </select>
                    <input type="hidden" name="admin-id" value="">

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

            var admin_id = $("input[name='admin-id']").val();

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

            if (admin_id == '')
            {
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
            }else{
                $.post( "admins/editAdmin",
                    {
                        admin_id: admin_id,
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
                            $("input[name='admin-id']").val('');
                            $("input[name='email']").val('');
                            $("input[name='password']").val('');

                            $('.add-admin-btn').text(' Add');

                            Swal.fire(
                                'Done!',
                                role_text+' is updated!',
                                'success'
                            ).then(() => {
                                location.reload();
                            });

                        }else{
                            Swal.fire(
                                'Problem!',
                                'Unable update '+username+'!',
                                'error'
                            );
                        }
                    })
                    .error(function (error) {
                        Swal.fire(
                            'Problem!',
                            'Unable update '+username+'!',
                            'error'
                        );
                    });
            }
        });


        $('.delete-admin-btn').on('click', function () {
            var adminId = $(this).attr('admin-id');
            var username = $(this).attr('username');

            Swal.fire({
                title: 'Are you sure?',
                html: "You are about to remove <b>"+username+"</b> and this action is irreversible!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove '+username+'!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.get( "admins/removeAdmin/"+adminId, function( data ) {
                        if (data)
                        {
                            Swal.fire(
                                'Removed!',
                                username+' has been removed.',
                                'success'
                            ).then(()=>{
                                location.reload();
                            });
                        }else{
                            Swal.fire(
                                'Problem!',
                                'Unable to remove '+username,
                                'error'
                            );
                        }
                    });
                }
            })
        });


        $('.edit-admin-btn').on('click', function () {
            var adminId = $(this).attr('admin-id');
            var username = $(this).attr('username');
            var email = $(this).attr('email');
            var role = $(this).attr('role');

            $("input[name='username']").val(username);
            $("input[name='email']").val(email);
            $("input[name='admin-id']").val(adminId);
            $('select[name=role]').val(role);

            $('.add-admin-btn').text(' Save');

            $('#addAdminModal').modal('show');


        });

    });
</script>
