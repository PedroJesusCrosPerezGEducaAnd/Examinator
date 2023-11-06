<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";


//if ($_GET["menu"] == "login") 
function actionLogin2()
{

    $found = false;
    try 
    {
        $user = DBUser::findByName_Password($_POST["name"], $_POST["password"]);
        Login::login($user);
        $found = true;
    } 
    catch (Exception $e) 
    {
        echo "Credenciales incorrectas"; //TODO
    }


    if ( $found && !empty($rol)) 
    {
        switch ($rol) 
        {
            case 'admin':
                header('Location: ../views/views/admin_dashboard.php');
                exit();
            case 'teacher':
                header('Location: ../views/views/teacher_dashboard.php');
                exit();
            case 'student':
                header('Location: ../views/views/student_dashboard.php');
                exit();
        }
    }
    
}


function actionLogin() 
{
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
        require_once "views/views/loginForm.php";
    }
}

?>