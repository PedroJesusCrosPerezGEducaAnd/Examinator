<?php

/* $cuerpo = file_get_contents("php://input");

// Divide la cadena en líneas
$lineas = explode("\n", $cuerpo);

// Inicializa un array para almacenar los datos clave-valor
$data = array();

foreach ($lineas as $linea) {
    // Divide cada línea en clave y valor
    list($clave, $valor) = explode("=", $linea, 2);

    // Limpia espacios en blanco
    $clave = trim($clave);
    $valor = trim($valor);

    // Almacena en el array asociativo
    $data[$clave] = $valor;
}

var_dump($data); */

?>

<?php

/* $cuerpo = file_get_contents("php://input");
$_PUT = array();

parse_str($cuerpo, $_PUT);

var_dump($_PUT);


echo "<br><br>".$_PUT["name"]."<br>";
echo $_PUT["password"]; */

?>

<?php

// img to base64 -> https://www.base64-image.de/


$img = file_get_contents("php://input");

echo "<img src='.$img.'>";

?>