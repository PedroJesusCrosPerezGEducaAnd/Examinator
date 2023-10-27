<!-- Este archivo se utiliza para realizar pruebas -->

<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/repository/DB.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/repository/DBUser.php";
    /**
     * Config file
     */
    include_once $_SERVER["DOCUMENT_ROOT"] . "/configFile.php";
?>

<?php

    $users = findAll();
    $length = count($users);

    for ($i=0; $i < $length; $i++) 
    { 
        echo "Usuario: " . $users[$i].getName() . " | Contraseña: " . $users[$i].getPassword();
    }

?>