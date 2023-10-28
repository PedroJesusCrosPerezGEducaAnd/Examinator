<?php

function showUsers() 
{
    include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBUser.php";

    $users=findAll();
    $length = count($users);

    for ($i=0; $i < $length; $i++) 
    { 
        echo "Name: " . $users[$i]->getName() . " | Password: " . $users[$i]->getPassword() . "<br>";
    }
}

function showExams() 
{
    include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBExam.php";

    $exams=findAll();
    $length = count($exams);

    for ($i=0; $i < $length; $i++) 
    { 
        echo "Date: " . $exams[$i]->getDate() . " | User_id: " . $exams[$i]->getUser_id() . "<br>";
    }
}

function showDiffifulties($arr) 
{
    include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBDifficulty.php";
    
    $users=findAll();
    $length = count($users);

    for ($i=0; $i < $length; $i++) 
    { 
        echo "Usuario: " . $users[$i]->getName() . " | Contraseña: " . $users[$i]->getPassword() . "<br>";
    }
}

?>