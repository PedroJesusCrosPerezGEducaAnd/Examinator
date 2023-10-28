<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/repository/DBUser.php";
?>

<?php

function isLoged($credential) 
{
    $loged = false;
    $users = findAll();


    if ( isset($users[$credential["name"]]) ) 
    {
        if ( $credential->getPassword() == $users[""] ) 
        {
            $loged = true;
        }
        else
        {
            echo "La contraseña no es correcta";
        }
    }
    else
    {
        echo "El usuario no existe";
    }


    return $loged;
}

?>