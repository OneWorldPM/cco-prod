// UniqueID = PubNub.generateUUID()
// //console.log("CLIENT BROWSER UUID: ", UniqueID)
// document.write("Your Client's UUID is: ", UniqueID);

var playerList = [];
pubnub = new PubNub({
    publishKey: pubnub_publishKey,
    subscribeKey: pubnub_subscribeKey,
    uuid: user_id,
});
// Subscribe to the two PubNub Channels
pubnub.subscribe({
    channels: [pubnub_channel],
    withPresence: true,
});
listener = {
    status(response) {
        if (response.category === "PNConnectedCategory") {
            hereNow(response.affectedChannels);
        }
    },
    message(response) {
    },
    presence(response) {
        if (response.action === "join") {
            for(i=0; i < response.occupancy; i++){
                if(response.uuid !== undefined){
                    var uuidMatchJoin = playerList.indexOf(response.uuid);
                    //console.log("UUID ARRAY INDEX: ", uuidMatchJoin, "UUID: ", response.uuid);
                    if(uuidMatchJoin === -1){
                        playerList[playerList.length] = response.uuid;
                        //console.log("Insert ", response.uuid, "in array" );
                    } else {
                        //console.log("UUID: ", response.uuid, "is already in the array");
                    }
                }
            }
        }
        if (response.action === "interval"){
            //console.log("interval response: ", response)
            if(response.join !== undefined){
                for(i=0; i < response.occupancy; i++){
                    if(response.join[i] !== undefined){
                        var uuidMatchIntervalJoin = playerList.indexOf(response.join[i]);
                        if(uuidMatchIntervalJoin === -1){
                            //console.log("Interval Add UUID: ", uuidMatchIntervalJoin);
                            playerList[playerList.length] = response.join[i];
                        }
                    }
                }
            }
            if(response.leave !== undefined){
                for(i=0; i < response.occupancy; i++){
                    var uuidMatchIntervalLeave = playerList.indexOf(response.leave[i]);
                    if(uuidMatchIntervalLeave > -1){
                        //console.log("REMOVE PLAYER FROM ARRAY", uuidMatchIntervalLeave);
                        playerList.splice(uuidMatchIntervalLeave, 1);
                    }
                }
            }
        }
        if(response.action === "leave") {
            for(i=0; i < response.occupancy; i++){
                var uuidMatchLeave = playerList.indexOf(response.uuid);
                if(uuidMatchLeave > -1){
                    //console.log("REMOVE PLAYER FROM ARRAY", uuidMatchLeave, "with UUID: ", response.uuid);
                    playerList.splice(uuidMatchLeave, 1);
                }
            }
        }
        //console.log("Presence UUIDs:", playerList);
    },
}
pubnub.addListener(listener);


function hereNow(channels) {
    for (i in channels) {
        var channel = channels[i];
        pubnub.hereNow(
            {
                channel: channel,
                includeUUIDs: true,
                includeState: false
            },
            function (status, response) {

                if(response !== undefined)
                {
                    //console.log("hereNow Response: ", response);
                    for(i=0; i < response.totalOccupancy; i++){
                        playerList[i] = response.channels.pubnub_channel.occupants[i].uuid;
                    }
                    //console.log("hereNow UUIDs: ", playerList);
                }
            });
    }
}
// If person leaves or refreshes the window, run the unsubscribe function
onbeforeunload = function() {
    globalUnsubscribe();
    $.ajax({
        // Query to server to unsub sync
        async:false,
        method: "GET",
        url: "https://pubsub.pubnub.com/v2/presence/sub-key/mySubscribeKey/channel/"+pubnub_channel+"/leave?uuid=" + encodeURIComponent(user_id)
    }).done(function(jqXHR, textStatus) {
        ////console.log( "Request done: " + textStatus );
    }).fail(function( jqXHR, textStatus ) {
        ////console.log( "Request failed: " + textStatus );
    });
    return null;
}
// Unsubscribe people from PubNub network
globalUnsubscribe = function () {
    try {
        pubnub.unsubscribe({
            channels: [pubnub_channel]
        });
        pubnub.removeListener(listener);
    } catch (err) {
        //console.log("Failed to UnSub");
    }
};
