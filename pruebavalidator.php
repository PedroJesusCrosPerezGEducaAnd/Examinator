<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

$val = new Validator();

$var = 7;
$val->isString("nombre", $var, "No es una cadena");

$val->isEmpty($var, "apellidos", "La variable no está definida");

$arr = ['valor1', 'valor2', 'valor3'];
$val->stringEnum("valor", "valor4", $arr, "Valor no permitido");

$errors = $val->getErrors();

echo "ERRORES <hr>";
$val->showErrors();

?>