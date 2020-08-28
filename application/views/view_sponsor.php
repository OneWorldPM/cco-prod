<link href="<?= base_url() ?>front_assets/sponsor/css/sponsor-home.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<?php
$sponsors_logo = ($sponsor->sponsors_logo == '') ? 'logo_placeholder.png' : $sponsor->sponsors_logo;
?>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-image: url(<?= base_url() ?>front_assets/sponsor/images/covers/sponsor-cover-default.jpg)">
        <div class="container" style="height: 220px;">
            <img class="sponsor-main-logo" src="<?= base_url() ?>uploads/sponsors/<?= $sponsors_logo ?>">
            <h1 class="sponsor-name">
                <?= $sponsor->company_name ?>
            </h1>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row m-b-30">

            <div class="col-md-4">
                <?php
                if ($sponsor->about != '') {
                    echo '<h3>About Us</h3>';
                    echo $sponsor->about;
                }
                ?>
                <div class="clearfix m-b-25"></div>
                <?php
                if ($sponsor->website != '') {
                    echo '<a href="//' . $sponsor->website . '" target="_blank"><i class="fa fa-globe fa-3x" aria-hidden="true" style="color: #417cb0;"></i></a>';
                }
                if ($sponsor->twitter_id != '') {
                    echo '<a href="https://twitter.com/' . $sponsor->twitter_id . '" target="_blank"><i class="fa fa-twitter-square fa-3x m-l-10" aria-hidden="true" style="color: #1da1f2;;"></i></a>';
                }
                if ($sponsor->facebook_id != '') {
                    echo '<a href="https://facebook.com/' . $sponsor->facebook_id . '" target="_blank"><i class="fa fa-facebook-square fa-3x m-l-10" aria-hidden="true" style="color: #036ce4;"></i></a>';
                }
                if ($sponsor->linkedin_id != '') {
                    echo '<a href="https://www.linkedin.com/company/' . $sponsor->linkedin_id . '" target="_blank"><i class="fa fa-linkedin-square fa-3x m-l-10" aria-hidden="true" style="color: #0077b5;"></i></a>';
                }
                if ($sponsor->twitter_id != '') {
                    echo '<div class="col-md-12 m-t-20" style="height: 355px; overflow: scroll">
                            <a class="twitter-timeline" href="https://twitter.com/' . $sponsor->twitter_id . '?ref_src=twsrc%5Etfw">Tweets by ' . $sponsor->twitter_id . '</a>
                            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                          </div>
                    ';
                }
                ?>
            </div>

            <div class="col-md-4">
                <div class="grpchat-margin"></div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Resources
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                File 1
                                <span class="chat-now-badge badge">Download</span>
                                <span class="profile-badge badge">Add to case</span>
                            </li>
                            <li class="list-group-item">
                                File 2
                                <span class="chat-now-badge badge">Download</span>
                                <span class="profile-badge badge">Add to case</span>
                            </li>
                            <li class="list-group-item">
                                File 3
                                <span class="chat-now-badge badge">Download</span>
                                <span class="profile-badge badge">Add to case</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="grpchat-margin"></div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Group Chat
                        </h3>
                    </div>
                    <div id="grp-chat-body" class="panel-body">
                        <ul class="chat">

                            <li class="grp-chat left clearfix">
                                <span class="chat-img pull-left">
                                    <img src="https://placehold.it/50/ff634a/fff&text=AN" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Attendee Name</strong> <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                    </div>
                                    <p>
                                        Hey! real nice booth, where are you located?
                                    </p>
                                </div>
                            </li>

                            <li class="grp-chat right clearfix">
                                <span class="chat-img pull-right">
                                    <img src="<?= base_url() ?>uploads/sponsors/<?= $sponsors_logo ?>" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                        <strong class="pull-right primary-font"><?= $sponsor->company_name ?></strong>
                                    </div>
                                    <p>
                                        Hi, we are in Huston!
                                    </p>
                                </div>
                            </li>

                            <li class="grp-chat left clearfix">
                                <span class="chat-img pull-left">
                                    <img src="https://placehold.it/50/ff634a/fff&text=AN" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Attendee Name</strong> <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                                    </div>
                                    <p>
                                        Great! This is me asking something else?
                                    </p>
                                </div>
                            </li>

                            <li class="grp-chat right clearfix">
                                <span class="chat-img pull-right">
                                    <img src="<?= base_url() ?>uploads/sponsors/<?= $sponsors_logo ?>" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>11 mins ago</small>
                                        <strong class="pull-right primary-font"><?= $sponsor->company_name ?></strong>
                                    </div>
                                    <p>
                                        This is sponsor answering something else!
                                    </p>
                                </div>
                            </li>

                            <li class="grp-chat left clearfix">
                                <span class="chat-img pull-left">
                                    <img src="https://placehold.it/50/ff634a/fff&text=AN" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Attendee Name</strong> <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span>10 mins ago</small>
                                    </div>
                                    <p>
                                        Alright then see you!
                                    </p>
                                </div>
                            </li>

                            <li class="grp-chat right clearfix">
                                <span class="chat-img pull-right">
                                    <img src="<?= base_url() ?>uploads/sponsors/<?= $sponsors_logo ?>" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>9 mins ago</small>
                                        <strong class="pull-right primary-font"><?= $sponsor->company_name ?></strong>
                                    </div>
                                    <p>
                                        See you!
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="You can also press enter key to send">
                            <span class="input-group-btn">
                                <button class="btn btn-blue test-edit-btn" type="button">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Send
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr>

    </div> <!-- /container -->

</main>
<script src="<?= base_url() ?>front_assets/sponsor/js/sponsor-home.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(function () {

        $('#grp-chat-body').scrollTop($('#grp-chat-body')[0].scrollHeight);

        $('#mainMenuItems').append('' +
                '<li>' +
                '<a href="sponsor-admin/logout" style="color:#A9A9A9; font-size: 18px;">' +
                '<i class="fa fa-sign-out" style="color:#A9A9A9; font-size: 18px;"></i>' +
                'Logout' +
                '</a>' +
                '</li>');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        var page_link = $(location).attr('href');
        var user_id = <?= $this->session->userdata("cid") ?>;
        var page_name = "Sponsor View";
        $.ajax({
            url: "<?= base_url() ?>home/add_user_activity",
            type: "post",
            data: {'user_id': user_id, 'page_name': page_name, 'page_link': page_link},
            dataType: "json",
            success: function (data) {
            }
        });
    });
</script>