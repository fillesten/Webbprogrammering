<?php 
    echo "<h2> Information: </h2>";

    function Info() {
        $datum = date("l jS \of F Y h:i:s A");
        if (date("l") == "Friday" ) {
            echo "<b> Datum & klockslag : </b>" . $datum . "Äntligen Fredag!". "<br>";
        }
        else { 
            echo "<b> Datum & klockslag : </b>" . $datum . "<br>"; 
        }

        echo "<b>User IP Address - </b>" . $_SERVER['REMOTE_ADDR']. "<br>";  // IP 

        echo "<b>Sökväg/filnamn (webbplats): </b>" .$_SERVER['SCRIPT_FILENAME']	. "<br>"; //ALLA olika filvägar
        echo "<b>Sökväg/filnamn (funktionens katalog): </b>" . __FILE__. "<br>";
        echo "<b>Sökväg/filnamn: </b>" . $_SERVER['PHP_SELF'] . "<br>";

        echo "<b>User agent-string: </b>". $user_agent = $_SERVER['HTTP_USER_AGENT']. "<br>";
    }
?>
</br>