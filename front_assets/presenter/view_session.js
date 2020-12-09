

socket.emit("getSessionViewUsers", app_name, function (resp) {
    if (resp) {
        var totalUsers = resp.users ? resp.users.length : 0;
        var sessionId = resp.sessionId;
        $(".userCount" + sessionId).html(totalUsers);
    }
})

    $(document).ready(function () {
        var $iframe = $("#embed_html_code_section iframe");

        $iframe.css("height", "100%")


        if ($iframe.attr("width") == "1280") {
            $iframe.css("width", "100%")
            if (window.innerWidth <= 991) {
                $("#rightOrder").css("margin-top", "185px");
            }
        }

        $(document).on("click", "#btn_view_poll", function () {
            $("#view_poll_table").show();
        });

        $(".visible-md").click();
        get_question_list();
        //setInterval(get_question_list, 4000);

        get_favorite_question_list();
        //setInterval(get_favorite_question_list, 5000);

        get_poll_vot_section();
        //setInterval(get_poll_vot_section, 1000);

        $(document).on("click", "#thumbs_down", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#message").val();
            if (questions != "") {
                $("#message").val(questions + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#sad", function () {
            var value = $(this).attr("data-title_name");
            var questions = $("#message").val();
            if (questions != "") {
                $("#message").val(questions + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#clapping", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#happy", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#laughing", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $(document).on("click", "#thumbs_up", function () {
            var value = $(this).attr("data-title_name");
            var send_message = $("#message").val();
            if (send_message != "") {
                $("#message").val(send_message + ' ' + value);
            }
            else {
                $("#message").val(value);
            }
        });

        $("#resource_display_status").show();
        $(document).on("click", "#resource_show", function () {
            var resource_show_status = $("#resource_show").attr("data-resource_show_status");
            if (resource_show_status == 0) {
                $("#resource_display_status").show();
                $("#resource_show").removeClass('fa-caret-right');
                $("#resource_show").addClass('fa-caret-down');
                $("#resource_show").attr('data-resource_show_status', 1);
            }
            else {
                $("#resource_display_status").hide();
                $("#resource_show").addClass('fa-caret-right');
                $("#resource_show").removeClass('fa-caret-down');
                $("#resource_show").attr('data-resource_show_status', 0);
            }
        });

        $("#emojis_section").hide();
        $(document).on("click", "#emjis_section_show", function () {
            var emjis_section_show_status = $("#emjis_section_show").attr("data-emjis_section_show_status");
            if (emjis_section_show_status == 0) {
                $("#emojis_section").show();
                $("#emjis_section_show").attr('data-emjis_section_show_status', 1);
            }
            else {
                $("#emojis_section").hide();
                $("#emjis_section_show").attr('data-emjis_section_show_status', 0);
            }
        });

        $(document).on("click", ".cust_class_star", function () {
            var sessions_cust_question_id = $(this).attr("data-sessions_cust_question_id");
            var sessions_id = $("#sessions_id").val();
            $(this).removeClass("cust_class_star fa fa-star-o");
            $(this).addClass("cust_class_star_remove fa fa-star");
            $.ajax({
                url: base_url+"presenter/sessions/likeQuestion",
                type: "post",
                data: {'sessions_id': sessions_id, 'sessions_cust_question_id': sessions_cust_question_id},
                dataType: "json",
                success: function (data) {
                    socket.emit('presenter_like_questions',{
                        "app_name":app_name,
                        "type":"like",
                        "question":data["data"],
                    });
                }
            });
        });
        socket.on("presenter_like_questions",function (data){
            if(data){
                var question_app_name=data["app_name"];
                var question_type=data["type"];
                var question=data["question"];

                if(question_app_name==app_name){
                    if(question_type=="like"){
                        $('#favorite_question_list').prepend(questionFavoriteElement(question.tbl_favorite_question_id,question));

                    }else{
                        var tbl_favorite_question_id=question["tbl_favorite_question_id"];
                        $("#fav_question_list_key_"+tbl_favorite_question_id).remove();
                    }
                }
            }

        })


        $(document).on("click", ".cust_class_star_remove", function () {
            var sessions_cust_question_id = $(this).attr("data-sessions_cust_question_id");
            var sessions_id = $("#sessions_id").val();
            $(this).removeClass("cust_class_star_remove fa fa-star");
            $(this).addClass("cust_class_star fa fa-star-o");
            $.ajax({
                url: base_url+"presenter/sessions/likeQuestion",
                type: "post",
                data: {'sessions_id': sessions_id, 'sessions_cust_question_id': sessions_cust_question_id},
                dataType: "json",
                success: function (data) {
                    socket.emit('presenter_like_questions',{
                        "app_name":app_name,
                        "type":"unlike",
                        "question":data["data"],
                    });
                }
            });
        });


        $(document).on("click", ".btn_publish", function () {
            $(this).prop('disabled', true);
            var answer_btn_id = $(this).attr("data-answer_btn");
            var q_answer = $("#" + answer_btn_id).val();
            var sessions_cust_question_id = $("#" + answer_btn_id).attr("data-last_id");
            if (q_answer != "") {
                $.ajax({
                    url: base_url+"presenter/sessions/addQuestionAnswer",
                    type: "post",
                    data: {'q_answer': q_answer, 'sessions_cust_question_id': sessions_cust_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $("#" + answer_btn_id).attr('readonly', true);
                            alertify.success('Answer Successfully Added');
                        }
                    }
                });
            }
            else {
                alertify.error('Please enter answer');
            }
        });

        $(document).on("click", ".open_poll", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: base_url+"presenter/sessions/open_poll_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".close_poll", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: base_url+"presenter/sessions/close_poll_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".show_results", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: base_url+"presenter/sessions/show_result_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".close_results", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: base_url+"presenter/sessions/close_result_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Already opened other poll..!');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        $(document).on("click", ".start_timer", function () {
            var sessions_poll_question_id = $(this).attr("data-sessions_poll_question_id");
            if (sessions_poll_question_id != "") {
                $.ajax({
                    url: base_url+"presenter/sessions/start_timer_ajax",
                    type: "post",
                    data: {'sessions_poll_question_id': sessions_poll_question_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            sessionStorage.reloadAfterPageLoad = "1";
                            window.location.reload();
                        }
                        else {
                            alertify.error('Something went wrong, Please try again');
                        }
                    }
                });
            }
            else {
                alertify.error('Something went wrong, Please try again');
            }
        });

        setTimeout(function () {
            $('.app-navbar-fixed').addClass('app-sidebar-closed')
        }, 3000);

    });

