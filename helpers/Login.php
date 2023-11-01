<?php
//include_once $_SERVER["DOCUMENT_ROOT"] . "/repository/DBUser.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/helpers/Autoload.php";
?>

<?php

class Login
{

    static function login($user, $password, $remember)
    {
        Session::
    }

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

    private static function existeUsuario()
    {

    }

    public static function usuarioEstaLogeado()
    {
        // if $_Session exist clave user
    }

}

?>