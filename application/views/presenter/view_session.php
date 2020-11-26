<!-- Please add styles only in this CSS file, NOT directly on this HTML file -->
<link href="<?= base_url() ?>front_assets/presenter/view_session.css?v=1" rel="stylesheet">

<?php
if (isset($_GET['testing']) && $_GET['testing'] == 1) {
    echo date('yy-m-d h:m:i');
    echo "<pre>";
    print_r($sessions);
    exit("</pre>");
}
?>

<h1>geldii</h1>
<div class="container-fluid presenterContainer" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-12 leftSide" style="background-color: black;height: 500px"></div>
        <div class="col-md-3 rightSide">

            <div class="rightSticykPopup hostChat presenterRightSticykPopup" style="display: none">
                <div class="header"><span>HOST CHAT</span>
                    <div class="rightTool">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                        <div class="dropdown">
                            <span class="fa fa-ellipsis-v" aria-hidden="true" data-toggle="dropdown"></span>
                            <ul class="dropdown-menu">
                                <li data-type="questionFavorites"><a data-type2="off">Questions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content">
                </div>
            </div>
            <div class="rightSticykPopup questionFavorites presenterRightSticykPopup" style="display: none">
                <div class="header"><span>QUESTIONS | FAVORITES</span>
                    <div class="rightTool">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                        <div class="dropdown">
                            <span class="fa fa-ellipsis-v" aria-hidden="true" data-toggle="dropdown"></span>
                            <ul class="dropdown-menu">
                                <li data-type="resourcesSticky"><a data-type2="off">Host Chat</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="content">
                </div>
            </div>
        </div>
    </div>
</div>









<div class="rightSticky presenterRightSticky" data-screen="presenter">
    <ul>
        <li data-type="hostChat"><i class="fa fa-comments-o" aria-hidden="true"></i><span>HOST CHAT</span></li>
        <li data-type="questionFavorites"><i class="fa fa-question" aria-hidden="true"></i> <span>QUESTIONS</span></li>
    </ul>
</div>




<script>
    var base_url = "<?=base_url()?>";
    var site_url = "<?= site_url() ?>";
    var user_id = "<?=$this->session->userdata('cid')?>";
    var app_name = "<?=getAppName($sessions->sessions_id) ?>";
    var session_id = "<?=$sessions->sessions_id?>";
    var session_start_datetime = "<?= date('M d, yy', strtotime($sessions->sessions_date)) . ' ' . $sessions->time_slot . ' UTC-5' ?>";
    var session_end_datetime = "<?= date('M d, yy', strtotime($sessions->sessions_date)) . ' ' . $sessions->end_time . ' UTC-5' ?>";
</script>

<!-- Please add scripts only in this JS file, NOT directly on this HTML file -->
<script src="<?= base_url() ?>front_assets/presenter/view_session.js?v=3"></script>
