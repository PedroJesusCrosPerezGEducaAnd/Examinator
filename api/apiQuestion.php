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
                echo json_encode(['data' => $questions]);
                break;

            case 'findByName':
                $name = isset($_GET["name"]) ? $_GET["name"] : null;
                $question = DBQuestion::findByName($name);
                echo json_encode(['data' => $question]);
                break;

            case 'findByRole':
                $role = isset($_GET["role"]) ? $_GET["role"] : null;
                $questions = DBQuestion::findByRole($role);
                echo json_encode(['data' => $questions]);
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
        // TODO: Handle PUT request
        echo json_encode(['error' => 'Not implemented']);
        break;

    case 'DELETE': // DELETE
        // TODO: Handle DELETE request
        echo json_encode(['error' => 'Not implemented']);
        break;
    
    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}

?>