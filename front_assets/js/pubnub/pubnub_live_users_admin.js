//console.log("PubNub Init");
var playerList = [];
pubnub = new PubNub({
    publishKey: pubnub_publishKey,
    subscribeKey: pubnub_subscribeKey,
    uuid: 'admin',
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
        console.log("presence response - per session:");
        console.log(response);
        if (response.occupancy > 1)
            $('#totalAttendeeOnThisSession').text((response.occupancy)-1);
        else
            $('#totalAttendeeOnThisSession').text(0);

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
        console.log("Presence UUIDs:", playerList);

        let totalAttendees = 0;
        if (playerList.length > 1)
            totalAttendees = ((playerList.length)-1) // -1 to remove admin from the list

        //$('#totalAttendeeOnThisSession').text(totalAttendees);
    },
}
pubnub.addListener(listener);


function hereNow(channels) {
    //console.log(channels);

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
                    console.log("hereNow Response: ", response);
                    if (response.channels[pubnub_channel].occupancy > 1)
                        $('#totalAttendeeOnThisSession').text((response.channels[pubnub_channel].occupancy)-1);
                    else
                        $('#totalAttendeeOnThisSession').text(0);
                    // for(i=0; i < response.channels.pubnub_channel.occupancy; i++){
                    //     playerList[i] = response.channels.pubnub_channel.occupants[i].uuid;
                    // }
                    //console.log("hereNow UUIDs: ", playerList);
                }
            });
    }
}
