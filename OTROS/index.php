<?php

class Main
{
    public static function main()
    {
        if ( !empty($_SESSION["rol"]) ) 
        {
            
            switch ($_SESSION["rol"]) 
            {
                case 'admin':
                    require_once "admin_dashboard.php";
                    break;
                
                case 'teacher':
                    require_once "teacher_dashboard.php";
                    break;

                case 'student':
                    require_once "student_dashboard.php";
                    break;
            }

        }
        else
        {
            require_once "loginForm.php";
        }
    }
}
Main::main();

?>