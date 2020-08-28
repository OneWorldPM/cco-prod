<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <div class="panel panel-primary" id="panel5">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">View Question</h4>
                    </div>
                    <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                        <div class="row">
                            <input type="hidden" name="sessions_id" id="sessions_id" value="<?= $sessions_id ?>">
                            <input type="hidden" name="last_sessions_cust_question_id" id="last_sessions_cust_question_id" value="0">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-striped text-center" id="user">
                                    <thead class="th_center">
                                        <tr>
                                            <th>Asked By</th>
                                            <th>Question</th>
                                            <th>Answer</th>
                                        </tr>
                                    </thead>
                                    <tbody id="question_list">
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
<script type="text/javascript">
    $(document).ready(function () {
        get_question_list();
        setInterval(get_question_list, 4000);

        $(document).on("click", ".btn_publish", function () {
            $(this).prop('disabled', true);
            var answer_btn_id = $(this).attr("data-answer_btn");

            var q_answer = $("#" + answer_btn_id).val();
            var sessions_cust_question_id = $("#" + answer_btn_id).attr("data-last_id");
            if (q_answer != "") {
                $.ajax({
                    url: "<?= base_url() ?>admin/sessions/addQuestionAnswer",
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
            } else {
                alertify.error('Please enter answer');
            }
        });

    });
    function get_question_list()
    {
        var sessions_id = $("#sessions_id").val();
        var last_sessions_cust_question_id = $("#last_sessions_cust_question_id").val();
        var list_last_id = 0;
        $('.input_class').each(function () {
            list_last_id = $(this).attr("data-last_id");
            return false;
        });
        $.ajax({
            url: "<?= base_url() ?>admin/sessions/get_question_list",
            type: "POST",
            data: {'sessions_id': sessions_id, 'list_last_id': list_last_id},
            dataType: "json",
            success: function (resultdata, textStatus, jqXHR) {
                if (resultdata.status == 'success') {
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
                        $("#last_sessions_cust_question_id").val(val.sessions_cust_question_id);
                        $('#question_list').prepend('<tr><td>' + val.first_name + ' ' + val.last_name + '</td><td>' + val.question + '</td><td><div style="display: flex;"><input type="text" ' + readonly_value + ' id="answer_' + key + '" data-key_id="' + key + '" class="form-control input_class" placeholder="Enter Answer"  data-cust_id="' + val.cust_id + '" data-last_id="' + val.sessions_cust_question_id + '" value="'+answer_value+'"><a  class="btn btn-success btn_publish" id="btn_publish" data-answer_btn="answer_' + key + '" ' + disabled_value + ' style="border-radius: 0px;">Publish</a></div></td></tr>');
                    });
                }
            }
        });
    }
</script>








