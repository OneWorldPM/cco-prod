socket.on('reload-attendee-signal', function (app_name_to_relaod) {
    if (app_name_to_relaod == app_name)
    {
        update_viewsessions_history_open();
        saveTimeSpentOnSessionAfterSessionFinished();
    }
});


/******* Saving time spent on session - by Athul ************/
var timeSpentOnSessionFromDb;
var timeSpentUntilNow;
function getTimeSpentOnSession(){
    $.ajax({
        url: base_url+"sessions/getTimeSpentOnSession/"+session_id+'/'+user_id,
        type: "post",
        dataType: "json",
        success: function (data) {
            timeSpentOnSessionFromDb = parseInt(data);
            startCounting();
            saveTimeSpentOnSession();
            return parseInt(data);
        }
    });
}

function getTimeSpentOnSiteFromLocalStorage(){
    timeSpentOnSite = parseInt(localStorage.getItem('timeSpentOnSite'));
    timeSpentOnSite = isNaN(timeSpentOnSite) ? 0 : timeSpentOnSite;
    return timeSpentOnSite;
}

function saveTimeSpentOnSession(){
    $.ajax({
        url: base_url+"sessions/saveTimeSpentOnSession/"+session_id+'/'+user_id,
        type: "post",
        data: {'time': timeSpentUntilNow},
        dataType: "json",
        success: function (data) {
            update_viewsessions_history_open();
        }
    });
}

function saveTimeSpentOnSessionAfterSessionFinished(){
    $.ajax({
        url: base_url+"sessions/saveTimeSpentOnSession/"+session_id+'/'+user_id,
        type: "post",
        data: {'time': timeSpentUntilNow},
        dataType: "json",
        success: function (data) {
            location.reload();
        }
    });
}

function startCounting(){
    timeSpentUntilNow = timeSpentOnSessionFromDb;
    onSessiontimer = setInterval(function(){
        var datetime_now_newyork = calcTime('-5');
        if(datetime_now_newyork >= session_start_datetime && datetime_now_newyork <= session_end_datetime)
            timeSpentUntilNow = timeSpentUntilNow+1;
        if (datetime_now_newyork > session_end_datetime){
            saveTimeSpentOnSession();
        }
    },1000);

    Swal.fire({
        title: 'INFO',
        text: "Asegúrese de reactivar el repoductor de el volume ubicado en la parte inferior derecha de la pagina.",
        icon: 'warning',
        confirmButtonText: 'Aceptar'
    });
    // Swal.fire(
    //     'INFO',
    //     'Asegúrese de reactivar el repoductor de el volume ubicado en la parte inferior derecha de la pagina.',
    //     'warning'
    // );

}

setInterval(saveTimeSpentOnSession, 300000); //Saving total time every 5 minutes as a backup

function initiateTimerRecorder() {
    getTimeSpentOnSession();
}

initiateTimerRecorder();
/******* End of saving time spent on session - by Athul ************/


function update_viewsessions_history_open()
{
    $.ajax({
        url: base_url+"sessions/update_viewsessions_history_open",
        type: "post",
        data: {'view_sessions_history_id': $("#view_sessions_history_id").val()},
        dataType: "json",
        success: function (data) {

        }
    });
}


//    window.onbeforeunload = function (e) {
//        var sessions_id = $("#sessions_id").val();
//        alertify.confirm("Do you want to download your notes now?", function (e) {
//            if (e)
//            {
//                $(location).attr('href', base_url+'sessions/downloadbriefcase/' + sessions_id);
//            }
//        });
//    };

