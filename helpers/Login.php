<?php
    //include_once "helpers/Autoload.php";
    //include_once $_SERVER["DOCUMENT_ROOT"]."helpers/Autoload.php";


class Login
{

    static function login($user, $remember=false)
    {
        if ( !empty($user->getRole()) ) 
        {
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

}

?>