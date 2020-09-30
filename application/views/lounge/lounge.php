<!-- SECTION -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
<link href="<?= base_url() ?>assets/lounge/lounge.css?v=<?= rand(200, 300) ?>" rel="stylesheet">
<style>
    .icon-home {
        color: #ae0201;
        font-size: 1.5em;
        font-weight: 700;
        vertical-align: middle;
    }

    .box-home {
        background-color: #444;
        border-radius: 30px;
        background: rgba(250, 250, 250, 0.8);
        max-width: 270px;
        min-width: 270px;
        min-height: 270px;
        max-height: 270px;
        padding: 15px;
    }
    .box-home_2 {
        background-color: #444;
        border-radius: 30px;
        background: rgba(250, 250, 250, 0.8);
        max-width: 185px;
        min-width: 120px;
        min-height: 160px;
        max-height: 185px;
        padding: 15px;
        padding: 0px !important;
    }

    .fa {
        font-weight: 900;
    }

    @media (min-width: 768px) and (max-width: 1000px)  {
        #home_first_section{
            height: 550px;
        }
    }

    @media (min-width: 1000px) and (max-width: 1400px)  {
        #home_first_section{
            height: 590px;
        }
    }

    @media (min-width: 1400px) and (max-width: 1600px)  {
        #home_first_section{
            height: 700px;
        }
    }

    @media (min-width: 1600px) and (max-width: 1800px)  {
        #home_first_section{
            height: 800px;
        }
    }

    @media (min-width: 1800px) and (max-width: 2200px)  {
        #home_first_section{
            height: 900px;
        }
    }

    @media (min-width: 2200px) and (max-width: 2800px)  {
        #home_first_section{
            height: 1100px;
        }
    }
    @media (min-width: 2800px) and (max-width: 3200px)  {
        #home_first_section{
            height: 1450px;
        }
    }

    @media (min-width: 3200px) and (max-width: 4200px)  {
        #home_first_section{
            height: 1950px;
        }
    }

    @media (min-width: 4200px) and (max-width: 6000px)  {
        #home_first_section{
            height: 2150px;
        }
    }
</style>
<section class="parallax" style="background-image: url(<?= base_url() ?>front_assets/images/lounge-bg.jpg);">
    <div class="container container-fullscreen" id="home_first_section">
        <div class="row">
            <div class="col-md-12" style="text-align: -webkit-center; text-align: -moz-center; margin-left: 45px;">
                <div class="col-md-4">
                    <div class="grpchat-margin"></div>
                    <div class="panel panel-danger panel-cco">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Lounge Group Chat
                            </h3>
                        </div>
                        <div id="grp-chat-body" class="panel-body">
                            <ul class="group-chat">

                            </ul>
                        </div>
                        <div class="panel-footer">
                            <span class="is-typing"></span><br>
                            <div class="input-group">
                                <input type="text" id="groupChatText" class="form-control" placeholder="Can press enter to send">
                                <span class="input-group-btn">
                                <button class="btn btn-blue send-grp-chat-btn" type="button">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Send
                                </button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="grpchat-margin"></div>
                    <div class="panel panel-danger panel-cco">

                        <div class="panel-heading">
                            <span class="panel-title">
                                Attendees
                                <button type="button" class="lounge-meetings-btn btn btn-success btn-xs pull-right">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> Meetings
                                </button>
                            </span>
                        </div>

                        <div class="one-to-one-chat-body panel-body">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="oto-attendee-search form-control" placeholder="Search by name" aria-describedby="search-icon">
                                    <span class="input-group-addon" id="search-icon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                                </div>
                                <div class="chat-users-list">
                                    <ul class="attendees-chat-list list-group list-group-flush">
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="one-to-one-chat-panel panel panel-danger panel-cco">
                                    <div class="one-to-one-chat-heading panel-heading text-left">
                                        <span class="selected-user-name-area" style="font-weight: bold;"></span>
                                        <!--<h3 class="attendee-profile-btn pull-right">
                                            <span class="label label-info">
                                                <i class="fa fa-user" aria-hidden="true"></i> Profile
                                            </span>
                                        </h3>-->
<!--                                        <button type="button" class="btn btn-info btn-xs pull-right lounge-video-call-btn"><i class="fa fa-video-camera" aria-hidden="true"></i></button>-->
                                    </div>
                                    <div class="oto-chat-body panel-body">
                                        <ul class="oto-messages">

                                        </ul>
                                    </div>
                                    <div class="panel-footer">
                                        <span class="oto-typing"></span><br>
                                        <div class="input-group">
                                            <input type="text" id="one-to-one-ChatText" class="form-control" placeholder="Can press enter to send">
                                            <span class="input-group-btn">
                                            <button class="btn btn-blue send-oto-chat-btn" type="button">
                                                <i class="fa fa-paper-plane" aria-hidden="true"></i> Send
                                            </button>
                                        </span>
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
</section>

