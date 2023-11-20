<?php
/**
 * Cómo utilizar esta api
 * TODO como utilizar apiUser
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
// TODO TERMINAR DE VALIDAR
// Api
switch ($_SERVER["REQUEST_METHOD"]) 
{
    case 'GET': // SELECT
        switch ($_GET["user"]) 
        {
            case 'findAll':
                $users = DBUser::findAll();
                echo json_encode(['data' => $users]);
                break;

            case 'findByName':
                $name = isset($_GET["name"]) ? $_GET["name"] : null;
                $user = DBUser::findByName($name);
                echo json_encode(['data' => $user]);
                break;

            case 'findByRole':
                $role = isset($_GET["role"]) ? $_GET["role"] : null;
                $users = DBUser::findByRole($role);
                echo json_encode(['data' => $users]);
                break;
            
            default:
                echo json_encode(['error' => 'Invalid operation']);
                break;
        }
        break;

    case 'POST': // UPDATE
        $data = json_decode(file_get_contents('php://input'), true);
        //$response = DBUser::update($data["field"],$data["value"],$data["field_id"],$data["value_id"]);
        $response = DBUser::updateById($data["id"], $data["name"], $data["role"]);
        
        echo $response ? json_encode(new Response("true")) : json_encode(new Response("false"));
        break;

    case 'PUT': // INSERT
        $data = json_decode(file_get_contents('php://input'), true);
        $user = new User(null, $data["name"], $data["passowrd"], null);
        $response = DBUser::insert($user);
        
        echo $response ? json_encode(new Response("true")) : json_encode(new Response("false"));
        break;

    case 'DELETE': // DELETE
        $data = json_decode(file_get_contents('php://input'), true);
        $response = DBUser::deleteByName($data);
        
        echo $response ? json_encode(new Response("true")) : json_encode(new Response("false"));
        break;
    
    default:
        echo json_encode(['error' => 'Invalid request']);
        break;
}

?>