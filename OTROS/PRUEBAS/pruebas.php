<?php

/*echo "PRUEBAS";

switch ($_GET["admin"]) 
{
    case 'uno':
        echo "UNO";
        break;
    
    default:
        echo "DEFAULT";
        break;
}*/

/*echo $_SERVER['HTTP_HOST']. "|" .$_SERVER['REQUEST_URI'];
echo "<br><br><br>";

include_once "helpers/Autoload.php";

echo Configfile::getDatabase()["host"]."<br><br>";
var_dump(Configfile::getDatabase());*/


/* Validator */
/*include_once "helpers/Autoload.php";

$val = new Validator();

$val->string("name", "Hola", "El campo no puede estar vacío", 0, 0);

if ($val->isError()) {
    echo "true";
} else {
    echo "false";
}

echo "<br><br>";

// Accede a los errores correctamente
$errors = $val->getErrors();
echo($errors["name"]);*/



/* pruebas null */
$si = null;
if (isset($si)) 
{echo "true";
} else { echo "false"; }
?>
