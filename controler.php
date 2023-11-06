<?php
    


    switch (true) 
    {
        case $_POST["login"]:
            require_once $_SERVER["DOCUMENT_ROOT"]."/functions/formActions.php";
            actionLogin();
            break;
        
        default:
            echo "<br><br><br>";
            echo "No has pulsado nada";
            break;
    }

?>