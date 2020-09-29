<?php 
function getAppName($uri,$id){
    $localName="";

    return $localName?$localName.$id:$uri.$id;
}
function getSocketUrl(){
    $localName="";

    return $localName?$localName:"https://socket.yourconference.live:443";
}