<?php 
    session_start();
    
    $page_title = "testsida";

    include "header.php"

?>

<p>
    här ska all content skrivas å sen includear vi sidebar och footer efter min content
</p> 

<?php 
        include "sidebar.php";
        include "footer.php";
?>