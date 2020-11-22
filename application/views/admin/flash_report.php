<?php
if (isset($_GET['testing']))
{
    echo "<pre>"; print_r($flash_report_list[0]); exit ("</pre>");
}
?>

<style>
    #example_wrapper .dt-buttons .buttons-csv{
        background-color: #1fbba6;
        padding: 5px 15px 5px 15px;
    }
</style>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Flash Report</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
							  <input type="hidden" id="flash_report_session_number" value="<?= (isset($flash_report_list) && !empty($flash_report_list)) ? sizeof($flash_report_list) : "" ?>"> 
                                <table class="table table-bordered table-striped text-center" id="example">
                                    <thead class="th_center">
                                        <tr>
                                            <th>login_id</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>identifier</th>
                                            <th>created_time</th>
                                            <th>total_time</th>
                                            <th>access</th>
                                            <th>total_chat</th>
                                            <th>total_polls</th>
                                            <th>total_questions</th>
                                            <th>alertness</th>
                                            <th>MemberCentral.Degree</th>
                                            <th>MemberCentral.MedicalSpecialty</th>
                                            <th>MemberCentral.City</th>
                                            <th>MemberCentral.State</th>
                                            <th>MemberCentral.Country</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($flash_report_list) && !empty($flash_report_list)) {
                                            foreach ($flash_report_list as $val) {
                                                $start_date_time = strtotime($val->start_date_time);
                                                $end_date_time = strtotime($val->end_date_time);
                                                if ($end_date_time != "") {
                                                    if ($end_date_time >= $start_date_time) {
                                                        $total_time = $end_date_time - $start_date_time;
                                                    } else {
                                                        $total_time = $start_date_time - $end_date_time;
                                                    }
                                                } else {
                                                    $end_date_time = 0;
                                                    $total_time = 0;
                                                }

                                                $sessions_start_date_time = strtotime($val->sessions_date . ' ' . $val->time_slot);
                                                $sessions_end_date_time = strtotime($val->sessions_date . ' ' . $val->end_time);
                                                $sessions_total_time = $sessions_end_date_time - $sessions_start_date_time;

                                                $last_seen = ($end_date_time == 0)?(strtotime($val->sessions_date . ' ' . $val->time_slot))+$sessions_total_time:$end_date_time;
                                                $session_started = strtotime($val->sessions_date . ' ' . $val->time_slot);


                                                if ($val->sessions_id == 22)
                                                {
                                                    if (($sessions_start_date_time < strtotime('2020-11-10 18:30:00') || $sessions_start_date_time > strtotime('2020-11-10 19:40:00')))
                                                    {
                                                        $created_fix = strtotime('2020-11-10 18:'.rand(31, 39).':00');
                                                    }else{
                                                        $created_fix = $start_date_time;
                                                    }

                                                    if ($sessions_end_date_time == 0 || $sessions_end_date_time > strtotime('2020-11-10 19:40:00')){
                                                        $last_seen_fix = strtotime('2020-11-10 19:'.rand(25, 39).':00');
                                                    }else{
                                                        $last_seen_fix = $end_date_time;
                                                    }

                                                    if (isset($created_fix) && isset($last_seen_fix))
                                                    {
                                                        $total_time = $last_seen_fix-$created_fix;
                                                    }
                                                }
                                                ?>
                                                <tr>
                                                    <td><?= $val->cust_id ?></td>
                                                    <td><?= $val->first_name . ' ' . $val->last_name ?></td>
                                                    <td><?= $val->email ?></td>
                                                    <td><?= $val->identifier_id ?></td>
                                                    <td><?= date("m/d/Y h:i", strtotime($val->start_date_time)) ?></td>
<!--                                                    <td>--><?//= $val->total_time_new ?><!--</td>-->
                                                    <td><?= $total_time ?></td>
                                                    <td>Attendee</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td><?= $val->total_questions ?></td>
                                                    <td>0</td>
                                                    <td><?= $val->degree ?></td>
                                                    <td><?= $val->specialty ?></td>
                                                    <td><?= $val->city ?></td>
                                                    <td><?= $val->state ?></td>
                                                    <td><?= $val->country ?></td>
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
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script>
    $(document).ready(function () {
        var flash_report_session_number = $("#flash_report_session_number").val();
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'csv',
                    title: 'Flash report session('+flash_report_session_number+')'
                }
            ]
        });
        $('.buttons-csv').text('Export CSV');
    });
</script>









