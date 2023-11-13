<?php

Class Autoload
{
    public static function autoload () 
    {
        spl_autoload_register(function ($filename) {
            self::findfile($filename);
        });
    }

    private static function findfile($filename)
    {
        $directory = "";
        $docroot = $_SERVER["DOCUMENT_ROOT"];
        
        if ( substr($filename, 0, 2) == "DB" ) {
            $directory = "repository";
        }elseif ( file_exists($docroot . "/" . "entities/" . $filename . ".php") ) {
            $directory = "entities";
        } elseif ( file_exists($docroot . "/" . "helpers/" . $filename . ".php") ) {
            $directory = "helpers";
        } elseif ( file_exists($docroot . "/" . $filename . ".php") ) {
            $directory = "";
        } else { $directory = "ERROR"; }

        require_once $_SERVER["DOCUMENT_ROOT"] . "/" . $directory . "/" . $filename . '.php';
    }

}

Autoload::autoload();

?>