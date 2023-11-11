<?php
class Router
{
    static function redirect() 
    {
        if ( $_SERVER["REQUEST_METHOD"] == "GET" ) 
        {
            if ( isset($_GET["prueba"]) )
            {
                switch ($_GET['prueba']) 
                {
                    case 'pag1':
                        require_once 'pag1.php';
                        break;

                    case 'pag2':
                        require_once "pag2.php";
                        break;

                    default:
                        require_once 'pagdefault.php';
                        break;
                }
            }
            else
            {
                require_once 'pagdefault.php';
            }
        }
        else
        {
            require_once 'pagdefault.php';
        }
    }

}

Router::redirect();

?>