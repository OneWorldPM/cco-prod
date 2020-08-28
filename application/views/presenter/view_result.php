<style>
    .progress-bar {
        height: 100%;
        padding: 3px;
        background: rgb(200, 201, 202);
        box-shadow: none; 
    }
    .progress-bar_1 {
        height: 100%;
        padding: 3px;
        background: rgb(108, 108, 108);
        box-shadow: none; 
        color: #fff;
        padding-top: 0px;
    }
    .progress_bar_new {
        height: 100%;
        padding: 3px;
        background: #99d9ea;
        box-shadow: none;
        text-align: center;
        color: #fff;
        padding-top: 0px;
    }
    .progress_bar_new_1 {
        height: 100%;
        padding: 3px;
        background: #5c915b;
        box-shadow: none;
        text-align: center;
        color: #fff;
        padding-top: 0px;
    }

    .option_section_css{
        background-color: #f1f1f1;
        padding-top: 4px;
        padding-left: 6px;
        border-radius: 9px;
        margin-bottom: 10px;
    }
    .option_section_css_selected{
        background-color: #e1f6ff;
        padding-top: 4px;
        padding-left: 6px;
        border-radius: 9px;
        margin-bottom: 10px;
    }
    .progress {
        height: 26px;
        margin-bottom: 10px;
        overflow: hidden;
        background-color: #e6edf3;
        border-radius: 5px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    }
    .progress_1 {
        height: 26px;
        margin-bottom: 10px;
        overflow: hidden;
        background-color: #55c4534f;
        border-radius: 5px;
        -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
        box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    }
</style>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <div class="container-fluid container-fullw">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white"></h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="poll_vot_section" style="padding: 0px 0px 0px 0px; margin-top: 0px; background-color: #fff; border-radius: 5px;">
                                    <div class='row'>
                                        <div class='col-md-12'>
                                            <h2 style='margin-bottom: 0px; color: gray; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #efe4b0; text-transform: uppercase;'><?= $poll_report->question ?></h2>
                                        </div>
                                        <div class='col-md-12'>
                                            <div class='col-md-12'>
                                                <?php
                                                $total_vote = 0;
                                                $total_vote_compere_option = 0;
                                                foreach ($poll_report->option as $key => $val) {
                                                    $key++;
                                                    $total_vote = $total_vote + $val->total_vot;
                                                    if (isset($val->compere_option)) {
                                                        $total_vote_compere_option = $total_vote_compere_option + $val->compere_option;
                                                    }
                                                }
                                                ?>
                                                <div id='result_section' style='padding-bottom: 10px;'>
                                                    <?php
                                                    foreach ($poll_report->option as $key => $val) {
                                                        $key++;
                                                        if ($total_vote == 0) {
                                                            $result_calculate = 0;
                                                        } else {
                                                            $result_calculate = ($val->total_vot * 100) / $total_vote;
                                                        }
                                                        if ($poll_report->max_value == $val->total_vot) {
                                                            ?>
                                                            <label><?= $val->option ?></label><div class='progress'><div class='progress_bar_new' role='progressbar' aria-valuenow='<?= number_format($result_calculate, 0) ?>' aria-valuemin='0' aria-valuemax='100' style='width:<?= number_format($result_calculate, 0) ?>%'><?= number_format($result_calculate, 0) ?>%</div></div>
                                                        <?php } else { ?>
                                                            <label><?= $val->option ?></label><div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='<?= number_format($result_calculate, 0) ?>' aria-valuemin='0' aria-valuemax='100' style='width:<?= number_format($result_calculate, 0) ?>%'><?= number_format($result_calculate, 0) ?>%</div></div>
                                                        <?php }
                                                        ?>
                                                        <?php
                                                        if (isset($val->compere_option)) {

                                                            if ($total_vote_compere_option == 0) {
                                                                $result_calculate_compere = 0;
                                                            } else {
                                                                $result_calculate_compere = ($val->compere_option * 100) / $total_vote_compere_option;
                                                            }
                                                            if ($poll_report->compere_max_value == $val->compere_option) {
                                                                ?>
                                                                <div class='progress_1'><div class='progress_bar_new_1' role='progressbar' aria-valuenow='<?= number_format($result_calculate_compere, 0) ?>' aria-valuemin='0' aria-valuemax='100' style='width:<?= number_format($result_calculate_compere, 0) ?>%'><?= number_format($result_calculate_compere, 0) ?>%</div></div>
                                                            <?php } else { ?>
                                                                <div class='progress_1'><div class='progress-bar_1' role='progressbar' aria-valuenow='<?= number_format($result_calculate_compere, 0) ?>' aria-valuemin='0' aria-valuemax='100' style='width:<?= number_format($result_calculate_compere, 0) ?>%'><?= number_format($result_calculate_compere, 0) ?>%</div></div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>    

                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: DYNAMIC TABLE -->
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
