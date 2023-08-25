<?php
    session_start();
    session_unset();
    session_destroy();
    header("location: ../login.php");
    exit();
/* 
    # AUTHOR: Filip Stenegren, fist2000, TDATG
    # logout.inc.php
    # Loggar ut användaren och skickar den till inloggningssidan
*/