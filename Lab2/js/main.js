/*

Filip Stenegren fist2000 
Lab 2

*/
// startsida för api https://api.sr.se/api/documentation/v2/index.html
// bra sida https://developer.mozilla.org/en-US/docs/Web/API

"use strict";

var baseURL = "https://api.sr.se/api/v2/";
var ljudURL = "https://sverigesradio.se/topsy/direkt/srapi/";
var playlistURL = "https://api.sr.se/api/v2/playlists/rightnow?channelid=";
var programURL = "https://api.sr.se/api/v2/scheduledepisodes?channelid=";

var audioobjekt = new Audio();
const textMap = new Map();
const titleMap = new Map();

// Wait for DOM to load
document.addEventListener("DOMContentLoaded", function(){ 
    // Read SR channels and dynamically create list of channels
    let url = baseURL + "channels?size=10&format=json";
    fetch(url, {method: 'GET'})
        .then(response => response.text())
            .then(data => {
                let jsonData = JSON.parse( data );
                for(let i=0; i < jsonData.channels.length; i++){

                    document.getElementById("mainnavlist").innerHTML += 
                    "<li id='" + jsonData.channels[i].id + "'>" + 
                    "<img id='" + jsonData.channels[i].id + "' src='" + jsonData.channels[i].image + "'" + 
                    "width='30px'" + "height='30px'" + "'>" 
                    + jsonData.channels[i].name + "</li>";  
                    //stoppar in bilden i li så bilden blir klickbar

                    document.getElementById("searchProgram").innerHTML += 
                    "<option value='" + jsonData.channels[i].id + "'>" + jsonData.channels[i].name + "</option>";    
                    //lägger till alla kanaler med dess id i dropdown i högra hörnet


                    textMap.set(jsonData.channels[i].id, jsonData.channels[i].tagline);
                    titleMap.set(jsonData.channels[i].id, jsonData.channels[i].name);         
                    //sparar i en map så ja kan komma åt senare           
                }
            })
            .catch(error => {
                alert('There was an error '+error);
            });

    // Create eventlistener for click on "visa programtablå"
    document.getElementById('searchbutton').addEventListener("click", function(e){

        let channelid = document.getElementById("searchProgram").value + "&format=json";
        let url = programURL + channelid;
    
        fetch(url, {method: 'GET'})
            .then(response => response.text())
                .then(data => {
                    let jsonData = JSON.parse( data );
                    document.getElementById("info").innerText = "";

                    for (let i = 0; i < jsonData.schedule.length; i++) {
                        
                        //sparar i variabler så själva += innerhtml grejen inte blir så stor å ful.
                        let schedTitle = jsonData.schedule[i].title;
                        let schedBesk = jsonData.schedule[i].description;
                        let schedTime = jsonData.schedule[i].starttimeutc.substring(6);
                        //substringar med 6 för .starttimeutc ger en /Date(xxxxx så vill börja på första x
                        
                        let datum = new Date(parseInt(schedTime));
                        //parseint tar bort  ")/" ifrån en liknande string som -> 1647298800000)/ 
                        
                        document.getElementById("info").innerHTML += "<h2>" + schedTitle + "</h2>";
                        document.getElementById("info").innerHTML += "<h3>" + schedBesk + "</h3>";
                        document.getElementById("info").innerHTML += "<h5>" + datum + "</h5>" + "<hr></hr>";
                        
                    }                     
                })
                .catch(error => {
                    alert('There was an error '+error);
                });
    
            })

    // Create eventlistener for clicks on dynamically created list of channels in mainnavlist
    document.getElementById('mainnavlist').addEventListener("click", function(e){
        changeInfo(e);
    })
})
// End of DOM content loaded

function changeInfo (e) {   
    
    //channelid blir tydligen en textint alltså typ "10" istället för 10, därav parseint
    var channelid = parseInt(e.target.id);
    var ljudlinkurl = ljudURL + channelid;
    let songURL = playlistURL + channelid + "&format=json";

    document.getElementById("searchProgram").value = channelid;
    //gör så grejen i högra hörnet blir syncat med navlist

    audioobjekt.src = ljudlinkurl;
    audioobjekt.play();

    //rensar annars blir det spam ish
    document.getElementById("info").innerText = "";

    //hämtar data från mapsen
    let title = titleMap.get(channelid);
    let text = textMap.get(channelid);

    document.getElementById("info").innerHTML += "<h1>" + title + "</h1>";
    document.getElementById("info").innerHTML += "<h3>" + text + "</h3>";
    document.getElementById("info").innerHTML += "<hr></hr>";
   
    fetch(songURL, {method: 'GET'})
        .then(response => response.text())
            .then(data => {
                let jsonData = JSON.parse( data );
                    
                //alla olika utfall angående låtar (viktigt att ha om både prev och next finns sist!)
                if (jsonData.playlist.previoussong == undefined && jsonData.playlist.nextsong == undefined ) {
                    document.getElementById("info").innerHTML += "Previous song: No info <br>";
                    document.getElementById("info").innerHTML += "Next song: No info";
                } else if (jsonData.playlist.previoussong == undefined ) {
                    document.getElementById("info").innerHTML += "Previous song: No info <br>";
                    document.getElementById("info").innerHTML += "Next song: " + jsonData.playlist.nextsong.description;
                } else if (jsonData.playlist.nextsong == undefined ) {
                    document.getElementById("info").innerHTML += "Previous song: " + jsonData.playlist.previoussong.description + "<br>";
                    document.getElementById("info").innerHTML += "Next song: No info";
                } else {
                    document.getElementById("info").innerHTML += "Previous song: " + jsonData.playlist.previoussong.description + "<br>";
                    document.getElementById("info").innerHTML += "Next song: " + jsonData.playlist.nextsong.description;
                }           
            })
            .catch(error => {
                alert('There was an error '+error);
            });
};

//funk för att printa imfo om mapsen endast för min skull
function mapCheck(mapArg) {
mapArg.forEach(function(value, key) {
    console.log("key "  + key + " value " + value)
});
}