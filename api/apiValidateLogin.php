<?php

if ( $_SERVER['REQUEST_METHOD']=="POST" ) 
{
    $name = $_POST["name"];
    //$password = $_POST["password"];

    // En el header indico que mi objeto que quiero es json
    //header('Content-type: application/json');
    //$obj = new stdClass;
    //$obj->name = $name;
    //$obj->password = $password;

    // respuesta objeto json
    //echo json_encode($obj);
    
    header('Content-type: text/html');
    if ($name == "pedro") {
        echo "true";
    } else {
        echo "false";
    }
}

?>