<?php
    session_start();

    if($_SESSION["username"] == $_SESSION["loginUser"]
    && $_SESSION["password"] == $_SESSION["loginPw"]) { //stay on the page
    }
    else {
        header("Location: login.php");
        exit();
    }
?>



<p>Denna sida är gjord av Filip Stenegren - fist2000</p>

<p><b>Tillbaka till Home:</b> <a href="index.php"> Home </a></p>
