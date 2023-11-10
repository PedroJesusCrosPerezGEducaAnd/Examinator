<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";


if ( isset($_POST["name"]) && isset($_POST["password"]) ) 
{
    $name = $_POST["name"];
    $password = $_POST["password"];
    $user = new User(null, $name, $password, $name);

    Session::save("user", $user);

    $myUser = Session::read("user");
    
    switch ($myUser->getRole()) 
    {
        case 'admin':
            header('Location: admin_dashboard.php');
            break;
        case 'teacher':
            header('Location: teacher_dashboard.php');
            break;
        case 'student':
            header('Location: student_dashboard.php');
            break;
    }
} else {
    echo 'Credenciales incorrectas';
}

?>