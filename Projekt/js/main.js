"use strict"
/*
    # AUTHOR: Filip Stenegren, fist2000, TDATG
    # main.js
    # ändrar synligheten på formsen
*/

document.addEventListener("DOMContentLoaded", function(){ 

    // visar och döljer olika <div> på login-sidan samt skriver en hänvisande text
    document.getElementById('showLogin').addEventListener("click", function(){
        document.getElementById("loginDiv").style.display="block"; 
        document.getElementById("signupDiv").style.display="none";
        document.getElementById("test").innerHTML = "Vill du skapa konto? tryck på knappen ovan";
    })
    document.getElementById('showSignup').addEventListener("click", function(){
        document.getElementById("loginDiv").style.display="none";
        document.getElementById("signupDiv").style.display="block";
        document.getElementById("test").innerHTML = "Vill du logga in? Tryck på knappen ovan";
    })
})