<div id="meetings-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-calendar" aria-hidden="true"></i> Your Meetings
                    <button type="button" class="lounge-new-meeting-btn btn btn-success btn-xs pull-right">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i> New Meeting
                    </button>
                </h5>
            </div>
            <div class="modal-body">
                <table id="meetings_table" class="display cell-border compact stripe">
                    <thead>
                    <tr>
                        <th>Topic</th>
                        <th>Host</th>
                        <th>From</th>
                        <th>To</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody class="meetings-table-items">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="new-meeting-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                    Create New Meeting
                </h5>
            </div>
            <div class="modal-body">

                <div class="input-group m-b-10">
                    <span class="input-group-addon" id="sizing-addon2">Meeting Topic</span>
                    <input type="text" class="meeting-topic form-control" placeholder="Meeting name or topic" aria-describedby="sizing-addon2">
                </div>

                <div class="form-group">
                    <div class='input-group date' id='datetimepicker6'>
                        <span class="input-group-addon" id="sizing-addon2">Meeting From</span>
                        <input type='text' class="meeting-from form-control" placeholder="Use the icon on the right side to choose starting time" aria-describedby="sizing-addon2"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class='input-group date' id='datetimepicker7'>
                        <span class="input-group-addon" id="sizing-addon2">Meeting To &nbsp; &nbsp; &nbsp;</span>
                        <input type='text' class="meeting-to form-control" placeholder="Use the icon on the right side to choose ending time" aria-describedby="sizing-addon2"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <div class="input-group m-b-10">
                    <span class="input-group-addon" id="sizing-addon2">Attendees &nbsp; &nbsp; &nbsp;</span>
                    <input type="text" class="attendees-search form-control" placeholder="Search by name" aria-describedby="sizing-addon2">
                </div>
                <ul class="attendees-suggestions list-group">
                </ul>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Selected Attendees</h3>
                    </div>
                    <div class="selected-attendees-list panel-body" style="height: auto;">
                    </div>
                </div>

                <small>Only invited attendees except you will be allowed to the meeting, hence no password is required!</small><br>
                <small>All date and times are in Central Time Zone(CT)</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                <button type="button" class="create-meeting btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<script src="https://blueimp.github.io/JavaScript-MD5/js/md5.js"></script>
<script>
    var page_link = $(location).attr('href');
    var user_id = <?= $this->session->userdata("cid") ?>;
    var page_name = "Lounge";
    var base_url = "<?= base_url() ?>";
    var user_name = "<?= $this->session->userdata('fullname') ?>";
    var user_type = "attendee";
    var user_logo = "<?= $profile_data->profile ?>";
    user_name = (user_name == '')?'No Name':user_name;
    var nameAcronym = user_name.match(/\b(\w)/g).join('');
    var color = md5(nameAcronym+user_id).slice(0, 6);
    var user_logo_url = (user_logo == '')?"https://placehold.it/50/"+color+"/fff&amp;text="+nameAcronym:base_url+'uploads/customer_profile/'+user_logo;

    <?php
            foreach ($socket_config as $config_name => $config_value)
            {
                echo "\n var {$config_name} = '{$config_value}';";
            }
            echo"\n";
    ?>
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            url: "<?= base_url() ?>home/add_user_activity",
            type: "post",
            data: {'user_id': user_id, 'page_name': page_name, 'page_link': page_link},
            dataType: "json",
            success: function (data) {
            }
        });

        $('#datetimepicker6').datetimepicker({
            format: 'Y-M-D H:mm'
        });
        $('#datetimepicker7').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format: 'Y-M-D H:mm'
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });


    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>

<!--- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />

<!--- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.3.5/dist/sweetalert2.all.min.js"></script>

<!--- DataTable -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<!--- datetime picker -->
<script src="<?= base_url() ?>assets/lounge/datetime-picker/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js" integrity="sha512-Izh34nqeeR7/nwthfeE0SI3c8uhFSnqxV0sI9TvTcXiFJkMd6fB644O64BRq2P/LA/+7eRvCw4GmLsXksyTHBg==" crossorigin="anonymous"></script>
<link href="<?= base_url() ?>assets/lounge/datetime-picker/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="<?= base_url() ?>assets/lounge/datetime-picker/bootstrap-datetimepicker.js"></script>

<script src="<?= base_url() ?>assets/lounge/lounge.js?v=<?= rand(1, 100) ?>"></script>
<script src="<?= base_url() ?>assets/lounge/meetings.js?v=<?= rand(1, 100) ?>"></script>
