<?php
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

$response = DBQuestion::insert(new Question(null, "Este es el enunciado", "futuro questions JSON2", "futuro source JSON2", null, 1, 1));

echo $response == true ? "true" : "false";

?>