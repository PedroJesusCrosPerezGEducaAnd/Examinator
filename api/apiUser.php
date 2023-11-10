<?php

switch ($_SERVER["REQUEST_METHOD"]) 
{
    case 'GET':
        // TODO select * from user [where ___];
        // Se intercambia la información en el body del $_GET[]
        echo "se han devuelto x tuplas";
        break;

    case 'POST':
        // TODO insert user;
        echo "se han insertado x filas";
        break;

    case 'PULL':
        // TODO update user set ____ where id=[];
        echo "se ha actualizado correctamente";
        break;

    case 'DELETE':
        // TODO delete user where id=[];
        echo "se ha actualizado correctamente";
        break;
    
    default:
        echo "ERROR"; // TODO error
        break;
}

?>