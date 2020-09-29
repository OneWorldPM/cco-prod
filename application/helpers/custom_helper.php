<?php 
function getAppName($uri,$id){
    // $localName="test";
    $localName="";

    if($localName){
        return $localName.$id;
    }else{
        return $uri->segment(0).$id;
    }

}
function getSocketUrl(){
    // $localName="https://127.0.0.1:3080";
    $localName="";

    return $localName?$localName:"https://socket.yourconference.live:443";
}