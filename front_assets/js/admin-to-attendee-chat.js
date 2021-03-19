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



    /**************** Loading admin chats *********************/
    $.post(base_url+"sessions/getAllAdminToAttendeeChat",

        {
            session_id: session_id,
            from_id: user_id,
            to_id: 'admin',

        }

    ).done(function(chats) {
        chats = JSON.parse(chats);

        $('.admin-messages').html('');

        $.each(chats, function(index, chat)
        {
            if (chat.from_id == 'admin'){
                if(chat.presenter_name){
                    $('.admin-messages').append('' +
                        '<span class="admin-to-user-text"><strong style="margin-right: 10px">'+chat.presenter_name+'</strong>'+chat.chat_text+'</span>');
                }else{
                    $('.admin-messages').append('' +
                        '<span class="admin-to-user-text"><strong style="margin-right: 10px">Admin</strong>'+chat.chat_text+'</span>');
                }

            }
            else{
                $('.admin-messages').append('' +
                    '<span class="user-to-admin-text">'+chat.chat_text+'</span>');
            }
        });

        $(".admin-messages").scrollTop($(".admin-messages")[0].scrollHeight);

        }
    ).error((error)=>{
        toastr.error('Unable to load admin chat.');
    });
    /**************** End of Loading admin chats *********************/




    $(".admin-messages").scrollTop($(".admin-messages")[0].scrollHeight);

    $('#sendAdminChat').keydown(function (e){
        if(e.keyCode == 13){

            if ($('#sendAdminChat').val() == '')
            {
                toastr.info('You need to enter some text.');
                return false;
            }

            $.post(base_url+"sessions/saveAdminToAttendeeChat",

                {
                    session_id: session_id,
                    from_id: user_id,
                    to_id: 'admin',
                    chat_text: $('#sendAdminChat').val()
                }

                ).done(function( data ) {
                    if (data == 1)
                    {
                        socket.emit('new-attendee-to-admin-chat', {"socket_session_name":socket_session_name, "session_id":session_id, "from_id":user_id, "user_name":user_fullname, "to_id":"admin", "chat_text":$('#sendAdminChat').val(), "sent_from":$('#sendAdminChat').attr('sent_from')});

                        $('.admin-messages').append('' +
                            '<span class="user-to-admin-text">'+$('#sendAdminChat').val()+'</span>');

                        $('#sendAdminChat').val('');

                        $(".admin-messages").scrollTop($(".admin-messages")[0].scrollHeight);

                    }else{
                        toastr.error('Unable to send the text.');
                    }
                }
                ).error((error)=>{
                    toastr.error('Unable to send the text.');
            });

        }
    });


    socket.on('new-attendee-to-admin-chat-notification', function (data) {
        if (data.socket_session_name == socket_session_name)
        {
            if ((data.from_id == user_id) || data.to_id == user_id)
            {
                if (data.to_id == user_id)
                {
                    if(data.presenter_name){
                        $('.admin-messages').append('' +
                            '<span class="admin-to-user-text"><strong style="margin-right: 10px">'+data.presenter_name+'</strong>'+data.chat_text+'</span>');
                    }else{
                        $('.admin-messages').append('' +
                            '<span class="admin-to-user-text"><strong style="margin-right: 10px">Admin</strong>'+data.chat_text+'</span>');
                    }


                    $('.new-admin-chat-badge').show();

                    $('#adminChatStickeyIcon').show();

                    if($('.notesSticky').is(":visible"))
                        $('#minimizeTakeNote').click();

                    if($('.resourcesSticky').is(":visible"))
                        $('#minimizeResources').click();

                    if($('.messagesSticky').is(":visible"))
                        $('#minimizeMessages').click();

                    if($('.questionsSticky').is(":visible"))
                        $('#minimizeQuestions').click();

                    $('#adminChatStickeyIcon').click();



                    $(".admin-messages").scrollTop($(".admin-messages")[0].scrollHeight);

                    $('#sendAdminChat').attr('sent_from', data.sent_from);

                }
            }
        }
    });

    socket.on('end-attendee-to-admin-chat-notification', function (data) {
        if (data.socket_session_name == socket_session_name)
        {
            if ((data.from_id == user_id) || data.to_id == user_id)
            {
                if (data.to_id == user_id)
                {
                    $('#adminChatStickeyIcon').hide();

                    $('.minimize-admin-chat').click();
                }
            }
        }
    });



    $('.admin-chat-stickey-icon').on('click', function () {
        $(this).children('.new-admin-chat-badge').hide();
    });

    $('.minimize-admin-chat').on('click', function () {
        $('.admin-chat-stickey-icon').children('.new-admin-chat-badge').hide();
    });

});
