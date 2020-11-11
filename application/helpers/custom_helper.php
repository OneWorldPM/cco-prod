<?php 
function getAppName($id){
//     $localName="test";
    $localName="";

    
    if($localName){
        return $localName.$id;
    }else{
        $fullUrl= current_url();
        $fullUrl=explode("/",$fullUrl);
        return $fullUrl[3].$id;
    }

}
function getSocketUrl(){
//     $localName="https://127.0.0.1:3080/";
    $localName="";

    return $localName?$localName:"https://socket.yourconference.live:443";
}
function getSocketScript(){
//    $localName="local";
    $localName="";

    if($localName=="local"){
        ?>
        <script src="https://localhost:3080/socket.io/socket.io.js" type="text/javascript"></script>
        <script>
            let socket = io("<?=getSocketUrl()?>",{transports: ['websocket', 'polling', 'flashsocket']});
        </script>
        <?php
    }else{
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha512-v8ng/uGxkge3d1IJuEo6dJP8JViyvms0cly9pnbfRxT6/31c3dRWxIiwGnMSWwZjHKOuY3EVmijs7k1jz/9bLA==" crossorigin="anonymous"></script>
        <script>
            let socket = io("<?=getSocketUrl()?>");
        </script>
        <?php
    }
}


function sessionRightBarControl($right_bar, $control, $text="success")
{
    $par = "";
    if ($right_bar) {
        $right_bar = explode(",", $right_bar);

        foreach ($right_bar as $value) {
            if ($value == $control) {
                $par = $text;
                break;
            }
        }

    }

    return $par;
}