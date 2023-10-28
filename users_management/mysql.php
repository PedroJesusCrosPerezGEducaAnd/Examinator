<?php
    require_once 'db/dataBase.php';

    $array = [];
    $cn = dataBase::connect();
    
    $resultado = $cn->query("SELECT actor_id,first_name,last_name FROM sakila.actor");
    while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) //PDO::FETCH_OBJ
    {
        $array[] = $registro;
    }
    
    // Ahora recorremos el array con un bucle
    foreach ($array as $actor) {
        echo "ID: " . $actor['actor_id'] . ", Nombre: " . $actor['first_name'] . ", Apellido: " . $actor['last_name'] . "<br>";
    }
    
?>