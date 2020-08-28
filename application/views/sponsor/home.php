<link href="<?= base_url() ?>front_assets/sponsor/css/sponsor-home.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<?php
$sponsors_logo = ($sponsors_logo == '')?'logo_placeholder.png':$sponsors_logo;

?>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-image: url(<?= base_url() ?>front_assets/sponsor/images/covers/sponsor-cover-default.jpg)">
        <div class="container" style="height: 220px;">
            <span class="edit-cover-btn badge badge-primary pull-right">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit cover or logo
            </span>
            <img class="sponsor-main-logo" src="<?= base_url() ?>uploads/sponsors/<?=$sponsors_logo?>">
            <h1 class="sponsor-name">
                <?=$company_name?>
                <span class="test-edit-btn badge badge-primary">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit name
            </span>
            </h1>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row m-b-30">

            <div class="col-md-4">
                <h3>About Us</h3>
                <textarea class="form-control" rows="7"><?=$about?></textarea>
                <span class="edit-about-btn badge badge-primary pull-right">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> save
                </span>
                <div class="clearfix m-b-25"></div>
                <div class="form-group">
                    <label class="sr-only" for="twitterHandle"></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" id="twitterHandle" placeholder="Twitter handle" value="<?=$website?>">
                        <div class="save-twitter input-group-addon btn" type="button">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> save
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="twitterHandle"></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" id="twitterHandle" placeholder="Twitter handle" value="<?=$twitter_id?>">
                        <div class="save-twitter input-group-addon btn" type="button">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> save
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="twitterHandle"></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" id="twitterHandle" placeholder="Twitter handle" value="<?=$facebook_id?>">
                        <div class="save-twitter input-group-addon btn" type="button">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> save
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="twitterHandle"></label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" id="twitterHandle" placeholder="Twitter handle" value="<?=$linkedin_id?>">
                        <div class="save-twitter input-group-addon btn" type="button">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> save
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="grpchat-margin"></div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Group Chat
                            <span class="test-edit-btn badge badge-primary pull-right">
                                <i class="fa fa-trash" aria-hidden="true"></i> clear
                            </span>
                            <span class="test-edit-btn badge badge-primary pull-right">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> save
                            </span>
<!--                            <span class="test-edit-btn badge badge-primary pull-right">-->
<!--                                <i class="fa fa-calendar" aria-hidden="true"></i> schedule-->
<!--                            </span>-->
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
                                    <img src="<?= base_url() ?>front_assets/sponsor/images/logos/sample_logo.png" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                        <strong class="pull-right primary-font"><?=$company_name?></strong>
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
                                    <img src="<?= base_url() ?>front_assets/sponsor/images/logos/sample_logo.png" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>11 mins ago</small>
                                        <strong class="pull-right primary-font"><?=$company_name?></strong>
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
                                    <img src="<?= base_url() ?>front_assets/sponsor/images/logos/sample_logo.png" alt="User Avatar" class="img-circle" />
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>9 mins ago</small>
                                        <strong class="pull-right primary-font"><?=$company_name?></strong>
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

            <div class="col-md-4">
                <div class="grpchat-margin"></div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Attendees
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <i class="fa fa-circle" style="color:#3fdd3b;" aria-hidden="true"></i> Shannon Morton
                                <span class="chat-now-badge badge">Chat now</span>
                                <span class="profile-badge badge">Profile</span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-circle" style="color:#3fdd3b;" aria-hidden="true"></i> Mark Rosenthal
                                <span class="chat-now-badge badge">Chat now</span>
                                <span class="profile-badge badge">Profile</span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-circle" style="color:#ffa633;" aria-hidden="true"></i> John Brown
                                <span class="chat-now-badge badge">Chat now</span>
                                <span class="profile-badge badge">Profile</span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-circle" style="color:#3fdd3b;" aria-hidden="true"></i> John Doe
                                <span class="chat-now-badge badge">Chat now</span>
                                <span class="profile-badge badge">Profile</span>
                            </li>
                        </ul>
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
    $(function() {
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
