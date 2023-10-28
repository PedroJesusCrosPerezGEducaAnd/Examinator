<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/functions/formActions.php";
?>

<?php

    switch (true) 
    {
        case $_POST["login"]:
            actionLogin();
            break;
        
        default:
        echo "<br><br><br>";
        echo "No has pulsado nada";
            break;
    }

?>