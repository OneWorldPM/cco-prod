var fs = document.getElementById('btnFS');

fs.addEventListener('click', goFullScreen);

document.getElementById('embededVideo').addEventListener('fullscreenchange', (event) => {
    // document.fullscreenElement will point to the element that
    // is in fullscreen mode if there is one. If there isn't one,
    // the value of the property is null.
    if (document.fullscreenElement) {
        console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
    } else {
        console.log('Leaving full-screen mode.');
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
        $('#btnFS').css('margin-left', '-1975px');
        $('#btnFS').css('margin-top', '2500px');
        $('#btnFS').css('padding-bottom', '66px');
        $('#btnFS').css('padding-top', '60px');
        $('#btnFS').css('padding-left', '20px');
    }
    else if ($(window).width() < 4200 && $(window).width() > 2500) {
        $('#btnFS').css('margin-left', '-1125px');
        $('#btnFS').css('margin-top', '1480px');
        $('#btnFS').css('padding-bottom', '70px');
        $('#btnFS').css('padding-top', '45px');
        $('#btnFS').css('padding-left', '20px');
    }
    else if ($(window).width() < 2500 && $(window).width() > 1900) {
        $('#btnFS').css('margin-left', '-805px');
        $('#btnFS').css('margin-top', '1085px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '50px');
        $('#btnFS').css('padding-left', '20px');
    }
    else if ($(window).width() < 1900 && $(window).width() > 1600) {
        $('#btnFS').css('margin-left', '-655px');
        $('#btnFS').css('margin-top', '905px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '50px');
        $('#btnFS').css('padding-left', '20px');
    }
    else if ($(window).width() < 1600 && $(window).width() > 1400) {
        $('#btnFS').css('margin-left', '-550px');
        $('#btnFS').css('margin-top', '775px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '50px');
        $('#btnFS').css('padding-left', '20px');
    }
    else{
        $('#btnFS').css('margin-left', '-485px');
        $('#btnFS').css('margin-top', '700px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '50px');
        $('#btnFS').css('padding-left', '20px');
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
        $('#btnFS').css('margin-left', '-475px');
        $('#btnFS').css('margin-top', '668px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '25px');
        $('#btnFS').css('padding-left', '30px');
    }
    else if ($(window).width() < 4200 && $(window).width() > 2500) {
        $('#btnFS').css('margin-left', '-475px');
        $('#btnFS').css('margin-top', '645px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '50px');
        $('#btnFS').css('padding-left', '20px');
    }
    else if ($(window).width() < 2500 && $(window).width() > 1900) {
        $('#btnFS').css('margin-left', '-480px');
        $('#btnFS').css('margin-top', '645px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '50px');
        $('#btnFS').css('padding-left', '20px');
    }
    else if ($(window).width() < 1900 && $(window).width() > 1600) {
        $('#btnFS').css('margin-left', '-485px');
        $('#btnFS').css('margin-top', '635px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '50px');
        $('#btnFS').css('padding-left', '20px');
    }
    else if ($(window).width() < 1600 && $(window).width() > 1400) {
        $('#btnFS').css('margin-left', '-485px');
        $('#btnFS').css('margin-top', '640px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '50px');
        $('#btnFS').css('padding-left', '20px');
    }
    else{
        $('#btnFS').css('margin-left', '-490px');
        $('#btnFS').css('margin-top', '645px');
        $('#btnFS').css('padding-bottom', '20px');
        $('#btnFS').css('padding-top', '50px');
        $('#btnFS').css('padding-left', '20px');
    }

    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    }
}

// $("#embededVideo").children("iframe").on("load", function () {
//     console.log($("#embededVideo").children("iframe").contents());
// });

$('#modal').on('shown.bs.modal', function () {
    $(".modal-backdrop.in").hide();
})
