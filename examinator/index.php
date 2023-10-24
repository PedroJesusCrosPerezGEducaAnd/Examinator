<?php
    require_once "helpers/validator.php";
?>

<?php
    echo "Validar string <br>";
    $val = new Validator();

    $sol = $val->string("name","Hola","El nombre que has introducido es demasiado largo", 6, 30);

    if ($val->isError()) 
    {
        echo "Se han producido los siguiente errores: <br>";
        $errors = $val->getErrors();
        for ($i=0; $i < count($errors); $i++) 
        { 
            echo " - ".$errors[$i]-"<br>";
        }
    }
    echo "Resultado: ";
    if ($sol) 
    { echo "true"; }
    else
    { echo "false"; }
?>