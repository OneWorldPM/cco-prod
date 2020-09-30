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