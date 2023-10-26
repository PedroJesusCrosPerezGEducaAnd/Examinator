<?php

    // Apuntes copiados de la pizarra
    if ( $_SERVER['REQUESET_METHOD']=="GET" ) 
    {
        $id = $_GET["id"];

        // En el header indico que mi objeto que quiero es json
        header('Content-type: application/json');
        $obj = new stdClass;
        $obj->id = $id;
        $obj->nombre = "Manolo";
        $obj->apellido = "Valenzuela";
        echo json_encode($obj);
    }

    // Mi versión
    if ( $_SERVER['REQUESET_METHOD']=="GET" ) 
    {
        $id = $_GET["id"];

        // En el header indico que mi objeto que quiero es json
        header('Content-type: application/json');
        $obj = $DBuser->findById($id);
        echo json_encode($obj);
    }
?>