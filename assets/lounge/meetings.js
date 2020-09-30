$(function() {

    listMeetings();

    var newMeetingSelectedAttendees = [];

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

    $('.lounge-meetings-btn').on('click', function () {
        $('#meetings-modal').modal('show');
    });

    $('.lounge-new-meeting-btn').on('click', function () {
        $('#new-meeting-modal').modal('show');
    });

    $('.attendees-search').on('input', function() {
        var searchTerm = $(this).val();

        if (searchTerm == '')
            return;

        $.get( base_url+"Lounge/searchAttendees/"+searchTerm, function(result) {
            result = JSON.parse(result);

            if (result.length == 0)
                return;

            $('.attendees-suggestions').html('');
            $.each( result, function( row, user ) {

                var fullname = user.first_name+' '+user.last_name;
                if (fullname == ' ')
                {
                    var fullname = 'Name Unavailable';
                }
                var nameAcronym = fullname.match(/\b(\w)/g).join('');
                var color = md5(nameAcronym+user.cust_id).slice(0, 6);
                var userAvatarSrc = (user.profile != '' && user.profile != null)?'uploads/customer_profile/'+user.profile:'https://placehold.it/50/'+color+'/fff&amp;text='+nameAcronym;
                var userAvatarAlt = 'https://placehold.it/50/'+color+'/fff&amp;text='+nameAcronym;

                $('.attendees-suggestions').append(
                    '<li class="attendees-suggestions-item list-group-item" attendee-id="'+user.cust_id+'" attendee-name="'+user.first_name+' '+user.last_name+'" userAvatarAlt="'+userAvatarAlt+'"><img src="'+userAvatarSrc+'" alt="User Avatar" onerror=this.src="'+userAvatarAlt+'" class="img-circle"> '+user.first_name+' '+user.last_name+' </li>'
                );
            });

        });
    });


    $(".attendees-suggestions").on('click', '.attendees-suggestions-item',function () {
        var id = $(this).attr('attendee-id');
        var name = $(this).attr('attendee-name');
        var userAvatarSrc = $(this).children("img").attr('src');
        var userAvatarAlt = $(this).attr('userAvatarAlt');

        if (id == user_id)
        {
            toastr["warning"]("You are the host, you can't add yourself as an attendee!");
            return;
        }

        $('.selected-attendees-list').append(
            '<div class="selected-attendees-item" attendee-id="'+id+'"><img src="'+userAvatarSrc+'" alt="User Avatar" onerror=this.src="'+userAvatarAlt+'" class="img-circle"> '+name+' <i class="remove-attendee fa fa-times" attendee-id="'+id+'" aria-hidden="true" style="color: #c60d0d;"></i></div>'
        );

        addAttendee(newMeetingSelectedAttendees, id);

        $('.attendees-suggestions').html('');
        $('.attendees-search').val('');

    });

    $(".selected-attendees-list").on('click', '.remove-attendee',function () {
        var id = $(this).attr('attendee-id');

        $('.selected-attendees-item[attendee-id="'+id+'"]').remove();
        removeAttendee(newMeetingSelectedAttendees, id)
    });


    $('.create-meeting').on('click', function () {

        var topic = $('.meeting-topic').val();
        var from = $('.meeting-from').val();
        var to = $('.meeting-to').val();

        if (topic == ''){
            toastr["warning"]("Please enter a meeting topic!");
            return;
        }

        if (from == ''){
            toastr["warning"]("Please choose a starting time!");
            return;
        }

        if (to == ''){
            toastr["warning"]("Please choose an ending time!");
            return;
        }

        if (newMeetingSelectedAttendees.length == 0){
            toastr["warning"]("You need to add at least one attendee!");
            return;
        }

        $.post(base_url+"Lounge/newMeeting",
            {
                'topic': topic,
                'from': from,
                'to': to,
                'attendees': newMeetingSelectedAttendees
            },
            function(data, status){
                if(status == 'success')
                {
                    data = JSON.parse(data);

                    if (data.status == 'success')
                    {
                        Swal.fire(
                            'Done!',
                            'Your meeting has been scheduled and invites are sent!',
                            'success'
                        );

                        listMeetings();

                        $('#new-meeting-modal').modal('hide');

                        $('.attendees-suggestions').html('');
                        $('.attendees-search').val('');
                        $('.selected-attendees-list').html('');
                        $('.meeting-topic').val('');
                        $('.meeting-from').val('');
                        $('.meeting-to').val('');
                    }

                }else{
                    toastr["error"]("Network problem!");
                }
            });


    });
});



function listMeetings() {

    $.get( base_url+"Lounge/getMeetings/"+user_id, function(result) {
        result = JSON.parse(result);

        if (result.length == 0)
            return;

        $('.meetings-table-items').html('');

        $.each( result, function( row, meeting ) {
            $('.meetings-table-items').append(
                '<tr>\n' +
                '  <td>'+meeting.topic+'</td>\n' +
                '  <td>'+meeting.host_name+'</td>\n' +
                '  <td>'+meeting.meeting_from+'</td>\n' +
                '  <td>'+meeting.meeting_to+'</td>\n' +
                '  <td>' +
                '<button class="btn btn-xs btn-warning">Attendees</button>' +
                '<button class="meeting-room-btn btn btn-xs btn-info" meeting-id="'+meeting.id+'">Meeting Room</button>' +
                '</td>\n' +
                '</tr>'
            );
        });

        $('#meetings_table').DataTable();
    });


    $(".meetings-table-items").on('click', '.meeting-room-btn', function () {
        var meeting_id = $(this).attr('meeting-id');
        var win = window.open(base_url+'lounge/meet/'+meeting_id, '_blank');
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            toastr["error"]("Please allow popups for this website");
        }
    });

}

function addAttendee(newMeetingSelectedAttendees, attendee) {
    newMeetingSelectedAttendees.push(attendee);
    return newMeetingSelectedAttendees;
}

function removeAttendee(newMeetingSelectedAttendees, attendee) {
    var index = newMeetingSelectedAttendees.indexOf(attendee);
    if (index > -1) {
        newMeetingSelectedAttendees.splice(index, 1);
    }
    return newMeetingSelectedAttendees;
}
