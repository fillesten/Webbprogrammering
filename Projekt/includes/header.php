<?php
session_start();
/* 
    # AUTHOR: Filip Stenegren, fist2000, TDATG
    # header.php
    # Inkluderas i varje fil. Den anger att det är html-dokument, språk osv 
    # viktigast att den skapar headern i toppen med de klickbara länkarna
*/

include_once "includes/config.php";

?>
<!-- 
    # AUTHOR: Filip Stenegren, fist2000, TDATG
    # header.php
    # Inkluderas i varje fil. Den anger att det är html-dokument, språk osv 
    # viktigast att den skapar headern i toppen med de klickbara länkarna
-->
<!DOCTYPE html> 
<html lang="sv">
<head>
<title> <?= $site_title . $divider . $page_title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="css/stilmall.css">
</head>
<body>
    <header id="header">
        <div class="headercontent">
            <a class="logo" href="posts.php">GruppForum</a>
            <div class="right_content">
                <ul class="headerUl">
                    <?php 
                        # Ändrar utseendet på headern beroende på om användaren är inloggad eller inte
                        if (isset($_SESSION["Uname"])) {
                            echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                            echo "<li><a href='profile.php'>Profile</a></li>";
                            echo "<li><a href='konton.php'>Konton</a></li>";
                            echo "<li><a href='posts.php'>Posts</a></li>";
                        }
                        else {
                            echo "<li><a href='login.php'>Log in</a></li> ";
                            echo "<li><a href='login.php'>Sign up </a></li>";
                            echo "<li><a href='konton.php'>Konton</a></li>";
                            echo "<li><a href='posts.php'>Posts</a></li>";
                        }
                    ?>
                </ul>
             </div> <!--right_content -->
        </div><!-- headercontent -->
    </header><!-- header -->

