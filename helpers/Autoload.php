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

        /*switch ( substr($filename, 0, 2) ) 
        {
            case 'CL':
                $directory = "entities";
                break;
            
            case 'DB':
                $directory = "repository";
                break;
        }*/
        if ( substr($filename, 0, 2) == "DB" ) {
            $directory = "entities";
        }elseif ( file_exists($docroot . "/" . "entities/" . $filename) ) {
            $directory = "entities";
        } elseif ( file_exists($docroot . "/" . "helpers/" . $filename) ) {
            $directory = "helpers";
        }

        include_once $_SERVER["DOCUMENT_ROOT"] . "/" . $directory . "/" . $filename . '.php';
    }

}

Autoload::autoload();

?>
