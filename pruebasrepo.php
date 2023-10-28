<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/functions/showarr.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBUser.php";

function showUsers($users) 
{
    for ($i=0; $i < $length; $i++) 
    { 
        echo "Name: " . $users[$i]->getName() . " | Password: " . $users[$i]->getPassword() . "<br>";
    }
}
?>

<?php

echo "Examenes <br>";
$users = findAll();
showUsers();


?>