<?php
/**
 * Cómo utilizar esta api
 * TODO como utilizar apiExam
 * 
 * 
 * 
 *
 * 
 */


// Autoload
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

// Cabeceras
header('Content-Type: application/json');

// Api
switch ($_SERVER["REQUEST_METHOD"]) 
{
    case 'GET': // SELECT
        if ( isset($_GET["category"]) ) 
        {
            switch ( $_GET["category"] ) 
            {
                case 'findAll':
                    $categories = DBCategory::findAll();
                    echo json_encode(['data' => $categories]);
                    break;

                case 'findById':
                    $response = isset($_GET["id"]) ? $_GET["id"] : null;
                    $response = DBCategory::findById($_GET["id"]);
                    echo json_encode(['data' => $response]);
                    break;

                default:
                    echo json_encode(['error' => 'Invalid operation']);
                    break;
            }
        }
        else
        {
            echo json_encode( new Response("Debes introducir una url válida") );
        }
        break;

    case 'POST': // UPDATE
        // TODO: Handle UPDATE request
        echo json_encode(['error' => 'POST Not implemented']);
        break;

    case 'PUT': // INSERT
        // TODO: Handle INSERT request
        echo json_encode(['error' => 'PUT Not implemented']);
        break;

    case 'DELETE': // DELETE
        // TODO: Handle DELETE request
        echo json_encode(['error' => 'DELETE Not implemented']);
        break;
    
    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}

?>