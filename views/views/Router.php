<?php

class Router
{
    static function redirect() 
    {
        if (isset($_GET['menu'])) 
        {
            switch ($_GET['menu']) 
            {
                case 'langingpage':
                    # code...
                    break;

                case 'value':
                    # code...
                    break;

                case 'value':
                    # code...
                    break;

                case 'value':
                    # code...
                    break;

                case 'value':
                    # code...
                    break;

                case 'value':
                    # code...
                    break;

                case 'value':
                    # code...
                    break;

                case 'value':
                    # code...
                    break;
                
                default:
                    require_once 'landingpage.php';
                    break;
            }
            
            if ($_GET['menu'] == "forgotpassword") {
                echo "<p>Olvidé la contraseña</p>";
            } elseif ($_GET["menu"] == "signup") {
                require_once "signupForm.php";
            } elseif ($_GET["menu"] == "login") {
                require_once "helpers/Autoload.php";
                
                if (Login::isLoged()) 
                {
                    switch (Session::read("user")->getRole()) 
                    {
                        case 'student':
                            header("Location: student_dashboard.php");
                            break;
                        
                        case 'admin':
                            header("Location: admin_dashboard.php");
                            break;

                        case 'teacher':
                            header("Location: teacher_dashboard.php");
                            break;
                    }
                }
                else
                {
                    require_once "loginForm.php";
                }
            } elseif ($_GET["menu"] == "landingpage") {
                require_once "landingpage.php";
            } elseif ($_GET["menu"] == "student") {
                require_once "student.php";
            } elseif ($_GET["menu"] == "teacher") {
                require_once "teacher.php";
            } elseif ($_GET["menu"] == "admin") {
                require_once "admin.php";
            } elseif ($_GET["menu"] == "probar") {
                require_once "layout.php";
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