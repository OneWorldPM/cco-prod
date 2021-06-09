//console.log("PubNub Init");
var playerList_Total = [];
pubnub_total = new PubNub({
    publishKey: pubnub_publishKey,
    subscribeKey: pubnub_subscribeKey,
    uuid: 'admin',
});

// Subscribe to the two PubNub Channels
pubnub_total.subscribe({
    channels: [pubnub_channel_total],
    withPresence: true,
});

let channels = '';

listener_total = {
    status(response) {
        if (response.category === "PNConnectedCategory" || 1==1) {
            hereNowTotal(response.affectedChannels);
            channels = response.affectedChannels;
        }
    },
    message(response) {
    },
    presence(response) {
        console.log("presence response:");
        console.log(response);

        if (response.occupancy > 1)
            $('#online-users-count').text((response.occupancy)-1);
        else
            $('#online-users-count').text(0);

        if (response.action === "join") {
            for(i=0; i < response.occupancy; i++){
                if(response.uuid !== undefined){
                    var uuidMatchJoin = playerList_Total.indexOf(response.uuid);
                    //console.log("UUID ARRAY INDEX: ", uuidMatchJoin, "UUID: ", response.uuid);
                    if(uuidMatchJoin === -1){
                        playerList_Total[playerList_Total.length] = response.uuid;
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
                        var uuidMatchIntervalJoin = playerList_Total.indexOf(response.join[i]);
                        if(uuidMatchIntervalJoin === -1){
                            //console.log("Interval Add UUID: ", uuidMatchIntervalJoin);
                            playerList_Total[playerList.length] = response.join[i];
                        }
                    }
                }
            }
            if(response.leave !== undefined){
                for(i=0; i < response.occupancy; i++){
                    var uuidMatchIntervalLeave = playerList_Total.indexOf(response.leave[i]);
                    if(uuidMatchIntervalLeave > -1){
                        //console.log("REMOVE PLAYER FROM ARRAY", uuidMatchIntervalLeave);
                        playerList_Total.splice(uuidMatchIntervalLeave, 1);
                    }
                }
            }
        }
        if(response.action === "leave") {
            for(i=0; i < response.occupancy; i++){
                var uuidMatchLeave = playerList_Total.indexOf(response.uuid);
                if(uuidMatchLeave > -1){
                    //console.log("REMOVE PLAYER FROM ARRAY", uuidMatchLeave, "with UUID: ", response.uuid);
                    playerList_Total.splice(uuidMatchLeave, 1);
                }
            }
        }
        //console.log("Presence UUIDs:", playerList);

        let totalAttendees = 0;
        if (playerList_Total.length > 1)
            totalAttendees = ((playerList_Total.length)-1) // -1 to remove admin from the list

        //$('#online-users-count').text(totalAttendees);
    },
}
pubnub_total.addListener(listener_total);


function hereNowTotal(channels) {
    //console.log(channels);

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
                    console.log("hereNow Response: ", response);

                    if (response.channels[pubnub_channel_total].occupancy > 1)
                        $('#online-users-count').text((response.channels[pubnub_channel_total].occupancy)-1);
                    else
                        $('#online-users-count').text(0);
                    // for(i=0; i < response.channels.GME_Total.occupancy; i++){
                    //     playerList_Total[i] = response.channels.GME_Total.occupants[i].uuid;
                    // }
                    // //console.log("hereNow UUIDs: ", playerList_Total);
                    // $('#online-users-count').text(response.channels.GME_Total.occupancy);
                }
            });
    }
}

setInterval(hereNowTotal(channels),1000);
