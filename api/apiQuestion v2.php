<?php
// Autoload
include_once $_SERVER["DOCUMENT_ROOT"]."/helpers/Autoload.php";

// Cabeceras
header('Content-Type: application/json');

// Api
switch ($_SERVER["REQUEST_METHOD"]) 
{
    case 'GET':
        switch ($_GET["question"]) 
        {
            case 'findAll':
                $questions = DBQuestion::findAll();
                echo json_encode($questions);
                break;
            
            default:
                echo json_encode(['error' => 'Invalid operation']);
                break;
        }
        break;
    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}

?>            