<?php
    session_start();
    error_reporting(-1);            // Reporta alla errors
    ini_set("display_errors", 1);   // displaya alla errors  
   
    include "includes/header.php";
    $file = "../../../writeable/data.txt";

    //autoloada alla classer i classfilen
    spl_autoload_register(function($class){
        include "guestbook_classes/" . $class . ".class.php";
    });
    
    $dataArray = new MessageArray();

    // $fileArr = array();
    // $fileArr = file_get_contents($file);
    // echo "här kommer filearr ". $fileArr; // skriver ut allting från filen

    
    //check if file exists
    if (!file_exists($file)){
        $fileEdit = fopen($file, "w") or die("cannot create the fileeee");
        fwrite($fileEdit, "");
        fclose($fileEdit);
    }


    if (!empty($_REQUEST["addPost"])){
        if (!empty($_POST["name"]) && !empty($_POST["message"])) {
            $datetime = new DateTime();
            $date = $datetime->format("Y-m-d H:i:s");
            $dataArray->addPost($_POST["name"], $_POST["message"], $date);
        }
        unset($_REQUEST["addPost"]); //disablear addPost-knappen
        header("location: index.php");
        exit();
    }

    if(isset($_REQUEST["delPost"])){
        $dataArray->removePost($_REQUEST["delPost"]);

        unset($_REQUEST["delPost"]); // Disable button press
        header("Location: index.php");
        exit();
    }

?>

<body>
    <header id="mainheader">
        <div class="contain">
            <h1><a href="../">DT058G - Webbutveckling</a></h1>
        </div><!-- /.contain -->
    </header>

    <div class="container">
        <h2>Lab 4 - del 1 - Utan SQL</h2>
        <div class="row">        
            <div id="info">
                <h2><a href="index.php">Filles Gästbok</a></h2>
                <form action="index.php" method="post">
                    <p> Namn: <br /><input type="text" name="name" /> </p>
                    <p> Meddelande:<br/> <textarea cols="40" rows="2" name="message" ></textarea> </p>
                    <p> <input type="submit" name="addPost" value="LÄGG UT!" class="btn" /> </p>
                </form>
                <a href= "../../../writeable/data.txt" target="_blank">Visa datafil</a><br/>
                <h3>Gästboksinlägg</h3>
                <?php 

                    foreach($dataArray->getPosts() as $key => $obj){
                        echo "<br/>" . $obj->getMessage()  ."<br/> <br/>".  
                        "Skribent: " . $obj->getName() .  "<br/>"
                        . "Publicerades " . $obj->getDate() . " <a href='index.php?delPost=$key'>Ta bort </a><br/><hr />";
                    }
                ?>

                
            </div><!-- /#info -->        
                
            <footer><p>Filip Stenegren - Webbutveckling @ Miun</p></footer>
            
        </div> <!-- /.row -->     

    </div>
    <!-- /.container -->    
</body>
</html>