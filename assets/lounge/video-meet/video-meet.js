var localVideo;
var firstPerson = false;
var socketCount = 0;
var socketId;
var localStream;
var connections = [];

var config = {'host': 'https://socket.yourconference.live'};

var ROUND_TABLE = 'cco_lounge_meeting_room_'+round_table_id;

var peerConnectionConfig = {
    'iceServers': [
        { 'urls': 'stun:stun.l.google.com:19302' },
        { 'urls': 'stun:stun1.l.google.com:19302' },
        {
            url: 'turn:numb.viagenie.ca',
            credential: 'muazkh',
            username: 'webrtc@live.com'
        },
        {
            url: 'turn:192.158.29.39:3478?transport=udp',
            credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
            username: '28224511:1379330808'
        }
    ]
};

function pageReady() {

    localVideo = document.getElementById('localVideo');

    var constraints = {
        video: true,
        audio: true,
    };

    if(navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia(constraints)
            .then(getUserMediaSuccess)
            .then(function(){

                socket = io.connect(config.host, {secure: true});
                socket.emit('joinRoundTable', ROUND_TABLE, user_name, user_id);
                socket.on('signal', gotMessageFromServer);

                socket.on('joinRoundTable', function(){
                    console.log('connected with id:'+socket.id);

                    socketId = socket.id;

                    socket.on('user-left-roundtable', function(id){
                        var video = document.querySelector('[data-socket="'+ id +'"]');
                        if(video == null)
                            return;
                        var parentDiv = video.parentElement;
                        video.parentElement.parentElement.removeChild(parentDiv);
                    });


                    socket.on('user-joined-roundtable', function(id, count, clients, table, attendees_list){
                        if (table != ROUND_TABLE)
                            return;
                        clients.forEach(function(socketListId) {
                            if(!connections[socketListId]){
                                connections[socketListId] = new RTCPeerConnection(peerConnectionConfig);
                                //Wait for their ice candidate
                                connections[socketListId].onicecandidate = function(event){
                                    if(event.candidate != null) {
                                        console.log('SENDING ICE');
                                        socket.emit('signal', socketListId, JSON.stringify({'ice': event.candidate}));
                                    }
                                }

                                //Wait for their video stream
                                connections[socketListId].onaddstream = function(event){
                                    gotRemoteStream(event, socketListId, attendees_list[socketListId])
                                }

                                //Add the local video stream
                                connections[socketListId].addStream(localStream);
                            }
                        });

                        //Create an offer to connect with your local description

                        if(count >= 2){
                            connections[id].createOffer().then(function(description){
                                connections[id].setLocalDescription(description).then(function() {
                                    // console.log(connections);
                                    socket.emit('signal', id, JSON.stringify({'sdp': connections[id].localDescription}));
                                }).catch(e => console.log(e));
                            });
                        }
                    });
                })

            });
    } else {
        alert('Your browser does not support getUserMedia API');
    }
}

function getUserMediaSuccess(stream) {
    localStream = stream;

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
    navigator.getUserMedia({
        'audio': false,
        'video': true
    }, function (stream) {
        localVideo.srcObject = stream;
    }, logError);
}

function gotRemoteStream(event, id, attendee) {

    if(id == socketId)
        return;

    console.log(attendee['name']);

    var videos = document.querySelectorAll('camera-feeds'),
        video  = document.createElement('video'),
        div    = document.createElement('div'),
        nameTag = document.createElement('span'),
        fullscreenBtn = document.createElement('span');

    div.setAttribute('class', 'col-md-3');
    nameTag.setAttribute('class', 'name-tag');
    nameTag.innerHTML = attendee['name'];
    fullscreenBtn.setAttribute('class', 'fullscreen-btn');
    fullscreenBtn.innerHTML = '<i class="fa fa-arrows" aria-hidden="true" style="border: 1px solid;"></i>';
    video.setAttribute('data-socket', id);
    video.setAttribute('width', '100%');
    video.srcObject   = event.stream;
    video.autoplay    = true;
    //video.muted       = true;
    video.playsinline = true;

    div.appendChild(video);
    div.appendChild(nameTag);
    div.appendChild(fullscreenBtn);
    document.querySelector('.camera-feeds').prepend(div);
}

function gotMessageFromServer(fromId, message) {

    //Parse the incoming signal
    var signal = JSON.parse(message)

    //Make sure it's not coming from yourself
    if(fromId != socketId) {

        if(signal.sdp){
            connections[fromId].setRemoteDescription(new RTCSessionDescription(signal.sdp)).then(function() {
                if(signal.sdp.type == 'offer') {
                    connections[fromId].createAnswer().then(function(description){
                        connections[fromId].setLocalDescription(description).then(function() {
                            socket.emit('signal', fromId, JSON.stringify({'sdp': connections[fromId].localDescription}));
                        }).catch(e => console.log(e));
                    }).catch(e => console.log(e));
                }
            }).catch(e => console.log(e));
        }

        if(signal.ice) {
            connections[fromId].addIceCandidate(new RTCIceCandidate(signal.ice)).catch(e => console.log(e));
        }
    }
}

function logError(error) {
    displaySignalMessage(error.name + ': ' + error.message);
}

$('.camera-feeds').on('click', 'span.fullscreen-btn', function () {

    // if already full screen; exit
    // else go fullscreen
    if (
        document.fullscreenElement ||
        document.webkitFullscreenElement ||
        document.mozFullScreenElement ||
        document.msFullscreenElement
    ) {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }

        $(this).parent().children('.fullscreen-btn-fullscreen').eq(0).html('<i class="fa fa-arrows" aria-hidden="true" style="border: 1px solid;"></i>');
        $(this).parent().children('.fullscreen-btn-fullscreen').eq(0).removeClass('nametag-fullscreen');

    } else {
        element = $(this).parent().get(0);
        if (element.requestFullscreen) {
            element.requestFullscreen();
        } else if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (element.msRequestFullscreen) {
            element.msRequestFullscreen();
        }

        $(this).parent().children('.name-tag').eq(0).addClass('nametag-fullscreen');

        $(this).parent().children('.fullscreen-btn').eq(0).addClass('fullscreen-btn-fullscreen');
        $(this).parent().children('.fullscreen-btn').eq(0).html('<i class="fa fa-compress fa-2x" aria-hidden="true" style="border: 1px solid;"></i>');

    }
});

$(document).bind('fullscreenchange webkitfullscreenchange mozfullscreenchange msfullscreenchange', function (e) {
    var fullscreenElement = document.fullscreenElement || document.webkitFullscreenElement || document.mozFullscreenElement || document.msFullscreenElement;

    if (!fullscreenElement) {
        //console.log('Leaving full-screen mode...');
        $('.nametag-fullscreen').removeClass('nametag-fullscreen');

        $('.fullscreen-btn-fullscreen').html('<i class="fa fa-arrows" aria-hidden="true" style="border: 1px solid;"></i>');
        $('.fullscreen-btn-fullscreen').removeClass('fullscreen-btn-fullscreen');
    } else {
        //console.log('Entering full-screen mode...');
    }
});
