<?php
/**
 * Cómo utilizar esta api
 * TODO como utilizar apiQuestion
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

    case 'POST': // UPDATE
        $data = json_decode(file_get_contents('php://input'), true);
        $response = DBQuestion::update($data["field"],$data["value"],$data["field_id"],$data["value_id"]);
        //$response = DBQuestion::update("password","holahola","name","actualizabien");
        
        if ($response) {
            echo "true";
        } else {
            echo "false";
        }
        /*$name = isset($_POST["name"]) ? $_POST["name"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;

        if ($name !== null && $password !== null) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            DBQuestion::insert(new Question(null, $name, $hashedPassword, null));
            echo json_encode(['success' => 'Question inserted successfully']);
        } else {
            echo json_encode(['error' => 'Invalid input']);
        }*/
        break;

    case 'PUT': // INSERT
        $data = json_decode(file_get_contents('php://input'), true);
        //$response = DBQuestion::insert($data["field"],$data["value"],$data["field_id"],$data["value_id"]);

        $question = new Question(
            null, 
            $data["statement"], 
            $data["question"], 
            $data["option"], 
            "futuro JSON para source", // TODO leer un recurso desde javascript
            null, // Exam_id
            $data["difficulty_id"], 
            $data["category_id"]
        );
        
        echo DBQuestion::insert($question) ? "true" : "false";
        break;

    case 'DELETE': // DELETE
        $data = json_decode(file_get_contents('php://input'), true);
        $response = DBQuestion::delete($data);
        
        echo $response ? json_encode(new Response("true")) : json_encode(new Response("false"));
        break;
    
    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}

?>