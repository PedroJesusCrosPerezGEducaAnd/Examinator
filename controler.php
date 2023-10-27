<?php

    switch (true) 
    {
        case $_POST["login"]:
            echo "<br><br><br>";
            echo "HAS HECHO CLICK EN LOGIN";
            header("Location: http://serverpedro/?hola=si");
            break;
        
        default:
        echo "<br><br><br>";
        echo "No has pulsado nada";
            break;
    }

?>