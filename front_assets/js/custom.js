/* Add your custom JavaScript code */

$(document).ready(function () {

    function rightStickyBar() {
        var $toolType = "";

        var $rightSticky = $(".rightSticky")
        var $embedVideo=$("#embededVideo");
        $(document).on("click", ".rightSticky ul li,.rightSticykPopup .open > .dropdown-menu li a,.rightSticykPopup .header .rightTool i,.toolboxCustomDrop li a,.sticky_resources_open", function () {
            if(window.innerWidth<=601){
                $(".rightSticykPopup").css("display","none");

            }

            $toolType = $(this).data("type");
            var $toolType2 = $(this).data("type2");
            var screen = $rightSticky.data("screen");



            if($toolType2=="off"){
                $(".rightSticykPopup").css("display","none");
                $toolType = $(this).parent().data("type");

            }
            $(".rightSticykPopup .header>span").text("Toolbox");

            $("." + $toolType).css("display", "")



            if($toolType=="messagesSticky"){
                $(this).find(".notify").addClass("displayNone");
                var $messagesContent=$('.messagesSticky .content .messages');
                $($messagesContent).scrollTop($($messagesContent)[0].scrollHeight);
            }


            //for mobile
            if(window.innerWidth<=601){
                $embedVideo.css("height","50vh");
            }else{
                $rightSticky.css("display", "none");

                var $screenWidth = $(document).width();
                var rightStickyWidth=390;
                if(screen=="customer")rightStickyWidth=320;
                else if(screen=="admin")rightStickyWidth=400;
                $screenWidth = $screenWidth - rightStickyWidth;

                $(".videContent,.main-content").animate({
                    marginRight: '40%',
                    width: `${$screenWidth}px`
                })
            }
        })

        $(document).on("click", ".rightSticykPopup .header .rightTool i", function () {
            $(".rightSticykPopup").css("display","none");
            if(window.innerWidth<=601){
                $embedVideo.css("height","92vh");

            }else {
                $rightSticky.css("display", "");

                $(".videContent,.main-content").animate({
                    marginRight: 0,
                    width: '100%'
                })
            }



        })
    }

    rightStickyBar()

})