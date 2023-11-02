<?php

class Router
{
    static function redirect() 
    {
        /*if ( isset($_GET["menu"]) ) 
        {
            $menu = $_GET["menu"];
            switch ( $menu ) 
            {
                case 'landingpage':
                    require_once "landingpage";
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
            echo "Si se ha encontrado";
        }
        else
        {
            echo "No se ha encontrado nada en GET";
        }*/

        if (isset($_GET['menu'])) 
        {
            if ($_GET['menu'] == "forgotpassword") {
                echo "<p>Olvidé la contraseña</p>";
            } elseif ($_GET["menu"] == "signup") {
                require_once "signupForm.php";
            } elseif ($_GET["menu"] == "login") {
                require_once "loginForm.php";
            } elseif ($_GET["menu"] == "landingpage") {
                require_once "landingpage.php";
            }
        } 
        else 
        {
            require_once './views/views/landingpage.php';
        }
    }

}

Router::redirect();

?>