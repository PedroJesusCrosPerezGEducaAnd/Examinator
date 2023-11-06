<?php
    include_once "helpers/Autoload.php";
    //include_once $_SERVER["DOCUMENT_ROOT"]."helpers/Autoload.php";


class Login
{

    static function login($user, $remember=false)
    {
        Session::start();
        Session::save("user", $user);
    }

    static function logout()
    {
        Session::delete("user");
    }

    static function isLoged() 
    {
        return Session::exist("user");
    }

    static function executeLogin()
    {
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