/* Add your custom JavaScript code */

$(document).ready(function () {

    function rightStickyBar() {
        var $toolType = "";

        var $rightSticky = $(".rightSticky")

        // $(document).on("keyup", "#questions", function () {
        //     if (event.keyCode === 13) {
        //         // Cancel the default action, if needed
        //         event.preventDefault();
        //         // Trigger the button element with a click
        //         document.getElementById("ask_questions_send").click();
        //
        //     }
        // })
        $(document).on("click", ".rightSticky ul li,.rightSticykPopup .open > .dropdown-menu li a,.rightSticykPopup .header .rightTool i", function () {
            $toolType = $(this).data("type");
            var $toolType2 = $(this).data("type2");

            if($toolType2=="off"){
                $(".rightSticykPopup").css("display","none");
                $toolType = $(this).parent().data("type");


            }

            $("." + $toolType).css("display", "")
            $rightSticky.css("display", "none");




            var $screenWidth = $(document).width();
            $screenWidth = $screenWidth - 400;
            $(".videContent,.main-content").animate({
                marginRight: '40%',
                width: `${$screenWidth}px`
            })
        })

        $(document).on("click", ".rightSticykPopup .header .rightTool i", function () {
            $(".rightSticykPopup").css("display","none");
            $rightSticky.css("display", "");


            // $(".videContent").css("width", "auto");
            $(".videContent,.main-content").animate({
                marginRight: 0,
                width: '100%'
            })

        })
    }

    rightStickyBar()

})