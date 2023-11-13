<?php
    include_once "helpers/Autoload.php";
    //include_once $_SERVER["DOCUMENT_ROOT"]."helpers/Autoload.php";


class Login
{

    static function login($user, $remember=false)
    {
        if ( !empty($user->getRole()) ) 
        {
            // TODO quitar sessión start cuando se pueda
            Session::start();
            Session::save("user", $user);

            switch ( $user->getRole() ) 
            {
                case 'student':
                    header("Location: ?rol=student");
                    break;

                case 'admin':
                    header("Location: ?rol=admin");
                    break;

                case 'teacher':
                    header("Location: ?rol=teacher");
                    break;

                default:
                    header("Location: ?rol=null");
                    break;
            }
        }
    }

    static function logout()
    {
        Session::start();
        Session::delete("user");
    }

    static function isLoged() 
    {
        Session::start();
        return Session::exist("user");
    }

    // TODO NOTA: esto es una prueba
    static function executeLogin()
    {
        Session::start();
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
            require_once "views/views/loginForm.php";
        }
    }

}

?>