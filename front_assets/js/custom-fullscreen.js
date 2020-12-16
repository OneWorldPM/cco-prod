var fs = document.getElementById('btnFS');

fs.addEventListener('click', goFullScreen);

document.getElementById('embededVideo').addEventListener('fullscreenchange', (event) => {
    // document.fullscreenElement will point to the element that
    // is in fullscreen mode if there is one. If there isn't one,
    // the value of the property is null.
    if (document.fullscreenElement) {
        $("#btnFS").attr("class","glyphicon glyphicon-resize-small");
        $("#btnFS").attr("data-original-title","Exit Full Screen");
        $("iframe").removeClass("embed-responsive-item");
        console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
    } else {
        console.log('Leaving full-screen mode.');
        $("#btnFS").attr("class","glyphicon glyphicon-resize-full");
        $("#btnFS").attr("data-original-title","Full Screen");
        $("iframe").addClass("embed-responsive-item");

        exitFullscreen();
        var iframe = document.getElementById('embededVideo').getElementsByTagName("iframe")[0];
        iframe.setAttribute("width", "1280");
        iframe.setAttribute("height", "720");
    }
});

function goFullScreen() {
    var iframe = document.getElementById('embededVideo').getElementsByTagName("iframe")[0];
    iframe.setAttribute("width", "100%");
    iframe.setAttribute("height", "100%");
    // var fs = document.getElementById('btnFS');
    // fs.style.marginTop = "1118px";
    if ($(window).width() > 4200) {
        $('#btnFS').css('margin-left', '2074px !important');
        $('#btnFS').css('margin-top', '2500px !important');
        $('#btnFS').css('padding-bottom', '66px !important');
        $('#btnFS').css('padding-top', '60px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }
    else if ($(window).width() < 4200 && $(window).width() > 2500) {
        $('#btnFS').css('margin-left', '1185px !important');
        $('#btnFS').css('margin-top', '1480px !important');
        $('#btnFS').css('padding-bottom', '70px !important');
        $('#btnFS').css('padding-top', '45px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }
    else if ($(window).width() < 2500 && $(window).width() > 1900) {
        $('#btnFS').css('margin-left', '852px !important');
        $('#btnFS').css('margin-top', '1085px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '50px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }
    else if ($(window).width() < 1900 && $(window).width() > 1600) {
        $('#btnFS').css('margin-left', '698px !important');
        $('#btnFS').css('margin-top', '905px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '50px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }
    else if ($(window).width() < 1600 && $(window).width() > 1400) {
        $('#btnFS').css('margin-left', '586px !important');
        $('#btnFS').css('margin-top', '775px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '50px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }
    else{
        $('#btnFS').css('margin-left', '518px !important');
        $('#btnFS').css('margin-top', '700px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '50px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }

    var fullscreenElement = document.fullscreenElement || document.mozFullScreenElement ||
        document.webkitFullscreenElement || document.msFullscreenElement;
    if(fullscreenElement){
        exitFullscreen();
    }else {
        launchIntoFullscreen(document.getElementById('embededVideo'));
    }

}

// From https://davidwalsh.name/fullscreen
// Find the right method, call on correct element
function launchIntoFullscreen(element) {
    if (element.requestFullscreen) {
        element.requestFullscreen();
    } else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
    } else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen();
    } else if (element.msRequestFullscreen) {
        element.msRequestFullscreen();
    }
}

// Whack fullscreen
function exitFullscreen() {
    var iframe = document.getElementById('embededVideo').getElementsByTagName("iframe")[0];
    iframe.setAttribute("width", "1280");
    iframe.setAttribute("height", "720");
    if ($(window).width() > 4200) {
        $('#btnFS').css('margin-left', '535px !important');
        $('#btnFS').css('margin-top', '668px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '25px !important');
        $('#btnFS').css('padding-left', '30px !important');
    }
    else if ($(window).width() < 4200 && $(window).width() > 2500) {
        $('#btnFS').css('margin-left', '535 !important');
        $('#btnFS').css('margin-top', '645px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '50px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }
    else if ($(window).width() < 2500 && $(window).width() > 1900) {
        $('#btnFS').css('margin-left', '530px !important');
        $('#btnFS').css('margin-top', '645px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '50px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }
    else if ($(window).width() < 1900 && $(window).width() > 1600) {
        $('#btnFS').css('margin-left', '525px !important');
        $('#btnFS').css('margin-top', '635px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '50px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }
    else if ($(window).width() < 1600 && $(window).width() > 1400) {
        $('#btnFS').css('margin-left', '523px !important');
        $('#btnFS').css('margin-top', '640px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '50px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }
    else{
        $('#btnFS').css('margin-left', '520px !important');
        $('#btnFS').css('margin-top', '645px !important');
        $('#btnFS').css('padding-bottom', '20px !important');
        $('#btnFS').css('padding-top', '50px !important');
        $('#btnFS').css('padding-left', '20px !important');
    }

    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    }
}
