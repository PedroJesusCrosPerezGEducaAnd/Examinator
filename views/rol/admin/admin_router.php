<?php

class Admin_router
{
    static function redirect() 
    {
        if ( $_SERVER["REQUEST_METHOD"] == "GET" ) 
        {
            if ( isset($_GET["admin_menu"]) )
            {
                switch ($_GET['admin_menu']) 
                {
                    case 'dashboard':
                        require_once 'admin_dashboard.php';
                        break;

                    case 'users_requests':
                        require_once "users_requests/prueba.php";
                        break;

                    case 'actionLogin':
                        require_once "___";
                        break;

                    case 'signup':
                        require_once "___.php";
                        break;

                    case '___':
                        require_once "___.php";
                        break;

                    default:
                        require_once 'admin_dashboard.php';
                        break;
                }
            }
            /*elseif ( isset($_GET["___"]) )
            {
                switch ($_GET['___'])
                {
                    case '___':
                        require_once "___";
                        break;
    
                    case '___':
                        require_once "___";
                        break;
    
                    case '___':
                        require_once "___";
                        break;
                }
            }
            else
            {
                require_once '___d';
            }*/
        }
    }

}

Router::redirect();

?>