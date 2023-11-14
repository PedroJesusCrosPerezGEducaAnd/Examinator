<?php

class Main
{
    public static function main()
    {
        require_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";
        require_once $_SERVER["DOCUMENT_ROOT"]."/views/layout/layout.php";
    }
}
Main::main();

/**
 * Generar un token si se ha logeado previamente, en la api hay que leer si tiene el token en las cabeceras del post
 */

?>