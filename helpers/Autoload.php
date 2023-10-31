<?php

Class Autoload
{
    public static function autoload () 
    {
        spl_autoload_register('findfile');
    }

    private function findfile($filename)
    {
        $directory = "";

        switch ($filename[0]) 
        {
            case 'C':
                $directory = "entities/";
                break;
            
            case 'DB':
                $directory = "repository/";
                break;
        }
        include_once $directory . $filename . '.php';
    }

}

Autoload::autoload();

?>