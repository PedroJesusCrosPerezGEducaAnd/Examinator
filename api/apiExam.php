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
    case 'GET': // SELECT TODO
        switch ($_GET["exam"]) 
        {
            case 'findAll':
                $exams = DBExam::findAll();
                echo json_encode(['data' => $exams]);
                break;

            case 'findByUser_id':
                // TODO
                $name = isset($_GET["name"]) ? $_GET["name"] : null;
                $exam = DBExam::findByUser_id($name);
                echo json_encode(['data' => $exam]);
                break;
            
            default:
                echo json_encode(['error' => 'Invalid operation']);
                break;
        }
        break;

    case 'POST': // UPDATE TODO
        $data = json_decode(file_get_contents('php://input'), true);
        $response = DBExam::update($data["field"],$data["value"],$data["field_id"],$data["value_id"]);
        //echo "true";
        echo $response ? json_encode(new Response("true")) : json_encode(new Response("false"));
        
        /* Para probar */ //$response = DBExam::update("password","holahola","name","actualizabien");
        /*$name = isset($_POST["name"]) ? $_POST["name"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;

        if ($name !== null && $password !== null) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            DBExam::insert(new Exam(null, $name, $hashedPassword, null));
            echo json_encode(['success' => 'Exam inserted successfully']);
        } else {
            echo json_encode(['error' => 'Invalid input']);
        }*/
        break;

    case 'PUT': // INSERT
        $data = json_decode(file_get_contents('php://input'), true);
        $exam = new Exam(null, null, Session::read("user")->getId());
        echo DBExam::insert($exam) ? "true" : "false"; // Response
        break;

    case 'DELETE': // DELETE TODO
        // TODO: Handle DELETE request
        echo json_encode(['error' => 'Not implemented']);
        break;
    
    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}

?>