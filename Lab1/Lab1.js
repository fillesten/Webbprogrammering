"use strict"
//Väntar på att allt ska ladda.    
document.addEventListener("DOMContentLoaded", function() {
    
    // gömmer sida 2 till en början
    document.getElementById("sida2").style.visibility = "hidden";    

    document.getElementById("byt1").addEventListener("click", function(e) {

        document.getElementById("sida1").style.visibility = "hidden";
        document.getElementById("sida2").style.visibility = "visible";

        document.getElementById("sida2").style.backgroundColor = 
        document.getElementById("bgcolor").value;

        document.getElementById("sida2").style.color = 
        document.getElementById("textcolor").value;

        document.getElementById("sida2").style.fontFamily = 
        document.getElementById("fontopt").value;

        //font på utskrift om company
        document.getElementById("osCompany").innerHTML = document.getElementById("company").value; 
        //faktiska värdet eller utskriften

        let namn1 = document.getElementById("fname").value;
        let namn2 = document.getElementById("lname").value;
        let fullname = namn1.concat(" ", namn2);
        document.getElementById("nameresult").innerHTML = fullname;
        /* vill få för och efternamn på samma rad så måste concatenera dom
        sen stoppar jag resultatet i EN string */


        document.getElementById("osTitle").innerHTML = document.getElementById("title").value;
       
        document.getElementById("osNr").innerHTML = "Tfn " + document.getElementById("phone").value;

        document.getElementById("osMail").innerHTML = "email " + document.getElementById("mail").value;

    });

    document.getElementById("byt2").addEventListener("click", function(e) {
        document.getElementById("sida1").style.visibility = "visible";
        document.getElementById("sida2").style.visibility = "hidden";

    });
});