//   window.onbeforeunload = function () {
//       var Ans = confirm("Are you sure you want change page!");
//       if (Ans == true)
//           return true;
//       else
//           return false;
//   };



    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();

        socket.emit("ConnectSessioViewUsers",app_name)

        $('#sendGroupChat').keypress(function (e) {
            var $questions = $("#sendGroupChat");
            var key = e.which;
            if (key == 13) // the enter key cod
            {
                if ($questions.val() == "") {
                    $questions.addClass("border borderRed");
                } else {
                    $questions.removeClass("border borderRed");
                    var $questionsVal=$questions.val();
                    $questions.val("");
                    $.post(base_url+"SessionGroupChat/newText",
                        {
                            "sessionId":app_name,
                            "message":$questionsVal
                        },
                        function(resp){
                            if(resp){
                                resp=JSON.parse(resp);
                                socket.emit("sessionViewGroupChat",{
                                    "sessionId":resp.session_id,
                                    "message":resp.message,
                                    "userId":resp.user_id,
                                    "userName":resp.user_name
                                })

                            }
                        })

                }
            }
        });
        $.post(base_url+"SessionGroupChat/getTexts", {
                "sessionId": app_name,
            },
            function (resp) {
                if (resp) {
                    resp=JSON.parse(resp);

                    resp.forEach(function(par){
                        addMessageGroupChat(par,"load")
                    })

                }
            })


        function addMessageGroupChat(data,type=""){
            var messageType='';
            var userName=data.userName?data.userName:data.user_name;
            var userId=data.userId?data.userId:data.user_id;
            var sessionId=data.sessionId?data.sessionId:data.session_id;
            var message=data.message?data.message:data.message;

            if(userId == user_id){
                messageType= `<div class="messageMe"><p>${message}</p></div>`;
            }
            else{
                messageType= `<div class="messageHe"><span>${userName}</span><p>${message}</p></div>`;

                if(type!="load"){
                    if ($('.messagesSticky'+sessionId).css('display') == 'none'){
                        if($(".notify"+sessionId).hasClass("displayNone"))$(".notify"+sessionId).removeClass("displayNone");
                    }
                }

            }

            $(".messagesSticky"+sessionId+" .messages").append(messageType)
        }

        socket.on("sessionViewGroupMessages",function(data){
            addMessageGroupChat(data)

            var sessionId=data.sessionId;
            var $messagesContent=$('.messagesSticky'+sessionId+' .content .messages');
            $($messagesContent).scrollTop($($messagesContent)[0].scrollHeight);
        })





        $("iframe").addClass("embed-responsive-item");

        var url = $(location).attr('href');
        var segments = url.split('/');
        var segments_id = segments[6];
        if (window.history && window.history.pushState) {
            window.history.pushState(segments_id, null, './' + segments_id);
            $(window).on('popstate', function () {
                $.ajax({
                    url: base_url+"sessions/update_viewsessions_history_open",
                    type: "post",
                    data: {'view_sessions_history_id': $("#view_sessions_history_id").val()},
                    dataType: "json",
                    success: function (data) {
                    }
                });
            });
        }

        var sessions_id = $("#sessions_id").val();
        var resolution = screen.width + "x " + screen.height + "y";
        var browser = getBrowserDetails();
        $.ajax({
            url: base_url+"sessions/add_viewsessions_history_open",
            type: "post",
            data: {'sessions_id': sessions_id, 'resolution': resolution,'browser':browser},
            dataType: "json",
            success: function (data) {
                $("#view_sessions_history_id").val(data.view_sessions_history_id);
            }
        });

        $(document).on("click", "#close_session", function () {
            $.ajax({
                url: base_url+"sessions/update_viewsessions_history_open",
                type: "post",
                data: {'view_sessions_history_id': $("#view_sessions_history_id").val()},
                dataType: "json",
                success: function (data) {
                    window.location.replace(site_url+"home");
                }
            });
        });


        $("#questions_emojis_section").hide();
        $(document).on("click", "#questions_emjis_section_show", function () {
            var emjis_section_show_status = $("#questions_emjis_section_show").attr("data-questions_emjis_section_show_status");
            if (emjis_section_show_status == 0) {
                $("#questions_emojis_section").show();
                $("#questions_emjis_section_show").attr('data-questions_emjis_section_show_status', 1);
            } else {
                $("#questions_emojis_section").hide();
                $("#questions_emjis_section_show").attr('data-questions_emjis_section_show_status', 0);
            }
        });

        $("#emojis_section").hide();
        $(document).on("click", "#emjis_section_show", function () {
            var emjis_section_show_status = $("#emjis_section_show").attr("data-emjis_section_show_status");
            if (emjis_section_show_status == 0) {
                $("#emojis_section").show();
                $("#emjis_section_show").attr('data-emjis_section_show_status', 1);
            } else {
                $("#emojis_section").hide();
                $("#emjis_section_show").attr('data-emjis_section_show_status', 0);
            }
        });

        $(document).on("click", "#questions_clapping", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_sad", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_happy", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_laughing", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_thumbs_up", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#questions_thumbs_down", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#questions").val();
            if (questions != "") {
                $("#questions").val(questions + ' ' + value);
            } else {
                $("#questions").val(value);
            }
        });

        $(document).on("click", "#clapping", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#send_message").val();
            if (send_message != "") {
                $("#send_message").val(send_message + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#sad", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#send_message").val();
            if (questions != "") {
                $("#send_message").val(questions + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#happy", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#send_message").val();
            if (send_message != "") {
                $("#send_message").val(send_message + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#laughing", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#send_message").val();
            if (send_message != "") {
                $("#send_message").val(send_message + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#thumbs_up", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#send_message").val();
            if (send_message != "") {
                $("#send_message").val(send_message + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        $(document).on("click", "#thumbs_down", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#send_message").val();
            if (questions != "") {
                $("#send_message").val(questions + ' ' + value);
            } else {
                $("#send_message").val(value);
            }
        });

        //  get_question_answer_section();
        //  setInterval(get_question_answer_section, 5000);
        // $("#questions_section").hide();
        //        $(document).on("click", "#ask_questions", function () {
        //            $("#questions_section").show();
        //        });

        $("#resource_display_status").show();
        // getMessage;
        // setInterval(getMessage, 1000);

        //get_group_chat_section_status();
        //setInterval(get_group_chat_section_status, 10000);

        $(document).on("click", "#resource_show", function () {
            var resource_show_status = $("#resource_show").attr("data-resource_show_status");
            if (resource_show_status == 0) {
                $("#resource_display_status").show();
                $("#resource_show").removeClass('fa-caret-right');
                $("#resource_show").addClass('fa-caret-down');
                $("#resource_show").attr('data-resource_show_status', 1);
            } else {
                $("#resource_display_status").hide();
                $("#resource_show").addClass('fa-caret-right');
                $("#resource_show").removeClass('fa-caret-down');
                $("#resource_show").attr('data-resource_show_status', 0);
            }
        });


        $(document).on("click", "#send_message_btn", function () {
            if ($("#send_message").val() == "") {
                $("#error_send_message").text("Enter Message").fadeIn('slow').fadeOut(5000);
            } else {
                var send_message = $("#send_message").val();
                var sessions_id = $("#sessions_id").val();
                var sessions_group_chat_id = $("#sessions_group_chat_id").val();
                $.ajax({
                    url: base_url+"sessions/send_message",
                    type: "post",
                    data: {'sessions_id': sessions_id, 'send_message': send_message, 'sessions_group_chat_id': sessions_group_chat_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $("#send_message").val("");
                            $("#success_send_message").text("Send Message Successfully").fadeIn('slow').fadeOut(5000);
                        }
                    }
                });
            }
        });

        $(document).on("click", "#ask_questions_send", function () {
            if ($("#questions").val() == "") {
                $("#error_questions").text("Introducir pregunta").fadeIn('slow').fadeOut(5000);
            } else {
                var questions = $("#questions").val();
                var sessions_id = $("#sessions_id").val();
                $.ajax({
                    url: base_url+"sessions/addQuestions",
                    type: "post",
                    data: {'sessions_id': sessions_id, 'questions': questions},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $("#questions").val("");
                            $("#success_questions").text("La pregunta se envió correctamente.").fadeIn('slow').fadeOut(5000);

                            socket.emit('new_question', app_name);
                        }
                    }
                });
            }
        });

        $('#questions').keypress(function (e) {
            var key = e.which;
            if (key == 13)  // the enter key code
            {
                if ($("#questions").val() == "") {
                    $("#error_questions").text("Introducir pregunta").fadeIn('slow').fadeOut(5000);
                } else {
                    var questions = $("#questions").val();
                    var sessions_id = $("#sessions_id").val();
                    $.ajax({
                        url: base_url+"sessions/addQuestions",
                        type: "post",
                        data: {'sessions_id': sessions_id, 'questions': questions},
                        dataType: "json",
                        success: function (data) {
                            if (data.status == "success") {
                                $(".questionElement").append(`<p>${questions}</p>`)
                                $("#questions").val("");
                                $("#success_questions").text("La pregunta se envió correctamente.").fadeIn('slow').fadeOut(5000);

                                socket.emit('new_question', app_name);
                            }
                        }
                    });
                }
            }
        });

        $.ajax({
            url: base_url+"sessions/getMyQuestions/"+session_id,
            type: "post",
            dataType: "json",
            success: function (questions) {
                questions.forEach(function (row) {
                    $(".questionElement").append(`<p>${row.question}</p>`)
                });
            }
        });

        $(document).on("click", ".resource_save", function () {
            console.log("click");
            var session_resource_id = $(this).attr("data-session_resource_id");
            var sessions_id = $("#sessions_id").val();
            $.ajax({
                url: base_url+"sessions/addresource",
                type: "post",
                data: {'sessions_id': sessions_id, 'session_resource_id': session_resource_id},
                dataType: "json",
                success: function (data) {
                    if (data.status == "success") {
                        $("#success_resource").text("Add Notes Successfully").fadeIn('slow').fadeOut(5000);
                    }
                }
            });
        });


        $(document).on("click", "#briefcase_send", function () {
            if ($("#briefcase").val() == "") {
                $("#error_briefcase").text("Enter Notes").fadeIn('slow').fadeOut(5000);
            } else {
                var briefcase = $("#briefcase").val();
                var sessions_id = $("#sessions_id").val();
                $.ajax({
                    url: base_url+"sessions/addBriefcase",
                    type: "post",
                    data: {'sessions_id': sessions_id, 'briefcase': briefcase},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            //  $("#briefcase").val("");
                            $("#success_briefcase").text("Add Notes Successfully").fadeIn('slow').fadeOut(5000);
                        }
                        // $(location).attr('href', base_url+'sessions/downloadNote/'+briefcase);
                    }
                });
            }
        });

        $(document).on("click", "#downloadbriefcase", function () {
            var briefcase = $("#briefcase").val();
            $(location).attr('href', base_url+'sessions/downloadNote/' + briefcase);
        });

        $('#briefcase').keypress(function (e) {
            var key = e.which;
            if (key == 13)  // the enter key code
            {
                if ($("#briefcase").val() == "") {
                    $("#error_briefcase").text("Enter Notes").fadeIn('slow').fadeOut(5000);
                } else {
                    var briefcase = $("#briefcase").val();
                    var sessions_id = $("#sessions_id").val();
                    $.ajax({
                        url: base_url+"sessions/addBriefcase",
                        type: "post",
                        data: {'sessions_id': sessions_id, 'briefcase': briefcase},
                        dataType: "json",
                        success: function (data) {
                            if (data.status == "success") {
                                $("#briefcase").val("");
                                $("#success_briefcase").text("Add Notes Successfully").fadeIn('slow').fadeOut(5000);
                            }
                            $(location).attr('href', base_url+'sessions/downloadNote/'+briefcase);
                        }
                    });
                }
            }
        });

        get_poll_vot_section();
        //setInterval(get_poll_vot_section, 1000);
        $(document).on("click", "#btn_vote", function () {
            var option_value = $('input[name=option]:checked').val();
            if (typeof option_value != "undefined") {
                $(':radio:not(:checked)').attr('disabled', true);
                var sessions_poll_question_id = $("#sessions_poll_question_id").val();
                var sessions_id = $("#sessions_id").val();
                $.ajax({
                    url: base_url+"sessions/pollVoting",
                    type: "post",
                    data: {'poll_question_option_id': option_value, 'sessions_poll_question_id': sessions_poll_question_id, 'sessions_id': sessions_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $('#btn_vote_label').html('VOTED <i class="fa fa-check" id="fa_fa_check" style=""></i>');
                            $('#fa_fa_check').show();

                        }
                    }
                });
            } else {
                $("#error_vote").text("Please Select Voting Option").fadeIn('slow').fadeOut(5000);
            }
        });
    });


function get_question_answer_section() {
    var sessions_id = $("#sessions_id").val();
    var last_sessions_cust_question_id = $("#last_sessions_cust_question_id").val();
    var list_last_id = 0;
    $('.input_class').each(function () {
        list_last_id = $(this).attr("data-last_id");
        return false;
    });

    $.ajax({
        url: base_url+"sessions/get_question_list",
        type: "POST",
        data: {'sessions_id': sessions_id, 'list_last_id': list_last_id},
        dataType: "json",
        success: function (resultdata, textStatus, jqXHR) {
            if (resultdata.status == 'success') {
                $.each(resultdata.question_list, function (key, val) {
                    key++;
                    $("#last_sessions_cust_question_id").val(val.sessions_cust_question_id);
                    $('#question_answer_section_list').prepend('<div style="border: 1px solid #696f6f; padding-top: 5px; padding-left: 5px; border-radius: 5px; margin-top:5px;" class="input_class" data-last_id="' + val.sessions_cust_question_id + '"><h5 style="margin-bottom: 2px;"> <b>Q</b> : ' + val.question + '</h5><h6> <b>A</b> : ' + val.answer + '</h6></div>');
                });
            }
        }
    });
}

function get_poll_vot_section() {
    var poll_vot_section_id_status = $("#poll_vot_section_id_status").val();
    var poll_vot_section_last_status = $("#poll_vot_section_last_status").val();
    var sessions_id = $("#sessions_id").val();
    $.ajax({
        url: base_url+"sessions/get_poll_vot_section",
        type: "post",
        data: {'sessions_id': sessions_id},
        dataType: "json",
        success: function (data) {

            if (data.status == "success") {

                if (poll_vot_section_id_status == "0") {
                    $("#poll_vot_section_id_status").val(data.result.sessions_poll_question_id);
                }
                if (poll_vot_section_last_status == "0") {
                    $("#poll_vot_section_last_status").val(data.result.status);
                }
                if (data.result.poll_status == 1 && data.result.timer_status == 1) {
                    if (poll_vot_section_id_status != data.result.sessions_poll_question_id) {
                        $("#timer_sectiom").show();
                        $("#popup_title_lbl").css({"border-top-right-radius": "0px", "border-top-left-radius": "0px"});
                        timer(0);
                    } else {
                        $("#timer_sectiom").show();
                        $("#popup_title_lbl").css({"border-top-right-radius": "0px", "border-top-left-radius": "0px"});
                        timer(1);
                    }
                } else {
                    stop_music();
                    $("#timer_sectiom").hide();
                    $("#popup_title_lbl").css({"border-top-right-radius": "15px", "border-top-left-radius": "15px"});
                }
                if (poll_vot_section_id_status != data.result.sessions_poll_question_id || poll_vot_section_last_status != data.result.status) {
                    $("#poll_vot_section_id_status").val(data.result.sessions_poll_question_id);
                    $("#poll_vot_section_last_status").val(data.result.status);
                    if (data.result.poll_status == 1) {

                        //Disabling modal hide on clicking outside
                        $('#modal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('#modal').modal('show');


                        $("#poll_vot_section").html("<form id='frm_reg' name='frm_reg' method='post' action=''>\n\
            \n\<h2 id='popup_title_lbl' style='margin-bottom: 20px; color: #000; font-weight: 800; padding: 15px 5px 25px 10px; background-color: #ebeaea; font-size:"+customFont+" !important'>" + data.result.question + "</h2>\n\
<div class='col-md-12'>\n\
\n\<input type='hidden' id='sessions_poll_question_id' value='" + data.result.sessions_poll_question_id + "'>\n\
\n\<input type='hidden' id='sessions_id' value='" + data.result.sessions_id + "'>\n\
<div class='col-md-12' id='option_section'></div>\n\
\n\<span id='error_vote' style='color:red; margin-left: 20px;'></span><span id='success_voted' style='color:green; margin-left: 20px;'></span>\n\
<div style='padding-right: 20px;text-align: center;'><a class='button small color rounded' id='btn_vote' style='background-color: #c3c3c3; border-color: #c3c3c3; '><span id='btn_vote_label'>VOTE <i class='fa fa-check' id='fa_fa_check' style=' display:none'></i></span></a></div>\n\
</form>");
                        if (data.result.exist_status == 1) {
                            $.each(data.result.option, function (key, val) {
                                key++;
                                if (data.result.select_option_id == val.poll_question_option_id) {
                                    $("#option_section").append("<div class='option_section_css_selected' style='line-height:"+customFont+";margin-bottom:"+customFont+"'><input style='min-height:"+customFont+"; min-width:"+customFont+"; vertical-align: middle;' name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option' checked> <label class='option_lable' for='option_" + key + "'>" + val.option + "</label></div>");
                                } else {
                                    $("#option_section").append("<div class='option_section_css' style='line-height:"+customFont+";margin-bottom:"+customFont+"'><input name='option' style='min-height:"+customFont+"; min-width:"+customFont+"; vertical-align: middle;' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label class='option_lable' for='option_" + key + "'>" + val.option + "</label></div>");
                                }
                            });
                        } else {

                            $.each(data.result.option, function (key, val) {
                                key++;
                                $("#option_section").append("<div class='option_section_css' style='line-height:"+customFont+";margin-bottom:"+customFont+"'><input name='option' style='min-height:"+customFont+"; min-width:"+customFont+";vertical-align: middle;' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label class='option_lable' for='option_" + key + "'>" + val.option + "</label></div>");
                            });


                        }
                        if (data.result.exist_status == 1) {
                            $(':radio:not(:checked)').attr('disabled', true);
                            $('#btn_vote_label').html('VOTED <i class="fa fa-check" id="fa_fa_check" style=""></i>');

                        }
                    } else {
                        //Disabling modal hide on clicking outside
                        $('#modal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('#modal').modal('show');

                        $("#poll_vot_section").html("<div class='row'><div class='col-md-12'><h2 style='font-size:"+customFont+";margin-bottom: 0px; color: #fff; font-weight: 700; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase; border-top-right-radius: 15px; border-top-left-radius: 15px;'>Resultados de Encusta Envivo</h2></div><div class='col-md-12'><div class='col-md-12'><h5 style='letter-spacing: 0px; padding-top: 10px; border-bottom: 1px solid #b1b1b1; padding-bottom: 20px; line-height:"+customFont+"'>" + data.result.question + "</h5>\n\
                                                        \n\<div id='result_section' style='padding-bottom: 10px; line-height:"+customFont+"'></div></div></div></div>");
                        var total_vote = 0;
                        var total_vote_compere_option = 0;
                        $.each(data.result.option, function (key, val) {
                            key++;
                            total_vote = parseFloat(total_vote) + parseFloat(val.total_vot);
                            if (typeof (val.compere_option) != "undefined" && val.compere_option !== null) {
                                total_vote_compere_option = parseFloat(total_vote_compere_option) + parseFloat(val.compere_option);
                            }
                        });

                        let pollIteration = 1;
                        $.each(data.result.option, function (key, val) {
                            key++;


                            if (total_vote == 0) {
                                var result_calculate = 0;
                            } else {
                                var result_calculate = (val.total_vot * 100) / total_vote;
                            }


                            if (typeof (val.compere_option) != "undefined" && val.compere_option !== null) {

                                window.isComparisonpoll = true;

                                if (total_vote_compere_option == 0) {
                                    var result_calculate_compere = 0;
                                } else {
                                    var result_calculate_compere = (val.compere_option * 100) / total_vote_compere_option;
                                }

                                if(parseInt(result_calculate_compere.toFixed(0)) <= 5)
                                {
                                    var zeroVotes = "zeroVotes";

                                }else{
                                    var zeroVotes = "";
                                }

                                if (data.result.compere_max_value == val.compere_option) {
                                    $("#result_section").append("<label id='label_"+key+"' style='margin-bottom:"+customFont+" !important'>"+pollIteration+". " + val.option + "</label><div class='progress_1'><div class='progress_bar_new_1 "+zeroVotes+"' role='progressbar' aria-valuenow='" + result_calculate_compere.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style=' font-size:"+customFont+" !important, width:" + result_calculate_compere.toFixed(0) + "%'>" + result_calculate_compere.toFixed(0) + "%</div></div>");
                                } else {
                                    $("#result_section").append("<label id='label_"+key+"' style='margin-bottom:"+customFont+" !important'>"+pollIteration+". " + val.option + "</label><div class='progress_1'><div class='progress-bar_1 presurvey-bar "+zeroVotes+"' role='progressbar' aria-valuenow='" + result_calculate_compere.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style=' font-size:"+customFont+" !important, width:" + result_calculate_compere.toFixed(0) + "%'>" + result_calculate_compere.toFixed(0) + "%</div></div>");
                                }
                            }else{
                                window.isComparisonpoll = false;
                            }

                            if(parseInt(result_calculate.toFixed(0)) <= 5)
                            {
                                var zeroVotes = "zeroVotes";
                            }else{
                                var zeroVotes = "";
                            }

                            if (data.result.max_value == val.total_vot) {

                                if(!window.isComparisonpoll)
                                {
                                    $('.progress_bar_new').css('background', '#45c0ea');
                                    $("#result_section").append("<label id='label_"+key+"' style='margin-bottom:"+customFont+" !important'>"+pollIteration+". " + val.option + "</label>");

                                }

                                $("#result_section").append("<div class='progress' style='margin-bottom: "+customFont+"; height:"+customFont+" !important'><div class='progress_bar_new "+zeroVotes+"' role='progressbar' aria-valuenow='" + result_calculate.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='line-height:"+customFont+", font-size:"+customFont+" !important,width:" + result_calculate.toFixed(0) + "%'>" + result_calculate.toFixed(0) + "%</div></div>");
                            } else {
                                if(!window.isComparisonpoll)
                                {
                                    $('.progress_bar_new').css('background', '#45c0ea');
                                    $("#result_section").append("<label id='label_"+key+"' style='margin-bottom:"+customFont+" !important'>"+pollIteration+". " + val.option + "</label>");
                                }

                                $("#result_section").append("<div class='progress' style='margin-bottom: "+customFont+"; height:"+customFont+" !important'><div class='progress-bar assesment-bar "+zeroVotes+"'  role='progressbar' aria-valuenow='" + result_calculate.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='line-height:"+customFont+", font-size: "+customFont+" !important, width:" + result_calculate.toFixed(0) + "%'>" + result_calculate.toFixed(0) + "%</div></div>");
                            }

                            pollIteration++;

                            if(data.result.correct_answer1 !== "0" || data.result.correct_answer2 !=='0'){
                                console.log(data.result.correct_answer);
                                if(data.result.correct_answer1 ==  key) {
                                    $("#result_section #label_"+data.result.correct_answer1).prepend('<span class="fa fa-check fa-2x "></span>').css({'margin-left':'-30px', 'color':'#22B14C'});
                                    $("#result_section").append("<div style='border-bottom: 1px solid gray; margin-left: -30px; margin-bottom: 5px'></div>");
                                }else if (data.result.correct_answer2 ==  key){
                                    $("#result_section #label_"+data.result.correct_answer2).prepend('<span class="fa fa-check fa-2x "></span>').css({'margin-left':'-30px', 'color':'#22B14C'});
                                    $("#result_section").append("<div style='border-bottom: 1px solid gray; margin-left: -30px; margin-bottom: 5px'></div>");
                                }
                                else{
                                    $("#result_section").css('margin-left','30px');
                                    $("#result_section").append("<div style='border-bottom: 1px solid gray;  margin-left: -30px; margin-bottom: 5px'></div>");
                                }
                            }

                        });

                        if (window.isComparisonpoll) {
                            $("#result_section").append('' +
                                '<div class="col-md-12 text-center">\n' +
                                '  <span style="margin-right: 20px;"><i class="fa fa-square" aria-hidden="true" style="color: #035a76;"></i> Presurvey</span>\n' +
                                '<span><i class="fa fa-square" aria-hidden="true" style="color: #45c0ea;"></i> Assesment</span>\n' +
                                '</div>');
                        }
                    }
                }
            } else {
                $("#poll_vot_section_id_status").val("");
                $("#poll_vot_section_last_status").val("");
                stop_music();
                $('#modal').modal('hide');
                $("#timer_sectiom").hide();
                $("#popup_title_lbl").css({"border-top-right-radius": "15px", "border-top-left-radius": "15px"});
                $('#poll_vot_section_is_ended').val(1);

                $.ajax({
                    url: base_url+"sessions/get_poll_vot_section_close_poll",
                    type: "post",
                    data: {'sessions_id': sessions_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $("#poll_vot_section").html("<form id='frm_reg' name='frm_reg' method='post' action=''>\n\
            \n\<h2 style='font-size:"+customFont+"; margin-bottom: 0px; color: #fff; font-weight: 700; padding: 5px 5px 5px 10px; background-color: #b2b7bb; text-transform: uppercase; border-top-right-radius: 15px; border-top-left-radius: 15px;'>Live Poll</h2>\n\
<div class='col-md-12'>\n\
\n\<h5 style='letter-spacing: 0px; padding-top: 10px;  border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5></div>\n\
\n\<input type='hidden' id='sessions_poll_question_id' value='" + data.result.sessions_poll_question_id + "'>\n\
\n\<input type='hidden' id='sessions_id' value='" + data.result.sessions_id + "'>\n\
<div class='col-md-12' id='option_section'></div>\n\
\n\<span id='error_vote' style='color:red; margin-left: 20px;'></span><span id='success_voted' style='color:green; margin-left: 20px;'></span>\n\
<div style='text-align: center;'><p style='color:red; font-weight: 700;'>Poll Now Closed</p></div><div style='padding-right: 20px;text-align: right;'><a class='button small color rounded icon-left' id='btn_vote' style='background-color: #c3c3c3; border-color: #c3c3c3; '><span>VOTE <i class='fa fa-check' id='fa_fa_check_close_poll' style='display:none'></i></span></a></div>\n\
</form>");

                            $.each(data.result.option, function (key, val) {
                                key++;
                                if (data.result.select_option_id == val.poll_question_option_id) {
                                    $("#option_section").append("<div class='option_section_css_selected' style='line-height:"+customFont+"; margin-bottom:"+customFont+"'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option' checked> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                } else {
                                    $("#option_section").append("<div class='option_section_css' style='line-height:"+customFont+"; margin-bottom:"+customFont+"'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                }
                            });

                            $(':radio:not(:checked)').attr('disabled', true);
                            $('#fa_fa_check_close_poll').show();
                        } else {
                            $("#poll_vot_section").html("");
                        }
                    }
                });
            }
        }
    });

}

function get_group_chat_section_status() {
    var sessions_id = $("#sessions_id").val();
    $.ajax({
        url: base_url+"sessions/get_group_chat_section_status",
        type: "POST",
        data: {'sessions_id': sessions_id},
        dataType: "json",
        success: function (resultdata, textStatus, jqXHR) {
            if (resultdata.status == 'success') {
                $("#group_chat_section").show();
                $("#sessions_group_chat_id").val(resultdata.result.sessions_group_chat_id);
            } else {
                $("#group_chat_section").hide();
            }
        }
    });
}

function getMessage() {
    $.ajax({
        url: site_url+"sessions/message",
        type: "post",
        data: {'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
        success: function (data, textStatus, jqXHR) {
            $('#message_list').html(data);
        }
    });
}




$(document).ready(function () {
    //setInterval(ajaxcall, 1000);

    $('.poll-modal-close').on('click', function () {
        stop_music();
    });
});

function ajaxcall() {
    $.ajax({
        url: base_url+'sessions/gettimenow',
        type: "POST",
        data: {},
        dataType: "json",
        success: function (data) {
            $('#show_time').text(data.current_time);
        }
    });
}


    $(document).ready(function () {
        var page_link = $(location).attr('href');
        var page_name = "Sessions View";
        $.ajax({
            url: base_url+"home/add_user_activity",
            type: "post",
            data: {'user_id': user_id, 'page_name': page_name, 'page_link': page_link},
            dataType: "json",
            success: function (data) {
            }
        });
    });

function play_music() {
    var audio = document.getElementById("audio");
    audio.play();
}

function stop_music() {
    var audio = document.getElementById("audio");
    audio.pause();
}

var upgradeTime = 15;
var seconds = upgradeTime;

// function timer(status) {
//     var is_poll_ended = $('#poll_vot_section_is_ended').val();
//     if (status == 0 || is_poll_ended == 1) {
//         seconds = 15;
//     }
//
//     var remainingSeconds = seconds % 60;
//
//     function pad(n) {
//         return (n < 10 ? "0" + n : n);
//     }
//
//     document.getElementById('id_day_time').innerHTML = pad(remainingSeconds);
//     if (seconds <= 0) {
//         stop_music();
//         $("#btn_vote").hide();
//         $("#id_day_time").css("color", "red");
//     } else {
//         $('#poll_vot_section_is_ended').val(0);
//         $("#btn_vote").show();
//         $("#id_day_time").css("color", "#ef5e25");
//         play_music();
//         seconds--;
//     }
// }

function pad(n) {
    return (n < 10 ? "0" + n : n);
}

function timer(status)
{
    var is_poll_ended = $('#poll_vot_section_is_ended').val();
    if (status == 0 || is_poll_ended == 1) {
        $('#poll_vot_section_is_ended').val(0);
        $("#btn_vote").show();
        $("#id_day_time").css("color", "#ef5e25");
        play_music();

        var timeLeft = 10;
        var pollTimer = setInterval(function(){
            if(timeLeft <= 0){
                clearInterval(pollTimer);

                stop_music();
                $("#btn_vote").hide();
                $("#id_day_time").css("color", "red");
            } else {
                document.getElementById('id_day_time').innerHTML = timeLeft-1;
            }
            timeLeft -= 1;
        }, 1000);
    }
}


getBrowserDetails = () => {
    const userAgent = navigator.userAgent;
    let browser = "unkown";
    // Detect browser name
    browser = (/ucbrowser/i).test(userAgent) ? 'UCBrowser' : browser;
    browser = (/edg/i).test(userAgent) ? 'Edge' : browser;
    browser = (/googlebot/i).test(userAgent) ? 'GoogleBot' : browser;
    browser = (/chromium/i).test(userAgent) ? 'Chromium' : browser;
    browser = (/firefox|fxios/i).test(userAgent) && !(/seamonkey/i).test(userAgent) ? 'Firefox' : browser;
    browser = (/; msie|trident/i).test(userAgent) && !(/ucbrowser/i).test(userAgent) ? 'IE' : browser;
    browser = (/chrome|crios/i).test(userAgent) && !(/opr|opera|chromium|edg|ucbrowser|googlebot/i).test(userAgent) ? 'Chrome' : browser;
    ;
    browser = (/safari/i).test(userAgent) && !(/chromium|edg|ucbrowser|chrome|crios|opr|opera|fxios|firefox/i).test(userAgent) ? 'Safari' : browser;
    browser = (/opr|opera/i).test(userAgent) ? 'Opera' : browser;

    // detect browser version
    switch (browser) {
        case 'UCBrowser':
            return `${browser} ${browserVersion(userAgent, /(ucbrowser)\/([\d\.]+)/i)}`;
        case 'Edge':
            return `${browser} ${browserVersion(userAgent, /(edge|edga|edgios|edg)\/([\d\.]+)/i)}`;
        case 'GoogleBot':
            return `${browser} ${browserVersion(userAgent, /(googlebot)\/([\d\.]+)/i)}`;
        case 'Chromium':
            return `${browser} ${browserVersion(userAgent, /(chromium)\/([\d\.]+)/i)}`;
        case 'Firefox':
            return `${browser} ${browserVersion(userAgent, /(firefox|fxios)\/([\d\.]+)/i)}`;
        case 'Chrome':
            return `${browser} ${browserVersion(userAgent, /(chrome|crios)\/([\d\.]+)/i)}`;
        case 'Safari':
            return `${browser} ${browserVersion(userAgent, /(safari)\/([\d\.]+)/i)}`;
        case 'Opera':
            return `${browser} ${browserVersion(userAgent, /(opera|opr)\/([\d\.]+)/i)}`;
        case 'IE':
            const version = browserVersion(userAgent, /(trident)\/([\d\.]+)/i);
            // IE version is mapped using trident version 
            // IE/8.0 = Trident/4.0, IE/9.0 = Trident/5.0
            return version ? `${browser} ${parseFloat(version) + 4.0}` : `${browser}/7.0`;
        default:
            return `unknown' '0.0.0.0`;
    }
}

browserVersion = (userAgent, regex) => {
    return userAgent.match(regex) ? userAgent.match(regex)[2] : null;
}

$('#modal').on('shown.bs.modal', function () {
    $(".modal-backdrop.in").hide();
});


/*************** Socket IO codes by Athul *****************/
/************ DO NOT MODIFY WITHOUT CONSENT ***************/
// Written separate listeners for flexibility in the future
socket.on('poll_open_notification', (poll_app_name) => {
    if (poll_app_name == app_name)
        get_poll_vot_section();
});

socket.on('poll_close_notification', (poll_app_name) => {
    if (poll_app_name == app_name)
        get_poll_vot_section();
});

socket.on('show_poll_results_notification', (poll_app_name) => {
    if (poll_app_name == app_name)
        get_poll_vot_section();
});

socket.on('close_poll_results_notification', (poll_app_name) => {
    if (poll_app_name == app_name)
        get_poll_vot_section();
});

socket.on('start_poll_timer_notification', (poll_app_name) => {
    if (poll_app_name == app_name)
        get_poll_vot_section();
});
/********* End of socket IO codes by Athul **********/


function calcTime(offset) {
    // create Date object for current location
    var d = new Date();

    // convert to msec
    // subtract local time zone offset
    // get UTC time in msec
    var utc = d.getTime() + (d.getTimezoneOffset() * 60000);

    // create new Date object for different city
    // using supplied offset
    var nd = new Date(utc + (3600000*offset));

    return nd;
}


$(function(){
    if(screen.width < 800){
        console.log(screen.width)
        customFont = "1rem";
        $('.modal-content').css('font-size', '17px');
        $('.view-session-user-modal .modal-dialog').css('width','90%');
    }else
        customFont = customFont2;

    $( window ).resize(function() {
        if(screen.width < 800){
            console.log(screen.width)
            customFont = "1rem";
            $('.modal-content').css('font-size', '17px');

            $('.view-session-user-modal .modal-dialog').css('width','90%');
        }else{
            customFont = customFont2;
            $('.modal-content').css('font-size', customFont2);
            $('.view-session-user-modal .modal-dialog').css('width', custPollModalWidth);
        }
    });
})