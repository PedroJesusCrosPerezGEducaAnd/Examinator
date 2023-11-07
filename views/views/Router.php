<?php
    require_once "helpers/Autoload.php";

class Router
{
    static function redirect() 
    {
        if (isset($_GET['menu'])) 
        {
            switch ($_GET['menu']) 
            {
                case 'langingpage':
                    require_once 'landingpage.php';
                    break;

                case 'login':
                    if (Login::isLoged()) 
                    {
                        Login::login();
                    }
                    else
                    {
                        require_once "loginForm.php";
                    }
                    break;

                case 'actionLogin':
                    $name = $_POST["name"];
                    $password = $_POST["password"];
                    if ( isset($name) && isset($password) )
                    {
                        $user = DBUser::findByName_Password($name, $password);
                        Login::login($user, false);
                    }
                    else
                    {
                        require_once "loginForm.php";
                    }
                    break;

                case 'signup':
                    require_once "signupForm.php";
                    break;

                case 'student':
                    require_once "student_dashboard.php";
                    break;

                case 'admin':
                    require_once "admin_dashboard.php";
                    break;

                case 'teacher':
                    require_once "teacher_dashboard.php";
                    break;

                default:
                    require_once 'landingpage.php';
                    break;
            }
        }
        elseif (isset($_GET['rol']))
        {
            switch ($_GET['rol']) 
            {
                case 'student':
                    require_once "student_dashboard.php";
                    break;

                case 'admin':
                    require_once "admin_dashboard.php";
                    break;

                case 'teacher':
                    require_once "teacher_dashboard.php";
                    break;
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