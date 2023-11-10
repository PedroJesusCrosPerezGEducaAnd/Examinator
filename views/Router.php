<?php
    //require_once "helpers/Autoload.php";

class Router
{
    static function redirect() 
    {
        if ( $_SERVER["REQUEST_METHOD"] == "GET" ) 
        {
            if ( isset($_GET["menu"]) )
            {
                switch ($_GET['menu']) 
                {
                    case 'langingpage':
                        require_once 'landingpage.php';
                        break;

                    case 'login':
                        if (Login::isLoged())
                        {
                            Login::login(Session::read("user"));
                        }
                        else
                        {
                            require_once "loginForm.php";
                        }
                        break;

                    case 'actionLogin':
                        // NO ENTRA AQUÍ, ES PORQUE EL MÉTODO DE REQUEST ES POST, PERO LA VARIABLE QUE TOCO ES GET
                        echo "NO ENTRA AQUÍ";
                        break;

                    case 'signup':
                        require_once "signupForm.php";
                        break;

                    case 'logout':
                        require_once "logout.php";
                        break;

                    default:
                        require_once 'landingpage.php';
                        break;
                }
            }
            elseif ( isset($_GET["rol"]) )
            {
                switch ($_GET['rol'])
                {
                    case 'student':
                        require_once "rol/student/student_dashboard.php";
                        break;
    
                    case 'admin':
                        require_once "rol/admin/admin_dashboard.php";
                        break;
    
                    case 'teacher':
                        require_once "rol/teacher/teacher_dashboard.php";
                        break;
                }
            }
            else
            {
                require_once 'landingpage/landingpage.php';
            }
        }
        elseif ( $_SERVER["REQUEST_METHOD"] == "POST" ) 
        {
            if ( isset($_GET["menu"]) ) 
            {
                switch ($_GET["menu"]) 
                {
                    case 'actionLogin':
                        if ( !empty($_POST["name"]) && !empty($_POST["password"]) )
                        {
                            $user = DBUser::findByName_Password($_POST["name"], $_POST["password"]);
                            if ( isset($user) ) 
                            {
                                Login::login($user, false);
                            }
                            else
                            {
                                require_once "loginForm.php";
                                echo "Error en las credenciales"; // TODO mostrar mejor los errores
                            }
                        }
                        else
                        {
                            require_once "loginForm.php";
                            echo "Error en las credenciales"; // TODO mostrar mejor los errores
                        }
                        break;
                    
                    default:
                    echo "DEFAULTTTTTTTTTTTTTTTTTTTTTT";
                        break;
                }
            }
        }
        else 
        {
            require_once 'landingpage/landingpage.php';
        }
    }

}

Router::redirect();

?>