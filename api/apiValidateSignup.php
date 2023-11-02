<?php
    include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";
?>
<?php

if ( $_SERVER['REQUEST_METHOD']=="POST" ) 
{
    $name = $_POST["name"];
    $password = $_POST["password"];
    $users = DBUser::findAll();


    header('Content-type: text/html');
    if ( isset($users[$name])) 
    {
        echo "false";
    } 
    else 
    {
        DBUser::insert(new User($name, $password, null));
        if ( DBUser::findByName($name) != null ) 
        {
            echo "true";
        }
        else
        {
            echo "false";
        }
    }
}

?>