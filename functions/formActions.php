<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/login/login.php";
include_once $_SERVER["DOCUMENT_ROOT"]."/repository/DBUser.php";
?>

<?php

function actionLogin() 
{
    $credentials = ["name"=>$_POST["name"], "password"=>$_POST["password"]];


    if ( isLoged($credentials) ) 
    {
        //header("Location:");
        echo "Te has logeado correctamente";
    }
    else
    {
        echo "Error en el login";
    }
}

?>