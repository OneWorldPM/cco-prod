<?php
//echo "<pre>"; print_r($sessions); exit("</pre>");
?>

<style>
    .session-name-item{
        cursor: pointer;
    }
    .session-name-item:hover{
        background-color: #ececec;
    }

    .users-list-item{
        cursor: pointer;
    }
    .users-list-item:hover{
        background-color: #ececec;
    }

    .chat-body{
        border: 1px solid;
        height: 400px;
        overflow: scroll;
    }

    .admin-to-user-text-admin{
        color: white;
        background-color: #df941f;
        display: list-item;
        list-style: none;
        margin-top: 7px;
        margin-bottom: 7px;
        padding-right: 12px;
        border-radius: 15px;
        text-align: right;
        margin-left: 50px;
        margin-right: 10px;
    }

    .user-to-admin-text-admin{
        color: white;
        background-color: #1f8edf;
        display: list-item;
        list-style: none;
        margin-top: 7px;
        margin-bottom: 7px;
        padding-left: 10px;
        border-radius: 15px;
        margin-left: 5px;
        margin-right: 75px;
    }

</style>


<div class="main-content" >
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Chat with Attendee</h1>
                </div>
            </div>
        </section>


        <div class="col-md-4" style="margin-top: 10px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Select session name</h3>
                </div>
                <div class="panel-body">
                    <ul class="sessions-list list-group">
                        <?php
                        if (isset($sessions))
                        {
                            foreach ($sessions as $session)
                            {
                                echo '<li class="session-name-item list-group-item" session-id="'.$session->sessions_id.'" session-name="'.$session->session_title.'"><strong>['.$session->sessions_id.']</strong> '.$session->session_title.' <span class="new-badge-session-item"></span><br><small>'.$session->sessions_date.'</small></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8" style="margin-top: 10px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span id="session-name-heading"></span></h3>
                </div>
                <div class="panel-body">

                    <div class="col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="attendees-list-title panel-title">Chats</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="users-list list-group">
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="chat-user-name panel-title"></h3>
                            </div>
                            <div class="panel-body">
                                <div class="chat-body" session-id="" user-id="" user-name="">

                                </div>
                                <div class="input-group">
                                    <input id="message-text-input" type="text" class="form-control" placeholder="Enter message">
                                    <span class="input-group-btn">
                                        <button class="send-text-btn btn btn-default" type="button" user-id="" session-id="">Send</button>
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
<!-- end: FEATURED BOX LINKS -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@9.17.0/dist/sweetalert2.all.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

<script>
    var base_url = "<?=base_url()?>";
    var socket_session_name = "<?=getAppName('_admin-to-attendee-chat')?>";

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


    $(document).ready(function () {

        $('.session-name-item').on('click', function () {

            $(this).children('.new-badge-session-item').html('');

            let session_id = $(this).attr('session-id');
            let session_name = $(this).attr('session-name');

            $('.chat-body').attr('session-id', session_id);

            $('#session-name-heading').text(session_name);

            $.post(base_url+"admin/sessions/getAllUsersList",

                {
                    session_id: session_id
                }

            ).done(function(users) {
                users = JSON.parse(users);

                $('.users-list').html('');
                $('.chat-user-name').html('');
                $('.send-text-btn').attr('user-id', '');
                $('.send-text-btn').attr('session-id', '');
                $('.chat-body').html('');
                $('.chat-body').attr('user-id', '');
                $('.chat-body').attr('user-name', '');


                if ( users.length == 0 ) {
                    $('.users-list').append('' +
                        '<li class="no-chats-li list-group-item">No chats found</li>');

                    return false;
                }

                $.each(users, function(index, user)
                {
                    if (user.unread_msgs == true)
                    {
                        $('.users-list').append('' +
                            '<li class="users-list-item list-group-item" session-id="'+session_id+'" user-id="'+user.cust_id+'" user-name="'+user.first_name+' '+user.last_name+'">'+user.first_name+' '+user.last_name+' <span class="new-badge-name"><span class="badge">New</span></span></li>');
                    }else{
                        $('.users-list').append('' +
                            '<li class="users-list-item list-group-item" session-id="'+session_id+'" user-id="'+user.cust_id+'" user-name="'+user.first_name+' '+user.last_name+'">'+user.first_name+' '+user.last_name+' <span class="new-badge-name"></span></li>');
                    }


                });

                }
            ).error((error)=>{
                toastr.error('Unable to load attendees list.');
            });

        });


        $('.users-list').on('click', '.users-list-item', function () {

            $(this).children('.new-badge-name').html('');

            let user_id = $(this).attr('user-id');
            let user_name = $(this).attr('user-name');
            let session_id = $(this).attr('session-id');

            $('.chat-user-name').text(user_name);
            $('.send-text-btn').attr('user-id', user_id);
            $('.send-text-btn').attr('session-id', session_id);
            $('.chat-body').attr('user-id', user_id);
            $('.chat-body').attr('session-id', session_id);
            $('.chat-body').attr('user-name', user_name);

            $.post(base_url+"admin/sessions/getAllAdminToAttendeeChat",

                {
                    session_id: session_id,
                    from_id: user_id,
                    to_id: "admin"
                }

            ).done(function(chats) {

                $.get(base_url+"admin/sessions/markAllAsRead/"+session_id+'/'+user_id, function( data ) {
                    if (data == 1)
                    {

                    }
                });

                chats = JSON.parse(chats);

                $('.chat-body').html('');
                $.each(chats, function(index, chat)
                {
                    if (chat.from_id == 'admin'){
                        $('.chat-body').append('' +
                            '<span class="admin-to-user-text-admin">'+chat.chat_text+'</span>');
                    }else{
                        $('.chat-body').append('' +
                            '<span class="user-to-admin-text-admin"><strong style="margin-right: 10px">'+user_name+'</strong>'+chat.chat_text+'</span>');
                    }
                });

                $(".chat-body").scrollTop($(".chat-body")[0].scrollHeight);

                }
            ).error((error)=>{
                toastr.error('Unable to load the chat.');
            });

        });

        $('.send-text-btn').on('click', function () {
            let userId = $(this).attr('user-id');
            let sessionId = $(this).attr('session-id');
            let message = $('#message-text-input').val();

            if (userId == '')
            {
                toastr.error('You should choose an attendee to send the text.');
                return false;
            }

            if (message == '')
            {
                toastr.error('Please enter some message.');
                return false;
            }

            $.post(base_url+"admin/sessions/saveAdminToAttendeeChat",

                {
                    session_id: sessionId,
                    from_id: 'admin',
                    to_id: userId,
                    chat_text: message
                }

            ).done(function( data ) {
                    if (data == 1)
                    {
                        socket.emit('new-attendee-to-admin-chat', {"socket_session_name":socket_session_name, "session_id":sessionId, "from_id":"admin", "to_id":userId, "chat_text":message});

                        $('.chat-body').append('' +
                            '<span class="admin-to-user-text-admin">'+message+'</span>');

                        $('#message-text-input').val('');

                        $(".chat-body").scrollTop($(".chat-body")[0].scrollHeight);

                    }else{
                        toastr.error('Unable to send the text.');
                    }
                }
            ).error((error)=>{
                toastr.error('Unable to send the text.');
            });


        });

        $('#message-text-input').keydown(function (e){
            if(e.keyCode == 13)
            {
                $('.send-text-btn').click();
            }
        });


        socket.on('new-attendee-to-admin-chat-notification', function (data) {
            if (data.socket_session_name == socket_session_name)
            {
                if (data.from_id != 'admin')
                {
                    if ($('.chat-body').attr('user-id') == data.from_id)
                    {
                        let user_name = $('.chat-body').attr('user-name');

                        $('.chat-body').append('' +
                            '<span class="user-to-admin-text-admin"><strong style="margin-right: 10px">'+user_name+'</strong>'+data.chat_text+'</span>');

                        $(".chat-body").scrollTop($(".chat-body")[0].scrollHeight);
                    }else{

                        if ($('.chat-body').attr('session-id') != data.session_id)
                        {
                            $('.sessions-list').find("li.session-name-item[session-id='" + data.session_id + "']").children('.new-badge-session-item').html(' <span class="badge">New</span>');
                        }else{
                            if ($('.users-list').find("li.users-list-item[user-id='" + data.from_id + "']").length == 1)
                            {
                                $('.users-list').find("li.users-list-item[user-id='" + data.from_id + "']").children('.new-badge-name').html(' <span class="badge">New</span>');
                            }else{

                                if($('.users-list').find("li.no-chats-li").length == 1)
                                {
                                    $('.users-list').find("li.no-chats-li").remove();
                                }

                                $('.users-list').append('' +
                                    '<li class="users-list-item list-group-item" session-id="'+data.session_id+'" user-id="'+data.from_id+'" user-name="'+data.user_name+'">'+data.user_name+' <span class="new-badge-name"><span class="badge">New</span></span></li>');
                            }
                        }
                    }

                }
            }
        });


    });
</script>