function get_question_list() {
    var sessions_id = $("#sessions_id").val();
    var last_sessions_cust_question_id = $("#last_sessions_cust_question_id").val();
    var list_last_id = 0;
    $('.input_class').each(function () {
        list_last_id = $(this).attr("data-last_id");
        return false;
    });
    $.ajax({
        url: base_url+"presenter/sessions/get_question_list",
        type: "POST",
        data: {'sessions_id': sessions_id, 'list_last_id': list_last_id},
        dataType: "json",
        success: function (resultdata, textStatus, jqXHR) {
            if (resultdata.status == 'success') {
                $('#question_list').html('');
                $.each(resultdata.question_list, function (key, val) {

                    key++;
                    var readonly_value = "";
                    var disabled_value = "";
                    var answer_value = "";
                    if (val.answer_status == 1) {
                        readonly_value = "readonly";
                        disabled_value = "disabled";
                        answer_value = val.answer;
                    }

                    if (val.favorite_status == 0) {
                        var add_star_class = 'fa fa-star-o cust_class_star';
                    }
                    else {
                        var add_star_class = 'fa fa-star cust_class_star_remove';
                    }
                    $("#last_sessions_cust_question_id").val(val.sessions_cust_question_id);
                    $('#question_list').prepend('<div id="question_list_key_' + key + '" style="padding-bottom: 15px;"><h5 style="font-weight: 400; font-size: 15px; "><span style="font-size: 12px;">(' + val.first_name + ' ' + val.last_name + ') </span>' + val.question + ' <span class="' + add_star_class + ' " data-sessions_cust_question_id=' + val.sessions_cust_question_id + '></span> <a href="javascript:void(0)" class="hide_question" data-q-id="' + val.sessions_cust_question_id + '" data-listkey-id="question_list_key_' + key + '" title="Hide" ><span class="fa fa-eye-slash" ></span></a></h5><div style="display: flex;"><input type="hidden" ' + readonly_value + ' id="answer_' + key + '" data-key_id="' + key + '" class="form-control input_class" placeholder="Enter Answer"  data-cust_id="' + val.cust_id + '" data-last_id="' + val.sessions_cust_question_id + '" value="' + answer_value + '"><a  class="btn btn-success btn_publish" id="btn_publish" data-answer_btn="answer_' + key + '" ' + disabled_value + ' style="border-radius: 0px; display:none">Send</a></div></div>');
                });
            }
        }
    });
}

