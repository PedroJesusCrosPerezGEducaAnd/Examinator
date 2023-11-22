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
                            $user = Session::read("user");
                                
                            if (  $user instanceof User && ($user->getRole() == "student" || $user->getRole() == "admin") ) 
                            {
                                if ( isset($_GET['student']) ) 
                                {
                                    switch ($_GET['student']) 
                                    {
                                        case 'dashboard':
                                            require_once "views/rol/student/student_dashboard.php";
                                            break;

                                        case 'pending_exams':
                                            require_once "views/rol/student/pending_exams/index.php";
                                            break;

                                        case 'take_exam':
                                            //$exam_id = json_decode(file_get_contents('php://input'), true);
                                            require_once "views/rol/student/take_exam/index.php";
                                            //echo json_encode(DBExam::findByExam_id($exam_id));
                                            break;
                                        
                                        default:
                                            require_once "views/rol/student/student_dashboard.php";
                                            break;
                                    }
                                }
                                else
                                {
                                    require_once "views/rol/student/student_dashboard.php";
                                }
                            }
                            else
                            {
                                echo "Sitio restringido exclusivamente a estudiantes.";
                            }
                            break;
        
                        case 'admin':
                            $user = Session::read("user");
                                
                            if (  $user instanceof User && $user->getRole() == "admin" ) 
                            {
                                if ( isset($_GET['admin']) ) 
                                {
                                    switch ($_GET['admin']) 
                                    {
                                        case 'pending_exams':
                                            require_once "views/rol/student/pending_exams/index.php";
                                            break;

                                        case 'crud_questions':
                                            require_once "views/rol/teacher/crud_questions/index.php";
                                            break;

                                        case 'crud_exams':
                                            require_once "views/rol/teacher/crud_exams/index.php";
                                            break;

                                        case 'users_requests':
                                            require_once "views/rol/admin/users_requests/index.php";
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
                                        case 'dashboard':
                                            require_once "views/rol/teacher/teacher_dashboard.php";
                                            break;

                                        case 'crud_questions':
                                            require_once "views/rol/teacher/crud_questions/index.php";
                                            break;
                                            
                                        case 'crud_exams':
                                            if ( isset($_GET['crud_exams']) ) 
                                            {                                            
                                                switch ($_GET['crud_exams']) 
                                                {
                                                    case 'create':
                                                        DBExam::insert(new Exam(null, null, $user->getId()));
                                                        $exam = DBExam::findLastExam();
                                                        Session::save("exam",$exam);
                                                        require_once "views/rol/teacher/crud_exams/create.php";
                                                        break;
                                                    
                                                    case 'edit':
                                                        require_once "views/rol/teacher/crud_exams/edit.php";
                                                        break;

                                                    case 'dashboard':
                                                        require_once "views/rol/teacher/crud_exams/index.php";
                                                        break;
                                                    
                                                    default:
                                                        require_once "views/rol/teacher/crud_exams/index.php";
                                                        break;
                                                }
                                                break;
                                            }
                                            elseif ( isset($_GET['action']) ) 
                                            {
                                                switch ($_GET['action']) 
                                                {
                                                    case 'cancel':
                                                        DBExam::delete( Session::read("exam")->getId() );
                                                        header("Location: http://" . $_SERVER["HTTP_HOST"] . "?rol=" . Session::read("user")->getRole());
                                                        break;
                                                    
                                                    default:
                                                        DBExam::delete( Session::read("exam")->getId() );
                                                        header("Location : ?rol="+Session::read("user")->getRole());
                                                        break;
                                                }
                                            }
                                            else
                                            {
                                                require_once "views/rol/teacher/crud_exams/index.php";
                                            }
                                            break;

                                        case "assign_users_exams":
                                            require_once "views/rol/teacher/assign_users_exams/index.php";
                                            break;
                                        
                                        // STUDENT ROL
                                        case "pending_exams":
                                            require_once "views/rol/student/pending_exams/index.php";
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
                            echo "error";
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
                                Login::login($user, true);
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
            if (Login::isLoged()) 
            {
                switch (Session::read("user")->getRole()) 
                {
                    case 'student':
                        require_once $_SERVER['REQUEST_URI']."?rol=student";
                        break;
            
                    case 'admin':
                        require_once $_SERVER['REQUEST_URI']."?rol=admin";
                        break;
            
                    case 'teacher':
                        require_once $_SERVER['REQUEST_URI']."?rol=teacher";
                        break;
            
                    default:
                        require_once $_SERVER['REQUEST_URI']."?menu=landingpage";
                        break;
                }
            }
            else
            {
                require_once $_SERVER['REQUEST_URI']."?menu=landingpage";
            }
        }
    }

}

Router::redirect();

?>