// UniqueID = PubNub.generateUUID()
// //console.log("CLIENT BROWSER UUID: ", UniqueID)
// document.write("Your Client's UUID is: ", UniqueID);
var playerListTotal = [];
pubnub_total = new PubNub({
    publishKey: pubnub_publishKey,
    subscribeKey: pubnub_subscribeKey,
    uuid: attendee_id,
});
// Subscribe to the two PubNub Channels
pubnub_total.subscribe({
    channels: [pubnub_channel_total],
    withPresence: true,
});
listener_total = {
    status(response) {
        if (response.category === "PNConnectedCategory") {
            hereNowTotal(response.affectedChannels);
        }
    },
    message(response) {
    },
    presence(response) {
        if (response.action === "join") {
            for(i=0; i < response.occupancy; i++){
                if(response.uuid !== undefined){
                    var uuidMatchJoin = playerListTotal.indexOf(response.uuid);
                    //console.log("UUID ARRAY INDEX: ", uuidMatchJoin, "UUID: ", response.uuid);
                    if(uuidMatchJoin === -1){
                        playerListTotal[playerListTotal.length] = response.uuid;
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
                        var uuidMatchIntervalJoin = playerListTotal.indexOf(response.join[i]);
                        if(uuidMatchIntervalJoin === -1){
                            //console.log("Interval Add UUID: ", uuidMatchIntervalJoin);
                            playerListTotal[playerListTotal.length] = response.join[i];
                        }
                    }
                }
            }
            if(response.leave !== undefined){
                for(i=0; i < response.occupancy; i++){
                    var uuidMatchIntervalLeave = playerListTotal.indexOf(response.leave[i]);
                    if(uuidMatchIntervalLeave > -1){
                        //console.log("REMOVE PLAYER FROM ARRAY", uuidMatchIntervalLeave);
                        playerListTotal.splice(uuidMatchIntervalLeave, 1);
                    }
                }
            }
        }
        if(response.action === "leave") {
            for(i=0; i < response.occupancy; i++){
                var uuidMatchLeave = playerListTotal.indexOf(response.uuid);
                if(uuidMatchLeave > -1){
                    //console.log("REMOVE PLAYER FROM ARRAY", uuidMatchLeave, "with UUID: ", response.uuid);
                    playerListTotal.splice(uuidMatchLeave, 1);
                }
            }
        }
        //console.log("Presence UUIDs:", playerListTotal);
    },
}
pubnub_total.addListener(listener_total);


function hereNowTotal(channels) {
    for (i in channels) {
        var channel = channels[i];
        pubnub_total.hereNow(
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
                        playerListTotal[i] = response.channels.pubnub_channel_total.occupants[i].uuid;
                    }
                    //console.log("hereNow UUIDs: ", playerListTotal);
                }
            });
    }
}
// If person leaves or refreshes the window, run the unsubscribe function
onbeforeunload = function() {
    globalUnsubscribeTotal();
    $.ajax({
        // Query to server to unsub sync
        async:false,
        method: "GET",
        url: "https://pubsub.pubnub.com/v2/presence/sub-key/mySubscribeKey/channel/"+pubnub_channel_total+"/leave?uuid=" + encodeURIComponent(attendee_id)
    }).done(function(jqXHR, textStatus) {
        ////console.log( "Request done: " + textStatus );
    }).fail(function( jqXHR, textStatus ) {
        ////console.log( "Request failed: " + textStatus );
    });
    return null;
}
// Unsubscribe people from PubNub network
globalUnsubscribeTotal = function () {
    try {
        pubnub_total.unsubscribe({
            channels: [pubnub_channel_total]
        });
        pubnub_total.removeListener(listener_total);
    } catch (err) {
        //console.log("Failed to UnSub");
    }
};
