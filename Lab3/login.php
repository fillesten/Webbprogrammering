<?php
    session_start();
    //ska skicka en till index efter inlogg annars till index
    //den här sidan blev lite hårdkodad
    include "includes/config.php";

    // echo $_SESSION["loginUser"] . " " . $_SESSION["loginPw"];
    $page_title = "login";
    
    if (!empty($_REQUEST["submit"])){
        
        $_SESSION["username"] = $_REQUEST["username"];
        $_SESSION["password"] = $_REQUEST["password"];
        
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            errormsg();
            echo "you didnt enter values in both fields <br/>";
            //session_unset();
            /* literally removes the variables it doesnt just put their values to null. but the session is still "ongoing", however session_destroy() removes everything related to the session including the id so session_id() doesnt work.  */
        }    
        else if($_SESSION["username"] != $_SESSION["loginUser"]  
        ||  $_REQUEST["password"] != $_SESSION["loginPw"]) {
            errormsg();
        }
        else {
            header("Location: index.php");
            exit();
            
        }        
    }   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> <?= $site_title . $divider . $page_title; ?> </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css" type="text/css">
</head>
<body>
    <div class="top__border">
        <div class="top__border__content">
            <a href="index.php">
                <h1>Fyllestens  </h1>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form method="post" action="" class="login" name="formname" >
                    <div class="menu">
                        <h2>Fyllestens <br/> </h2>
                    </div>     
                    <div class="login__field">
                        Username: <input type="text" name="username" class="login__input" placeholder="Username">
                    </div>
                    <div class="login__field">
                        Password: <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>                    
                    <input type="submit" name="submit" value="Log In Now" class="input__login__submit">
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>  

</body>
</html>
      