$(document).on('click', '.hide_question', function () {
    var qid = $(this).attr('data-q-id');
    var data_listkey_id = $(this).attr('data-listkey-id');
    $.ajax({
        url: base_url+"presenter/sessions/hide_question",
        type: "POST",
        data: {'sessions_question_id': qid},
        dataType: "json",
        success: function (data, textStatus, jqXHR) {
            //location.reload();
            $("#" + data_listkey_id).hide();

            socket.emit('like_question', app_name);
        }
    });
});


$(document).on('click', '.favorite_hide_question', function () {
    var qid = $(this).attr('data-q-id');
    var data_listkey_id = $(this).attr('data-listkey-id');

    $.ajax({
        url: base_url+"presenter/sessions/favorite_hide_question",
        type: "POST",
        data: {'tbl_favorite_question_id': qid},
        dataType: "json",
        success: function (data, textStatus, jqXHR) {
            //   location.reload();
            $("#" + data_listkey_id).hide();
            socket.emit('like_question', app_name);

        }
    });
});

function questionFavoriteElement(key,val){
    return'<div id="fav_question_list_key_' + val.tbl_favorite_question_id + '" style="padding-bottom: 15px;"><h5 style="font-weight: 800; font-size: 15px; "><span style="font-size: 12px;">(' + val.first_name + ' ' + val.last_name + ') </span>' + val.question + ' <a href="javascript:void(0)" class="favorite_hide_question" data-q-id="' + val.tbl_favorite_question_id + '" data-listkey-id="fav_question_list_key_' + key + '" title="Hide" ><span class="fa fa-eye-slash" ></span></a></h5><div style="display: flex;"></h5> <input type="hidden" class="favorite_input_class" data-last_id="' + val.tbl_favorite_question_id + '"></div>';
}
function get_favorite_question_list() {
    var sessions_id = $("#sessions_id").val();
    var favorite_last_sessions_cust_question_id = $("#favorite_last_sessions_cust_question_id").val();
    var list_last_id = 0;
    $('.favorite_input_class').each(function () {
        list_last_id = $(this).attr("data-last_id");
        return false;
    });
    $.ajax({
        url: base_url+"presenter/sessions/get_favorite_question_list",
        type: "POST",
        data: {'sessions_id': sessions_id, 'list_last_id': list_last_id},
        dataType: "json",
        success: function (resultdata, textStatus, jqXHR) {
            $('#favorite_question_list').html('');
            if (resultdata.status == 'success') {
                $.each(resultdata.question_list, function (key, val) {
                    key++;
                    $("#favorite_last_sessions_cust_question_id").val(val.tbl_favorite_question_id);
                    $('#favorite_question_list').prepend(questionFavoriteElement(key,val));
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
        url: base_url+"presenter/sessions/get_poll_vot_section",
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
                        timer(0);
                    }
                    else {
                        $("#timer_sectiom").show();
                        timer(1);
                    }
                }
                else {
                    $("#timer_sectiom").hide();
                }

                if (poll_vot_section_id_status != data.result.sessions_poll_question_id || poll_vot_section_last_status != data.result.status) {
                    $("#poll_vot_section_id_status").val(data.result.sessions_poll_question_id);
                    $("#poll_vot_section_last_status").val(data.result.status);
                    $('#modal').modal('show');
                    //Disabling modal hide on clicking outside
                    $('#modal').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                    if (data.result.poll_status == 1) {
                        $("#poll_vot_section").html("<form id='frm_reg' name='frm_reg' method='post' action=''>\n\
            \n\<h2 style='border:1px solid #b79700;margin-bottom: 0px; color: gray; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #efe4b0; text-transform: uppercase;'>Encuesta en Vivo</h2>\n\
<div class='col-md-12'>\n\
\n\<h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5></div>\n\
\n\<input type='hidden' id='sessions_poll_question_id' value='" + data.result.sessions_poll_question_id + "'>\n\
\n\<input type='hidden' id='sessions_id' value='" + data.result.sessions_id + "'>\n\
<div class='col-md-12' id='option_section'></div>\n\
\n\<span id='error_vote' style='color:red; margin-left: 20px;'></span><span id='success_voted' style='color:green; margin-left: 20px;'></span>\n\
\n\
</form>");
                        if (data.result.exist_status == 1) {
                            $.each(data.result.option, function (key, val) {
                                key++;
                                if (data.result.select_option_id == val.poll_question_option_id) {
                                    $("#option_section").append("<div class='option_section_css_selected'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option' checked> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                }
                                else {
                                    $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                                }
                            });
                        }
                        else {
                            $.each(data.result.option, function (key, val) {
                                key++;
                                $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
                            });
                        }
                        if (data.result.exist_status == 1) {
                            $(':radio:not(:checked)').attr('disabled', true);
                            $('#fa_fa_check').show();
                        }
                    }
                    else {
                        $("#poll_vot_section").html("<div class='row'><div class='col-md-12'><h2 style='border: 1px solid #b79700;margin-bottom: 0px; color: gray; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #efe4b0; text-transform: uppercase;'>Resultados de Encuesta en Vivo</h2></div><div class='col-md-12'><div class='col-md-12'><h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5>\n\
                                                        \n\<div id='result_section' style='padding-bottom: 10px;'></div></div></div></div>\n\
");
                        var total_vote = 0;
                        var total_vote_compere_option = 0;
                        $.each(data.result.option, function (key, val) {
                            key++;
                            total_vote = parseFloat(total_vote) + parseFloat(val.total_vot);
                            if (typeof (val.compere_option) != "undefined" && val.compere_option !== null) {
                                total_vote_compere_option = parseFloat(total_vote_compere_option) + parseFloat(val.compere_option);
                            }
                        });
                        $.each(data.result.option, function (key, val) {
                            key++;
                            if (total_vote == 0) {
                                var result_calculate = 0;
                            }
                            else {
                                var result_calculate = (val.total_vot * 100) / total_vote;
                            }
                            if (data.result.max_value == val.total_vot) {
                                $("#result_section").append("<label>" + val.option + "</label><div class='progress'><div class='progress_bar_new' role='progressbar' aria-valuenow='" + result_calculate.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate.toFixed(0) + "%'>" + result_calculate.toFixed(0) + "%</div></div>");
                            }
                            else {
                                $("#result_section").append("<label>" + val.option + "</label><div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='" + result_calculate.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate.toFixed(0) + "%'>" + result_calculate.toFixed(0) + "%</div></div>");
                            }

                            if (typeof (val.compere_option) != "undefined" && val.compere_option !== null) {
                                if (total_vote_compere_option == 0) {
                                    var result_calculate_compere = 0;
                                }
                                else {
                                    var result_calculate_compere = (val.compere_option * 100) / total_vote_compere_option;
                                }
                                if (data.result.compere_max_value == val.compere_option) {
                                    $("#result_section").append("<div class='progress_1'><div class='progress_bar_new_1' role='progressbar' aria-valuenow='" + result_calculate_compere.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate_compere.toFixed(0) + "%'>" + result_calculate_compere.toFixed(0) + "%</div></div>");
                                }
                                else {
                                    $("#result_section").append("<div class='progress_1'><div class='progress-bar_1' role='progressbar' aria-valuenow='" + result_calculate_compere.toFixed(0) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + result_calculate_compere.toFixed(0) + "%'>" + result_calculate_compere.toFixed(0) + "%</div></div>");
                                }
                            }
                        });
                    }
                }
            }
            else {
                $("#timer_sectiom").hide();
                $('#poll_vot_section_is_ended').val(1);
                $.ajax({
                    url: base_url+"presenter/sessions/get_poll_vot_section_close_poll",
                    type: "post",
                    data: {'sessions_id': sessions_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.status == "success") {
                            $('#modal').modal('hide');
//                             $("#poll_vot_section").html("<form id='frm_reg' name='frm_reg' method='post' action=''>\n\
//             \n\<h2 style='margin-bottom: 0px; color: gray; font-weight: 700;font-size: 15px; padding: 5px 5px 5px 10px; background-color: #efe4b0; text-transform: uppercase;'>Live Poll</h2>\n\
// <div class='col-md-12'>\n\
// \n\<h5 style='letter-spacing: 0px; padding-top: 10px; font-size: 13px; border-bottom: 1px solid #b1b1b1; padding-bottom: 10px;'>" + data.result.question + "</h5></div>\n\
// \n\<input type='hidden' id='sessions_poll_question_id' value='" + data.result.sessions_poll_question_id + "'>\n\
// \n\<input type='hidden' id='sessions_id' value='" + data.result.sessions_id + "'>\n\
// <div class='col-md-12' id='option_section'></div>\n\
// \n\<span id='error_vote' style='color:red; margin-left: 20px;'></span><span id='success_voted' style='color:green; margin-left: 20px;'></span>\n\
// <div style='text-align: center;'><p style='color:red; font-weight: 700;'>Poll Now Closed</p></div>\n\
// </form>");
//
//                             $.each(data.result.option, function (key, val) {
//                                 key++;
//                                 if (data.result.select_option_id == val.poll_question_option_id) {
//                                     $("#option_section").append("<div class='option_section_css_selected'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option' checked> <label for='option_" + key + "'>" + val.option + "</label></div>");
//                                 }
//                                 else {
//                                     $("#option_section").append("<div class='option_section_css'><input name='option' type='radio' value='" + val.poll_question_option_id + "' id='option_" + key + "' class='class_option'> <label for='option_" + key + "'>" + val.option + "</label></div>");
//                                 }
//                             });
//
//                             $(':radio:not(:checked)').attr('disabled', true);
//                             $('#fa_fa_check').show();
                        }
                        else {
                            $('#modal').modal('hide');
                            // $("#poll_vot_section").html("");
                        }
                    }
                });
            }
        }
    });
}

function getMessage() {
    $.ajax({
        url: site_url+"presenter/groupchat/message",
        type: "post",
        data: {'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
        success: function (data, textStatus, jqXHR) {
            $('.allmessage').html(data);
            var height = document.getElementById('allmessage').scrollHeight; - $('#allmessage').height();
            $('#allmessage').scrollTop(height);
        }
    });
}

function get_group_chat_section_status() {
    var sessions_id = $("#sessions_id").val();
    $.ajax({
        url: base_url+"presenter/groupchat/get_group_chat_section_status",
        type: "POST",
        data: {'sessions_id': sessions_id},
        dataType: "json",
        success: function (resultdata, textStatus, jqXHR) {
            if (resultdata.status == 'success') {
                $("#group_chat_section").show();
                $("#sessions_group_chat_id").val(resultdata.result.sessions_group_chat_id);
                getMessage();
            }
            else {
                $("#group_chat_section").hide();
            }
        }
    });
}

    $(document).ready(function () {
        getMessage();
        //setInterval(getMessage, 1000);
        setTimeout(function () {
            $(".wrap-messages").css('max-height', '340px');
        }, 300);

        get_group_chat_section_status();
        //setInterval(get_group_chat_section_status, 10000);

        $('#send').click(function () {
            if ($('#message').val() != "") {
                $("#emojis_section").hide();
                $("#emjis_section_show").attr('data-emjis_section_show_status', 0);
                $.ajax({
                    url: site_url+"presenter/groupchat/send",
                    type: "post",
                    data: {'message': $('#message').val(), 'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
                    success: function (data, textStatus, jqXHR) {
                        socket.emit('session_new_message', app_name);
                        $('#message').val('');
                        $('.allmessage').html(data);
                        var height = document.getElementById('allmessage').scrollHeight; - $('#allmessage').height();
                        $('#allmessage').scrollTop(height);
                    }
                });
            }
            else {
                alertify.error('Write Message');
            }
        });

        $('#message').keypress(function (e) {
            var key = e.which;
            if (key == 13)  // the enter key code
            {
                if ($('#message').val() != "") {
                    $("#emojis_section").hide();
                    $("#emjis_section_show").attr('data-emjis_section_show_status', 0);
                    $.ajax({
                        url: site_url+"presenter/groupchat/send",
                        type: "post",
                        data: {'message': $('#message').val(), 'sessions_group_chat_id': $('#sessions_group_chat_id').val(), 'sessions_id': $('#sessions_id').val()},
                        success: function (data, textStatus, jqXHR) {
                            socket.emit('session_new_message', app_name);
                            $('#message').val('');
                            $('.allmessage').html(data);
                            var height = document.getElementById('allmessage').scrollHeight; - $('#allmessage').height();
                            $('#allmessage').scrollTop(height);
                        }
                    });
                }
                else {
                    alertify.error('Write Message');
                }
            }
        });

    });

function play_music() {
    var audio = document.getElementById("audio");
    //audio.play();
}

function stop_music() {
    var audio = document.getElementById("audio");
    //audio.pause();
}

var upgradeTime = 15;
var seconds = upgradeTime;

// function timer(status) {
//     var is_poll_ended = $('#poll_vot_section_is_ended').val();
//     if (status == 0 || is_poll_ended == 1) {
//         seconds = 15;
//     }
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
//     }
//     else {
//         $('#poll_vot_section_is_ended').val(0);
//         $("#id_day_time").css("color", "green");
//         seconds--;
//         play_music();
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

        var timeLeft = 15;
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

$(function () {
    if (sessionStorage.reloadAfterPageLoad == "1") {
        $("#view_poll_table").show();
        sessionStorage.reloadAfterPageLoad = "0";
    }
});

    $(document).ready(function () {
        function timeleft() {
            // Set the date we're counting down to
            var countDownDate = new Date(session_end_datetime).getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                var timer_string = seconds + "s ";
                if (minutes != 0)
                    timer_string = minutes + "m " + timer_string;
                if (hours != 0)
                    timer_string = hours + "h " + timer_string;
                if (days != 0)
                    timer_string = days + "d " + timer_string;
                timer_string = "Tiempo Restante : "+timer_string;

                // Display the result in the element with id="demo"
                //$('#quiz-time-left').html('Time Left: '+hours + "h " + minutes + "m " + seconds + "s ");
                //console.log('Time Left: '+hours + "h " + minutes + "m " + seconds + "s ");
                $('#id_day_time_clock').text(timer_string);

                // If the count down is finished,
                if (distance < 0) {
                    clearInterval(x);
                    $('#id_day_time_clock').text('Tiempo Restante: 0s');
                    $('#id_day_time_clock').css('color', '#d30e0e')
                }
            }, 1000);
        }

        function timeToStart() {
            // Set the date we're counting down to
            var countDownDate = new Date(session_start_datetime).getTime();

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                var timer_string = seconds + "s ";
                if (minutes != 0)
                    timer_string = minutes + "m " + timer_string;
                if (hours != 0)
                    timer_string = hours + "h " + timer_string;
                if (days != 0)
                    timer_string = days + "d " + timer_string;
                timer_string = "comienza en: "+timer_string;

                    // Display the result in the element with id="demo"
                //$('#quiz-time-left').html('Time Left: '+hours + "h " + minutes + "m " + seconds + "s ");
                //console.log('Time Left: '+hours + "h " + minutes + "m " + seconds + "s ");
                $('#id_day_time_clock').text(timer_string);

                // If the count down is finished,
                if (distance < 0) {
                    clearInterval(x);
                    timeleft();
                }
            }, 1000);
        }

        var now = new Date().getTime();
        var sessionStartDateTime = new Date(session_start_datetime).getTime();
        if (now < sessionStartDateTime) {
            timeToStart();
        }
        else {
            timeleft();
        }

        document.getElementById('id_day_time_clock').innerHTML = "00" + " : " + "00";
        $(document).on("click", "#btn_timer_start", function () {
            $('#btn_timer_start').prop('disabled', true);
            //setInterval('timer()', 1000);
            timeleft();
        });
        $(document).on("click", "#btn_timer_stop", function () {
            document.getElementById('id_day_time_clock').innerHTML = "00" + " : " + "00";
            location.reload();
        });
    });

