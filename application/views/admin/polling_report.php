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
                        <h4 class="panel-title text-white">Polling Report</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center" id="example">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Identifier</th>
                                            <?php
                                            if (isset($poll_list) && !empty($poll_list)) {
                                                foreach ($poll_list as $val) {
                                                    ?>
                                                    <th><?= $val['text'] ?></th>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($flash_report_list) && !empty($flash_report_list)) {
                                            foreach ($flash_report_list as $val) {
                                                ?>
                                                <tr>
                                                    <td><?= $val->first_name . ' ' . $val->last_name ?></td>
                                                    <td><?= $val->email ?></td>
                                                    <td><?= $val->identifier_id ?></td>
                                                    <?php
                                                    if (isset($val->polling_answer) && !empty($val->polling_answer)) {
                                                        foreach ($val->polling_answer as $vl) {
                                                            ?>
                                                            <th><?= $vl ?></th>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
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
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'csv',
                    text: '<i class="fa fa-table" aria-hidden="true"></i> Export CSV',
                    attr: {class: 'btn btn-info'}
                },
                {
                    text: '<i class="fa fa-pie-chart" aria-hidden="true"></i> Export Chart',
                    attr: {class: 'export-charts btn btn-warning'}
                }
            ],
            "initComplete": function( settings, json ) {
                $('.export-charts').on('click', function () {
                    exportCharts(<?=$session_id?>);
                });
            }
        });
    });

    function exportCharts(session_id) {
        location.href = "<?=base_url()?>admin/sessions/poll_chart/"+session_id;
    }
</script>









