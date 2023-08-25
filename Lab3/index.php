<?php 
    session_start();

    include "includes/config.php";
    $page_title = "index";

    if($_SESSION["username"] == $_SESSION["loginUser"]
    && $_SESSION["password"] == $_SESSION["loginPw"]) { //stay on the page
    }
    else {
        header("Location: login.php");
        exit();
    }
    
    //så jag enkelt å snabbt kan återkomma till sida 1 :)
    if(!empty($_REQUEST["back"])){
        header("Location: login.php");
        
        //gör så man loggar ut 
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]);
        }
        session_destroy();
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?= $site_title . $divider . $page_title; ?> </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stilmall.css" type="text/css">
</head>
<body>
    <p>
    Welcome <?php echo  $_SESSION["username"];?> 
    <br/>
    <!-- Sessionsid: <?php print session_id(); ?> -->
    </p>

    <form method="POST" action="" >
        
        <input type="submit" name="back" id="back" value="Log out :)"/>
    </form>

    <section id="sidebar">
    
    <nav id="mainmenu">
    <ul>
        <li><a href="index.php">Hem</a></li>
        <li><a href="omsidan.php">Om sidan</a></li>
        <li><a href="includes/del2.php">Del 2 - Frågor</a></li>        
        <li><a href="includes/del3.php">Del 3 - Information</a></li>
        <li><a href="includes/testsida.php">testsida</a></li>

        <li><a href="login.php">login</a></li>
        
    </ul>
</nav>
    </section>

    <footer id="mainfooter">
        <div class="kontakt">    
            <p class="alignleft">Kontakt: <a href="Mailto:fist2000@student.miun.se" >Maila mig här</a></p> 
            <p class="aligncenter"> Telefon: <a href="tel:072-200-04-33">072-200 04 33</a></p>
            <p class="alignright"> <a href="index.php"> Home</a></p>
        </div>
        <div style="clear: both;"></div>
    </footer><!-- /mainfooter -->
</div><!-- /behållare -->
</body>
</html>


