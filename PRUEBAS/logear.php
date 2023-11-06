<?php

$userName = $_POST["name"];
$userPassword = $_POST["password"];
$rol = "teacher";

if (!empty($rol)) 
{
    $_SESSION['name'] = $userName;
    $_SESSION['password'] = $userPassword;
    $_SESSION['rol'] = $rol;


    switch ($rol) {
        case 'admin':
            header('Location: admin_dashboard.php');
            exit();
        case 'teacher':
            header('Location: teacher_dashboard.php');
            exit();
        case 'student':
            header('Location: student_dashboard.php');
            exit();
    }
} else {
    echo 'Credenciales incorrectas';
}

?>