// console.log($("#time_second").val())
// var upgradeTime = $("#time_second").val();
// var seconds = upgradeTime;
// function timer() {
//     var days = Math.floor(seconds / 24 / 60 / 60);
//     var hoursLeft = Math.floor((seconds) - (days * 86400));
//     var hours = Math.floor(hoursLeft / 3600);
//     var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
//     var minutes = Math.floor(minutesLeft / 60);
//     var remainingSeconds = seconds % 60;
//     function pad(n) {
//         return (n < 10 ? "0" + n : n);
//     }
//     //console.log(pad(minutes));
//     //console.log(pad(remainingSeconds));
//     document.getElementById('id_day_time_clock').innerHTML = pad(minutes) + " : " + pad(remainingSeconds);
//     if (seconds <= 0) {
//
//     } else {
//         seconds--;
//     }
// }


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

socket.on('new_question_notification', (poll_app_name) => {
    if (poll_app_name == app_name)
    {
        get_question_list();
        var $questionNotify=$(".questionNotify");

        $('.presenterRightSticky').find('li[data-type="questionFavorites"]').addClass('blink-element');

        if($questionNotify.parent().css("display")!="none"){
            $questionNotify.removeClass("displayNone");
        }
    }

});

socket.on('like_question_notification', (poll_app_name) => {
    if (poll_app_name == app_name){
        get_favorite_question_list();
        get_question_list();
    }

});

socket.on('session_new_message_notification', (poll_app_name) => {
    if (poll_app_name == app_name)
    {
        getMessage();
        var $hostChatNotify=$(".hostChatNotify");

        $('.presenterRightSticky').find('li[data-type="hostChat"]').addClass('blink-element');
        if($hostChatNotify.parent().css("display")!="none"){
            $hostChatNotify.removeClass("displayNone");
        }
    }

});

socket.on('session_chat_opened_notification', (poll_app_name) => {
    if (poll_app_name == app_name)
        get_group_chat_section_status();
});

socket.on('session_chat_closed_notification', (poll_app_name) => {
    if (poll_app_name == app_name)
        get_group_chat_section_status();
});
/********* End of socket IO codes by Athul **********/
