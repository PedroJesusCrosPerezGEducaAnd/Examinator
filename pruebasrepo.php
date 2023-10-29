<?php
//include_once $_SERVER["DOCUMENT_ROOT"]."/functions/showarr.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBUser.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBExam.php";

function showUsers($users) 
{
    foreach ($users as $username => $user) {
        echo "Nombre de usuario: " . $username . "<br>";
        echo "ID: " . $user->getId() . "<br>";
        echo "Contraseña: " . $user->getPassword() . "<br>";
        echo "Rol: " . $user->getRole() . "<br><br>";
    }
}

function showExams($arr) 
{
    $length = count($arr);
    for ($i=0; $i < $length; $i++) 
    { 
        echo "ID: " . $arr[$i]->getId() . "<br>";
        echo "Date: " . $arr[$i]->getDate() . "<br>";
        echo "User_id: " . $arr[$i]->getUser_id() . "<br><br>";
    }
}
?>

<?php
echo "Users <br>";
$users = DBUser\findAll();
showUsers($users);
?>

<?php
echo "Exams <br>";
$arr = DBExam\findAll();
showExams($arr);
?>