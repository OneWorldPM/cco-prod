<style type="text/css">        
    .control-label-bold{
        font-weight: bold;
    }
    .panel-light-primary {
        border: 1px solid #13304e !important;
    }
</style>
</style>
<div class="main-content" >
    <div class="wrap-content container" id="container">
        <div class="container-fluid container-fullw bg-white">
            <div class="panel panel-primary" id="panel5">
                <div class="panel-heading">
                    <h4 class="panel-title text-white">Group Chat</h4>
                </div>
                <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <div style="height:60px;padding-top: 5px;">
                                <a class="btn btn-wide btn-primary" href="<?= base_url() ?>presenter/groupchat/createGroupChat/<?= $sessions_id ?>"><i class="glyphicon glyphicon-plus"></i> Create New Group Chat</a> 
                            </div>
                            <table class="table table-bordered table-striped" id="tbl_transaction">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Title</th>
                                          <!--<th>Users</th>-->
                                        <th>Presenter</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($group_chat_data)) {
                                        foreach ($group_chat_data as $val) {
                                            ?>
                                            <tr>
                                                <td><?= date("Y-m-d h:i", strtotime($val->group_chat_date)); ?></td>
                                                <td><?= $val->group_chat_title ?></td>
<!--                                                 <td>
                                                    <?php
                                                    if (isset($val->user_list) && !empty($val->user_list)) {
                                                        foreach ($val->user_list as $value) {
                                                            echo $value->first_name . ' ' . $value->last_name . ", ";
                                                        }
                                                    }
                                                    ?>
                                                </td>-->
                                                 <td>
                                                    <?php
                                                    if (isset($val->presenter_list) && !empty($val->presenter_list)) {
                                                        foreach ($val->presenter_list as $value) {
                                                            echo $value->first_name . ' ' . $value->last_name . ", ";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($val->status == 0) { ?>
                                                        <label class="btn btn-warning btn-sm" >Pending</label>
                                                    <?php } else if ($val->status == 1) { ?>
                                                        <label class="btn btn-success btn-sm" >Open</label>
                                                    <?php } else { ?>
                                                        <label class="btn btn-danger btn-sm" >Close</label>
                                                    <?php } ?>
                                                </td> 
                                                <td>
                                                    <?php if ($val->status == 0) { ?>
                                                        <a href="<?= base_url() ?>presenter/groupchat/open_chat/<?= $sessions_id ?>?id=<?= $val->sessions_group_chat_id ?>"><label class="btn btn-primary btn-sm" >Open Chat</label></a>
                                                    <?php } else if ($val->status == 1) { ?>
                                                        <!--<a href="<?= base_url() ?>presenter/groupchat/view_chat/<?= $sessions_id ?>?id=<?= $val->sessions_group_chat_id ?>"><label class="btn btn-success btn-sm" >View Chat</label></a>-->
                                                        <a href="<?= base_url() ?>presenter/groupchat/close_chat/<?= $sessions_id ?>?id=<?= $val->sessions_group_chat_id ?>"> <label class="btn btn-danger btn-sm" >Chat Close</label></a>
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
                    </form>
                </div>                     
            </div>
        </div>
    </div>
</div>
</div>
<?php
$msg = $this->input->get('msg');
switch ($msg) {
    case "AS":
        $m = "Create Group Chat Successfully...!!!";
        $t = "success";
        break;
    case "OS":
        $m = "Open Group Chat Successfully...!!!";
        $t = "success";
        break;
    case "CS":
        $m = "Close Group Chat Successfully...!!!";
        $t = "success";
        break;
    case "AE":
        $m = "Already Opened Other Group Chat";
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
<script type="text/javascript">
    $(document).ready(function () {
<?php if ($msg): ?>
            alertify.<?= $t ?>("<?= $m ?>");
<?php endif; ?>
        $("#tbl_transaction").dataTable({
            "ordering": false,
        });
        $('#select_all').click(function () {
            if (this.checked)
            {
                $('.grid_checkbox').each(function () {
                    this.checked = true;
                });
            } else
            {
                $('.grid_checkbox').each(function () {
                    this.checked = false;
                });
            }
        });

        $('.mycheck').on('click', function () {
            if (confirm('Are you sure close selected record?')) {
                $url = '<?= site_url() ?>customer/supportticket/allTicketClose';
                $('#ticketformtbl').attr('action', $url);
                $('#ticketformtbl').submit();
            } else {
                return false;
            }
        });
    });
</script>




