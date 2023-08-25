<?php 
    session_start();
    
    $page_title = "del 2";

    if($_SESSION["username"] == $_SESSION["loginUser"]
    && $_SESSION["password"] == $_SESSION["loginPw"]) { //stay on the page
    }
    else {
        header("Location: ../login.php");
        exit();
    }

    include "header.php"

?>
<h2>Frågor:</h2>
<h3>1: Har du tidigare erfarenhet av utveckling med PHP? </h3>
<p> Hade en väldigt grundlig snabbkurs i gymnasiet. Det handla i princip om vad echo, h och p taggar gör osv</p>

<h3>2: Hur har du valt att strukturera upp dina filer och kataloger? </h3>
<p> Jag valde att strukturera mina filer på det sättet som hänvisades i exemplet.</p>

<h3>3: Har du följt guiden, eller skapat på egen hand? </h3>
<p> Jag följde guiden men kommer ändra och lägga till som jag tycker passa.</p>

<h3>4: Har du gjort några förbättringar eller vidareutvecklingar av guiden (om du följt denna)? </h3>
<p> Jag kommer försöka dela upp alla laborationens delar i egna PHP-filer, eller på passande sätt dela upp dem.</p>

<h3>5: Vilken utvecklingsmiljö har du använt för uppgiften (Editor, webbserver etcetera)?</h3>
<p> Använder mig av VSC och XAMPP-paketet</p>

<h3>6: Har något varit svårt med denna uppgift? </h3>
<p> I instruktionerna tappar man bort Vänster Kolumn så va lite klurigt å försöka komma på vart bäst den passar in.</p></br> 


<p><b>Home:</b> <a href="../index.php"> Home </a></p>
<p><b>Del 3, Information:</b> <a href="../includes/del3.php"> Del 3</a></p>

<?php
include("sidebar.php");
include("footer.php");
?>
