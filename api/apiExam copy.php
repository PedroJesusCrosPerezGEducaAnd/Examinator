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
        switch ($_GET["exam"]) 
        {
            case 'findAll':
                $exams = DBExam::findAllId();
                echo json_encode(['data' => $exams]);
                break;

            // case 'findByUser_id':
            //     // TODO
            //     $name = isset($_GET["name"]) ? $_GET["name"] : null;
            //     $exam = DBExam::findByUser_id($name);
            //     echo json_encode(['data' => $exam]);
            //     break;
            
            default:
                echo json_encode(['error' => 'Invalid operation']);
                break;
        }
        break;

    case 'POST': // UPDATE
        $data = json_decode(file_get_contents('php://input'), true);
        $response = DBExam::update($data["field"],$data["value"],$data["field_id"],$data["value_id"]);
        
        echo $response ? json_encode(new Response("true")) : json_encode(new Response("false"));
        break;

    case 'PUT': // INSERT
        $data = json_decode(file_get_contents('php://input'), true);
        $exam = new Exam(null, null, Session::read("user")->getId());

        echo DBExam::insert($exam) ? new Response("true") : new Response("false"); // Response
        break;

    case 'DELETE': // DELETE
        $data = json_decode(file_get_contents('php://input'), true);
        $response = DBExam::delete($data["id"]);
        
        echo $response ? json_encode(new Response("true")) : json_encode(new Response("false"));
        break;
    
    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}

?>