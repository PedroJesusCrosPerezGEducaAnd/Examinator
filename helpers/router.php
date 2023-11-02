<?php

class Router
{
    static function redirect() 
    {
        if ( isset($_GET["menu"]) ) 
        {
            switch ( true ) 
            {
                case 'landingpage':
                    //include_once "landingpage";

                    break;
                
                case 'signup':
                    //include_once "signup";
                    echo "Has entrado en 'Sign up' <br> <a href='../'>Volver a Login</a>";
                    break;
                
                case 'forgotpassword':
                    //include_once "forgotpassword";
                    echo "Has entrado en 'Forgot password' <br> <a href='../'>Volver a Login</a>";
                    break;
            }
        }
    }

}

Router::redirect();

?>