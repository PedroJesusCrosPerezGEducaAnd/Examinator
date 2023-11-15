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
                        require_once 'landingpage/landingpage.php';
                        break;

                    case 'login':
                        if (Login::isLoged())
                        {
                            Login::login(Session::read("user"));
                        }
                        else
                        {
                            require_once "forms/loginForm.php";
                        }
                        break;

                    case 'signup':
                        require_once "forms/signupForm.php";
                        break;

                    case 'logout':
                        Session::delete("user");
                        header("Location: ?menu=landingpage");
                        break;

                    default:
                        require_once 'landingpage/landingpage.php';
                        break;
                }
            }
            elseif ( isset($_GET["rol"]) )
            {
                if ( Login::isLoged() ) 
                {
                    switch ($_GET['rol'])
                    {
                        case 'student':
                            require_once "views/rol/student/student_dashboard.php";
                            break;
        
                        case 'admin':
                            $user = Session::read("user");
                                
                            if (  $user instanceof User && $user->getRole() == "admin" ) 
                            {
                                if ( isset($_GET['admin']) ) 
                                {
                                    switch ($_GET['admin']) 
                                    {
                                        case 'users-requests':
                                            require_once "views/rol/admin/users-requests/index.php";
                                            break;
                                        
                                        default:
                                            require_once "views/rol/admin/admin_dashboard.php";
                                            break;
                                    }
                                }
                                else
                                {
                                    require_once "views/rol/admin/admin_dashboard.php";
                                }
                            }
                            else
                            {
                                echo "Sitio restringido exclusivamente a administradores.";
                            }
                            break;
        
                        case 'teacher':
                            $user = Session::read("user");
                                
                            if (  $user instanceof User && ($user->getRole() == "admin" || $user->getRole() == "teacher") ) 
                            {
                                if ( isset($_GET['teacher']) ) 
                                {
                                    switch ($_GET['teacher']) 
                                    {
                                        case 'crud_questions':
                                            require_once "views/rol/teacher/crud_questions/index.php";
                                            break;
                                        
                                        default:
                                            require_once "views/rol/teacher/teacher_dashboard.php";
                                            break;
                                    }
                                }
                                else
                                {
                                    require_once "views/rol/teacher/teacher_dashboard.php";
                                }
                            }
                            else
                            {
                                echo "Sitio restringido exclusivamente a profesores.";
                            }
                            break;

                        case 'null':
                            echo "Estás en la sala de espera, espera a que el administrador te acepte.";
                            break;

                        default:
                            echo "Estás en la sala de espera";
                            break;
                    }
                }
                else
                {
                    echo "Usuario no logeado.";
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

                    case 'actionSignup':
                        if ( !(empty($_POST["name"]) && empty($_POST["password"])) )
                        {
                            if ( empty(DBUser::findByName($_POST["name"])) ) 
                            {
                                // Insert en la base de datos
                                DBUser::insert( new User(null, $_POST["name"], $_POST["password"], null) );
                                // TODO mostrar feedback de registro;
                                echo "¡¡¡El usuario se ha registrado con éxito!!!";
                            }
                            else
                            {
                                // Tiene que mostrar el error de que el nombre del usuario ya existe en la base de datos
                                echo "Error en las credenciales2"; // TODO mostrar mejor los errores
                            }
                        }
                        else
                        {
                            require_once "loginForm.php";
                            echo "Error en las credenciales1"; // TODO mostrar mejor los errores
                        }
                        break;
                    
                    default:
                        echo "DEFAULTTTTTTTTTTTTTTTTTTTTTT";
                        break;
                }
            }
            else
            {
                require_once 'landingpage/landingpage.php';
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