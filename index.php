<!-- Este archivo se utiliza para realizar pruebas -->

<?php
    require_once "repository/DB.php";
    /**
     * Config file
     */
    require_once $_SERVER["DOCUMENT_ROOT"] . "/configFile.php";
?>

<?php

    $connection = new DB($dataBase["host"], $dataBase["user"], $dataBase["password"], $dataBase["dbname"]);

    // Verificar si la conexión fue exitosa
    if ($connection->connect_error) 
    { die("Error de conexión: " . $connection->connect_error); }

    // Realizar una consulta SQL (por ejemplo, seleccionar datos de una tabla)
    $sql = "SELECT * FROM actor";
    $result = $connection->query($sql);

    // Verificar si la consulta fue exitosa
    if ($result === false) {
        die("Error de consulta: " . $connection->error);
    }

    // Recorrer los resultados de la consulta
    while ($fila = $result->fetch_assoc()) {
        echo "Actor ID: " . $fila["actor_id"] . ", Nombre: " . $fila["first_name"] . " " . $fila["last_name"] . "<br>";
    }


    // Cerrar la conexión a la base de datos
    $connection->close();

?>