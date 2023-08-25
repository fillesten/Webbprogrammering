<?php
    session_start();
    
    
    if($_SESSION["username"] == $_SESSION["loginUser"]
    && $_SESSION["password"] == $_SESSION["loginPw"]) { //stay on the page
    }
    else {
        header("Location: ../login.php");
        exit();
    }
    
    
    $page_title = "del 3";

    include ("header.php");

    include ("del3Funk.php");
    
    info();


    

?>

<p><br><b>Home:</b> <a href="../index.php"> Home </a></p>

<p><br><b>Del 2, Frågor:</b> <a href="../includes/del2.php"> Del 2</a></p>

<br>
<?php
include("sidebar.php");
include("footer.php");
?>
