<?php 
function getAppName($id){
    // $localName="test";
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
    // $localName="https://127.0.0.1:3080";
    $localName="";

    return $localName?$localName:"https://socket.yourconference.live:443";
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