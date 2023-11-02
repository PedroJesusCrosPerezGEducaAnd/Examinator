<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";
?>
<?php

if ( $_SERVER['REQUEST_METHOD']=="POST" ) 
{
    $name = $_POST["name"];
    $password = $_POST["password"];
    $found = "false";
    $users = DBUser::findAll();


    header('Content-type: text/html');
    if ( isset($users[$name]) && $users[$name]->getPassword() == $password ) {
        echo "true";
    } else {
        echo "false";
    }
}

?>