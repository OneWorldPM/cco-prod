<style>
    #example_wrapper .dt-buttons .buttons-csv{
        background-color: #1fbba6;
        padding: 5px 15px 5px 15px;

    }
</style>

<?php //echo"<pre>"; print_r($user_activity[0]->full_name);exit?>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">List Of User Activity</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white " data-full_name="<?=(isset($user_activity) && !empty($user_activity))?$user_activity[0]->full_name:''?>">User Activity</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center" id="user">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Date & Time</th>
                                            <th>Page</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($user_activity) && !empty($user_activity)) {
                                            foreach ($user_activity as $val) {
                                                ?>
                                                <tr>
                                                    <td><?= date("Y-m-d h:i:s", strtotime($val->activity_date_time)) ?></td>
                                                    <td><?= $val->page_name ?></td>
                                                    <td><a href="<?= $val->page_link ?>" target="_blank"><?= $val->page_link ?></a></td>
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
        var full_name = $('.panel-title').attr('data-full_name');
        var date_time = "<?= date ('Y-m-d H:i:s')?>";
        $("#user").dataTable({
            "ordering": true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'csvHtml5',
                    text: 'Export CSV',
                    title: full_name+'_'+date_time,
                    className: 'btn btn-success',

                }]
        });
    });
</script>








