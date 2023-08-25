<?php
    session_start();
    error_reporting(-1);            // Reporta alla errors
    ini_set("display_errors", 1);   // displaya alla errors  
   

    //autoloada alla classer i classfilen
    spl_autoload_register(function($class){
        include "guestbook_classes/" . $class . ".class.php";
    });

    
    $dbservername = "studentmysql.miun.se";
    $dbusername = "fist2000";
    $dbpassword = "7zaeup47";
    $dbname = "fist2000";
    
    //här läre jag ändra username och password till det jag fick i mailet.
    // $db = new mysqli('localhost', 'admin', 'password', 'GuestBook') or die('Fel vid anslutning');
    #lokal anslutning

    $db = new mysqli("$dbservername", "$dbusername", "$dbpassword", "$dbname"); 
    if ($db->connect_errno > 0 ) { die ('Fel vid anslutning [' . $db->connect_error . ']'); }
    
    if (!empty($_REQUEST["addPost"])){
        if (!empty($_POST["name"]) && !empty($_POST["message"])) {
            $datetime = new DateTime();
            $date = $datetime->format("Y-m-d H:i:s");
            
            $stmt = $db->prepare("INSERT INTO GuestBookTable (Username, Post, PostDate) VALUE (?, ?, ?)");
            $stmt->bind_param("sss", $_POST["name"],$_POST["message"], $date );
            $stmt->execute();         
            
        }
        unset($_REQUEST["addPost"]); //disablear addPost-knappen
        header("location: index.php");
        exit();
    }

    if(isset($_REQUEST["delPost"])){
        
        $stmt = $db->prepare("DELETE FROM GuestBookTable WHERE postID = ?");
        $stmt->bind_param("s", $_REQUEST["delPost"]);
        $stmt->execute();


        unset($_REQUEST["delPost"]); // Disable button press
        header("Location: index.php");
        exit();
    }

   
?>

<!DOCTYPE html> 
<html lang="sv">
<head>
<title>filles - PHP GuestBook</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="css/styles.css">
<style>body {background-color: grey;}</style>
</head>
<body>
    <header id="mainheader">
        <div class="contain">
            <h1><a href="../">DT058G - Webbutveckling</a></h1>
        </div><!-- /.contain -->
    </header>

    <div class="container">
        <h2>Lab 4 - del 2 - Med SQL</h2>
        <div class="row">        
            <div id="info">
                <h2> <a href="index.php">Filles Gästbok</a></h2>
                <form action="index.php" method="post">
                    <p> Namn: <br /><input type="text" name="name" /> </p>
                    <p> Meddelande:<br/> <textarea cols="40" rows="2" name="message" ></textarea> </p>
                    <p> <input type="submit" name="addPost" value="LÄGG UT!" class="btn" /> </p>
                </form>
                <h3>Gästboksinlägg</h3><br/>
                <?php 

                    # Tar jag inte SELECT * kan jag inte använda PostID i while loopen eftersom den inte har den storead
                    $sqlQuery = "SELECT * FROM GuestBookTable;";
                    if(!$result = $db->query($sqlQuery)){
                        die('Fel vid SQL-fråga [' . $db->error . ']');
                    }
                    while($row = $result->fetch_assoc()){
                        echo ""  . "<p>" . $row["Post"] . "</p>". 
                        "<p>Skribent: " . $row["Username"] . "<br/>"
                        ." Publicerades " . $row["PostDate"] . " <a href='index.php?delPost=".$row["postID"]."'>Ta bort </a> VIA SQL </p><hr/>";
                    }
                    
                    
                ?>

                
            </div><!-- /#info -->        
                
            <footer><p>Filip Stenegren - Webbutveckling @ Miun</p></footer>
            
        </div> <!-- /.row -->     

    </div>
    <!-- /.container -->    
</body>
</html>
<?php 
    $db->close();
?>
